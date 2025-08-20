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
        <!-- Header End -->

        <!-- Blog Start -->
        <div class="container-fluid packages py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Usaha Kecil Mikro</h5>
                    <h1 class="mb-0">Katalog Usaha Kecil Mikro</h1>
                    <p class="mb-4">Berikut adalah daftar Usaha Kecil Mikro yang ada di wilayah RW 13 Taman Alamanda, <br>Desa Karangsatria, Kecamatan Tambun Utara, Kabupaten Bekasi.</p><br>
                    <!-- Tombol Tambah -->
                    <a href="{{ route('user.umkm.tambah') }}"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-black-100 text-sm font-semibold rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-1 transition">
                        <i class="fa-solid fa-plus mr-2"></i> Tambah UKM
                    </a>
                </div>
                <div class="packages-carousel owl-carousel">
                    @if ($umkm == null || $umkm->isEmpty())
                        <div class="alert alert-info text-center">
                            Riwayat Usaha Kecil Mikro Belum Tersedia.
                        </div>
                    @endif
                    @foreach($umkm as $item)
                    <div class="packages-item">
                        <div class="packages-img" style="height: 300px; overflow: hidden;">
                            <img src="{{ asset('storage/images/umkm/cover_umkm/' . $item->cover) }}" class="img-fluid w-100 rounded-top" alt="Image">
                            <div class="packages-info d-flex border border-start-0 border-end-0 position-absolute" style="width: 100%; bottom: 0; left: 0; z-index: 5;">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt me-2"></i>Buka : {{ $item->jam_buka }}</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt me-2"></i>Tutup : {{ $item->jam_tutup }}</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-eye me-2"></i>{{ $item->view }} Kali</small>
                            </div>
                            {{-- <div class="packages-price py-2 px-4">$349.00</div> --}}
                        </div>
                        <div class="packages-content bg-light">
                            <div class="p-4 pb-0">
                                <h5 class="mb-0">{{ $item->nama_umkm }}</h5>
                                <small class="text-uppercase">Pemilik : {{ $item->penduduk->nama }}</small>
                                <div class="mb-3">
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                </div>
                                <small class="text-uppercase">Status : {{ $item->status }}</small>
                                <p class="mb-4">{{ Str::limit(strip_tags($item->deskripsi), 200) }}</p>
                            </div>
                            <div class="row bg-primary rounded-bottom mx-0">
                                <div class="col-6 text-start px-0">
                                    {{-- <a href="#" class="btn-hover btn text-white py-2 px-4">Read More</a> --}}
                                </div>
                                <div class="col-6 text-end px-0 flex gap-2 justify-end">
                                    <!-- Tombol Selengkapnya -->
                                    <a href="{{ route('user.umkm.detail', $item->id_umkm) }}" 
                                    class="btn btn-info btn-sm d-inline-flex align-items-center gap-1 text-white">
                                        <i class="bi bi-eye-slash"></i> Lihat
                                    </a>

                                    <!-- Tombol Edit -->
                                    <a href="{{ route('user.umkm.edit', $item->id_umkm) }}" 
                                    class="btn btn-warning btn-sm d-inline-flex align-items-center gap-1 text-white">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('user.umkm.delete', $item->id_umkm) }}" 
                                        method="POST" 
                                        onsubmit="return confirm('Yakin hapus data ini?')" 
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm d-inline-flex align-items-center gap-1">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
</x-layout.user-layout>
