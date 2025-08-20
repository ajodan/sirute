
<x-layout.user-layout>
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Artikel/Berita</h3>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="#">Artikel</a></li>
                </ol>    
            </div>
        </div>

        <!-- Contact Start -->
        <div class="container-fluid contact bg-light py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Detail Artikel/Berita</h5>
                </div>
                <div class="row g-5 align-items-center">
                    <div class="col-lg-4">
                        @foreach ($thumbnail_berita as $item)
                        <div class="bg-white rounded p-4">
                            <div class="card border-0 shadow-sm mb-3">
                            <div class="row g-0 align-items-center">
                                <!-- Gambar -->
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/images/berita/' . $item->gambar) }}"
                                        alt="{{ $item->judul }}"
                                        class="thumbnail-berita">
                                </div>

                                <!-- Teks -->
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <small class="text-muted">
                                            {{ $item->created_at->format('d M Y') }}
                                        </small>
                                      <h5 class="card-title mb-2">
                                        <a href="{{ url('berita/detail/' . $item->slug) }}" class="text-decoration-none text-dark">
                                            <font size="3">{{ $item->judul }}</font>
                                        </a>
                                    </h5>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                   <div class="col-lg-8 konten-berita">
                        <h2 class="mb-4">{{ $berita->judul }}</h2>
                         <img src="{{ asset('storage/images/berita/' . $berita->gambar) }}"
                            alt="{{ $berita->judul }}"
                            class="gambar-berita mb-3">
                        {!! $berita->isi !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
        </div>
</x-layout.user-layout>
