<x-layout.user-layout>
        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Artikel/Berita</h3>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="#">Artikel</a></li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->

        <!-- Blog Start -->
        <div class="container-fluid blog py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Artikel/Berita</h5>
                    <h1 class="mb-4">Daftar Artikel/Berita</h1>
                    <p class="mb-0">Temukan berbagai artikel dan berita terbaru di sini.
                    </p>
                </div>
                <div class="row g-4 justify-content-center">
                    @foreach($berita as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-item">
                            <div class="blog-img">
                                <div class="blog-img-inner" style="height: 300px; overflow: hidden;">
                                    <img class="img-fluid w-100 rounded-top" src="{{ asset('storage/images/berita/' . $item->gambar) }}" alt="Image">
                                    <div class="blog-icon">
                                        <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
                                    </div>
                                </div>
                                <div class="blog-info d-flex align-items-center border border-start-0 border-end-0">
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i>{{ $item->created_at->format('d M Y') }}</small>
                                    <a href="#" class="btn-hover flex-fill text-center text-white py-2"><i class="fa fa-eye"></i> Dibaca: {{ $item->view }} kali</a>
                                </div>
                            </div>
                            <div class="blog-content border border-top-0 rounded-bottom p-4">
                                {{-- <p class="mb-0"><font size="2">Dibuat Oleh : {{ $item->penulis->nama }} </font></p> --}}
                                <p class="mb-0"><font size="2">Tanggal Posting : {{ \Carbon\Carbon::parse($item->tanggal_posting)->format('d M Y') }} </font></p>
                                <a href="{{ route('user.berita.detail', $item->slug) }}" class="h4">{{ $item->judul }}</a>
                                <p class="my-3 excerpt-berita">
                                {{ Str::limit(strip_tags($item->isi), 230) }}
                                </p>
                                <a href="{{ route('user.berita.detail', $item->slug) }}" class="btn btn-primary rounded-pill py-2 px-4" style="font-size: 10px; align-self: flex-end;">Baca Selengkapnya ... </a>
                            </div>
                        </div>
                    </div>
                     @endforeach
                </div>
                <div class="d-flex justify-content-center mt-4">
                    {{ $berita->links() }}
                </div>
        </div>
        <!-- Blog End -->
</x-layout.user-layout>