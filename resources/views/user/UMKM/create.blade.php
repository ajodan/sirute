<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<x-layout.user-layout>
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Usaha Kecil Mikro</h3>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="#">Usaha Kecil Mikro</a></li>
            </ol>    
        </div>
    </div>

    <!-- Form Tambah Berita -->
    <div class="container-fluid contact bg-light py-5">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Tambah Usaha Kecil Mikro</h5>
            </div>
            <div class="row g-5 align-items-center">
                <div class="col-lg-8 mx-auto">
                    <div class="card shadow rounded-3">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Tambah Usaha Kecil Mikro</h5>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach
                            @endif
                             <input type="hidden" name="rt" value="{{ auth()->user()->penduduk->alamat->rt }}">
                            <form action="{{ route('user.umkm.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="nik" value="{{ auth()->user()->penduduk->nik }}">
                                <input type="hidden" name="rt" value="{{ auth()->user()->penduduk->alamat->rt }}">

                                <!-- Judul -->
                                <div class="mb-3">
                                    <label class="form-label">Nama Usaha Kecil Mikro</label>
                                    <input type="text" name="nama_umkm" class="form-control" value="{{ old('nama_umkm') }}" required>
                                </div>
                                <!-- Gambar -->
                                <div class="mb-3">
                                    <label class="form-label">Photo Cover</label>
                                    <input type="file" id="cover" name="cover" class="form-control">
                                    <!-- Preview gambar baru -->
                                    <img id="imagePreview" class="img-thumbnail mt-2 d-none" width="200">
                                </div>
                                <div class="mb-3">
                                    <label for="jam_buka" class="form-label">Jam Buka</label>
                                    <input type="time" id="jam_buka" name="jam_buka" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="jam_tutup" class="form-label">Jam Tutup</label>
                                    <input type="time" id="jam_tutup" name="jam_tutup" class="form-control" required>
                                </div>
                                <?php
                                $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                                ?>

                                <div class="grid grid-cols-2 gap-3">
                                <label class="block mb-2 font-semibold">Pilih Hari Buka</label>
                                <div class="mb-5 border border-gray-400 rounded-lg grid grid-cols-2 md:grid-cols-4 gap-2 p-3">
                                    @foreach($hari as $h)
                                        <div class="flex items-center gap-x-3">
                                            <input id="{{ $h }}" value="{{ $h }}" name="hari[]" type="checkbox"
                                                class="h-4 w-4 border-gray-300">
                                            <label for="{{ $h }}" class="block text-sm font-medium leading-6">{{ $h }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                </div>
                                <!-- Kategori -->
                                <div class="grid grid-cols-2 gap-3">
                                <label class="block mb-2 font-semibold">Kategori UKM</label>
                                <div class="mb-5 border border-gray-400 rounded-lg grid grid-cols-2 md:grid-cols-4 gap-2 p-3">
                                    @foreach ($kategori as $item)
                                        <div class="flex items-center">
                                            <input type="checkbox" id="kategori-{{ $item->id_kategori }}"
                                                value="{{ $item->id_kategori }}" name="kategori[]"
                                                class="w-4 h-4 text-blue-600 bg-gray-300 border-gray-300 rounded focus:ring-blue-500">
                                            <label for="kategori-{{ $item->id_kategori }}" class="ms-2 text-sm font-medium text-gray-900">
                                                {{ $item->nama_kategori }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                </div>
                                 <div class="mb-3">
                                    <label class="form-label">Slide Gambar</label>
                                    <input type="file" id="slide" name="slide[]" class="form-control">
                                    <!-- Preview gambar baru -->
                                    <img id="imagePreview" class="img-thumbnail mt-2 d-none" width="200">
                                </div>

                                <!-- Isi Berita -->
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi UKM</label>
                                    <textarea id="summernote" name="deskripsi" class="form-control w-100" style="min-height:300px;" required>{{ old('deskripsi') }}</textarea>
                                </div>

                                <!-- Tombol -->
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('user.umkm') }}" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</x-layout.user-layout>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            toolbar: [
                ['font', ['fontsize', 'bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            height: 500,
            lineHeights: ['0.2', '0.3', '0.4', '0.5', '0.6', '0.8', '1.0', '1.2', '1.4', '1.5', '2.0',
                '3.0'
            ]

        });
    });

    document.getElementById('gambar').addEventListener('change', function(event) {
        // remove hidden class
        document.getElementById('imagePreview').classList.remove('hidden');
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
            }

            reader.readAsDataURL(file);
        } else {
            document.getElementById('imagePreview').src = "#";
        }
    });
</script>
