<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AspirasiModel;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    public function index()
    {
        $aspirasi = AspirasiModel::all();
        return view('user.aspirasi.index', compact('aspirasi'));
    }
    public function riwayataspirasi()
    {
        $nik = auth()->user()->nik;
        $aspirasi = AspirasiModel::with('akun')->where('author', $nik)->orderBy('updated_at', 'desc')->get();
        return view('user.aspirasi.riwayataspirasi', compact('aspirasi'));
    }
    // public function store(Request $request)
    // {
    //    $request->validate([
    //         'aspirasi' => 'required|string|min:10|max:255',
    //     ], [
    //         'aspirasi.required' => 'Aspirasi tidak boleh kosong.',
    //         'aspirasi.min' => 'Aspirasi minimal 10 karakter.',
    //         'aspirasi.max' => 'Aspirasi maksimal 255 karakter.',
    //     ]);

    //     $aspirasi = new AspirasiModel();
    //     $aspirasi->author = auth()->user()->nik;
    //     $aspirasi->isi = $request->aspirasi;
    //     $aspirasi->status = 'pending';
    //     $aspirasi->respon = $request->aspirasi;
    //     $aspirasi->save();

    //     return redirect()->route('user.aspirasi.riwayataspirasi')->with('success', 'Aspirasi berhasil dikirim.');
    // }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'isi' => 'required|string|max:1000',
            ]);

            $aspirasi = new AspirasiModel();
            $aspirasi->author = auth()->user()->nik;
            $aspirasi->isi    = $request->isi;

            // Pastikan RT tidak null
            $aspirasi->rt = auth()->user()->penduduk->alamat->rt ?? '-';

            $aspirasi->status = 'pending';
            $aspirasi->respon = null;
            $aspirasi->save();

            return response()->json([
                'success' => true,
                'message' => 'Aspirasi berhasil dikirim!',
                'data'    => $aspirasi
            ]);
        } catch (\Exception $e) {
            // log error biar bisa dicek di storage/logs/laravel.log
            \Log::error("Error simpan aspirasi: " . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server saat simpan: ' . $e->getMessage()
            ], 500);
        }
    }

}
