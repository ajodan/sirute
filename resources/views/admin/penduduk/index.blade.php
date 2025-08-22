<x-layout.admin-layout>
    <div class="relative">
        <div class="mb-5">
            <div class="mb-2 text-xl">
                <h1><strong>PENDUDUK</strong></h1>
            </div>
            <h3 class="text-muted">
                ADMIN
                <small class="text-dark">
                    <i class="fas fa-xs fa-angle-right text-muted"></i>
                    Penduduk
                    <small class="text-dark">
                        <i class="fas fa-xs fa-angle-right text-muted"></i>
                    </small>
                    Daftar Penduduk
                </small>
            </h3>
        </div>
        <div class="sm:flex justify-between mb-5">
            <!-- Modal toggle -->
            @if (auth()->user()->level->nama_level != 'Penduduk')
            <div class="order-2 mb-5 flex justify-end">
                <button data-modal-target="add-penduduk" data-modal-toggle="add-penduduk"
                    class="text-white bg-blue-700 hover:bg-blue-800 dark:bg-purple-700 dark:hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-blue-800"
                    type="button">
                    Tambah Penduduk
                </button>
            </div>
            @endif
            <x-partials.admin.penduduk.filter />
        </div>
        @if (session('success'))
            <div class="mb-5 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                role="alert">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg onclick="this.parentElement.parentElement.style.display='none'"
                        class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Tutup</title>
                        <path
                            d="M14.348 5.652a.5.5 0 0 1 0 .707l-8.485 8.485a.5.5 0 0 1-.707-.707l8.485-8.485a.5.5 0 0 1 .707 0zm-8.485 8.485a.5.5 0 0 1-.707 0l-8.485-8.485a.5.5 0 0 1 .707-.707l8.485 8.485a.5.5 0 0 1 0 .707z" />
                    </svg>
                </span>
            </div>
        @endif
        @if ($errors->any())
            <div class="p-4 mb-4 text-sm bg-red-600 text-white rounded-lg" role="alert">
                <span class="font-bold">Data gagal disimpan</span>
            </div>
            @foreach ($errors->all() as $error)
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <span class="font-medium">{!! $error !!}</span>
                </div>
            @endforeach
        @endif
        <div class="flex flex-nowrap relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="whitespace-nowrap">
                        <th scope="col" class="px-6 py-3">
                            Photo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Lengkap
                        </th>
                        <th scope="col" class="px-6 py-3">
                            NIK
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            Tempat Lahir
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            Jenis Kelamin
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            Blok/No. Rumah
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            Usia
                        </th>
                        <th scope="col" class="px-6 py-3 ">
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
                            class="whitespace-nowrap bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                @if ($item->foto_profile())
                                    <img src="{{ $item->foto_profile() }}" 
                                        alt="Foto {{ $item->nama }}" 
                                        class="w-[60px] h-[80px] object-cover rounded border shadow">
                                @endif
                            </td>
                            <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                <div>{{ $item->nama }}</div>
                            </td>
                            <td class="px-6 py-4 ">
                                {{ $item->nik }}
                            </td>
                            <td class="px-6 py-4 ">
                                {{ $item->tempat_lahir }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->jenis_kelamin }}
                            </td>
                            <td class="px-6 py-4 max-w-[17rem] truncate">
                                {{ $item->alamatRumah() }}
                            </td>
                            <td class="px-6 py-4 ">
                                {{ ($item->age()) }} Tahun
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->no_hp }}
                            </td>
                            <td class="px-6 py-4 flex gap-2">
                                @if($item->hub_kk === "Kepala Keluarga")
                                    @empty($item->akun)
                                    <button onclick="showFormAddAkun({{ $item }})"
                                        data-modal-target="add-akun-penduduk" data-modal-toggle="add-akun-penduduk"
                                        class="font-medium text-white bg-blue-700 p-2  rounded">
                                        Buat Akun
                                    </button>
                                    @endempty
                                @endif
                                
                                <a href="{{ route('admin.penduduk.detail', $item->nik) }}">
                                    <button class="font-medium text-white bg-green-400 p-2  rounded">
                                        Detail
                                    </button>
                                </a>
                                <button onclick="showEdit({{ $item }})" data-modal-target="edit-penduduk"
                                    data-modal-toggle="edit-penduduk"
                                    class="font-medium text-white bg-yellow-300 p-2  rounded">
                                    Edit
                                </button>
                                @if (auth()->user()->level->nama_level != 'Penduduk')
                                <form action="{{ route('admin.penduduk.delete', $item->nik) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button
                                        onclick="return confirm('Apakah Anda akan menghapus data dengan Nik : {{ $item->nik }}')"
                                        type="submit" class="font-medium text-white bg-red-500 p-2 rounded">
                                        Hapus
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-5">
            {{ $penduduk->links('vendor.pagination.tailwind') }}
        </div>
    </div>
    <x-partials.admin.penduduk.add />
    <x-partials.admin.penduduk.add-akun />
    <x-partials.admin.penduduk.edit />

    <script>
        function clearFormInputPenduduk() {
            document.getElementById('no-kk').value = '';
            document.getElementById('nama').value = '';
            document.getElementById('tempat-lahir').value = '';
            document.getElementById('tgl-lahir').value = '';
            document.getElementById('jenis-kelamin').value = '';
            document.getElementById('no_hp').value = '';
        }

        const hideButton = document.querySelectorAll('[data-modal-hide]');
        hideButton.forEach(button => {
            button.addEventListener('click', () => {
                clearFormInputPenduduk();
            });
        });
    </script>
</x-layout.admin-layout>
