<x-layout.user-layout>
        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Artikel/Berita</h3>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="#">Riwayat Artikel</a></li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->

        <!-- Blog Start -->
        <div class="container-fluid blog py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Artikel/Berita</h5>
                    <h1 class="mb-4">Riwayat Artikel/Berita</h1>
                    <p class="mb-0">Berikut adalah riwayat artikel dan berita yang telah dipublikasikan.
                    </p>
                    <div class="mt-7">
                    <a href="{{ route('user.berita.tambah') }}"
                        class="inline-block bg-indigo-900 hover:bg-indigo-700 text-blue-600 text-sm font-semibold py-2.5 px-6 rounded-lg shadow-md transition duration-300 ease-in-out">
                        + Tambah Berita
                    </a>
                </div>
                </div>
                

                <div class="list-group">
                    @if ($berita == null || $berita->isEmpty())
                        <div class="alert alert-info text-center">
                            Riwayat Artikel/Berita Belum Tersedia.
                        </div>
                    @endif
                    
                    @foreach($berita as $item)
                        <div class="list-group-item d-flex align-items-start">
                            <div class="me-3" style="width: 200px; height: 150px; overflow: hidden;">
                                <img class="img-fluid rounded" 
                                    src="{{ asset('storage/images/berita/' . $item->gambar) }}" 
                                    alt="Image">
                            </div>
                            <div class="flex-fill">
                                <h5 class="mb-1">
                                    <a href="#" class="text-dark">{{ $item->judul }}</a>
                                </h5>
                                <small class="text-muted">
                                    <i class="fa fa-calendar-alt text-primary me-2"></i>
                                    Tanggal Posting : {{ \Carbon\Carbon::parse($item->tanggal_posting)->format('d M Y') }}
                                </small>
                                <p class="mb-2">Status : {{ $item->status }}</p>
                                <a href="{{ route('user.berita.detail', $item->slug) }}" class="btn btn-hover btn-primary rounded-full"> Lihat</a>
                                <a href="{{ route('user.berita.edit', $item->id_berita) }}" class="btn btn-hover btn-primary rounded-full"> Ubah</a>
                                <form action="{{ route('user.berita.delete', $item->id_berita) }}" method="POST" onsubmit="return confirm('Yakin hapus data?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-hover btn-primary rounded-full">Hapus</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                    <div class="mt-3">
                        {{ $berita->links('pagination::bootstrap-5') }}
                    </div>
                </div>
                </div>

            </div>
        </div>
        <!-- Blog End -->
</x-layout.user-layout>