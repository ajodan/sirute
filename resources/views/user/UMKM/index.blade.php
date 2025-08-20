<x-layout.user-layout>
      <!-- Header Start -->
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
                    <p class="mb-4">Berikut adalah daftar Usaha Kecil Mikro yang ada di wilayah RW 13 Taman Alamanda, <br>Desa Karangsatria, Kecamatan Tambun Utara, Kabupaten Bekasi.</p>
                </div>
                <div class="packages-carousel owl-carousel">
                    @foreach($umkm as $item)
                    <div class="packages-item">
                        <div class="packages-img relative" style="height: 300px; overflow: hidden;">
                                   <img src="{{ asset('storage/images/umkm/cover_umkm/' . $item->cover) }}" 
                                    class="w-[400px] h-[300px] object-cover rounded-top" 
                                    alt="Gambar UMKM">
                                    
                                    <div class="packages-info d-flex border border-start-0 border-end-0 position-absolute" 
                                        style="width: 100%; bottom: 0; left: 0; z-index: 5;">
                                        <small class="flex-fill text-center border-end py-2">
                                            <i class="fa fa-calendar-alt me-2"></i>Buka : {{ $item->jam_buka }}
                                        </small>
                                        <small class="flex-fill text-center border-end py-2">
                                            <i class="fa fa-calendar-alt me-2"></i>Tutup : {{ $item->jam_tutup }}
                                        </small>
                                        <small class="flex-fill text-center py-2">
                                            <i class="fa fa-eye me-2"></i>{{ $item->view }} Kali
                                        </small>
                                    </div>
                                </div>
                            <div class="packages-content bg-light">
                            <div class="p-4 pb-0">
                                <h5 class="mb-0">Nama UKM : {{ $item->nama_umkm }}</h5>
                                <small class="text-uppercase">Pemilik : {{ $item->penduduk->nama }}</small>
                                <div class="mb-3">
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                </div>
                                <p class="mb-4">{{ Str::limit(strip_tags($item->deskripsi), 200) }}</p>
                            </div>
                            <div class="row bg-primary rounded-bottom mx-0">
                                <div class="col-6 text-start px-0">
                                    {{-- <a href="#" class="btn-hover btn text-white py-2 px-4">Read More</a> --}}
                                </div>
                                <div class="col-6 text-end px-0">
                                    <a href="{{ route('user.umkm.detail', $item->id_umkm) }}" class="btn-hover btn text-white py-2 px-4">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
</x-layout.user-layout>
