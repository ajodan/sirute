<x-layout.user-layout>
            <!-- Carousel Start -->
            <div class="carousel-header">
                <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        @foreach($berita as $key => $item)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                           <img 
                                src="{{ $item->gambar ? asset('storage/images/berita/' . $item->gambar) : asset('images/default.jpg') }}" 
                                class="img-fluid w-100 rounded" 
                                alt="{{ $item->judul ?? 'Gambar' }}" 
                                loading="lazy"
                            >
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                    {{-- <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Berita Terkini</h4> --}}
                                    <h1 class="display-2 text-capitalize text-white mb-4">{{ $item->judul }}</h1>
                                    <p class="mb-5 fs-5">{{ Str::limit(strip_tags($item->isi), 255) }}</p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="#">Berita Selengkapnya ....</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon btn bg-primary" aria-hidden="false"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                        <span class="carousel-control-next-icon btn bg-primary" aria-hidden="false"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                     <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                </div>
                </div>
            </div>
            <!-- Carousel End -->
        </div>
        {{-- <div class="container-fluid search-bar position-relative" style="top: -50%; transform: translateY(-50%);">
            <div class="container">
                <div class="position-relative rounded-pill w-100 mx-auto p-5" style="background: rgba(19, 53, 123, 0.8);">
                    <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Cari Berita" style="height: 60px;">
                    <button type="button" class="btn btn-primary rounded-pill py-2 px-4 position-absolute me-2" style="top: 50%; right: 46px; transform: translateY(-50%);">Cari</button>
                </div>
            </div>
        </div> --}}
        <!-- Navbar & Hero End -->
         <!-- Blog Start -->
        <div class="container-fluid blog py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Artikel dan Berita</h5>
                    {{-- <h1 class="mb-4">Artikel dan Berita</h1> --}}
                    {{-- <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti deserunt tenetur sapiente atque. Magni non explicabo beatae sit, vel reiciendis consectetur numquam id similique sunt error obcaecati ducimus officia maiores.
                    </p> --}}
                </div>
               <div class="row g-4 justify-content-center">
                @foreach($berita as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item">
                        <div class="blog-img">
                            <div class="blog-img-inner" style="height: 300px; overflow: hidden;">
                                <img class="img-fluid w-100 rounded-top" src="{{ asset('storage/images/berita/' . $item->gambar) }}" alt="{{ $item->judul }}">
                            </div>
                            <div class="blog-info d-flex align-items-center border border-start-0 border-end-0">
                                <small class="flex-fill text-center border-end py-2">
                                    <i class="fa fa-calendar-alt text-primary me-2"></i>
                                    {{ \Carbon\Carbon::parse($item->tanggal_posting)->format('d M Y') }}
                                </small>
                                <a href="#" class="btn-hover flex-fill text-center text-white border-end py-2">
                                    <i class="fa fa-thumbs-up text-primary me-2"></i>{{ $item->like_count }}
                                </a>
                                <a href="#" class="btn-hover flex-fill text-center text-white py-2">
                                    <i class="fa fa-comments text-primary me-2"></i>{{ $item->comment_count }}
                                </a>
                            </div>
                        </div>
                        <div class="blog-content border border-top-0 rounded-bottom p-4">
                            {{-- <p class="mb-3"><font size="2">Dibuat oleh : {{ $item->penulis->nama }}</font></p> --}}
                            <a href="{{ url('berita/detail/' . $item->slug) }}" class="h5">{{ $item->judul }}</a>
                            <p class="my-3 excerpt-berita">
                                {{ Str::limit(strip_tags($item->isi), 230) }}
                            </p>
                            <a href="{{ url('berita/detail/' . $item->slug) }}" class="btn btn-primary rounded-pill py-2 px-4" style="font-size: 10px;">Baca Selengkapnya ...</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            </div>
        </div>
        <!-- Blog End -->

        <!-- About Start -->
        <div class="container-fluid about py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-5">
                        <div class="h-100" style="border: 50px solid; border-color: transparent #13357B transparent #13357B;">
                            <img src="{{ asset('assets/images/illustration/gerbang.webp') }}" class="img-fluid w-100 h-100" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7" style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url(img/about-img-1.png);">
                        <h3 class="section-about-title pe-3">Kondisi Geografis</h3>
                        <h5 class="mb-4"><span class="text-primary">Elevasi dan Topografi</span></h5>
                        <p class="mb-4">RW 13 Blok C Taman Alamanda berada di kawasan Karangsatria dengan elevasi sekitar 12 meter di atas permukaan laut, menunjukkan kondisi datar sebagaimana karakter wilayah Bekasi secara umum.</p>
                        <p>Kemiringan tanah sangat rendah (0–2%), sehingga cenderung sulit mengalirkan air secara alami — faktor yang berkontribusi pada risiko genangan saat hujan lebat.</p>
                        <h5 class="mb-4"><span class="text-primary">Lokasi Administratif</span></h5>
                        <div class="row gy-2 gx-4 mb-4">
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Provinsi : Jawa Barat</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Kabupaten : Bekasi</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Kecamatan : Tambun Utara</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Desa : Karangsatria</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Services Start -->
        <div class="container-fluid bg-light service py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Pelayanan</h5>
                    <h1 class="mb-0">Layanan RT/RW</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                                    <div class="service-content">
                                        <h5 class="mb-4">Pendataan dan Pencataan Data Warga</h5>
                                        <p class="mb-0">Membuat Aturan Tata Tertib Lingkungan, Pendataan dan Pencatatan Warga, Membuat Agenda Lingkungan, Membuat Sistem Informasi Layanan RT/RW.</p>
                                        </p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-globe fa-4x text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center  bg-white border border-primary rounded p-4 pe-0">
                                    <div class="service-content">
                                        <h5 class="mb-4">Pengurusan Surat Menyurat</h5>
                                        <p class="mb-0">Pengurusan Permintaan Surat Menyurat Warga, seperti Permintaan Surat Pengantar, Ubah Kartu Keluarga, Pengurusan Akta Kelahiran dan Kematian, Membuat Surat Keterangan Domisili, Membuat Surat Keterangan Ahli Waris, Sengketa Warga, dan lain-lain.</p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-hotel fa-4x text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <i class="fa fa-globe fa-4x text-primary"></i>
                                    </div>
                                    <div class="service-content">
                                        <h5 class="mb-4">Kegiatan Gotong Royong</h5>
                                        <p class="mb-0">Kegiatan gotong royong yang melibatkan warga seperti Pelaksanaan Kerja Bakti Massal, Pembangunan dan Kebersihan, Perbaikan Saluran Air, Pemasangan Penerangan Lingkungan, Ketertiban dan Keamanan Lingkungan.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <i class="fa fa-hotel fa-4x text-primary"></i>
                                    </div>
                                    <div class="service-content">
                                         <h5 class="mb-4">Mitra Pemerintah Desa</h5>
                                        <p class="mb-0">RT dan RW sebagai bagian dari Lembaga Kemasyarakatan Desa memiliki tugas: membantu Kepala Desa dalam bidang pelayanan pemerintahan, menyediakan data kependudukan dan melaksanakan tugas lain yang diberikan oleh Kepala Desa.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-12">
                        <div class="text-center">
                            <a class="btn btn-primary rounded-pill py-3 px-5 mt-2" href="">Service More</a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- Services End -->
        <!-- Travel Guide Start -->
        <div class="container-fluid guide py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Pengurus RW</h5>
                    <h1 class="mb-0">Daftar Pengurus RW</h1>
                </div>
                <div class="row g-4">
                    <?php foreach ($rw as $row) { ?>
                        <div class="col-md-6 col-lg-3">
                            <div class="guide-item">
                                <div class="guide-img">
                                    <div class="guide-img-efects" style="height: 400px; overflow: hidden;">
                                        <img src="storage/images/penduduk/<?= $row->penduduk->image ?>" class="img-fluid w-100 rounded-top" alt="<?= $row->penduduk->nama ?>">
                                    </div>
                                    <div class="guide-icon rounded-pill p-2">
                                        <a class="btn btn-square btn-primary rounded-circle mx-1" href="<?= $row->penduduk->facebook ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-square btn-primary rounded-circle mx-1" href="<?= $row->penduduk->instagram ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                        <a class="btn btn-square btn-primary rounded-circle mx-1" href="mailto:<?= $row->penduduk->email ?>" target="_blank"><i class="fas fa-envelope"></i></a>
                                        <a class="btn btn-square btn-success rounded-circle mx-1" href="<?= 'https://wa.me/' . $row->penduduk->no_hp ?>" target="_blank">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    </div>
                                </div>
                                @if($row->penduduk->akun->id_level == 4)
                                <div class="guide-title text-center rounded-bottom p-4">
                                    <div class="guide-title-inner">
                                        <h4 class="mt-3"><?= $row->penduduk->nama ?></h4>
                                        <p class="mb-0">Ketua RW <?= $row->penduduk->alamat->rw ?></p>
                                    </div>
                                </div>
                                @elseif($row->penduduk->akun->id_level == 6)
                                <div class="guide-title text-center rounded-bottom p-4">
                                    <div class="guide-title-inner">
                                        <h4 class="mt-3"><?= $row->penduduk->nama ?></h4>
                                        <p class="mb-0">Pengurus RW <?= $row->penduduk->alamat->rw ?></p>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- Travel Guide End -->
         <div class="container-fluid guide py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Pengurus RT</h5>
                    <h1 class="mb-0">Daftar Pengurus RT</h1>
                </div>
                <div class="row g-4">
                    <?php foreach ($rt as $row) { ?>
                        <div class="col-md-6 col-lg-3">
                            <div class="guide-item">
                                <div class="guide-img">
                                    <div class="guide-img-efects" style="height: 400px; overflow: hidden;">
                                        <img src="storage/images/penduduk/<?= $row->penduduk->image ?>" class="img-fluid w-100 rounded-top" alt="<?= $row->penduduk->nama ?>">
                                    </div>
                                    <div class="guide-icon rounded-pill p-2">
                                        <a class="btn btn-square btn-primary rounded-circle mx-1" href="<?= $row->penduduk->facebook ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-square btn-primary rounded-circle mx-1" href="<?= $row->penduduk->instagram ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                        <a class="btn btn-square btn-primary rounded-circle mx-1" href="mailto:<?= $row->penduduk->email ?>" target="_blank"><i class="fas fa-envelope"></i></a>
                                        <a class="btn btn-square btn-success rounded-circle mx-1" href="<?= 'https://wa.me/' . $row->penduduk->no_hp ?>" target="_blank">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="guide-title text-center rounded-bottom p-4">
                                    <div class="guide-title-inner">
                                        <h4 class="mt-3"><?= $row->penduduk->nama ?></h4>
                                        <p class="mb-0">Ketua RT 0<?= $row->penduduk->alamat->rt ?></p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- Gallery Start -->
        {{-- <div class="container-fluid gallery py-5 my-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Galeri</h5>
                <h1 class="mb-4">Galeri Kegiatan Warga</h1>
                 <p class="mb-0">
                        Galeri Kegiatan merupakan kumpulan dokumentasi dari kegiatan rutin berupa photo yang dilakukan oleh Warga RW 13 Blok C Taman Alamanda, seperti kegiatan kerja bakti, pertemuan warga, dan kegiatan sosial lainnya.
                    </p>
            </div>
            <div class="tab-class text-center">
                <ul class="nav nav-pills d-inline-flex justify-content-center mb-5">
                    <li class="nav-item">
                        <a class="d-flex mx-3 py-2 border border-primary bg-light rounded-pill active" data-bs-toggle="pill" href="#GalleryTab-1">
                            <span class="text-dark" style="width: 150px;">Semua</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex py-2 mx-3 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#GalleryTab-2">
                            <span class="text-dark" style="width: 150px;">RT 01</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex mx-3 py-2 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#GalleryTab-3">
                            <span class="text-dark" style="width: 150px;">RT 02</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex mx-3 py-2 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#GalleryTab-4">
                            <span class="text-dark" style="width: 150px;">RT 03</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex mx-3 py-2 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#GalleryTab-5">
                            <span class="text-dark" style="width: 150px;">RT 04</span>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a class="d-flex mx-3 py-2 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#GalleryTab-6">
                            <span class="text-dark" style="width: 150px;">RW 13</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="GalleryTab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-2">
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                                <div class="gallery-item h-100">
                                    <img src="img/gallery-1.jpg" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/gallery-1.jpg" data-lightbox="gallery-1" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                <div class="gallery-item h-100">
                                    <img src="img/gallery-2.jpg" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/gallery-2.jpg" data-lightbox="gallery-2" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                                <div class="gallery-item h-100">
                                    <img src="img/gallery-3.jpg" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/gallery-3.jpg" data-lightbox="gallery-3" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                <div class="gallery-item h-100">
                                    <img src="img/gallery-4.jpg" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/gallery-4.jpg" data-lightbox="gallery-4" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                                <div class="gallery-item h-100">
                                    <img src="img/gallery-5.jpg" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/gallery-5.jpg" data-lightbox="gallery-5" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                                <div class="gallery-item h-100">
                                    <img src="img/gallery-6.jpg" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/gallery-6.jpg" data-lightbox="gallery-6" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                <div class="gallery-item h-100">
                                    <img src="img/gallery-7.jpg" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/gallery-7.jpg" data-lightbox="gallery-7" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2">
                                <div class="gallery-item h-100">
                                    <img src="img/gallery-8.jpg" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/gallery-8.jpg" data-lightbox="gallery-8" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                <div class="gallery-item h-100">
                                    <img src="img/gallery-9.jpg" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/gallery-9.jpg" data-lightbox="gallery-9" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2">
                                <div class="gallery-item h-100">
                                    <img src="img/gallery-10.jpg" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/gallery-10.jpg" data-lightbox="gallery-10" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="GalleryTab-2" class="tab-pane fade show p-0">
                        <div class="row g-2">
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                <div class="gallery-item h-100">
                                    <img src="img/gallery-2.jpg" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/gallery-2.jpg" data-lightbox="gallery-2" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                                <div class="gallery-item h-100">
                                    <img src="img/gallery-3.jpg" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/gallery-3.jpg" data-lightbox="gallery-3" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="GalleryTab-3" class="tab-pane fade show p-0">
                        <div class="row g-2">
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                <div class="gallery-item h-100">
                                    <img src="img/gallery-2.jpg" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/gallery-2.jpg" data-lightbox="gallery-2" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                                <div class="gallery-item h-100">
                                    <img src="img/gallery-3.jpg" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/gallery-3.jpg" data-lightbox="gallery-3" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="GalleryTab-4" class="tab-pane fade show p-0">
                        <div class="row g-2">
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                <div class="gallery-item h-100">
                                    <img src="img/gallery-2.jpg" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/gallery-2.jpg" data-lightbox="gallery-2" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                                <div class="gallery-item h-100">
                                    <img src="img/gallery-3.jpg" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/gallery-3.jpg" data-lightbox="gallery-3" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="GalleryTab-5" class="tab-pane fade show p-0">
                        <div class="row g-2">
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                <div class="gallery-item h-100">
                                    <img src="img/gallery-2.jpg" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/gallery-2.jpg" data-lightbox="gallery-2" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                                <div class="gallery-item h-100">
                                    <img src="img/gallery-3.jpg" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/gallery-3.jpg" data-lightbox="gallery-3" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Gallery End -->

        <!-- Tour Booking Start -->
        <div class="container-fluid booking py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <h5 class="section-booking-title pe-3">Aspirasi</h5>
                        <p class="text-white mb-4">Silahkan sampaikan aspirasi Anda melalui form di sebelah kanan.
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <h1 class="text-white mb-3">Form Aspirasi</h1>
                        <p class="text-white mb-4">Silakan isi form dibawah ini sesuai dengan aspirasi Anda.</p>
                        <form id="aspirasiForm" action="{{ route('user.aspirasi.store') }}" method="post">
                    @csrf       
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea 
                                    class="form-control bg-white border-0" 
                                    placeholder="Aspirasi Warga" 
                                    name="aspirasi" 
                                    id="aspirasi" 
                                    style="height: 200px"
                                    required 
                                    minlength="10" 
                                    maxlength="500"></textarea>
                                <label for="aspirasi">Ketik Aspirasi Disini..</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button id="submitBtn" class="btn btn-primary text-white w-100 py-3" type="submit">
                                Kirim Aspirasi
                            </button>
                        </div>
                    </div>
                </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tour Booking End -->

        
        <!-- Testimonial Start -->
       <div class="container-fluid testimonial py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Data Statistik</h5>
            <h1 class="mb-0">Statistik Penduduk RW 13</h1>
        </div>
        <div class="testimonial-carousel owl-carousel">
            
            <!-- Total Penduduk -->
            <div class="testimonial-item text-center rounded pb-4">
                <div class="testimonial-comment bg-light rounded p-4">
                    <div class="bg-green-100 dark:bg-ungu_muda rounded-2xl p-10 w-64 h-64 flex flex-col items-center justify-center text-center shadow-lg">
                        <h1 class="text-6xl font-extrabold text-green-500 dark:text-green-400 transition-all duration-1000 ease-in data-penduduk"
                            data-penduduk-total="{{ number_format($totalPenduduk, 0, ',', '.') }}">
                        </h1>
                    </div>
                </div>
                <div class="mt-3">
                    <h5 class="mb-0 text-2xl font-semibold">Total Penduduk</h5>
                </div>
            </div>

            <!-- Laki-laki -->
            <div class="testimonial-item text-center rounded pb-4">
                <div class="testimonial-comment bg-light rounded p-4">
                    <div class="bg-green-100 dark:bg-ungu_muda rounded-2xl p-10 w-64 h-64 flex flex-col items-center justify-center text-center shadow-lg">
                        <h1 class="text-6xl font-extrabold text-green-500 dark:text-green-400 transition-all duration-1000 ease-in data-penduduk"
                            data-penduduk-total="{{ number_format($totalPendudukLaki, 0, ',', '.') }}">
                        </h1>
                    </div>
                </div>
                <div class="mt-3">
                    <h5 class="mb-0 text-2xl font-semibold">Laki-Laki</h5>
                </div>
            </div>

            <!-- Perempuan -->
            <div class="testimonial-item text-center rounded pb-4">
                <div class="testimonial-comment bg-light rounded p-4">
                    <div class="bg-green-100 dark:bg-ungu_muda rounded-2xl p-10 w-64 h-64 flex flex-col items-center justify-center text-center shadow-lg">
                        <h1 class="text-6xl font-extrabold text-green-500 dark:text-green-400 transition-all duration-1000 ease-in data-penduduk"
                            data-penduduk-total="{{ number_format($totalPendudukPerempuan, 0, ',', '.') }}">
                        </h1>
                    </div>
                </div>
                <div class="mt-3">
                    <h5 class="mb-0 text-2xl font-semibold">Perempuan</h5>
                </div>
            </div>

            <!-- Penduduk Tetap -->
            <div class="testimonial-item text-center rounded pb-4">
                <div class="testimonial-comment bg-light rounded p-4">
                    <div class="bg-green-100 dark:bg-ungu_muda rounded-2xl p-10 w-64 h-64 flex flex-col items-center justify-center text-center shadow-lg">
                        <h1 class="text-6xl font-extrabold text-green-500 dark:text-green-400 transition-all duration-1000 ease-in data-penduduk"
                            data-penduduk-total="{{ number_format($totalPendudukTetap, 0, ',', '.') }}">
                        </h1>
                    </div>
                </div>
                <div class="mt-3">
                    <h5 class="mb-0 text-2xl font-semibold">Penduduk Tetap</h5>
                </div>
            </div>

            <!-- Penduduk Pendatang -->
            <div class="testimonial-item text-center rounded pb-4">
                <div class="testimonial-comment bg-light rounded p-4">
                    <div class="bg-green-100 dark:bg-ungu_muda rounded-2xl p-10 w-64 h-64 flex flex-col items-center justify-center text-center shadow-lg">
                        <h1 class="text-6xl font-extrabold text-green-500 dark:text-green-400 transition-all duration-1000 ease-in data-penduduk"
                            data-penduduk-total="{{ number_format($totalPendudukPendatang, 0, ',', '.') }}">
                        </h1>
                    </div>
                </div>
                <div class="mt-3">
                    <h5 class="mb-0 text-2xl font-semibold">Penduduk Pendatang</h5>
                </div>
            </div>

        </div>
    </div>
</div>

        <!-- Testimonial End -->
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const bars = document.querySelectorAll('.bar-data-rt');

            const observer1 = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const bar = entry.target;
                        const originalPercentage = parseInt(bar.getAttribute('data-persentase'),
                            10);
                        const newPercentage = originalPercentage + 10;
                        const width = newPercentage + '%';
                        bar.style.setProperty('--width', width);
                        bar.classList.add('animate-width');
                        observer1.unobserve(
                            bar); // berhenti mengamati elemen setelah animasi dimulai
                    }
                });
            }, {
                threshold: 0.2 // elemen harus terlihat 10% sebelum memicu animasi
            });

            bars.forEach(bar => {
                observer1.observe(bar);
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.data-penduduk');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const card = entry.target;
                        const data = card.getAttribute('data-penduduk-total');
                        const counter = {
                            value: 0
                        };
                        const updateCounter = () => {
                            const target = +data;
                            const count = +counter.value;
                            const speed = 200;
                            const inc = target / speed;
                            if (count < target) {
                                counter.value = count + inc;
                                card.innerText = Math.ceil(counter.value);
                                setTimeout(updateCounter, 10);
                            } else {
                                card.innerText = data;
                            }
                        };
                        updateCounter();
                        observer.unobserve(
                            card); // berhenti mengamati elemen setelah animasi dimulai
                    }
                });
            }, {
                threshold: 0.2 // elemen harus terlihat 10% sebelum memicu animasi
            });

            cards.forEach(bar => {
                observer.observe(bar);
            });
        });
    </script>
</x-layout.user-layout>

        