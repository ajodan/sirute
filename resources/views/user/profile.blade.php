<x-layout.user-layout>
    <div class="dark:bg-[#1f1345]">
         <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Profil Pengguna</h3>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="#">Profil Pengguna</a></li>
                </ol>    
            </div>
        </div>
        <div class="container-fluid blog py-5">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 500px;">
                <h5 class="section-title px-3">Profil Pengguna</h5>
            </div>
            <div class="row g-4 justify-content-center" x-data="{ editMode: false }">
                <div class="col-lg-8 col-md-12">
                    <!-- FORM EDIT -->
                    <div x-show="editMode" x-cloak>
                        <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                            @csrf
                            @method('PUT')

                            <!-- Foto -->
                            <div class="text-center mb-3">
                                <img src="{{ auth()->user()->penduduk->foto_profile() ?? asset('images/default.png') }}" 
                                    class="mx-auto mb-3 rounded object-cover border-2 border-gray-300 shadow"
                                    style="width:300px; height:400px; object-fit:cover; border-radius:8px;">
                                <input type="file" name="foto_profile" class="form-control mt-2">
                            </div>

                            <!-- Nama -->
                            <div class="mb-3">
                                <label class="font-semibold">Nama Lengkap</label>
                                <input type="text" name="nama" 
                                    value="{{ old('nama', auth()->user()->penduduk->nama) }}" 
                                    class="form-control" required disabled>
                            </div>

                            <!-- NIK -->
                            <div class="mb-3">
                                <label class="font-semibold">Nomor Kartu Keluarga</label>
                                <input type="text" name="nik" 
                                    value="{{ old('nik', auth()->user()->penduduk->nik) }}" 
                                    class="form-control" required disabled>
                            </div>

                             <!-- NIK -->
                            <div class="mb-3">
                                <label class="font-semibold">NIK</label>
                                <input type="text" name="nik" 
                                    value="{{ old('nik', auth()->user()->penduduk->nik) }}" 
                                    class="form-control" required disabled>
                            </div>

                            <!-- Alamat -->
                            <div class="mb-3">
                                <label class="font-semibold">Alamat</label>
                                <textarea name="alamat" class="form-control" required disabled>{{ old('alamat', auth()->user()->penduduk->alamat->jalan) }}</textarea>
                            </div>

                            <!-- Tempat Lahir -->
                            <div class="mb-3">
                                <label class="font-semibold">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" 
                                    value="{{ old('tempat_lahir', auth()->user()->penduduk->tempat_lahir) }}" 
                                    class="form-control" disabled>
                            </div>
                             <!-- Tanggal Lahir -->
                            <div class="mb-3">
                                <label class="font-semibold">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" 
                                    value="{{ old('tgl_lahir', auth()->user()->penduduk->tgl_lahir) }}" 
                                    class="form-control" disabled>
                            </div>
                             <div class="mb-3">
                                <label class="font-semibold">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" disabled>
                                    <option value="Laki-laki" {{ auth()->user()->penduduk->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ auth()->user()->penduduk->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <!-- Agama -->
                            <div class="mb-3">
                                <label class="font-semibold">Agama</label>
                                <input type="text" name="agama" 
                                    value="{{ old('agama', auth()->user()->penduduk->agama) }}" 
                                    class="form-control" disabled>
                            </div>
                            <!-- Agama -->
                            <div class="mb-3">
                                <label class="font-semibold">Hubungan Kartu Keluarga</label>
                                <input type="text" name="hub_kk" 
                                    value="{{ old('hub_kk', auth()->user()->penduduk->hub_kk) }}" 
                                    class="form-control" disabled>
                            </div>
                            <!-- Status Perkawinan -->
                            <div class="mb-3">
                                <label class="font-semibold">Status Perkawinan</label>
                                <input type="text" name="status_perkawinan" 
                                    value="{{ old('status_perkawinan', auth()->user()->penduduk->status_perkawinan) }}" 
                                    class="form-control" disabled>
                            </div>
                            <!-- Pendidikan Terakhir -->
                            <div class="mb-3">
                                <label class="font-semibold">Pendidikan Terakhir</label>
                                <input type="text" name="pendidikan" 
                                    value="{{ old('pendidikan', auth()->user()->penduduk->pendidikan) }}" 
                                    class="form-control" disabled>
                            </div>
                            <!-- Pekerjaan -->
                            <div class="mb-3">
                                <label class="font-semibold">Pekerjaan</label>
                                <input type="text" name="pekerjaan" 
                                    value="{{ old('pekerjaan', auth()->user()->penduduk->pekerjaan) }}" 
                                    class="form-control" disabled>
                            </div>
                            <!-- Golongan Darah -->
                            <div class="mb-3">
                                <label class="font-semibold">Golongan Darah</label>
                                <input type="text" name="gol_darah" 
                                    value="{{ old('gol_darah', auth()->user()->penduduk->gol_darah) }}" 
                                    class="form-control">
                            </div>
                            <!-- No HP -->
                            <div class="mb-3">
                                <label class="font-semibold">No HP</label>
                                <input type="text" name="no_hp" 
                                    value="{{ old('no_hp', auth()->user()->penduduk->no_hp) }}" 
                                    class="form-control">
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label class="font-semibold">Email</label>
                                <input type="email" name="email" 
                                    value="{{ old('email', auth()->user()->email) }}" 
                                    class="form-control">
                            </div>
                             <div class="mb-3">
                                <label class="font-semibold">Link Instagram</label>
                                <input type="text" name="instagram" 
                                    value="{{ old('instagram', auth()->user()->penduduk->instagram) }}" 
                                    class="form-control">
                            </div>
                             <div class="mb-3">
                                <label class="font-semibold">Link Facebook</label>
                                <input type="text" name="facebook" 
                                    value="{{ old('facebook', auth()->user()->penduduk->facebook) }}" 
                                    class="form-control">
                            </div>

                            <!-- Golongan Darah -->
                            <div class="mb-3">
                                <label class="font-semibold">Status Penduduk</label>
                                <input type="text" name="status_penduduk" 
                                    value="{{ old('status_penduduk', auth()->user()->penduduk->status_penduduk) }}" 
                                    class="form-control" disabled>
                            </div>

                            <!-- Golongan Darah -->
                            <div class="mb-3">
                                <label class="font-semibold">Status Dasar</label>
                                <input type="text" name="status_dasar" 
                                    value="{{ old('status_dasar', auth()->user()->penduduk->status_dasar) }}" 
                                    class="form-control" disabled>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <button type="button" @click="editMode = false" class="btn btn-secondary">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.user-layout>
