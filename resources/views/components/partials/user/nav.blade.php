<nav
    class="bg-white dark:bg-purple-950 bg-opacity-10 dark:bg-opacity-10 backdrop-filter backdrop-blur-lg  z-50 top-0 fixed w-full">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-end mx-auto p-4 px-10">
        <a href="{{ route('user.home') }}" class="flex mr-auto items-center space-x-3">
            <img :src="darkMode ? '{{ asset('assets/images/logo/logo-light.png') }}' :
                '{{ asset('assets/images/logo/logo-dark.png') }}'"
                width="200px" height="auto" class="duration-300" alt="Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"></span>
        </a>
        <div class="flex gap-x-2 sm:gap-x-3 items-center sm:order-2">
            <label :class="darkMode ? 'bg-purple-200' : 'bg-stroke'" class="relative m-0 block h-7.5 w-14 rounded-full">
                <input type="checkbox" :value="darkMode" @change="darkMode = !darkMode"
                    class="absolute top-0 z-50 m-0 h-full w-full cursor-pointer opacity-0" />
                <span :class="darkMode && '!right-1 !translate-x-full'"
                    class="absolute left-1 top-1/2 flex h-6 w-6 -translate-y-1/2 translate-x-0 items-center justify-center rounded-full bg-white shadow-switcher duration-75 ease-linear">
                    <span class="dark:hidden">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.99992 12.6666C10.5772 12.6666 12.6666 10.5772 12.6666 7.99992C12.6666 5.42259 10.5772 3.33325 7.99992 3.33325C5.42259 3.33325 3.33325 5.42259 3.33325 7.99992C3.33325 10.5772 5.42259 12.6666 7.99992 12.6666Z"
                                fill="#969AA1" />
                            <path
                                d="M8.00008 15.3067C7.63341 15.3067 7.33342 15.0334 7.33342 14.6667V14.6134C7.33342 14.2467 7.63341 13.9467 8.00008 13.9467C8.36675 13.9467 8.66675 14.2467 8.66675 14.6134C8.66675 14.9801 8.36675 15.3067 8.00008 15.3067ZM12.7601 13.4267C12.5867 13.4267 12.4201 13.3601 12.2867 13.2334L12.2001 13.1467C11.9401 12.8867 11.9401 12.4667 12.2001 12.2067C12.4601 11.9467 12.8801 11.9467 13.1401 12.2067L13.2267 12.2934C13.4867 12.5534 13.4867 12.9734 13.2267 13.2334C13.1001 13.3601 12.9334 13.4267 12.7601 13.4267ZM3.24008 13.4267C3.06675 13.4267 2.90008 13.3601 2.76675 13.2334C2.50675 12.9734 2.50675 12.5534 2.76675 12.2934L2.85342 12.2067C3.11342 11.9467 3.53341 11.9467 3.79341 12.2067C4.05341 12.4667 4.05341 12.8867 3.79341 13.1467L3.70675 13.2334C3.58008 13.3601 3.40675 13.4267 3.24008 13.4267ZM14.6667 8.66675H14.6134C14.2467 8.66675 13.9467 8.36675 13.9467 8.00008C13.9467 7.63341 14.2467 7.33342 14.6134 7.33342C14.9801 7.33342 15.3067 7.63341 15.3067 8.00008C15.3067 8.36675 15.0334 8.66675 14.6667 8.66675ZM1.38675 8.66675H1.33341C0.966748 8.66675 0.666748 8.36675 0.666748 8.00008C0.666748 7.63341 0.966748 7.33342 1.33341 7.33342C1.70008 7.33342 2.02675 7.63341 2.02675 8.00008C2.02675 8.36675 1.75341 8.66675 1.38675 8.66675ZM12.6734 3.99341C12.5001 3.99341 12.3334 3.92675 12.2001 3.80008C11.9401 3.54008 11.9401 3.12008 12.2001 2.86008L12.2867 2.77341C12.5467 2.51341 12.9667 2.51341 13.2267 2.77341C13.4867 3.03341 13.4867 3.45341 13.2267 3.71341L13.1401 3.80008C13.0134 3.92675 12.8467 3.99341 12.6734 3.99341ZM3.32675 3.99341C3.15341 3.99341 2.98675 3.92675 2.85342 3.80008L2.76675 3.70675C2.50675 3.44675 2.50675 3.02675 2.76675 2.76675C3.02675 2.50675 3.44675 2.50675 3.70675 2.76675L3.79341 2.85342C4.05341 3.11342 4.05341 3.53341 3.79341 3.79341C3.66675 3.92675 3.49341 3.99341 3.32675 3.99341ZM8.00008 2.02675C7.63341 2.02675 7.33342 1.75341 7.33342 1.38675V1.33341C7.33342 0.966748 7.63341 0.666748 8.00008 0.666748C8.36675 0.666748 8.66675 0.966748 8.66675 1.33341C8.66675 1.70008 8.36675 2.02675 8.00008 2.02675Z"
                                fill="#969AA1" />
                        </svg>
                    </span>
                    <span class="hidden dark:inline-block">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.3533 10.62C14.2466 10.44 13.9466 10.16 13.1999 10.2933C12.7866 10.3667 12.3666 10.4 11.9466 10.38C10.3933 10.3133 8.98659 9.6 8.00659 8.5C7.13993 7.53333 6.60659 6.27333 6.59993 4.91333C6.59993 4.15333 6.74659 3.42 7.04659 2.72666C7.33993 2.05333 7.13326 1.7 6.98659 1.55333C6.83326 1.4 6.47326 1.18666 5.76659 1.48C3.03993 2.62666 1.35326 5.36 1.55326 8.28666C1.75326 11.04 3.68659 13.3933 6.24659 14.28C6.85993 14.4933 7.50659 14.62 8.17326 14.6467C8.27993 14.6533 8.38659 14.66 8.49326 14.66C10.7266 14.66 12.8199 13.6067 14.1399 11.8133C14.5866 11.1933 14.4666 10.8 14.3533 10.62Z"
                                fill="#969AA1" />
                        </svg>
                    </span>
                </span>
            </label>
            @auth
                <div class="relative" x-data="{ dropdownOpen: false, notifying: true }" @click.outside="dropdownOpen = false">
                    <a class="relative flex h-8.5 w-8.5 items-center justify-center rounded-full border-[0.5px] border-stroke bg-gray hover:text-purple-800 dark:border-strokedark dark:bg-purple-400 dark:text-white"
                        href="#" @click.prevent="dropdownOpen = ! dropdownOpen; notifying = false">
                        <span :class="!notifying && 'hidden'"
                            class="absolute -top-0.5 right-0 z-1 h-2 w-2 rounded-full bg-meta-1">
                            <span
                                class="absolute -z-1 inline-flex h-full w-full animate-ping rounded-full bg-meta-1 opacity-75"></span>
                        </span>

                        <svg class="fill-current duration-300 ease-in-out" width="18" height="18" viewBox="0 0 18 18"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16.1999 14.9343L15.6374 14.0624C15.5249 13.8937 15.4687 13.7249 15.4687 13.528V7.67803C15.4687 6.01865 14.7655 4.47178 13.4718 3.31865C12.4312 2.39053 11.0812 1.7999 9.64678 1.6874V1.1249C9.64678 0.787402 9.36553 0.478027 8.9999 0.478027C8.6624 0.478027 8.35303 0.759277 8.35303 1.1249V1.65928C8.29678 1.65928 8.24053 1.65928 8.18428 1.6874C4.92178 2.05303 2.4749 4.66865 2.4749 7.79053V13.528C2.44678 13.8093 2.39053 13.9499 2.33428 14.0343L1.7999 14.9343C1.63115 15.2155 1.63115 15.553 1.7999 15.8343C1.96865 16.0874 2.2499 16.2562 2.55928 16.2562H8.38115V16.8749C8.38115 17.2124 8.6624 17.5218 9.02803 17.5218C9.36553 17.5218 9.6749 17.2405 9.6749 16.8749V16.2562H15.4687C15.778 16.2562 16.0593 16.0874 16.228 15.8343C16.3968 15.553 16.3968 15.2155 16.1999 14.9343ZM3.23428 14.9905L3.43115 14.653C3.5999 14.3718 3.68428 14.0343 3.74053 13.6405V7.79053C3.74053 5.31553 5.70928 3.23428 8.3249 2.95303C9.92803 2.78428 11.503 3.2624 12.6562 4.2749C13.6687 5.1749 14.2312 6.38428 14.2312 7.67803V13.528C14.2312 13.9499 14.3437 14.3437 14.5968 14.7374L14.7655 14.9905H3.23428Z"
                                fill="" />
                        </svg>
                    </a>

                    <!-- Dropdown Start -->
                    <div x-show="dropdownOpen"
                        class="absolute -right-27 mt-2.5 flex h-90 w-75 flex-col rounded-sm border border-stroke  bg-white dark:bg-gray-800 shadow-default dark:border-strokedark  sm:right-0 sm:w-80">
                        <div class="px-4.5 py-3">
                            <h5 class="text-sm font-medium text-bodydark2">Notification</h5>
                        </div>

                        <ul class="flex h-auto flex-col overflow-y-auto">
                            @foreach ($notifications as $item)
                                <li>
                                    <a class="flex flex-col gap-2.5 border-t border-stroke px-4.5 py-3 hover:bg-gray-2 dark:border-strokedark dark:hover:bg-meta-4"
                                        href="#">
                                        <p class="text-sm">
                                            {{ $item->data['message'] }}
                                        </p>
                                        <p class="text-xs">{{ $item->created_at }}</p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Dropdown End -->
                </div>
            @endauth
            @guest
                <div class="py-1">
                    <a href="{{ route('login') }}"
                        class="block px-5 py-2 mr-5 bg-indigo-950 dark:bg-purple-400 rounded-full text-white">Layanan Mandiri</a>
                </div>
            @endguest
            @auth
                <div class="relative" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
                    <a class="flex items-center gap-4" href="#" @click.prevent="dropdownOpen = ! dropdownOpen">
                        <span class="hidden text-right lg:block">
                            <span class="block text-sm font-medium text-black dark:text-white">{{ $username }}</span>
                            <span
                                class="block text-xs font-medium text-black dark:text-white">{{ $level == 'RT' ? 'Ketua ' . $level : $level }}</span>
                        </span>

                        <img src="{{ auth()->user()->penduduk->foto_profile() }}" alt="Photo Penduduk"
                            class="h-12 w-12 square-full object-cover" />

                        <svg :class="dropdownOpen && 'rotate-180'" class="hidden fill-current sm:block dark:text-white"
                            width="12" height="8" viewBox="0 0 12 8" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0.410765 0.910734C0.736202 0.585297 1.26384 0.585297 1.58928 0.910734L6.00002 5.32148L10.4108 0.910734C10.7362 0.585297 11.2638 0.585297 11.5893 0.910734C11.9147 1.23617 11.9147 1.76381 11.5893 2.08924L6.58928 7.08924C6.26384 7.41468 5.7362 7.41468 5.41077 7.08924L0.410765 2.08924C0.0853277 1.76381 0.0853277 1.23617 0.410765 0.910734Z"
                                fill="" />
                        </svg>
                    </a>

                    <!-- Dropdown Start -->
                    <div x-show="dropdownOpen"
                        class="absolute right-0 mt-4 flex w-62.5 flex-col rounded-sm border border-stroke bg-white shadow-default dark:bg-[#1c123d] dark:border-strokedark ">
                        <ul class="flex flex-col gap-5 border-b border-stroke px-6 py-7.5 dark:border-strokedark">
                            <li {{ auth()->user()->level->nama_level == 'Penduduk' ? '' : '' }}>
                                <a href="{{ route('admin.dashboard') }}"
                                    class="flex items-center gap-3.5 text-sm font-medium duration-300 ease-in-out hover:text-purple-600 dark:hover:text-white lg:text-base">
                                    <i class="fa-solid fa-toolbox w-[22px]"></i>
                                    Internal
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.profile') }}"
                                    class="flex items-center gap-3.5 text-sm font-medium duration-300 ease-in-out hover:text-purple-600 dark:hover:text-white lg:text-base">
                                    <i class="fa fa-user w-[22px]" aria-hidden="true"></i>
                                    Profil Saya
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.berita.dashboard') }}"
                                    class="flex items-center gap-3.5 text-sm font-medium duration-300 ease-in-out hover:text-purple-600 dark:hover:text-white lg:text-base">
                                    <i class="fa-regular fa-newspaper w-[22px]"></i>
                                    Berita
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.umkm.dashboard') }}"
                                    class="flex items-center gap-3.5 text-sm font-medium duration-300 ease-in-out hover:text-purple-600 dark:hover:text-white lg:text-base">
                                    <i class="fa-solid fa-shop w-[22px]"></i>
                                    UMKM
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('user.bansos') }}"
                                    class="flex items-center gap-3.5 text-sm font-medium duration-300 ease-in-out hover:text-purple-600 dark:hover:text-white lg:text-base">
                                    <i class="fa-solid fa-handshake w-[22px]"></i>
                                    Bansos
                                </a>

                            </li>

                            <li>
                                <a href="{{ route('user.aspirasi.riwayataspirasi') }}"
                                    class="flex items-center gap-3.5 text-sm font-medium duration-300 ease-in-out hover:text-purple-600 dark:hover:text-white lg:text-base">
                                    <i class="fa-solid fa-comments w-[22px]"></i>
                                    Aspirasi
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('user.inventaris.riwayatinventaris') }}"
                                    class="flex items-center gap-3.5 text-sm font-medium duration-300 ease-in-out hover:text-purple-600 dark:hover:text-white lg:text-base">
                                    
                                    <i class="fa-solid fa-people-carry-box w-[22px]"></i>
                                    Peminjaman
                                </a>

                            </li>
                        </ul>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button
                                class="flex items-center gap-3.5 px-6 py-4 text-sm font-medium duration-300 ease-in-out hover:text-purple-600 dark:hover:text-white lg:text-base w-100">
                                <svg class="fill-current" width="22" height="22" viewBox="0 0 22 22"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.5375 0.618744H11.6531C10.7594 0.618744 10.0031 1.37499 10.0031 2.26874V4.64062C10.0031 5.05312 10.3469 5.39687 10.7594 5.39687C11.1719 5.39687 11.55 5.05312 11.55 4.64062V2.23437C11.55 2.16562 11.5844 2.13124 11.6531 2.13124H15.5375C16.3625 2.13124 17.0156 2.78437 17.0156 3.60937V18.3562C17.0156 19.1812 16.3625 19.8344 15.5375 19.8344H11.6531C11.5844 19.8344 11.55 19.8 11.55 19.7312V17.3594C11.55 16.9469 11.2062 16.6031 10.7594 16.6031C10.3125 16.6031 10.0031 16.9469 10.0031 17.3594V19.7312C10.0031 20.625 10.7594 21.3812 11.6531 21.3812H15.5375C17.2219 21.3812 18.5625 20.0062 18.5625 18.3562V3.64374C18.5625 1.95937 17.1875 0.618744 15.5375 0.618744Z"
                                        fill="" />
                                    <path
                                        d="M6.05001 11.7563H12.2031C12.6156 11.7563 12.9594 11.4125 12.9594 11C12.9594 10.5875 12.6156 10.2438 12.2031 10.2438H6.08439L8.21564 8.07813C8.52501 7.76875 8.52501 7.2875 8.21564 6.97812C7.90626 6.66875 7.42501 6.66875 7.11564 6.97812L3.67814 10.4844C3.36876 10.7938 3.36876 11.275 3.67814 11.5844L7.11564 15.0906C7.25314 15.2281 7.45939 15.3312 7.66564 15.3312C7.87189 15.3312 8.04376 15.2625 8.21564 15.125C8.52501 14.8156 8.52501 14.3344 8.21564 14.025L6.05001 11.7563Z"
                                        fill="" />
                                </svg>
                                Keluar
                            </button>
                        </form>
                    </div>
                    <!-- Dropdown End -->
                </div>
            @endauth
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="hidden w-full pr-10 md:flex md:flex-row md:w-auto sm:order-1" id="navbar-default"
            x-data="{ selected: location.pathname }">
            <ul
                class="font-medium flex flex-col md:items-center p-4 md:p-0 mt-4 border  rounded-lg  md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 ">
                <li>
                    <a href="{{ route('user.home') }}"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0 dark:text-purple-400 md:dark:hover:text-white dark:hover:text-white md:dark:hover:bg-transparent"
                        aria-current="page"
                        :class="{ 'text-yellow-500 dark:text-purple-50': (selected.includes('home')) }">Beranda</a>
                </li>
                
                <li>
                    <a href="{{ route('user.berita') }}"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0 dark:text-purple-400 md:dark:hover:text-white dark:hover:text-white md:dark:hover:bg-transparent "
                        :class="{ 'text-yellow-500 dark:text-purple-50': (selected.includes('berita')) }">Berita</a>
                </li>
                <li>
                    <a href="{{ route('user.penduduk') }}"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0 dark:text-purple-400 md:dark:hover:text-white dark:hover:text-white md:dark:hover:bg-transparent"
                        :class="{ 'text-yellow-500 dark:text-purple-50': (selected.includes('penduduk')) }">Penduduk</a>
                </li>
               
                </li><a href="{{ route('user.umkm') }}"
                        class="block py-2 px-3 text-black rounded hover:bg-purple-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0 dark:text-purple-400 md:dark:hover:text-white dark:hover:text-white  md:dark:hover:bg-transparent"
                        :class="{ 'text-yellow-500 dark:text-purple-50': (selected.includes('umkm')) }">UMKM</a>
                </li>
                <li>
                    <a href="{{ route('user.agenda') }}"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0 dark:text-purple-400 md:dark:hover:text-white dark:hover:text-white  md:dark:hover:bg-transparent"
                        :class="{ 'text-yellow-500 dark:text-purple-50': (selected.includes('agenda')) }">Agenda</a>
                <li>
                    <a href="{{ route('user.inventaris') }}"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0 dark:text-purple-400 md:dark:hover:text-white dark:hover:text-white  md:dark:hover:bg-transparent"
                        :class="{ 'text-yellow-500 dark:text-purple-50': (selected.includes('inventaris')) }">Inventaris</a>
                </li>

                <li>
                    <a href="{{ route('user.aspirasi') }}"
                        class="block py-2 px-3 text-black rounded hover:bg-purple-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0 dark:text-purple-400 md:dark:hover:text-white dark:hover:text-white  md:dark:hover:bg-transparent"
                        :class="{ 'text-yellow-500 dark:text-purple-50': (selected.includes('aspirasi')) }">Aspirasi</a>
                </li>
                
                {{-- <li>
                    <a href="{{ route('user.layanan') }}"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0 dark:text-purple-400 md:dark:hover:text-white dark:hover:text-white md:dark:hover:bg-transparent "
                        :class="{ 'text-yellow-500 dark:text-purple-50': (selected.includes('layanan')) }">Layanan</a>
                </li> --}}
                {{-- <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropDownLinkLainnya"
                        class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-purple-700 md:p-0 md:w-auto dark:text-purple-400 md:dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Lainnya
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropDownLinkLainnya"
                        class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-[#1c123d] dark:divide-purple-600">
                        <ul class="p-4 text-sm text-purple-700 dark:text-purple-400"
                            aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="{{ route('user.agenda') }}"
                                    class="block px-4 !py-2 text-sm text-black rounded hover:bg-purple-100 md:hover:bg-transparent md:border-0 md:hover:text-purple-700 md:p-0 dark:text-purple-400 md:dark:hover:text-white dark:hover:text-white  md:dark:hover:bg-transparent"
                                    :class="{ 'text-yellow-500 dark:text-purple-50': (selected.includes('agenda')) }">Agenda</a>
                            </li> 
                            <li>
                                <a href="{{ route('user.umkm') }}"
                                    class="block px-4 !py-2 text-sm text-black rounded hover:bg-purple-100 md:hover:bg-transparent md:border-0 md:hover:text-purple-700 md:p-0 dark:text-purple-400 md:dark:hover:text-white dark:hover:text-white  md:dark:hover:bg-transparent"
                                    :class="{ 'text-yellow-500 dark:text-purple-50': (selected.includes('umkm')) }">UMKM</a>
                            </li>
                            <li>
                                <a href="{{ route('user.inventaris') }}"
                                    class="block px-4 !py-2 text-sm text-black rounded hover:bg-purple-100 md:hover:bg-transparent md:border-0 md:hover:text-purple-700 md:p-0 dark:text-purple-400 md:dark:hover:text-white dark:hover:text-white  md:dark:hover:bg-transparent"
                                    :class="{ 'text-yellow-500 dark:text-purple-50': (selected.includes('inventaris')) }">Inventaris</a>
                            </li>
                            <li>
                                <a href="{{ route('user.layanan') }}"
                                    class="block px-4 !py-2 text-sm text-black rounded hover:bg-purple-100 md:hover:bg-transparent md:border-0 md:hover:text-purple-700 md:p-0 dark:text-purple-400 md:dark:hover:text-white dark:hover:text-white  md:dark:hover:bg-transparent"
                                    :class="{ 'text-yellow-500 dark:text-purple-50': (selected.includes('layanan')) }">Layanan</a>
                            </li>
                            <li>
                                <a href="{{ route('user.aspirasi') }}"
                                    class="block px-4 !py-2 text-sm text-black rounded hover:bg-purple-100 md:hover:bg-transparent md:border-0 md:hover:text-purple-700 md:p-0 dark:text-purple-400 md:dark:hover:text-white dark:hover:text-white  md:dark:hover:bg-transparent"
                                    :class="{ 'text-yellow-500 dark:text-purple-50': (selected.includes('aspirasi')) }">Aspirasi</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>
