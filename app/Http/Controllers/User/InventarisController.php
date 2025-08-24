<?php

namespace App\Http\Controllers\user;


use App\Http\Controllers\Controller;
use App\Models\InventarisModel;
use App\Models\PeminjamanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;


class InventarisController extends Controller
{
    public function index()
    {
        $rt = auth()->user()->penduduk->alamat->rt;
        $inventaris = InventarisModel::where('rt', $rt)->get();
      // $inventaris = InventarisModel::all();
       dd($inventaris);
        return view('user.inventaris.index', compact('inventaris'));
    }

    public function riwayatinventaris()
    {
        $nik = auth()->user()->nik;
        $peminjaman = PeminjamanModel::whereHas('penduduk', function ($query) use ($nik) {
            $query->where('nik', $nik);
        })->with('inventaris')->get();
        $inventaris = InventarisModel::all();

        $page = request()->get('page', 1);
        $perPage = 10;
        $items = $peminjaman->forPage($page, $perPage);
        $paginator = new LengthAwarePaginator($items, $peminjaman->count(), $perPage, $page);
        //dd($peminjaman);
        return view('user.inventaris.riwayatinventaris', compact('peminjaman', 'paginator', 'inventaris'));

    }

    // public function pinjam(Request $request)
    // {
    //     DB::transaction(function () use ($request) {
    //         $inventaris = new PeminjamanModel();
    //         $inventaris->id_inventaris = $request->id_inventaris;
    //         $inventaris->jumlah = $request->jumlah;
    //         $inventaris->tanggal = $request->tanggal;
    //         $inventaris->nik = auth()->user()->nik;
    //         $inventaris->status = 'pending';
    //         $inventaris->save();
    //     });

    //     return redirect()->route('user.inventaris')->with('success', 'Inventaris berhasil dipinjam');
    // }
    public function pinjam(Request $request)
    {
                $request->validate([
                'id_inventaris' => 'required',
                'jumlah' => 'required|integer|min:1',
                'tanggal' => 'required|date',
            ]);

                // if ($validator->fails()) {
                // return response()->json([
                //     'success' => false,
                //     'errors' => $validator->errors(),
                //     'message' => 'Validasi gagal, periksa kembali input Anda.'
                // ]);
                // }

            $inventaris = InventarisModel::find($request->id_inventaris);
            if (!$inventaris) {
                return response()->json(['success' => false, 'message' => 'Inventaris tidak ditemukan']);
            }

            if ($request->jumlah > $inventaris->jumlah) {
                return response()->json(['success' => false, 'message' => 'Jumlah pinjam melebihi stok']);
            }

            // Simpan peminjaman
            PeminjamanModel::create([
                'id_inventaris' => $request->id_inventaris,
                'jumlah' => $request->jumlah,
                'tanggal' => $request->tanggal,
                'nik' => auth()->user()->nik,
                'status' => 'pending',
            ]);

            return response()->json(['success' => true, 'message' => 'Peminjaman Inventaris berhasil disimpan']);
    }
}
