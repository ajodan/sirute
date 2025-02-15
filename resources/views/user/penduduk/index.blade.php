<x-layout.user-layout>
    <div class="dark:bg-[#1f1345] px-7 w-full sm:max-w-6xl mx-auto font-sans">

        <section class=" font-sans pb-12 pt-[100px] ">
            <div class="flex flex-col gap-y-10 sm:flex-row items-center justify-between gap-x-20">
                <div class="flex-1 flex-col gap-y-10 space-y-5">
                    <div class="gap-y-2 flex flex-col space-y-2">
                        <h1 class="text-gray-600 font-bold text-4xl sm:text-[70px] dark:text-white leading-tight">
                            Daftar Data Warga<br>
                            <span class="text-purple-500 dark:text-purple-700">RT
                                {{ $user->penduduk->alamat->rt }} RW 13</span>
                        </h1>
                        {{-- <div class="text-base leading-loose text-gray-500 dark:text-gray-400">
                            RT {{ $user->penduduk->alamat->rt }} RW 013 Blok C Taman Alamanda.
                        </div> --}}
                    </div>
                </div>

                <div class="flex flex-row item-center">
                    <div class="max-w-sm w-full bg-purple-100 dark:bg-ungu_muda rounded-xl shadow p-4 md:p-6">
                        <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-purple-700">
                            <div class="flex items-center">
                                <div
                                    class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-purple-900 flex items-center justify-center me-3">
                                    <svg class="w-6 h-6 text-gray-500 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                                        <path
                                            d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
                                        <path
                                            d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z" />
                                    </svg>
                                </div>
                                <div>
                                    <h5
                                        class="leading-none text-2xl font-bold text-purple-500 dark:text-purple-700 pb-1">
                                        {{ $totalPenduduk }}</h5>
                                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Total penduduk di RT
                                        {{ $user->penduduk->alamat->rt }}
                                    </p>
                                </div>
                            </div>

                        </div>

                        <div class="grid grid-cols-2">
                            <dl class="flex items-center">
                                <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal me-1">Laki-laki:</dt>
                                <dd class="text-gray-900 text-sm dark:text-white font-semibold">
                                    {{ $totalPendudukLakiLaki }}
                                </dd>
                            </dl>
                            <dl class="flex items-center justify-end">
                                <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal me-1">Perempuan:</dt>
                                <dd class="text-gray-900 text-sm dark:text-white font-semibold">
                                    {{ $totalPendudukPerempuan }}</dd>
                            </dl>
                        </div>
                        <div id="column-chart"></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="Filter">
            <form action="" method="get" class=" ">
                <div
                    class="flex items-end justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-10">
                    <button id="filterButton" data-dropdown-toggle="filter"
                        class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-2 dark:bg-purple-900 dark:text-white dark:border-purple-600 dark:hover:bg-purple-700 dark:hover:border-purple-600 dark:focus:ring-purple-700"
                        type="button">
                        <span class="sr-only">Action button</span>
                        Filter
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="filter"
                        class="z-99 absolute hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">

                        <div id="accordion-collapse" data-accordion="collapse">
                            <h2 id="accordion-collapse-heading-1">
                                <button type="button"
                                    class="flex items-center justify-between w-full p-2 font-medium text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                    data-accordion-target="#accordion-collapse-body-1" aria-expanded="false"
                                    aria-controls="accordion-collapse-body-1">
                                    <span>Status Penduduk</span>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 5 5 1 1 5" />
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-1" class="hidden"
                                aria-labelledby="accordion-collapse-heading-1">
                                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">

                                    <div class="flex items-center my-2">
                                        <input onclick="formSubmit(this)" id="pendatang" type="checkbox"
                                            {{ $request->status_penduduk ? (in_array('Pendatang', $request->status_penduduk) ? 'checked' : '') : '' }}
                                            value="Pendatang" name="status_penduduk[]"
                                            class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-purple-500 dark:focus:ring-purple-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="pendatang"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pendatang</label>
                                    </div>
                                    <div class="flex items-center my-2">
                                        <input onclick="formSubmit(this)" id="tetap" type="checkbox"
                                            {{ $request->status_penduduk ? (in_array('Penduduk Tetap', $request->status_penduduk) ? 'checked' : '') : '' }}
                                            value="Penduduk Tetap" name="status_penduduk[]"
                                            class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-purple-500 dark:focus:ring-purple-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="tetap"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Penduduk
                                            Tetap</label>
                                    </div>
                                </div>
                            </div>

                            <h2 id="accordion-collapse-heading-2">
                                <button type="button"
                                    class="flex items-center justify-between w-full p-2 font-medium text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                    data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                                    aria-controls="accordion-collapse-body-2">
                                    <span>Jenis Kelamin</span>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 5 5 1 1 5" />
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-2" class="hidden"
                                aria-labelledby="accordion-collapse-heading-2">
                                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                                    <div class="flex items-center my-2">
                                        <input onclick="formSubmit(this)"
                                            {{ $request->jenis_kelamin ? (in_array('Laki-Laki', $request->jenis_kelamin) ? 'checked' : '') : '' }}
                                            id="laki-laki" type="checkbox" value="Laki-Laki" name="jenis_kelamin[]"
                                            class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-purple-500 dark:focus:ring-purple-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="laki-laki"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laki-Laki</label>
                                    </div>
                                    <div class="flex items-center my-2">
                                        <input onclick="formSubmit(this)" id="perempuan" type="checkbox"
                                            {{ $request->jenis_kelamin ? (in_array('Perempuan', $request->jenis_kelamin) ? 'checked' : '') : '' }}
                                            value="Perempuan" name="jenis_kelamin[]"
                                            class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-purple-500 dark:focus:ring-purple-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="perempuan"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative items-center h-full">
                        <div
                            class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" id="table-search-users" name="s" autocomplete="off"
                            class="block ps-10 text-sm text-gray-900 border
                        border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-purple-500 focus:border-purple-500
                        dark:bg-purple-900 dark:border-purple-600 dark:placeholder-purple-400 dark:text-white
                        dark:focus:ring-purple-500 dark:focus:border-purple-500"
                            placeholder="Cari penduduk">
                    </div>
                </div>
            </form>
        </section>

        <section class="tablePenduduk py- relative overflow-x-auto  sm:rounded-lg">
            <table class="shadow-md w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300">
                <thead class="text-xs text-gray-700 uppercase bg-purple-50 dark:bg-purple-900 dark:text-white">
                    <tr>
                        <th scope="col" class="p-4">

                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Lengkap
                        </th>
                        <th scope="col" class="px-6 py-3 hidden sm:table-cell">
                            Nomor Rumah
                        </th>
                        <th scope="col" class="px-6 py-3 hidden sm:table-cell">
                            Jenis Kelamin
                        </th>
                        <th scope="col" class="px-6 py-3 hidden sm:table-cell">
                            Status KK
                        </th>
                        <th scope="col" class="px-6 py-3 hidden sm:table-cell">
                            Nomor Ponsel
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penduduk as $item)
                        <tr
                            class="bg-white border-b dark:bg-[#2a045c] dark:border-purple-700 hover:bg-purple-50 dark:hover:bg-purple-800">
                            <td class="w-4 p-4">

                            </td>
                            <th scope="row"
                                class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                <img src="{{ $item->foto_profile() }}" alt="User"
                                    class="rounded-full object-cover w-12 h-12" />
                                <div class="ps-3">
                                    <div class="sm:text-base font-semibold">{{ $item->nama }}</div>
                                    <div class="font-normal text-gray-500">
                                        {{-- {{ $item->akun->level->nama_level != 'Penduduk' ? $item->akun->level->nama_level : $item->status_penduduk }} --}}
                                    </div>
                                </div>
                            </th>
                            <td class="px-6 py-4 hidden sm:table-cell">
                                {{ $item->alamatRumah() }}
                            </td>
                            <td class="px-6 py-4 hidden sm:table-cell">
                                {{ $item->jenis_kelamin }}
                            </td>
                            <td class="px-6 py-4 hidden sm:table-cell">
                                {{ $item->hub_kk }}
                            </td>
                            <td class="px-6 py-4 hidden sm:table-cell">
                                {{ $item->no_hp }}
                            </td>
                            <td x-show="levelUser === 'Super Admin' || levelUser === 'RW'" class="px-12 py- 8">
                                <a href="{{ route('user.detail', $item->nik) }}"
                                    class="font-medium text-purple-400 hover:text-indigo-700 dark:text-purple-700 dark:hover:text-white">Detail</a>
                                {{-- <a href="{{ route('user.edit', $item->nik) }}"
                                        class="font-medium text-purple-400 hover:text-indigo-700 dark:text-purple-700 dark:hover:text-white">Edit</a>
                                    --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div
                class="w-full text-center bg-purple-400 hover:bg-indigo-700 text-white dark:bg-purple-700 dark:hover:bg-white {{ !$penduduk->isEmpty() ? 'hidden' : '' }}">
                <h1 class="p-5">Tidak ada data</h1>
            </div>

            <div class="mt-5 ">
                {{ $penduduk->links() }}
            </div>

        </section>
        <div class="h-[70px]"></div>

    </div>



    <script src="{{ asset('assets/js/apexcharts.min.js') }}"></script>
    <script>
        const options = {
            colors: ["#1A56DB", "#FDBA8C"],
            series: [{
                    name: "Total",
                    color: "#270551",
                    data: [{
                            x: "Total",
                            y: {{ $totalPenduduk }}
                        },
                        {
                            x: "Pendatang",
                            y: {{ $totalPendudukPendatang }}
                        },
                        {
                            x: "Tetap",
                            y: {{ $totalPendudukTetap }}
                        },
                    ],
                },
                {
                    name: "Laki-Laki",
                    color: "#7733FF",
                    data: [{
                            x: "Total",
                            y: {{ $totalPendudukLakiLaki }}
                        },
                        {
                            x: "Pendatang",
                            y: {{ $totalPendudukLakiLakiPendatang }}
                        },
                        {
                            x: "Tetap",
                            y: {{ $totalPendudukLakiLakiTetap }}
                        },
                    ],
                },
                {
                    name: "Perempuan",
                    color: "#b286f8",
                    data: [{
                            x: "Total",
                            y: {{ $totalPendudukPerempuan }}
                        },
                        {
                            x: "Pendatang",
                            y: {{ $totalPendudukPerempuanPendatang }}
                        },
                        {
                            x: "Tetap",
                            y: {{ $totalPendudukPerempuanTetap }}
                        },
                    ],
                },
            ],
            chart: {
                type: "bar",
                height: "320px",
                fontFamily: "Inter, sans-serif",
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "70%",
                    borderRadiusApplication: "end",
                    borderRadius: 8,
                },
            },
            tooltip: {
                shared: true,
                intersect: false,
                style: {
                    fontFamily: "Inter, sans-serif",
                },
            },
            states: {
                hover: {
                    filter: {
                        type: "darken",
                        value: 1,
                    },
                },
            },
            stroke: {
                show: true,
                width: 0,
                colors: ["transparent"],
            },
            grid: {
                show: false,
                strokeDashArray: 4,
                padding: {
                    left: 2,
                    right: 2,
                    top: -14
                },
            },
            dataLabels: {
                enabled: false,
            },
            legend: {
                show: false,
            },
            xaxis: {
                floating: false,
                labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    }
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            yaxis: {
                show: false,
            },
            fill: {
                opacity: 1,
            },
        }

        if (document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("column-chart"), options);
            chart.render();
        }
    </script>

    <script>
        function formSubmit(e) {
            e.form.submit();
        }
    </script>
</x-layout.user-layout>
