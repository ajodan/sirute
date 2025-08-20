<x-layout.user-layout>
   <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Data Warga</h3>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="#">Data Warga</a></li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->

        <!-- Blog Start -->
        <div class="container-fluid blog py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Kartu Keluarga</h5>
                    <h1 class="mb-4">Daftar Kartu Keluarga</h1>
                    <p class="mb-0">Daftar Keluarga berdasarkan Kartu Keluarga di Wilayah RT 0{{ auth()->user()->penduduk->alamat->rt }} RW 0{{ auth()->user()->penduduk->alamat->rw }}.
                    </p>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                @if ($penduduk->isEmpty())
                    <div class="col-12">
                        <div class="alert alert-info text-center" role="alert">
                            Data warga belum tersedia.
                        </div>
                    </div>
                @else
                    @foreach ($penduduk as $item)
                        <div class="col-lg-2" style="margin-bottom: 20px;">
                            <div class="card mb-2" style="height: 300px; overflow: hidden;">
                                <img src="{{ $item->foto_profile() }}" class="card-img-top" alt="{{ $item->nama }}">
                            </div>
                            <div class="card mb-2" style="height: 300px; overflow: hidden;">
                                    <h5 class="card-title" align="center">{{ $item->nama }}</h5>
                                    <p class="card-text" align="center">&nbsp; Jenis Kelamin : <br><b>{{ $item->jenis_kelamin }}</b></p>
                                     <p class="card-text" align="center">&nbsp; Tanggal Lahir : <br><b>{{ \Carbon\Carbon::parse($item->tgl_lahir)->translatedFormat('d F Y') }}</b></p>
                                     <p class="card-text" align="center">&nbsp; Status KK : <br><b>{{ $item->hub_kk }}</b></p>
                                     <p class="card-text" align="center">&nbsp; No. HP : <br><b>{{ $item->no_hp }}</b></p>
                                    {{-- <a href="{{ route('user.detail', $item->nik) }}" class="btn btn-primary">Detail Warga</a> --}}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <!-- Blog End -->

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
