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
                        <h1 class="mb-0">Detail Usaha Kecil Mikro</h1>
                    </div>

                    <!-- Frame Utama -->
                    <div class="bg-white dark:bg-dark_grey5 border border-gray-200 dark:border-gray-700 rounded-xl shadow-lg overflow-hidden">
                        
                        <!-- Slider -->
                        <div class="relative overflow-hidden h-[300px]">
                            <div class="w-full absolute z-20 bg-gradient-to-b from-transparent from-70% via-gray-400 via-100%"></div>
                            @foreach ($umkm->gambarSlide ?? [] as $item)
                                <div class="hidden duration-700 ease-in-out relative overflow-hidden" data-carousel-item>
                                    <div class="absolute inset-0 bg-gray-100 flex items-center justify-center">
                                        <img src="{{ $item->getSlideUMKM() }}" loading="lazy"
                                            class="w-full h-[468px] object-cover"
                                            alt="Slider Usaha Kecil Mikro">
                                    </div>
                                </div>
                            @endforeach
                        </div>


                        <!-- Indicator -->
                        {{-- <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                            @foreach ($umkm->gambarSlide as $item)
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                                    data-carousel-slide-to="{{ $loop->iteration }}"></button>
                            @endforeach
                        </div> --}}

                       <!-- Garis biru dekorasi -->
                        <div class="w-20 h-1 bg-blue-500 rounded mb-6"></div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
                            <!-- Item 3 -->
                            <div class="flex justify-between items-center p-3 border rounded-lg shadow-sm bg-white dark:bg-dark_grey5">
                                <div class="flex items-center">
                                    <i class="fa-solid fa-truck mr-3 p-3 rounded-full bg-orange-500 text-white"></i>
                                    <div>
                                        <h2 class="text-xl font-semibold text-slate-700 dark:text-white mb-6">
                                                Detail Usaha Kecil Menengah
                                            </h2>
                                            <h5 class="mb-0">Nama UKM : {{ $umkm->nama_umkm }}</h5>
                                             <h5 class="mb-0">Nama Pemilik : {{ $umkm->penduduk->nama }}</h5>
                                              <h5 class="mb-0">Deskripsi :</h5>
                                            <div class="prose prose-lg max-w-none text-gray-700 dark:text-gray-300 leading-relaxed space-y-4 text-justify">
                                                @foreach (explode("\n", strip_tags($umkm->deskripsi)) as $paragraf)
                                                    @if (trim($paragraf) !== '')
                                                        <p class="indent-8">{{ $paragraf }}</p>
                                                    @endif
                                                @endforeach
                                            </div>
                                    </div>
                                </div>
                                 <div class="d-flex justify-content-between">
                                @if(auth()->user())
                                <a href="{{ route('user.umkm.dashboard') }}" class="btn btn-secondary">Kembali</a>
                                @else
                                <a href="{{ route('user.umkm') }}" class="btn btn-secondary">Kembali</a>
                                @endif
                            </div>
                            </div>
                           
                        </div>
                </div>


                    </div>
                </div>
            </div>
</x-layout.user-layout>
