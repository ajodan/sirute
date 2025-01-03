<x-layout.user-layout>
    <section class="max-w-6xl mx-auto font-sans">
        <div class="header bg-cover rounded-xl bg-no-repeat relative my-8 mx-auto sm:h-[29vw] h-[80vh]"
            style="background-image: url(/assets/images/illustration/umkm-1.webp);">
            <div
                class="header-content absolute flex flex-col items-end gap-6 max-w-[50%] bottom-[10%] right-[6vw] animate-fadein3s">
                <h2 class="font-medium text-right text-white text-5xl leading-tight">UMKM Warga RW 13</h2>
                <p class="text-sm text-right text-white">UMKM (Usaha Mikro, Kecil, dan Menengah) adalah sektor usaha yang memainkan peran penting dalam perekonomian, khususnya di Indonesia. UMKM meliputi berbagai jenis usaha, mulai dari usaha mikro yang berskala kecil hingga usaha menengah yang memiliki skala lebih besar tetapi belum termasuk kategori perusahaan besar.</p>
            </div>
        </div>
    </section>

    <section class="max-w-6xl mx-auto font-sans sm:px-0 px-10">
        <div class="explore-menu flex flex-col gap-5">
            <h1 class="text-[#262626] dark:text-white text-2xl font-semibold">Deskripsi Singkat UMKM</h1>
            <p class="explore-menu-text
                sm:max-w-[900%] text-justify">Berikut adalah deskripsi singkat masing-masing kategori :<br><br>

                <b>Usaha Mikro</b><br>
                
                Memiliki aset dan omset tahunan yang sangat kecil.
                Biasanya dikelola oleh individu atau keluarga.
                Contoh: pedagang kaki lima, warung kecil, atau usaha kerajinan rumahan.<br><br>
                
                <b>Usaha Kecil</b><br>
                
                Memiliki aset dan omset yang lebih besar dibanding usaha mikro, tetapi masih dalam skala terbatas.
                Bisa memiliki beberapa karyawan dan sudah memiliki sistem operasional sederhana.
                Contoh: toko kelontong, bengkel motor, atau kafe kecil.<br><br>

                <b>Usaha Menengah</b><br><br>
                
                Memiliki aset dan omset yang lebih besar dari usaha kecil tetapi belum mencapai skala perusahaan besar.
                Biasanya memiliki struktur manajemen yang lebih terorganisasi dan jumlah karyawan yang lebih banyak.
                Contoh: pabrik makanan ringan, perusahaan jasa menengah, atau distributor barang.<br><br>

                Peran UMKM di RW 13/Blok C:
                
                Memberikan lapangan kerja bagi masyarakat.
                Meningkatkan kesejahteraan komunitas lokal.
                Menyumbang pada Produk Domestik Bruto (PDB).
                Mendorong inovasi dan kreativitas di berbagai sektor usaha.</p>
        </div>
    </section>

    <section class="max-w-6xl mx-auto font-sans sm:px-0 px-10">
        <div class="display mt-8">
            <div class="py-5 mt-3">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Cari</label>
                <div class="relative">
                    <form action="" method="get" class="flex">
                        <div>
                            <button id="filterButton" data-dropdown-toggle="filter"
                                class="h-full inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg  px-3 py-1.5 dark:bg-[#37177b] dark:text-gray-400 dark:border-gray-600 dark:hover:bg-purple-700 dark:hover:border-purple-600 dark:focus:ring-purple-700"
                                type="button">
                                <span class="sr-only">Action button</span>
                                Filter
                                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="filter"
                                class="z-9999 absolute hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-[#37177b] dark:divide-gray-600">

                                <div id="accordion-collapse" data-accordion="collapse">
                                    <h2 id="accordion-collapse-heading-1">
                                        <button type="button"
                                            class="flex items-center justify-between w-full p-2 font-medium text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-purple-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-purple-800 gap-3"
                                            data-accordion-target="#accordion-collapse-body-1" aria-expanded="false"
                                            aria-controls="accordion-collapse-body-1">
                                            <span>Kategori</span>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-collapse-body-1" class="hidden"
                                        aria-labelledby="accordion-collapse-heading-1">
                                        <div class="p-5 border border-b-0 border-gray-200 dark:border-purple-700">
                                            @foreach ($kategori as $item)
                                                <div class="flex items-center my-2">
                                                    <input id="kategori-{{ $item->id_kategori }}" type="checkbox"
                                                        value="{{ $item->id_kategori }}" name="kategori[]"
                                                        value="{{ $item->id_kategori }}"
                                                        class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-purple-500 dark:focus:ring-purple-600 dark:ring-offset-purple-800 focus:ring-2 dark:bg-purple-700 dark:border-purple-600">
                                                    <label for="kategori-{{ $item->id_kategori }}"
                                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $item->nama_kategori }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="search" name="s"
                            class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-purple-500 focus:border-purple-500 dark:bg-[#412283] dark:border-purple-600 dark:placeholder-purple-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500"
                            placeholder="Cari UMKM">
                        <button type="submit"
                            class="text-white absolute end-2.5 bottom-2.5 bg-purple-500 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-purple-700 dark:hover:bg-purple-700 dark:focus:ring-purple-800">Cari</button>
                    </form>
                </div>
            </div>

            {{-- judul = text-gray-600 --}}
            {{-- sub = text-purple-500 dark:text-purple-700 --}}
            {{-- paragaraf = text-gray-500 --}}
            {{-- button = bg-purple-400 hover:bg-indigo-700 text-white dark:bg-purple-700 dark:hover:bg-white --}}
            {{-- dark:hover:text-purple-700 --}}
            {{-- form = bg-purple-100 dark:bg-ungu_muda --}}

            <div class="display-list grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 gap-y-13 mt-8">
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
                                        <p class="text-xl font-medium dark:text-white truncate">{{ $item->nama_umkm }}
                                        </p>
                                        {{-- <img class="w-18" src="assets/images/umkm/rating_starts.png" alt=""> --}}
                                    </div>
                                    <p class="item-desc text-gray-500 text-xs">{{ $item->generateCuplikan() }}</p>

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
        </div>
    </section>
    <div class="mt-20"></div>
</x-layout.user-layout>
