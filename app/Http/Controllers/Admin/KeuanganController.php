<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKeuangan;
use App\Models\KategoriKeuanganModel;
use App\Models\KeuanganModel;
use App\Models\KkModel;
use App\Models\PendudukModel;
use App\Models\PengeluaranModel;
use App\Models\SettingKeuanganModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Number;

class KeuanganController extends Controller
{
    protected $pagging = 10;
    private $level;
    private $alamat;
    private $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->init();
            return $next($request);
        });
    }
    private function init()
    {
        $this->user = auth()->user();
        $this->level = $this->user->level->nama_level;
        $this->alamat = $this->user->penduduk->alamat;
    }
    public function index(Request $request)
    {
        $rt = $this->alamat->rt;
        $query = KeuanganModel::select('no_kk', DB::raw('sum(jumlah) as jumlah'))
            ->groupBy('no_kk');

        if ($this->level == 'RT') {
            $query->whereHas('kk.kepalaKeluarga.alamat', function ($query) use ($rt) {
                $query->where('rt', $rt);
            });
        }

        if ($request->has('s')) {
            $query->where('no_kk', 'like', '%' . $request->s . '%');
        }

        $keuangan = $query->paginate($this->pagging)->withQueryString();

        // Menghitung total pemasukkan dan pengeluaran
        $totalPemasukkan = KeuanganModel::sum('jumlah');
        $totalPengeluaran = PengeluaranModel::sum('jumlah');
        $total = Number::currency($totalPemasukkan - $totalPengeluaran, 'IDR');

        if ($this->level == 'RT') {
            $totalPemasukkan = KeuanganModel::whereHas('kk.kepalaKeluarga.alamat', function ($query) use ($rt) {
                $query->where('rt', $rt);
            })->sum('jumlah');
        }

        // Format keuangan dengan currency
        $totalPemasukkan = Number::currency($totalPemasukkan, 'IDR');
        $totalPengeluaran = Number::currency($totalPengeluaran, 'IDR');

        return view('admin.keuangan.index', compact('keuangan', 'total', 'totalPemasukkan', 'totalPengeluaran'));
    }

    public function pembayaran()
    {
        $setting = SettingKeuanganModel::where('status', 'active')->first();

        if ($setting) {
            $intervalSetting = SettingKeuanganModel::where('status', 'active')
                ->where('nama_setting', 'Interval') // Minggu,Bulan,Tahun
                ->first();
            $intervalWaktuSetting = SettingKeuanganModel::where('status', 'active')
                ->where('nama_setting', 'Interval Waktu') // n = n/Minggu,n/Bulan,n/Tahun
                ->first();
            $minimalPembayaranSetting = SettingKeuanganModel::where('status', 'active')
                ->where('nama_setting', 'Pemasukan') // 20000
                ->first();

            $tagihan = [];
            if ($intervalSetting && $intervalWaktuSetting && $minimalPembayaranSetting) {
                $interval = $intervalSetting->nilai_setting;
                $intervalWaktu = (int) $intervalWaktuSetting->nilai_setting;
                $minimalPembayaran = (int) $minimalPembayaranSetting->nilai_setting;
                $listKK = [];
                $kepalaKK = KkModel::whereHas('kepalaKeluarga.alamat', function ($query) {
                    $query->where('rt', $this->alamat->rt);
                })->get();

                // Hitung jumlah pembayaran yang harus dibayar dan jumlah yang sudah dibayar
                foreach ($kepalaKK as $penduduk) {
                    $awalPembayaran = KeuanganModel::where('no_kk', $penduduk->no_kk)->first()->created_at ?? null;
                    if (empty($awalPembayaran))
                        continue;
                    $now = now();
                    switch ($interval) {
                        case '1':
                            $intervalLalu = $now->diffInWeeks($awalPembayaran) == 0 ? 1 : $now->diffInWeeks($awalPembayaran);
                            break;
                        case '2':
                            $intervalLalu = $now->diffInMonths($awalPembayaran) == 0 ? 1 : $now->diffInMonths($awalPembayaran);
                            break;
                        case '3':
                            $intervalLalu = $now->diffInYears($awalPembayaran) == 0 ? 1 : $now->diffInYears($awalPembayaran);
                            break;
                        default:
                            $intervalLalu = 0;
                            break;
                    }
                    $totalBayar = $intervalLalu * $intervalWaktu * $minimalPembayaran;
                    $totalDibayar = KeuanganModel::where('no_kk', $penduduk->no_kk)->sum('jumlah');
                    $tagihan[$penduduk->no_kk] = $totalBayar - $totalDibayar;
                    if ($totalDibayar >= $totalBayar) {
                        $listKK[] = $penduduk->nik_kepalakeluarga;
                    }
                }
                $kk = KkModel::whereNotIn('nik_kepalakeluarga', $listKK)->whereHas('kepalaKeluarga.alamat', function ($query) {
                    $query->where('rt', $this->alamat->rt);
                })->get();
                $penduduk = PendudukModel::whereIn('nik', $kk->pluck('nik_kepalakeluarga'))->paginate($this->pagging);
                // dd($tagihan);
                $cekKeuangan = KeuanganModel::whereHas('kk.kepalaKeluarga.alamat', function ($query) {
                    $query->where('rt', $this->alamat->rt);
                })->sum('jumlah');
                return view("admin.keuangan.pembayaran", compact('penduduk', 'tagihan', 'cekKeuangan'));
            } else {
                return redirect()->back()->withErrors(['message' => 'Pengaturan interval, interval waktu, atau minimal pembayaran tidak ditemukan.']);
            }
        } else {
            return redirect()->back()->withErrors(['message' => 'Setting keuangan aktif tidak ditemukan.']);
        }
    }

    public function store(StoreKeuangan $request)
    {
        DB::transaction(function () use ($request) {
            $keuangan = new KeuanganModel();
            $keuangan->jumlah = $request->jumlah;
            $keuangan->keterangan = $request->keterangan;
            $keuangan->no_kk = $request->no_kk;
            $keuangan->save();
        });
        return redirect()->route('admin.keuangan.pembayaran')->with('success', 'Data keuangan berhasil ditambahkan');
    }

    public function update_setting(Request $request)
    {
        $request->validate([
            'interval' => 'required',
            'interval_waktu' => 'required',
            'minimal_pembayaran' => 'required',
        ]);

        DB::transaction(function () use ($request) {
            SettingKeuanganModel::where('nama_setting', 'Interval')->update(['nilai_setting' => $request->interval]);
            SettingKeuanganModel::where('nama_setting', 'Interval Waktu')->update(['nilai_setting' => $request->interval_waktu]);
            SettingKeuanganModel::where('nama_setting', 'Pemasukan')->update(['nilai_setting' => $request->minimal_pembayaran]);
        });

        return redirect()->route('admin.keuangan.setting')->with('success', 'Setting keuangan berhasil diubah');
    }

    public function setting()
    {
        $interval = SettingKeuanganModel::where('nama_setting', 'Interval')->first();
        $intervalWaktu = SettingKeuanganModel::where('nama_setting', 'Interval Waktu')->first();
        $minimalPembayaran = SettingKeuanganModel::where('nama_setting', 'Pemasukan')->first();
        $setting = (object) [
            'interval' => $interval->nilai_setting,
            'interval_waktu' => $intervalWaktu->nilai_setting,
            'minimal_pembayaran' => $minimalPembayaran->nilai_setting,
        ];
        return view('admin.keuangan.setting', compact('setting'));
    }

    public function riwayat()
    {
        $query = KeuanganModel::select('*');
        if ($this->level == 'RT') {
            $query->whereHas('kk.kepalaKeluarga.alamat', function ($query) {
                $query->where('rt', $this->alamat->rt);
            });
        }
        $keuangan = $query->orderBy('created_at', 'desc')->paginate($this->pagging)->withQueryString();
        return view('admin.keuangan.riwayat', compact('keuangan'));
    }

    public function show($no_kk)
    {
        $keuangan = KeuanganModel::where('no_kk', $no_kk)->orderBy('created_at', 'desc')->paginate($this->pagging);
        return view('admin.keuangan.show', compact('keuangan'));
    }

    public function update_keuangan(Request $request)
    {
        $request->validate([
            'jumlah' => 'required|numeric',
            'id' => 'required|exists:tb_keuangan,id_keuangan'
        ]);

        DB::transaction(function () use ($request) {
            KeuanganModel::where('id_keuangan', $request->id)->update(['jumlah' => $request->jumlah]);
        });

        return redirect()->back()->with('success', 'Data keuangan berhasil diubah');
    }

    public function kategori()
    {
        $kategori = KategoriKeuanganModel::paginate($this->pagging);
        return view('admin.keuangan.pengeluaran.kategori', compact('kategori'));
    }

    public function pengeluaran()
    {
        $pengeluaran = PengeluaranModel::paginate($this->pagging);
        $total = Number::currency(PengeluaranModel::sum('jumlah'), 'IDR');
        return view('admin.keuangan.pengeluaran.index', compact('pengeluaran', 'total'));
    }

    public function store_kategori(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'keterangan' => 'required'
        ]);

        DB::transaction(function () use ($request) {
            KategoriKeuanganModel::create($request->all());
        });

        return redirect()->back()->with('success', 'Kategori keuangan berhasil ditambahkan');
    }

    public function destroy_kategori(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required|exists:tb_kategori_keuangan,id_kategori'
        ]);

        try {
            DB::transaction(function () use ($request) {
                KategoriKeuanganModel::where('id_kategori', $request->id_kategori)->delete();
            });
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => 'Kategori keuangan tidak bisa dihapus karena sudah digunakan']);
        }

        return redirect()->back()->with('success', 'Kategori keuangan berhasil dihapus');
    }

    public function store_pengeluaran(Request $request)
    {
        $request->validate([
            'jumlah' => 'required|numeric',
            'keterangan' => 'required',
            'id_kategori' => 'required|exists:tb_kategori_keuangan,id_kategori'
        ]);
        // cek apakah jumlah melenceng dari total keuangan
        $totalPemasukkan = KeuanganModel::sum('jumlah');
        $totalPengeluaran = PengeluaranModel::sum('jumlah');
        $total = $totalPemasukkan - $totalPengeluaran;
        if ($request->jumlah > $total) {
            return redirect()->back()->withErrors(['message' => 'Jumlah pengeluaran melebihi total keuangan']);
        }

        DB::transaction(function () use ($request) {
            $keuangan = new PengeluaranModel();
            $keuangan->jumlah = $request->jumlah;
            $keuangan->keterangan = $request->keterangan;
            $keuangan->id_kategori = $request->id_kategori;
            $keuangan->save();
        });

        return redirect()->back()->with('success', 'Data pengeluaran berhasil ditambahkan');
    }

    public function update_kategori(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required|exists:tb_kategori_keuangan,id_kategori',
            'nama_kategori' => 'required',
            'keterangan' => 'required'
        ]);

        DB::transaction(function () use ($request) {
            KategoriKeuanganModel::where('id_kategori', $request->id_kategori)->update([
                'nama_kategori' => $request->nama_kategori,
                'keterangan' => $request->keterangan
            ]);
        });

        return redirect()->back()->with('success', 'Kategori keuangan berhasil diubah');
    }

    public function update_pengeluaran(Request $request)
    {
        $request->validate([
            'id_pengeluaran' => 'required|exists:tb_pengeluaran,id_pengeluaran',
            'jumlah' => 'required|numeric',
            'keterangan' => 'required',
            'id_kategori' => 'required|exists:tb_kategori_keuangan,id_kategori'
        ]);

        DB::transaction(function () use ($request) {
            PengeluaranModel::where('id_pengeluaran', $request->id_pengeluaran)->update([
                'jumlah' => $request->jumlah,
                'keterangan' => $request->keterangan,
                'id_kategori' => $request->id_kategori
            ]);
        });

        return redirect()->back()->with('success', 'Data pengeluaran berhasil diubah');
    }
}
