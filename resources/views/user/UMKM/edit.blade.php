<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<x-layout.user-layout>
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Usaha Kecil Mikro</h3>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                <li class="breadcrumb-item"><a href="#">Usaha Kecil Mikro</a></li>
            </ol>    
        </div>
    </div>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    <!-- Form Edit UMKM -->
<!-- Form Edit UMKM -->
<div class="container-fluid contact bg-light py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Edit Usaha Kecil Mikro</h5>
        </div>
        <div class="row g-5 align-items-center">
            <div class="col-lg-8 mx-auto">
                <div class="card shadow rounded-3">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Edit Usaha Kecil Mikro</h5>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p class="text-danger">{{ $error }}</p>
                            @endforeach
                        @endif

                        <form action="{{ route('user.umkm.update', $umkm->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id_umkm" value="{{ $umkm->id_umkm }}">

                            <?php
                                // Pastikan data selalu array
                                $hariTerpilih = $umkm->hari ? (is_array($umkm->hari) ? $umkm->hari : explode(',', $umkm->hari)) : [];
                                $kategoriTerpilih = $umkm->kategori ? (is_array($umkm->kategori) ? $umkm->kategori : explode(',', $umkm->kategori)) : [];
                            ?>


                            <!-- Nama -->
                            <div class="mb-3">
                                <label class="form-label">Nama Usaha Kecil Mikro</label>
                                <input type="text" name="nama_umkm" class="form-control"
                                    value="{{ old('nama_umkm', $umkm->nama_umkm) }}" required>
                            </div>

                            <!-- Cover -->
                            <div class="mb-3">
                                <label class="form-label">Photo Cover</label>
                                <input type="file" id="cover" name="cover" class="form-control">
                                @if ($umkm->cover)
                                    <img src="{{ asset('storage/images/umkm/cover_umkm/'.$umkm->cover) }}" class="img-thumbnail mt-2" width="400">
                                @endif
                                <img id="imagePreview" class="img-thumbnail mt-2 d-none" width="400">
                            </div>

                            <!-- Jam buka & tutup -->
                            <div class="mb-3">
                                <label for="jam_buka" class="form-label">Jam Buka</label>
                                <input type="time" id="jam_buka" name="jam_buka" class="form-control"
                                    value="{{ old('jam_buka', $umkm->jam_buka) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="jam_tutup" class="form-label">Jam Tutup</label>
                                <input type="time" id="jam_tutup" name="jam_tutup" class="form-control"
                                    value="{{ old('jam_tutup', $umkm->jam_tutup) }}" required>
                            </div>

                            <!-- Hari -->
                            <div class="grid grid-cols-2 gap-3">
                                <label class="block mb-2 font-semibold">Pilih Hari Buka</label>
                                <div class="mb-5 border border-gray-400 rounded-lg grid grid-cols-2 md:grid-cols-4 gap-2 p-3">
                                    @foreach($hari as $h)
                                        <div class="flex items-center gap-x-3">
                                            <input id="{{ $h }}" value="{{ $h }}" name="hari[]" type="checkbox"
                                                class="h-4 w-4 border-gray-300"
                                                {{ in_array($h, $hariTerpilih) ? 'checked' : '' }}>
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
                                                class="w-4 h-4 text-blue-600 bg-gray-300 border-gray-300 rounded focus:ring-blue-500"
                                                {{ in_array($item->id_kategori, $kategoriTerpilih ?? []) ? 'checked' : '' }}>
                                            <label for="kategori-{{ $item->id_kategori }}" class="ms-2 text-sm font-medium text-gray-900">
                                                {{ $item->nama_kategori }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Slide Gambar -->
                           <div class="mb-3">
                                <label class="form-label">Slide Gambar</label>
                                <input type="file" id="slide" name="slide[]" class="form-control" multiple>

                                @foreach ($slide as $s)
                                    <img src="{{ asset('storage/images/umkm/slide_umkm/'.$s) }}" 
                                        class="img-thumbnail mt-2" width="400">
                                @endforeach
                            </div>

                            <!-- Deskripsi -->
                            <div class="mb-3">
                                <label class="form-label">Deskripsi UKM</label>
                                <textarea id="summernote" name="deskripsi" class="form-control w-100" style="min-height:300px;" required>
                                    {{ old('deskripsi', strip_tags($umkm->deskripsi)) }}
                                </textarea>
                            </div>

                            <!-- Tombol -->
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('user.umkm.dashboard') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>         

    <div class="mt-187.5"></div>
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

    document.getElementById('cover').addEventListener('change', function(event) {
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

        document.getElementById('fortInput').classList.add('hidden');
        document.getElementById('changetext').innerText = 'Change a file';
    });

    document.getElementById('slide').addEventListener('change', function(event) {
        const imagePreviewContainer = document.getElementById('imagePreviewContainer');
        imagePreviewContainer.innerHTML = ''; // Kosongkan container

        const files = event.target.files;

        if (files.length > 0) {
            imagePreviewContainer.classList.remove('hidden'); // Tampilkan container
            Array.from(files).forEach(file => {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('max-w-full'); // Tambahkan kelas untuk styling
                    img.alt = 'Image Preview';

                    imagePreviewContainer.appendChild(img);
                }

                reader.readAsDataURL(file);
            });
        } else {
            imagePreviewContainer.classList.add('hidden'); // Sembunyikan container jika tidak ada file
        }
        document.getElementById('fortInputSlide').classList.add('hidden');
        document.getElementById('changetextslide').innerText = 'Change a file';
    });
</script>
