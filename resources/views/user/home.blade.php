<x-layout.user-layout>
    <div class="dark:bg-[#1f1345]">
        <div class="px-7 sm:max-w-6xl mx-auto font-sans">

            <section class="hero pb-12 pt-[100px] ">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-x-4 ">
                    <div class="flex flex-col flex-1 gap-y-8 sm:gap-y-10">
                        <div class="gap-y-2 sm:gap-y-6 flex flex-col">
                            <h1 class="text-blue-600 font-bold text-5xl sm:text-[50px] leading-none dark:text-white">
                                <span class="text-yellow-500 dark:text-yellow-100">TAMAN ALAMANDA</span><br>
                                RW 13/BLOK C
                                
                            </h1>
                            <div class="text-sm sm:text-base leading-loose text-black3 dark:text-white">
                                Digitalisasi pencatatan dan pengelolaan data warga RW 013 untuk 
                                mempercepat akses informasi, mendukung layanan sosial dan laporan data statistik warga.
                            </div>
                        </div>
                        <div class="flex flex-row gap-x-4 items-center">
                            <a href="{{ route('user.layanan') }}"
                                class="text-sm sm:text-base bg-purple-400 hover:bg-indigo-700 text-white py-4 px-5 sm:py-4 sm:px-10 rounded-full font-semibold dark:bg-purple-700 dark:hover:bg-white dark:hover:text-purple-700">Layanan Administrasi</a>
                        </div>
                    </div>
                    <div class="flex flex-row item-center hidden sm:block">
                        <img src="{{ asset('assets/images/illustration/gerbang.webp') }}" alt=""
                            class="w-[550px] h-max-[550px]">
                    </div>
                </div>
            </section>

            <section class="features py-15">
                <div class="grid grid-col sm:grid-cols-3 gap-y-3 gap-x-8 px-5">
                    <div
                        class="my-card bg-purple-100 dark:bg-ungu_muda flex flex-col gap-y-4 sm:gap-y-8 items-start rounded-2xl p-7 sm:p-10">
                        <i class="fa-solid fa-info text-4xl sm:text-5xl text-purple-500 dark:text-purple-400"></i>
                        <div class="flex flex-col gap-y-3 sm:gap-y-5">
                            <h3 class=" text-xl sm:text-2xl font-bold text-gray-600 dark:text-white">
                                Informasi
                            </h3>
                            <div class="text-sm sm:text-base leading-relaxed text-gray-500  dark:text-paragraf">
                                Tersedianya informasi terkini yang memudahkan warga RW 13/Blok C untuk mengakses informasi terkait lingkungan.</div>
                        </div>
                    </div>
                    <div
                        class="my-card bg-purple-100 dark:bg-ungu_muda flex flex-col gap-y-4 sm:gap-y-8 items-start rounded-2xl p-7 sm:p-10">
                        <i class="fa-solid fa-lightbulb text-4xl sm:text-5xl text-purple-500 dark:text-purple-400"></i>
                        <div class="flex flex-col gap-y-3 sm:gap-y-5">
                            <h3 class="text-xl sm:text-2xl font-bold text-gray-600 dark:text-white">
                                Aspirasi
                            </h3>
                            <div class="text-sm sm:text-base leading-relaxed text-gray-500 dark:text-paragraf">
                                Terjalinnya komunikasi antara warga dengan pengurus RT dan RW di lingkungan RW 13/Blok C.</div>
                        </div>
                    </div>
                    <div
                        class="my-card bg-purple-100 dark:bg-ungu_muda flex flex-col gap-y-4 sm:gap-y-8 items-start rounded-2xl p-7 sm:p-10">
                        <i class="fa-solid fa-database text-4xl sm:text-5xl text-purple-500 dark:text-purple-400"></i>
                        <div class="flex flex-col gap-y-3 sm:gap-y-5">
                            <h3 class="text-xl sm:text-2xl font-bold text-gray-600 dark:text-white">
                                Database Warga
                            </h3>
                            <div class="text-sm sm:text-base leading-relaxed text-gray-500 dark:text-paragraf">
                                Tersedianya database warga RW 13/Blok C yang dapat diakses melalui portal informasi.</div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="KetuaRw py-15">
                <div class="grid grid-cols-1 sm:grid-cols-2 items-center sm:gap-x-10">
                    <div class="flex flex-row item-center justify-center">
                        <img src="{{ $rw->penduduk->foto_profile() }}" alt=""
                            class="hidden sm:block  sm:h-[500px] rounded-xl object-cover">
                    </div>
                    <div class="">
                        <div>
                            <h1
                                class="font-extrabold text-3xl sm:text-5xl leading-tight pb-4 sm:pb-2 text-gray-600 dark:text-white">
                                Ketua Rukun Warga
                            </h1>
                            {{-- <div class="text-sm sm:text-base sm:mt-3 leading-loose text-gray-500 dark:text-paragraf">
                                "Kepengurusan RW 13 Blok C Taman Alamanda" mencantumkan ketua RW dan RT, untuk memudahkan warga
                                dalam berkomunikasi dan berkoordinasi dengan pengurus RW dan RT.
                            </div> --}}
                        </div>
                        <div class="block sm:hidden">
                            <div class="flex mt-5 relative group ">
                                <div
                                    class="absolute flex justify-center items-center bg-indigo-900/0 group-hover:bg-indigo-900/80 w-full h-full transition ease-in-out duration-700 rounded-lg">
                                    <div class="hidden group-hover:block">
                                        <a onclick="window.location.href='{{ route('user.detail', $rw->penduduk->nik) }}'"
                                            class=" text-sm bg-ungu text-white py-4 px-5 my-3 rounded-2xl font-semibold dark:bg-purple-700 dark:hover:bg-white dark:hover:text-purple-700">Detail
                                            Penduduk
                                            <i class="fa-solid fa-arrow-right text-md"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="w-1/2">
                                    <div class="  ">
                                        <img src="{{ $rw->penduduk->foto_profile() }}" alt=""
                                            class="w-40 top-0 left-0 h-full object-cover object-center rounded-lg">
                                    </div>
                                </div>
                                <div class="w-1/2">
                                    <div class="max-w-md text-gray-900 dark:text-white dark:divide-gray-700">
                                        <div class="flex flex-col">
                                            <dt class=" text-gray-500 md:text-lg dark:text-gray-400">Nama</dt>
                                            <dd class="text-sm font-semibold">{{ $rw->penduduk->nama }}</dd>
                                        </div>
                                        <div class="flex flex-col py-2">
                                            <dt class=" text-gray-500 md:text-lg dark:text-gray-400">Alamat</dt>
                                            <dd class="text-sm font-semibold">
                                                {{ $rw->penduduk->alamatLengkap() }}
                                            </dd>
                                        </div>
                                        <div class="flex flex-col">
                                            <dt class=" text-gray-500 md:text-lg dark:text-gray-400">Nomor
                                                Ponsel
                                            </dt>
                                            <dd class="text-sm font-semibold">{{ $rw->penduduk->no_hp }}</dd>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hidden sm:block">
                            <dl
                                class="text-gray-900 divide-y divide-purple-400 dark:text-white dark:divide-gray-700 mt-6">
                                <div class="flex flex-col pb-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Nama lengkap</dt>
                                    <dd class="text-lg font-semibold">{{ $rw->penduduk->nama }}</dd>
                                </div>
                                <div class="flex flex-col py-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Jabatan</dt>
                                    <dd class="text-lg font-semibold">Ketua RW 13 Periode 2024-2027</dd>
                                </div>
                                {{-- <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Nomor Ponsel</dt>
                                    <dd class="text-lg font-semibold">{{ $rw->penduduk->no_hp }}</dd>
                                </div> --}}
                            </dl>
                            <div class="flex flex-row gap-x-4 items-center mt-10">
                                <a href="{{ route('user.detail', $rw->penduduk->nik) }}"
                                    class="text-sm sm:text-base bg-purple-400 hover:bg-indigo-700 text-white py-4 px-5 sm:py-4 sm:px-10 rounded-full font-semibold dark:bg-purple-700 dark:hover:bg-white dark:hover:text-purple-700">
                                    Detail RW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="range py-15">
                <div class="counter_list w-full h-auto clear-both float-left py-15">
                    <ul class="ml-[-25px] flex flex-wrap">
                        <li class="mb-[50px] pl-[25px] w-full sm:w-1/5 block">
                            <div
                                class="list_inner tilt-effect w-full h-auto clear-both float-left relative bg-purple-100 dark:bg-ungu_muda rounded-[10px] p-[30px] flex items-center justify-center">
                                <h3 class="text-[40px] transition-all duration-1000 ease-in text-purple-500 dark:text-purple-400 font-extrabold data-penduduk"
                                    data-penduduk-total="{{ $totalPenduduk }}">
                                </h3>
                                <span
                                    class="title text-[15px] text-gray-600 dark:text-white font-poppins font-medium inline-block pl-[26px]">Total
                                    Penduduk</span>
                            </div>
                        </li>
                        <li class="mb-[50px] pl-[25px] w-1/2 sm:w-1/5 block">
                            <div
                                class="list_inner tilt-effect w-full h-auto clear-both float-left relative bg-purple-100 dark:bg-ungu_muda rounded-[10px] p-[30px] flex items-center justify-center">
                                <h3 class="text-[40px] transition-all duration-1000 ease-in text-purple-500 dark:text-purple-400 font-extrabold data-penduduk"
                                    data-penduduk-total="{{ $totalPendudukLaki }}">
                                </h3>
                                <span
                                    class="title text-[15px] text-gray-600 dark:text-white font-poppins text-nowrap font-medium inline-block pl-[26px]">Laki
                                    - Laki</span>
                            </div>
                        </li>
                        <li class="mb-[50px] pl-[25px] w-1/2 sm:w-1/5 block">
                            <div
                                class="list_inner tilt-effect w-full h-auto clear-both float-left relative bg-purple-100 dark:bg-ungu_muda rounded-[10px] p-[30px] flex items-center justify-center">
                                <h3 class="text-[40px] transition-all duration-1000 ease-in text-purple-500 dark:text-purple-400 font-extrabold data-penduduk"
                                    data-penduduk-total="{{ $totalPendudukPerempuan }}">
                                </h3>
                                <span
                                    class="title text-[15px] text-gray-600 dark:text-white font-poppins font-medium inline-block pl-[26px]">Perempuan</span>
                            </div>
                        </li>
                        <li class="mb-[50px] pl-[25px] w-1/2 sm:w-1/5 block">
                            <div
                                class="list_inner tilt-effect w-full h-auto clear-both float-left relative bg-purple-100 dark:bg-ungu_muda rounded-[10px] p-[30px] flex items-center justify-center">
                                <h3 class="text-[40px] transition-all duration-1000 ease-in text-purple-500 dark:text-purple-400 font-extrabold data-penduduk"
                                    data-penduduk-total="{{ $totalPendudukTetap }}">
                                </h3>
                                <span
                                    class="title text-[15px] text-gray-600 dark:text-white font-poppins font-medium inline-block pl-[26px]">Penduduk
                                    Tetap</span>
                            </div>
                        </li>
                        <li class="mb-[50px] pl-[25px] w-1/2 sm:w-1/5 block">
                            <div
                                class="list_inner tilt-effect w-full h-auto clear-both float-left relative bg-purple-100 dark:bg-ungu_muda rounded-[10px] p-[30px] flex items-center justify-center">
                                <h3 class="text-[40px] transition-all duration-1000 ease-in text-purple-500 dark:text-purple-400 font-extrabold data-penduduk"
                                    data-penduduk-total="{{ $totalPendudukPendatang }}">
                                </h3>
                                <span
                                    class="title text-[15px] text-gray-600 dark:text-white font-poppins font-medium inline-block pl-[26px]">Pendatang</span>
                            </div>
                        </li>

                    </ul>
                </div>
                <div class=" items-center">
                    <div>
                        <h1 class=" text-center font-bold text-4xl sm:text-5xl leading-tight dark:text-whiten ">
                            Prosentase Warga RW 13 berdasarkan RT
                        </h1>
                        {{-- <p class="mt-4 text-center mx-auto lg:w-1/2 md:w-1/2">Jumlah warga di setiap RT penting untuk
                            mengelola lingkungan, menentukan kebutuhan fasilitas, dan merencanakan sumber daya secara
                            berkelanjutan.
                        </p> --}}
                    </div>
                </div>
                <div class="list w-full h-auto clear-both flex mt-[60px] ">
                    <div class="w-full">
                        <div class="grid grid-cols-1 sm:grid-cols-2 w-full px-4 gap-4">
                            <style>
                                /* Tambahkan animasi pada kelas .animate-width */
                                @keyframes grow-bar {
                                    from {
                                        width: 0;
                                    }

                                    to {
                                        width: var(--width);
                                    }
                                }

                                .animate-width {
                                    animation: grow-bar 1s forwards;
                                }
                            </style>

                            @foreach ($listRT as $item)
                                <div class="mb-12">
                                    <p class="text-gray-500 pb-2">RT {{ $item->rt }}</p>
                                    <div class="bg-purple-200 grow relative h-2.5 w-full rounded-2xl">
                                        <div data-persentase="{{ $item->persentase }}"
                                            class="bar-data-rt bg-purple-500 dark:bg-purple-700 absolute top-0 left-0 h-full rounded-2xl transition-all ease-in-out duration-1000 w-1">
                                            <span
                                                class="bg-purple-500 dark:bg-purple-700 absolute -right-4 bottom-full mb-2 rounded-sm px-3.5 py-1 text-sm text-white">
                                                <span
                                                    class="bg-purple-500 dark:bg-purple-700 absolute bottom-[-2px] left-1/2 -z-10 h-2 w-2 -translate-x-1/2 rotate-45 rounded-sm"></span>
                                                {{ $item->persentase }}%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

            <section class="OurTeam py-5 sm:py-15">
                <div class=" items-center">
                    <div>
                        <h1 class=" text-center font-bold text-4xl sm:text-5xl leading-tight dark:text-whiten ">
                            Daftar Ketua RT RW 13
                        </h1>
                        {{-- <p class="mt-4 text-center mx-auto lg:w-1/2 md:w-1/2">
                            Ketua RT adalah pemimpin yang dipilih warga untuk menjaga keharmonisan, mengoordinasikan
                            kegiatan, dan memastikan kebutuhan serta aspirasi warga terpenuhi.
                        </p> --}}
                    </div>
                </div>
                <div class="mt-15">
                    <div class="swiper mySwiper !pb-17">
                        <div class="swiper-wrapper">
                            @foreach ($rt as $item)
                                <div class="swiper-slide">
                                    <div class="relative group overflow-hidden h-[330px] bg-white rounded-2xl">
                                        <div class="relative h-full">
                                            <div
                                                class="absolute bg-indigo-900/0  group-hover:bg-purple-400/80 group-hover:dark:bg-purple-700/80 w-full h-full transition ease-in-out duration-700 skew-x-12 group-hover:skew-x-0 rotate-90 group-hover:rotate-0">
                                                <div class="flex h-full justify-center items-center gap-5">
                                                    <a class="opacity-0 group-hover:opacity-100 delay-500 transition ease-linear"
                                                        href="{{ route('user.detail', $item->nik) }}">
                                                        <i
                                                            class="fa-solid fa-user text-white hover:text-indigo-900/80 hover:bg-white p-1 text-base hover:rounded-md  transition ease-linear "></i>
                                                    </a>
                                                    <a class="opacity-0 group-hover:opacity-100 delay-500 transition ease-linear"
                                                        href="{{ 'https://wa.me/' . $item->penduduk->no_hp }}">
                                                        <i
                                                            class="fa-brands fa-whatsapp text-white hover:text-indigo-900/80 hover:bg-white p-1 text-base hover:rounded-md  transition ease-linear "></i>
                                                    </a>
                                                    <a class="opacity-0 group-hover:opacity-100 delay-500 transition ease-linear"
                                                        href="{{ $item->link_maps->link ?? '#' }}" target="_blank">
                                                        <i
                                                            class="fa-solid fa-map text-white hover:text-indigo-900/80 hover:bg-white p-1 text-base hover:rounded-md  transition ease-linear "></i>
                                                    </a>
                                                </div>
                                            </div>

                                            <img class=" top-0 left-0 w-full h-full object-cover"
                                                src="{{ $item->penduduk->foto_profile() }}" alt="member">
                                        </div>
                                        <div
                                            class="overflow-hidden p-4 bg-purple-100 group-hover:bg-white/70 absolute left-4 bottom-4 right-4 rounded-lg dark:bg-ungu_muda">
                                            <p class="font-bold text-center text-black dark:text-white">
                                                {{ $item->penduduk->nama }}
                                            </p>
                                            <p
                                                class="text-gray-500 text-center group-hover:text-gray-800 dark:text-paragraf">
                                                Ketua RT {{ $item->penduduk->alamat->rt }}</p>
                                            <img class="absolute -left-10 -bottom-10"
                                                src="{{ asset('assets/images/illustration/circle.svg') }}"
                                                alt="circle">
                                            <img class="absolute -right-2 -top-4 w-9"
                                                src="{{ asset('assets/images/illustration/grid.svg') }}"
                                                alt="circle">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination absolute  !bottom-3"></div>
                    </div>
                </div>
            </section>

            <section class="agenda font-sans py-12">
                <h1 class="text-center font-bold text-4xl sm:text-5xl leading-tight dark:text-whiten">Kegiatan dan
                    Agenda</h1>
                {{-- <p class="mt-8 text-center mx-auto lg:w-1/2 md:w-1/2">
                    RW 02 Arjosari aktif mengadakan berbagai kegiatan dan agenda untuk meningkatkan kesejahteraan serta
                    keharmonisan warganya. Berikut adalah beberapa kegiatan dan agenda yang dilaksanakan
                </p> --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 items-center mt-20 sm:gap-x-10">
                    <div class="flex flex-row item-center">
                        <img src="{{ asset('assets/images/illustration/kalenderimg.webp') }}" alt=""
                            class="h-[350px] hidden sm:block">
                    </div>
                    <div class="flex flex-col gap-y-10 ">
                        @if ($agenda == null)
                            <div class="bg-purple-100 dark:bg-[#37177b] rounded-3xl pb-5">
                                <div class="sm:gap-y-2 flex flex-col pl-5 pt-5">
                                    <h1
                                        class="text-black1 font-bold text-3xl sm:text-4xl leading-tight dark:text-white ">
                                        Tidak ada agenda
                                    </h1>
                                    <div class="text-base leading-loose text-black3 dark:text-purple-200 pb-4">
                                        Tidak ada agenda yang tersedia saat ini
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="bg-purple-100 dark:bg-[#37177b] rounded-3xl pb-5">
                                <div class="sm:gap-y-2 flex flex-col pl-5 pt-5">
                                    <h1
                                        class="text-black1 font-bold text-3xl sm:text-4xl leading-tight dark:text-white ">
                                        {{ $agenda->title }}
                                    </h1>
                                    <div class="text-base leading-loose text-black3 dark:text-purple-200 pb-4">
                                        {{ $agenda->deskripsi }}
                                    </div>
                                </div>

                                <div class="flex flex-col gap-y-10 pl-5 pr-5 sm:pb-5  ">

                                    <div
                                        class=" flex flex-row bg-white dark:bg-[#29115d] rounded-2xl p-5 items-center gap-x-4">
                                        <img src="{{ asset('assets/images/illustration/kalenderimg.webp') }}"
                                            alt="" class="h-[60px] sm:hidden block">
                                        <div class="flex flex-col ">
                                            <h3 class="text-xl sm:text-2xl font-bold text-black1 dark:text-purple-100">
                                                Waktu
                                            </h3>
                                            <div
                                                class="text-sm sm:text-base leading-relaxed text-black4 dark:text-purple-200">
                                                {{ $agenda->start . ' - ' . $agenda->end }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="flex flex-row gap-x-4 items-center pl-5 ">
                            <a href="{{ route('user.agenda') }}"
                                class=" text-sm sm:text-base bg-purple-400 hover:bg-indigo-900 text-white dark:bg-purple-700 dark:hover:bg-white dark:hover:text-purple-700 py-4 px-5 sm:py-4 sm:px-10 rounded-full font-semibold">
                                Lainnya</a>

                        </div>
                    </div>
                </div>
            </section>

            <section class="umkm mx-auto font-sans py-12">
                <div class="flex flex-col gap-y-8">
                    <div class="gap-y-2 flex flex-col text-center">
                        <h1 class="text-black1 font-bold text-5xl leading-tight dark:text-whiten">UMKM RW 13
                        </h1>
                        <div
                            class="text-base leading-loose text-black3 dark:text-white items-center text-center mx-auto lg:w-1/2 md:w-1/2">
                            Merupakan program pemberdayaan ekonomi warga RW 13 dengan melalui pengembangan usaha lokal dan peningkatan akses pasar.
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 gap-y-13 mt-8">
                        @foreach ($umkm as $item)
                            <a href="{{ route('user.umkm.detail', $item->id_umkm) }}">
                                <div class="group relative dark:bg-ungu_muda rounded-2xl">
                                    <div
                                        class="{{ $item->tokoBuka() ? 'hidden' : '' }} absolute bg-slate-950 rounded-2xl w-full h-full opacity-30">
                                    </div>
                                    <div class="items w-full h-full m-auto rounded-2xl shadow-md  ">
                                        <div class="item-img pb-5">
                                            <img class=" rounded-t-lg h-[200px] w-full object-cover"
                                                src="{{ $item->getCover() }}" alt="">
                                        </div>
                                        <div class="item-info p-5">
                                            <div class="item-rating flex justify-between items-center mt-3">
                                                <p class="text-xl font-medium dark:text-white truncate">
                                                    {{ $item->nama_umkm }}</p>
                                                {{-- <img class="w-18" src="assets/images/umkm/rating_starts.png" alt=""> --}}
                                            </div>
                                            <p class="item-desc text-gray-500 text-xs">
                                                {{ $item->generateCuplikan() }}</p>

                                            <div
                                                class="item price text-purple-400 group-hover:text-indigo-700  group-dark:hover:text-purple-700 text-sm font-medium my-3">
                                                Selengkapnya
                                            </div>
                                        </div>
                                        <div
                                            class="{{ $item->tokoBuka() ? 'hidden' : '' }} opacity-100 absolute justify-center w-full bottom-[60%] flex">
                                            <p
                                                class="text-base shadow-2xl shadow-ungu bg-ungu text-white py-3 px-7 rounded-full font-semibold ">
                                                TUTUP</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="flex justify-center">
                        <a href="{{ route('user.umkm') }}"
                            class=" text-base bg-purple-400 hover:bg-indigo-700 text-white dark:bg-purple-700 dark:hover:bg-white py-3 px-7 rounded-full font-semibold ">Lihat
                            UMKM</a>
                    </div>
                </div>
            </section>

            <section class="aspirasi mx-auto font-sans pt-12 pb-5 sm:py-12">
                <div class="flex flex-col gap-y-8">
                    <div class="gap-y-2 flex flex-col text-center">
                        <h1 class="text-black1 font-bold text-4xl sm:text-5xl dark:text-whiten leading-tight">Aspirasi
                            Warga
                        </h1>
                        <div
                            class="text-sm sm:text-base leading-loose text-black3 dark:text-white items-center pb-6 mt-4">
                            Suarakan Kritik serta Saran<br>yang membangun untuk lingkungan RW 13 menjadi lebih
                            baik
                        </div>
                        <div class="grid grid-cols-1 mx-auto sm:grid-cols-2 md:grid-cols-4 gap-8 gap-y-13">
                            @foreach ($aspirasi as $item)
                                <div class="flex flex-row gap-2.5">
                                    <div
                                        class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 bg-purple-300 rounded-e-xl rounded-es-xl dark:bg-[#37177b]">
                                        <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Author :
                                            </span>
                                            <span
                                                class="text-sm font-semibold text-gray-900 dark:text-white">{{ $item->author }}</span>
                                        </div>

                                        <span
                                            class="text-sm font-normal text-start text-gray-500 dark:text-gray-400">Pesan
                                            :
                                        </span>
                                        <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">
                                            {{ $item->isi }}
                                        </p>
                                        <div
                                            class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 bg-purple-100 rounded-e-xl rounded-es-xl dark:bg-[#261055]">
                                            @if ($item->status == 'pending')
                                                <span
                                                    class="text-sm font-normal text-gray-500 dark:text-gray-300">Belum
                                                    di respon</span>
                                            @else
                                                <span
                                                    class="text-sm font-normal text-gray-500 dark:text-gray-300">Respon
                                                    :
                                                </span>
                                                <span
                                                    class="text-sm font-normal text-gray-500 dark:text-gray-300">{{ $item->respon }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

            <section class="closing font-sans mx-auto max-w-6xl bg-ungu p-14 rounded-3xl ">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-10 gap-y-4">
                    <div class="flex flex-col gap-y-10">
                        <div class="gap-y-2 flex flex-col">
                            <h1 class="text-white font-bold text-2xl sm:text-3xl leading-tight">Kirimkan Aspirasimu!
                            </h1>
                            <div class="text-sm sm:text-base leading-loose text-white">
                                Memberikan wadah bagi warga untuk berpartisipasi aktif dalam peningkatan kualitas
                                layanan
                                publik
                                dan mendukung transparansi serta akuntabilitas.
                            </div>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="">
                            <form action="{{ route('user.aspirasi.store') }}" class="max-w-sm" method="post">
                                @csrf
                                <textarea name="aspirasi" id="message" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-[#37177b] dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500"
                                    placeholder="Tulis aspirasi disini..."></textarea>

                                <button type="submit"
                                    class="   my-2 text-white hover:bg-indigo-900  bg-kuning focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-400 dark:hover:bg-purple-700 dark:focus:ring-purple-800">Kirim
                                    Aspirasi</button>
                            </form>
                        </div>
                    </div>
            </section>

            <div class="h-[70px]"></div>
        </div>
    </div>

    <script>
        var swiper = new Swiper(".mySwiper", {
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                420: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
            },
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

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
