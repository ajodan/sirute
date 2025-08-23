<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InventarisModel;
use App\Models\PeminjamanModel;
use App\Models\PendudukModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarisController extends Controller
{
    private $inventaris;

    public function index()
    {
    //     $rt = auth()->user()->penduduk->alamat->rt;
    //     $inventaris = InventarisModel::where('rt', $rt)->get();
    //    //$inventaris = InventarisModel::orderBy('created_at', 'desc')->get();

    //     return view('admin.inventaris', compact('inventaris'));
            $rt = auth()->user()->penduduk?->alamat?->rt;

            if (!$rt) {
                // misalnya kalau user belum punya RT
                return redirect()->back()->with('error', 'Data RT tidak ditemukan.');
            }

            $inventaris = InventarisModel::where('rt', $rt)->get();

            return view('admin.inventaris', compact('inventaris'));
    }

  
    public function updatePeminjaman(Request $request)
    {
        $peminjaman = PeminjamanModel::findOrFail($request->id_peminjaman);
        $peminjaman->status = $request->status;
        $peminjaman->save();
        return redirect()->route('admin.peminjaman')->with('success', 'Status peminjaman berhasil diubah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:20',
            'jumlah' => 'required',

        ]);
        DB::transaction(function () use ($request) {
            $layanan = new InventarisModel();
            $layanan->nama = $request->nama;
            $layanan->image = $request->image->hashName();
            $layanan->jumlah = $request->jumlah;
            $layanan->rt = $request->rt;
            $layanan->save();
            $image = $request->file('image');
            $image->store('inventaris', 'public');
        });
        return redirect()->route('admin.inventaris')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:20',
            'jumlah' => 'required',
        ]);

        DB::transaction(function () use ($request) {
            $inventaris = InventarisModel::findOrFail($request->id_inventaris);
         //   dd($inventaris);
            if ($request->hasFile('image')) {
                // hapus gambar lama
                if (file_exists(storage_path('app/public/inventaris/' . $inventaris->image))) {
                    unlink(storage_path('app/public/inventaris/' . $inventaris->image));
                }
                $image = $request->file('image');
                $image->store('inventaris', 'public');
                $inventaris->image = $image->hashName();
            }
            $inventaris->nama = $request->nama;
            $inventaris->jumlah = $request->jumlah;
            $inventaris->rt = $request->rt;
            $inventaris->save();
        });
        return redirect()->route('admin.inventaris')->with('success', 'Data berhasil diubah');
    }

    public function delete($id_inventaris)
    {
        $inventaris = InventarisModel::findOrFail($id_inventaris);
        try {
            unlink(storage_path('app/public/inventaris/' . $inventaris->image));
        } catch (Exception $e) {
            $inventaris->delete();
            return redirect()->route('admin.inventaris')->with('success', 'Data berhasil dihapus, gambar tidak ditemukan');
        }
        $inventaris->delete();
        return redirect()->route('admin.inventaris')->with('success', 'Data berhasil dihapus');
    }

    public function peminjaman()
    {
        $peminjaman = PeminjamanModel::paginate(10);
        return view("admin.peminjaman", compact("peminjaman"));
    }

    public function peminjaman_status(Request $request)
    {
        $peminjaman = PeminjamanModel::findOrFail($request->id_peminjaman);
        $peminjaman->status = $request->status;
        $peminjaman->save();
        $inventaris = InventarisModel::findOrFail($peminjaman->id_inventaris);
        if ($request->status == 'approved') {
            $inventaris->jumlah = $inventaris->jumlah - $peminjaman->jumlah;
            $inventaris->save();
        }
        if ($request->status == 'done') {
            $inventaris->jumlah = $inventaris->jumlah + $peminjaman->jumlah;
            $inventaris->save();
        }
        return redirect()->route('admin.inventaris.peminjaman')->with('success', 'Status peminjaman berhasil diubah');
    }


    public function destroy_peminjaman(PeminjamanModel $peminjaman)
    {
        $peminjaman->delete();
        // return redirect()->route('admin.inventaris.peminjaman')->with('success', 'Data berhasil dihapus');
    }

}

