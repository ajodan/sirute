{{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="fixed end-6 bottom-6 group animate-bounce">
    <button type="button" onclick="printJS('printJS-form', 'html')" aria-controls="speed-dial-menu-default"
        aria-expanded="false"
        class="flex items-center justify-center text-white bg-blue-700 rounded-full w-14 h-14 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
        <i class="fa-solid fa-print  text-xl"></i>
        <span class="sr-only">Open actions menu</span>
    </button>
</div>
<div class="px-10 pt-4" id="printJS-form">
    <link rel="stylesheet" href="{{ asset('assets/css/flowbite.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/printjs.css') }}">
    <div class="grid grid-cols-6 px-9 py-6 items-center">
        <div class="logo "><img src="/assets/images/rw/logo kab.png" alt="" class="bg-cover w-[110px]"></div>
        <div class="col-span-5 text-center">
            <p class="text-lg font-surat">PEMERINTAH DESA KARANGSATRIA</p>
            <p class="text-sm font-surat font-bold mb-1">RUKUN WARGA 013</p>
            <p class="text-xs font-surat">Taman Alamanda Blok C<br>Desa Karangsatria
                Kecamatan Tambun Utara, Kabupaten Bekasi,
                17510 </p>{{-- <p class="text-xs font-surat">Telp. (0341) 404424 – 404425, Fax (0341) 404420,</p> --}} {{-- <p class="text-xs font-surat">http://www.polinema.ac.id</p> --}}
        </div>
    </div>
    <div class="border-[1.5px] border-b-black text-justify"></div>
    <div class="bodySurat text-xs mt-4 font-">
        <div class="flex justify-between">
            <div class="font-surat">{{-- <p>Nomor &emsp;: <span id="nomor-report"></span>/HCK/polinema/X/
                        <?= $year ?>
                    </p>
                    <p>Hal &emsp;&emsp;&ensp;: Peminjaman Kelas</p>
                    <p>Bulan &ensp;&ensp;&ensp;:
                        <?= $month_name ?>
                    </p>
                    <p>Tahun &ensp;&ensp;&ensp;:
                        <?= $year ?>
                    </p> --}} </div>
            <div class="font-surat">{{-- <p><?= $date = date('d-m-Y') ?></p> --}} </div>
        </div>
        <h1 class="font-surat text-xl font-bold  text-center">Rekap Data Penduduk </h1>
        <div class="flex flex-nowrap overflow-x-auto relative  mt-5">
            <table class="w-full text-sm text-left rtl:text-right text-black border-gray-900">
                <thead class="text-xs uppercase bg-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3 border-solid border-gray-900 border-[1.5px]">Jumlah RT </th>
                        <th scope="col" class="px-6 py-3 border-solid border-gray-900 border-[1.5px]">Jumlah Penduduk
                        </th>
                        <th scope="col" class="px-6 py-3 border-solid border-gray-900 border-[1.5px]">Pendatang </th>
                        <th scope="col" class="px-6 py-3 border-solid border-gray-900 border-[1.5px]">Tetap </th>
                        <th scope="col" class="px-6 py-3 border-solid border-gray-900 border-[1.5px]">Jumlah KK </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td class="px-6 py-4 border-solid border-gray-900 border-[1.5px]">{{ $jumlahRT }} </td>
                        <td class="px-6 py-4 border-solid border-gray-900 border-[1.5px]">{{ $totalPenduduk }} </td>
                        <td class="px-6 py-4 border-solid border-gray-900 border-[1.5px]">{{ $pendudukPendatang }} </td>
                        <td class="px-6 py-4 border-solid border-gray-900 border-[1.5px]">{{ $pendudukTetap }} </td>
                        <td class="px-6 py-4 border-solid border-gray-900 border-[1.5px]">{{ $jumlahKK }} </td>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <h1 class="font-surat text-xl font-bold  text-center mt-5">Rekap Data Keuangan </h1>
        <div class="flex flex-nowrap overflow-x-auto relative  mt-5">
            <table class="w-full text-sm text-left rtl:text-right text-black">
                <thead class="text-xs uppercase bg-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3 border-solid border-gray-900 border-[1.5px]">Pemasukan </th>
                        <th scope="col" class="px-6 py-3 border-solid border-gray-900 border-[1.5px]">Pengeluaran
                        </th>
                        <th scope="col" class="px-6 py-3 border-solid border-gray-900 border-[1.5px]">Total Keuangan
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-6 py-4 border-solid border-gray-900 border-[1.5px]">{{ $pemasukkan }} </td>
                        <td class="px-6 py-4 border-solid border-gray-900 border-[1.5px]">{{ $pengeluaran }} </td>
                        <td class="px-6 py-4 border-solid border-gray-900 border-[1.5px]">{{ $totalKeuangan }} </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="grid grid-cols-6 gap-4 text-xs font-surat mt-14">
        <div class="col-start-5 col-end-7 text-center">
            <p>Ketua RW 013 Desa Karangsatria,
                {{ now()->day . ' ' . now()->monthName . ' ' . now()->year }}</p><br><br><br><br>
            <p>Supriyono</p>{{-- <p>NIP. 198010102005011001</p> --}}
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">
<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
