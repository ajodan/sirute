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
                    Detail Penduduk
                </small>
            </h3>
        </div>
        <div class="md:!justify-start flex justify-center ">
            <img src="{{ $foto_penduduk }}" width="300px"
                class="rounded-xl bg-white dark:bg-gray-700 shadow-xl p-5 modal-image" alt="">
        </div>

        <div class="mt-5 relative overflow-x-auto sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-graydark dark:text-gray-400">
                <tbody>
                    @foreach ($detail_penduduk as $key => $value)
                        <tr class="bg-white dark:bg-gray-900 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $key }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $value }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ route('admin.penduduk.kk.detail', $detail_penduduk['No KK']) }}">
            <button
                class="mt-5 block text-white bg-blue-700 hover:bg-blue-800 dark:bg-purple-700 dark:hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-blue-800">
                Detail Kartu Keluarga
            </button>
        </a>
    </div>
    <div class="mt-10 text-xl">
        <h1><strong>FOTO DOKUMEN KELUARGA</strong></h1>
    </div>
    @if ($foto_rumah->isEmpty())
        <div class="mt-5 text-center">
            <h1 class="text-2xl">Foto dokumen keluarga tidak ditemukan</h1>
        </div>
    @else
        <div
            class="grid grid-cols-2 md:grid-cols-4 mt-2 w-full items-center gap-4 bg-white dark:bg-gray-700 p-10 rounded-lg">
            @foreach ($foto_rumah as $item)
                <img src="{{ $item->image() }}" alt="foto dokumen" class="modal-image shadow-xl rounded-md bg-white"
                    width="200px">
            @endforeach
        </div>
    @endif

    <x-partials.admin.modal.image />

</x-layout.admin-layout>
