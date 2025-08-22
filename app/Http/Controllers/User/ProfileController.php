<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\AlamatModel;
use App\Models\AkunModel;
use App\Models\PendudukModel;
class ProfileController extends Controller
{
    public function index()
    {
        $alamat = AlamatModel::where('id_alamat', Auth::user()->penduduk->id_alamat)->first();
        return view('user.profile', compact('alamat'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $penduduk = $user->penduduk;
       // dd($penduduk);

        // Validasi input
        $request->validate([
            'foto_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gol_darah' => 'nullable|string|max:3',
            'no_hp' => 'nullable|string|max:15',
            'email' => 'required|email|max:255|unique:tb_akun,email,' . $user->penduduk->nik . ',nik',
        ]);

        // Update foto profile
        if ($request->hasFile('foto_profile')) {
            // Hapus foto lama jika ada
            if ($penduduk->image && Storage::disk('public')->exists('images/penduduk/' . $penduduk->image)) {
                Storage::disk('public')->delete('images/penduduk/' . $penduduk->image);
            }

            $fotoName = time() . '.' . $request->foto_profile->extension();
            $request->foto_profile->storeAs('images/penduduk', $fotoName, 'public');
            $penduduk->image = $fotoName;
        }

        // Update data penduduk
        $penduduk->gol_darah = $request->gol_darah;
        $penduduk->no_hp = $request->no_hp;
        $penduduk->email = $request->email;
        $penduduk->instagram = $request->instagram;
        $penduduk->facebook = $request->facebook;

        $penduduk->save();

        // Update email di tabel users
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
