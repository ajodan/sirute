<x-layout.user-layout>
        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Aspirasi Warga</h3>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="#">Aspirasi</a></li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->

        <!-- Blog Start -->
        <div class="container-fluid blog py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Aspirasi Warga</h5>
                    <h1 class="mb-4">Daftar Aspirasi Warga</h1>
                    <p class="mb-0">Temukan berbagai aspirasi warga terbaru di sini.
                    </p>
                </div>
                @if ($aspirasi == null || $aspirasi->isEmpty())
                <div class="alert alert-info text-center">
                    Riwayat Aspirasi Belum Tersedia.
                </div>
            @else
                <style>
                    .blog-item {
                        transition: all 0.3s ease;
                    }
                    .blog-item:hover {
                        transform: translateY(-5px);
                        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
                        border-color: #061732; /* jadi biru saat hover */
                    }
                    .color-text {
                        color: rgb(8, 20, 101);
                    }
                </style>

                <div class="row g-4 justify-content-center">
                    @foreach($aspirasi as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-item bg-white border border-secondary rounded shadow-sm p-3">
                            <div class="blog-img">
                                
                                <div class="blog-img-inner text-center" style="height: 200px; overflow: hidden;">
                                    <p>Isi Pesan : <br><b>{{ Str::limit($item->isi, 255) }}</b></p>
                                    @if($item->status == 'pending')
                                    <div class="badge bg-danger text-white">Belum Direspon</div>
                                    @elseif($item->status == 'done')
                                    <p>Isi Respon : <br><b>{{ $item->respon }}</b></p>
                                @endif
                                </div>
                                
                                <div class="blog-info d-flex align-items-center border-top mt-2 pt-2">
                                    <small class="flex-fill text-left py-2">
                                        <i class="fa fa-user-alt text-primary me-2"></i>
                                        <span class="color-text">Pengirim : {{ $item->penduduk->nama }}</span>
                                        &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-calendar-alt text-primary me-2"></i>
                                        <span class="color-text">{{ $item->created_at->format('d M Y') }}</span>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>


                {{-- <div class="mt-3">
                    {{ $aspirasi->links('pagination::bootstrap-5') }}
                </div> --}}
            @endif
            </div>
        </div>
        <!-- Blog End -->
</x-layout.user-layout>