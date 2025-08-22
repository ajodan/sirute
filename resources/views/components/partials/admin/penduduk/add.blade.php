<!-- Main modal Add Penduduk -->
<div>
    <form action="{{ route('admin.penduduk.store') }}" method="post" enctype="multipart/form-data" x-data="{ isKepalaKK: false }">
        @csrf
        <div id="add-penduduk" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-hidden overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-[80%]">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Tambah Penduduk
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="add-penduduk">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <!-- Modal body Form -->
                    <div class="p-4 md:p-5 space-y-4 overflow-y-auto max-h-[50vh]">
                        <label for="no-kk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                            KK</label>
                        <div class="relative mb-6">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <i class="fa-solid fa-hashtag"></i>
                            </div>
                            <input value="{{ old('no_kk') }}" autocomplete="off" required name="no_kk" maxlength="16"
                                type="number" list="listKK" id="no-kk"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan No KK">
                                <datalist id="listKK">
                                    @foreach ($kk as $item)
                                        <option value="{{ $item->no_kk }}">{{ $item->no_kk }}</option>
                                    @endforeach
                                </datalist>
                        </div>

                        <label for="nik"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                </svg>
                            </span>
                            <input value="{{ old('nik') }}" required name="nik" maxlength="16" type="number"
                                id="nik"
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="NIK">
                        </div>

                        <div class="flex items-center mb-4">
                            <input @click="isKepalaKK = !isKepalaKK" {{ old('isKepalaKK') == 'true' ? 'checked' : '' }}
                                id="default-checkbox" type="checkbox" value="true" name="isKepalaKK"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kepala
                                Keluarga</label>
                        </div>

                        <label for="nama"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                </svg>
                            </span>
                            <input value="{{ old('nama') }}" required name="nama" type="text" id="nama"
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Nama">
                        </div>

                        <label for="tempat-lahir"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                </svg>
                            </span>
                            <input value="{{ old('tempat_lahir') }}" name="tempat_lahir" type="text"
                                id="tempat-lahir"
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Tempat Lahir">
                        </div>

                        <label for="tgl-lahir"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                            Lahir</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                </svg>
                            </span>
                            <input value="{{ old('tgl_lahir') }}" required name="tgl_lahir" type="date"
                                id="tgl-lahir"
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Tanggal Lahir">
                        </div>

                        <label for="jenis-kelamin"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis-kelamin" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled value>Pilih Jenis Kelamin</option>
                            <option {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }} value="Laki-Laki">Laki
                                Laki</option>
                            <option {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }} value="Perempuan">
                                Perempuan</option>
                        </select>

                        <label for="agama"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                        <div class="flex">
                            {{-- <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                </svg>
                            </span> --}}
                            {{-- <input value="{{ old('agama') }}" name="agama" type="text" id="agama"
                                required
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Agama"> --}}
                            <select name="agama" id="agama" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled value>-- Pilih Agama --</option>
                                <option {{ old('agama') == 'Islam' ? 'selected' : '' }} value="Islam">
                                    Islam</option>
                                <option {{ old('agama') == 'Kristen Protestan' ? 'selected' : '' }}
                                    value="Kristen Protestan">Kristen Protestan</option>
                                <option {{ old('agama') == 'Katholik' ? 'selected' : '' }} value="Katholik">Katholik
                                </option>
                                <option {{ old('agama') == 'Hindu' ? 'selected' : '' }}
                                    value="Hindu">Hindu</option>
                                <option {{ old('agama') == 'Budha' ? 'selected' : '' }}
                                    value="Budha">Budha</option>
                                <option {{ old('agama') == 'Konghucu' ? 'selected' : '' }}
                                    value="Konghucu">Konghucu</option>
                            </select>
                        </div>

                        <label for="status-perkawinan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                            Perkawinan</label>
                        <select name="status_perkawinan" id="status-perkawinan" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled value>-- Pilih Status --</option>
                            <option {{ old('status_perkawinan') == 'Kawin' ? 'selected' : '' }} value="Kawin">
                                Kawin</option>
                            <option {{ old('status_perkawinan') == 'Belum Kawin' ? 'selected' : '' }}
                                value="Belum Kawin">Belum Kawin</option>
                            <option {{ old('status_perkawinan') == 'Cerai' ? 'selected' : '' }} value="Cerai">Cerai
                            </option>
                            <option {{ old('status_perkawinan') == 'Cerai Mati' ? 'selected' : '' }}
                                value="Cerai Mati">Cerai Mati</option>
                        </select>
                        <label for="hub_kk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hubungan Keluarga</label>
                    <select name="hub_kk" id="hub_kk" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected disabled value>-- Pilih Hubungan Keluarga --</option>
                        <option {{ old('hub_kk') == 'Kepala Keluarga' ? 'selected' : '' }} value="Kepala Keluarga">
                            Kepala Keluarga</option>
                        <option {{ old('hub_kk') == 'Suami' ? 'selected' : '' }}
                            value="Suami">Suami</option>
                        <option {{ old('hub_kk') == 'Istri' ? 'selected' : '' }}
                            value="Istri">Istri</option>
                        <option {{ old('hub_kk') == 'Anak' ? 'selected' : '' }}
                            value="Anak">Anak</option>
                        <option {{ old('hub_kk') == 'Menantu' ? 'selected' : '' }}
                            value="Menantu">Menantu</option>
                        <option {{ old('hub_kk') == 'Cucu' ? 'selected' : '' }}
                            value="Cucu">Cucu</option>
                        <option {{ old('hub_kk') == 'Orang Tua' ? 'selected' : '' }}
                            value="Orang Tua">Orang Tua</option>
                        <option {{ old('hub_kk') == 'Mertua' ? 'selected' : '' }}
                            value="Mertua">Mertua</option>
                        <option {{ old('hub_kk') == 'Famili Lain' ? 'selected' : '' }}
                            value="Famili Lain">Famili Lain</option>
                        <option {{ old('hub_kk') == 'Pembantu' ? 'selected' : '' }}
                            value="Pembantu">Pembantu</option>
                        <option {{ old('hub_kk') == 'Lainnya' ? 'selected' : '' }}
                            value="Lainnya">Lainnya</option>
                    </select>
                        <label for="pendidikan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pendidikan Terakhir</label>
                    <select name="pendidikan" id="pendidikan" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected disabled value>-- Pilih Pendidikan Terakhir --</option>
                        <option {{ old('pendidikan') == 'Tidak/Belum Sekolah' ? 'selected' : '' }} value="Tidak/Belum Sekolah">
                            Tidak/Belum Sekolah</option>
                        <option {{ old('pendidikan') == 'Belum Tamat SD/Sederajat' ? 'selected' : '' }}
                            value="Belum Tamat SD/Sederajat">Belum Tamat SD/Sederajat</option>
                        <option {{ old('pendidikan') == 'Sudah Tamat SD/Sederajat' ? 'selected' : '' }}
                            value="Sudah Tamat SD/Sederajat">Sudah Tamat SD/Sederajat</option>
                        <option {{ old('pendidikan') == 'Belum Tamat SLTP/Sederajat' ? 'selected' : '' }}
                            value="Belum Tamat SLTP/Sederajat">Belum Tamat SLTP/Sederajat</option>
                        <option {{ old('pendidikan') == 'SLTP/Sederajat' ? 'selected' : '' }}
                            value="SLTP/Sederajat">SLTP/Sederajat</option>
                        <option {{ old('pendidikan') == 'Belum Tamat SLTA/Sederajat' ? 'selected' : '' }}
                            value="Belum Tamat SLTA/Sederajat">Belum Tamat SLTA/Sederajat</option>
                        <option {{ old('pendidikan') == 'SLTA/Sederajat' ? 'selected' : '' }}
                            value="SLTA/Sederajat">SLTA/Sederajat</option>
                        <option {{ old('pendidikan') == 'Diploma I/II' ? 'selected' : '' }}
                            value="Diploma I/II">Diploma I/II</option>
                        <option {{ old('pendidikan') == 'Akademi/Diploma III/Sarjana Muda' ? 'selected' : '' }}
                            value="Akademi/Diploma III/Sarjana Muda">Akademi/Diploma III/Sarjana Muda</option>
                        <option {{ old('pendidikan') == 'Diploma IV/Strata I' ? 'selected' : '' }}
                            value="Diploma IV/Strata I">Diploma IV/Strata I</option>
                        <option {{ old('pendidikan') == 'Strata II' ? 'selected' : '' }}
                            value="Strata II">Strata II</option>
                        <option {{ old('pendidikan') == 'Strata III' ? 'selected' : '' }}
                            value="Strata III">Strata III</option>
                    </select>
                        <label for="pekerjaan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                </svg>
                            </span>
                            <input value="{{ old('pekerjaan') }}" name="pekerjaan" type="text" id="pekerjaan"
                                required
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Pekerjaan">
                        </div>

                        <label for="gol-darah"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gol.
                            Darah</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                </svg>
                            </span>
                            <input value="{{ old('gol_darah') }}" name="gol_darah" type="text" id="gol-darah"
                                required
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Gol Darah">
                        </div>

                        <label for="status-penduduk"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                            Penduduk</label>
                        <select name="status_penduduk" id="status-penduduk" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled value>-- Pilih Status --</option>
                            <option {{ old('status_penduduk') == 'Pendatang' ? 'selected' : '' }} value="Pendatang">
                                Pendatang</option>
                            <option {{ old('status_penduduk') == 'Penduduk Tetap' ? 'selected' : '' }}
                                value="Penduduk Tetap">Penduduk Tetap</option>
                        </select>

                        <hr class="h-1 my-13 bg-gray-200 rounded border-0 dark:bg-gray-3">

                        <label for="kel"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Desa/Kelurahan</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                </svg>
                            </span>
                            <input value="{{ old('kel') }}" name="kel" type="text" id="kel" required
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Desa/Kelurahan">
                        </div>

                        <label for="kecamatan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                </svg>
                            </span>
                            <input value="{{ old('kecamatan') }}" name="kecamatan" type="text" id="kecamatan"
                                required
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Kecamatan">
                        </div>

                        <label for="jalan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jalan/Blok</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                </svg>
                            </span>
                            <input value="{{ old('jalan') }}" name="jalan" type="text" id="jalan"
                                required
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Jalan/Blok">
                        </div>

                      
                        <label for="rt"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RT</label>
                        <select name="rt" id="rt" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled value>-- Pilih RT --</option>
                            <option {{ old('rt') == '1' ? 'selected' : '' }} value="1">
                                RT 01</option>
                            <option {{ old('rt') == '2' ? 'selected' : '' }}
                                value="2">RT 02</option>
                            <option {{ old('rt') == '3' ? 'selected' : '' }}
                                value="3">RT 03</option>
                            <option {{ old('rt') == '4' ? 'selected' : '' }}
                                value="4">RT 04</option>
                        </select>

                        <label for="norumah"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blok/No. Rumah Domisili</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                </svg>
                            </span>
                            <input value="{{ old('norumah') }}" name="norumah" type="text" id="norumah"
                                required
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Blok/Nomor Rumah">
                        </div>


                        <label for="rw"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RW</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                </svg>
                            </span>
                            <input readonly value="13" name="rw" type="text" id="rw" required
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="RW">

                        </div>

                        <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Ponsel</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                </svg>
                            </span>
                            <input value="{{ old('no_hp') }}" name="no_hp" type="text" id="no_hp"
                                required
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Nomor Ponsel">

                        </div>

                        <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <div class="flex">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                            </svg>
                        </span>
                        <input value="{{ old('email') }}" name="email" type="text" id="email"
                            required
                            class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Email">
                    </div>
                     <label for="instagram" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link Instagram</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                </svg>
                            </span>
                            <input value="{{ old('instagram') }}" name="instagram" type="text" id="instagram"
                                required
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Link Instagram">

                        </div>
                         <label for="facebook" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link Facebook</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                </svg>
                            </span>
                            <input value="{{ old('facebook') }}" name="facebook" type="text" id="facebook"
                                required
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Link Facebook">

                        </div>

                        <label for="status_dasar"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Dasar</label>
                    <select name="status_dasar" id="status_dasar" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected disabled value>-- Pilih Status Dasar --</option>
                        <option {{ old('status_dasar') == 'Hidup' ? 'selected' : '' }} value="Hidup">
                            Hidup</option>
                        <option {{ old('status_dasar') == 'Meninggal Dunia' ? 'selected' : '' }}
                            value="Meninggal Dunia">Meninggal Dunia</option>
                        <option {{ old('status_dasar') == 'Pindah' ? 'selected' : '' }}
                            value="Pindah">Pindah</option>
                        <option {{ old('status_dasar') == 'Tidak Aktif' ? 'selected' : '' }}
                            value="Tidak Aktif">Tidak Aktif</option> 
                    </select>

                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="file_input">Upload Photo</label>
                        <input name="image" accept="image/*"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file_input_help" id="file_input" type="file">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG,
                            JPG.(MAX 2MB)</p>

                        <label x-show="isKepalaKK"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="file_input">Upload Dokumen</label>
                        <input x-show="isKepalaKK" :disabled="!isKepalaKK" name="rumah[]" multiple
                            accept="image/*"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file_input_help" id="file_input" type="file">
                        <p x-show="isKepalaKK" class="mt-1 text-sm text-gray-500 dark:text-gray-300"
                            id="file_input_help">SVG, PNG,
                            JPG.(MAX 2MB)</p>

                        <!-- Modal footer -->
                        <div
                            class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 dark:bg-purple-700 dark:hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-blue-800">Tambah</button>
                            <button data-modal-hide="add-penduduk" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>
<!-- Main modal Add Penduduk -->
