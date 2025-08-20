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
    // Validasi
    $request->validate([
        'isi' => 'required|string|min:10|max:255',
    ], [
        'isi.required' => 'Aspirasi tidak boleh kosong.',
        'isi.min' => 'Aspirasi minimal 10 karakter.',
        'isi.max' => 'Aspirasi maksimal 255 karakter.',
    ]);

    // Simpan data aspirasi
    $aspirasi = new AspirasiModel();
    $aspirasi->author = auth()->user()->nik; // author: NIK user
    $aspirasi->isi = $request->isi;          // sesuai nama field form
    $aspirasi->status = 'pending';           // status default
    $aspirasi->respon = null;                // kosong dulu
    $aspirasi->save();

    // Redirect dengan pesan sukses
    return redirect()->route('user.aspirasi.riwayataspirasi')
                     ->with('success', 'Aspirasi berhasil dikirim.');
}
}
