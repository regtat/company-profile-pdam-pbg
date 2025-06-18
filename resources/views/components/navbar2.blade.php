<nav class="w-full z-50 text-white" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <div class="flex flex-row items-center">
                <img class="h-20 w-20" src="{{asset('storage/logo tirta perwira.png')}}" alt="PDAM Purbalingga">
                <div class="flex flex-col text-center ml-7">
                    <span class="font-bold text-3xl md:text-md sm:text-sm brand-name font-teachers">Tirta Perwira</span>
                    <span class="slogan font-raleway">Kami Siap Melayani Anda</span>
                </div>
            </div>
            <div class="flex flex-row">
                <div class="hidden md:block space-x-10 text-md">
                    <a href="{{ route('index') }}" :active="request()->routeIs('index')">Beranda</a>
                    <button id="dropdownHoverProfilButton" data-dropdown-toggle="dropdownHoverProfil"
                        data-dropdown-trigger="hover"
                        class="text-white font-medium rounded-lg text-md py-2 inline-flex items-center"
                        type="button">Profil <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownHoverProfil"
                        class="z-50 hidden dropdown-color divide-y divide-gray-100 rounded-lg shadow-sm w-25 dark:bg-gray-700">
                        <ul class="text-md text-white dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                            <li>
                                <a href="{{ route('profil.visi-misi') }}"
                                    :active="request()->routeIs('profil.visi-misi')"
                                    class="block px-2 py-2 dropdown-color-hover dark:hover:bg-gray-600 dark:hover:text-white rounded-md">Visi
                                    Misi</a>
                            </li>
                            <li>
                                <a href="{{ route('profil.sejarah-perusahaan') }}"
                                    :active="request()->routeIs('profil.sejarah-perusahaan')"
                                    class="block px-2 py-2 dropdown-color-hover dark:hover:bg-gray-600 dark:hover:text-white rounded-md">Sejarah</a>
                            </li>
                            <li>
                                <a href="{{ route('profil.struktur-organisasi') }}"
                                    :active="request()->routeIs('profil.struktur-organisasi')"
                                    class="block px-2 py-2 dropdown-color-hover dark:hover:bg-gray-600 dark:hover:text-white rounded-md">Struktur
                                    Organisasi</a>
                            </li>
                            <li>
                                <a href="{{ route('profil.profil-cabang-dan-unit-ikk') }}"
                                    :active="request()->routeIs('profil.profil-cabang-dan-unit-ikk')"
                                    class="block px-2 py-2 dropdown-color-hover dark:hover:bg-gray-600 dark:hover:text-white rounded-md">Profil
                                    Cabang</a>
                            </li>
                        </ul>
                    </div>

                    <button id="dropdownHoverPelayananButton" data-dropdown-toggle="dropdownHoverPelayanan"
                        data-dropdown-trigger="hover"
                        class="text-white py-2 font-medium rounded-lg text-md inline-flex items-center dark:bg-blue-600"
                        type="button">Pelayanan <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownHoverPelayanan"
                        class="z-50 hidden dropdown-color divide-y divide-gray-100 rounded-lg shadow-sm w-23 dark:bg-gray-700">
                        <ul class="text-md text-white dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="https://tagihan.pdampurbalingga.co.id/"
                                    class="block px-2 py-1.5 dropdown-color-hover rounded-md">Cek Tagihan</a>
                            </li>
                            <li>
                                <a href="https://pengaduan.pdampurbalingga.co.id/"
                                    class="block px-2 py-1.5 dropdown-color-hover rounded-md">Pengaduan</a>
                            </li>
                        </ul>
                    </div>

                    <button id="dropdownHoverPelangganButton" data-dropdown-toggle="dropdownHoverPelanggan"
                        data-dropdown-trigger="hover"
                        class="text-white font-medium rounded-lg py-2 text-md inline-flex items-center dark:bg-blue-600"
                        type="button">Pelanggan <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownHoverPelanggan"
                        class="z-50 hidden dropdown-color divide-y divide-gray-100 rounded-lg shadow-sm w-23 dark:bg-gray-700">
                        <ul class="text-md text-white dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="{{ route('pelanggan.abonemen') }}"
                                    :active="request()->routeIs('pelanggan.abonemen')"
                                    class="block px-2 py-1.5 dropdown-color-hover rounded-md">Abonemen</a>
                            </li>
                            <li>
                                <a href="{{ route('pelanggan.tarif-dasar') }}"
                                    :active="request()->routeIs('pelanggan.tarif-dasar')"
                                    class="block px-2 py-1.5 dropdown-color-hover rounded-md">Tarif Dasar</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex items-center pl-10">
                    <!-- cari -->
                    <!-- Tombol toggle untuk membuka modal -->
                    <button data-modal-target="search-modal" data-modal-toggle="search-modal" type="button">
                        <svg width="22" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.32835 5.706e-07C7.86834 0.000725195 6.42888 0.319492 5.12566 0.93068C3.82244 1.54187 2.69181 2.42843 1.82464 3.51911C0.957473 4.60979 0.377955 5.87417 0.132665 7.21061C-0.112624 8.54706 -0.0168443 9.91831 0.412308 11.2141C0.84146 12.51 1.59201 13.6942 2.60364 14.6718C3.61527 15.6493 4.85977 16.3928 6.23709 16.8425C7.61442 17.2923 9.08616 17.4357 10.534 17.2613C11.9819 17.0869 13.3655 16.5995 14.5737 15.8383L20.3417 21.19C20.5019 21.3497 20.6951 21.4777 20.9098 21.5665C21.1244 21.6553 21.3562 21.7031 21.5911 21.7069C21.8261 21.7108 22.0595 21.6707 22.2774 21.5889C22.4953 21.5072 22.6933 21.3856 22.8594 21.2312C23.0256 21.0769 23.1566 20.8931 23.2446 20.6908C23.3326 20.4885 23.3759 20.2717 23.3717 20.0535C23.3676 19.8353 23.3161 19.6202 23.2205 19.4208C23.1249 19.2215 22.9869 19.0421 22.815 18.8933L17.0517 13.5373C18.0052 12.2343 18.5581 10.7145 18.651 9.14146C18.744 7.56843 18.3734 6.00162 17.5792 4.6095C16.785 3.21738 15.5971 2.05262 14.1434 1.24045C12.6896 0.428284 11.0249 -0.000571006 9.32835 5.706e-07ZM3.49501 8.66667C3.49501 7.23008 4.10959 5.85233 5.20356 4.83651C6.29752 3.82068 7.78125 3.25 9.32835 3.25C10.8754 3.25 12.3592 3.82068 13.4531 4.83651C14.5471 5.85233 15.1617 7.23008 15.1617 8.66667C15.1617 10.1033 14.5471 11.481 13.4531 12.4968C12.3592 13.5127 10.8754 14.0833 9.32835 14.0833C7.78125 14.0833 6.29752 13.5127 5.20356 12.4968C4.10959 11.481 3.49501 10.1033 3.49501 8.66667Z"
                                fill="white" />
                        </svg>

                    </button>

                    <!-- Modal Pencarian -->
                    <div id="search-modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-3xl max-h-full">
                            <!-- Konten Modal -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Isi Modal -->
                                <form action="{{ route('search') }}" method="GET" class="p-4 md:p-5 space-y-4">
                                    @csrf
                                    <!-- Input teks -->
                                    <input type="text" name="keyword" placeholder="CARI..."
                                        class="w-full flex items-center border border-gray-300 rounded-lg px-3 py-2 bg-gray-200 dark:bg-gray-800 dark:border-gray-600 text-gray-800"
                                        required>
                                    <!-- Footer tombol -->
                                    <div class="flex justify-end">
                                        <button data-modal-hide="search-modal" type="button"
                                            class="text-gray-900 bg-gray-400 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:dropdown-color-hover ">
                                            Batal
                                        </button>
                                        <button type="submit"
                                            class="search-button focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:dark:focus:ring-blue-800">
                                            Cari
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- <a href="/">
                            <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.32835 5.706e-07C7.86834 0.000725195 6.42888 0.319492 5.12566 0.93068C3.82244 1.54187 2.69181 2.42843 1.82464 3.51911C0.957473 4.60979 0.377955 5.87417 0.132665 7.21061C-0.112624 8.54706 -0.0168443 9.91831 0.412308 11.2141C0.84146 12.51 1.59201 13.6942 2.60364 14.6718C3.61527 15.6493 4.85977 16.3928 6.23709 16.8425C7.61442 17.2923 9.08616 17.4357 10.534 17.2613C11.9819 17.0869 13.3655 16.5995 14.5737 15.8383L20.3417 21.19C20.5019 21.3497 20.6951 21.4777 20.9098 21.5665C21.1244 21.6553 21.3562 21.7031 21.5911 21.7069C21.8261 21.7108 22.0595 21.6707 22.2774 21.5889C22.4953 21.5072 22.6933 21.3856 22.8594 21.2312C23.0256 21.0769 23.1566 20.8931 23.2446 20.6908C23.3326 20.4885 23.3759 20.2717 23.3717 20.0535C23.3676 19.8353 23.3161 19.6202 23.2205 19.4208C23.1249 19.2215 22.9869 19.0421 22.815 18.8933L17.0517 13.5373C18.0052 12.2343 18.5581 10.7145 18.651 9.14146C18.744 7.56843 18.3734 6.00162 17.5792 4.6095C16.785 3.21738 15.5971 2.05262 14.1434 1.24045C12.6896 0.428284 11.0249 -0.000571006 9.32835 5.706e-07ZM3.49501 8.66667C3.49501 7.23008 4.10959 5.85233 5.20356 4.83651C6.29752 3.82068 7.78125 3.25 9.32835 3.25C10.8754 3.25 12.3592 3.82068 13.4531 4.83651C14.5471 5.85233 15.1617 7.23008 15.1617 8.66667C15.1617 10.1033 14.5471 11.481 13.4531 12.4968C12.3592 13.5127 10.8754 14.0833 9.32835 14.0833C7.78125 14.0833 6.29752 13.5127 5.20356 12.4968C4.10959 11.481 3.49501 10.1033 3.49501 8.66667Z" fill="white"/>
                            </svg>
                        </a> -->
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button" @click="isOpen = !isOpen"
                    class="relative inline-flex items-center justify-center rounded-md bg-gray-900 p-2 text-white dropdown-color-hover   focus:outline-none"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg :class="{'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg :class="{'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen" class="md:hidden text-white" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <a href="{{route('index')}}"
                class="dropdown-color-hover text-white block rounded-md px-3 py-1.5 text-base font-medium"
                aria-current="page">Beranda</a>
            <!-- Dropdown Profil -->
            <div x-data="{ openProfil: false }">
                <button @click="openProfil = !openProfil"
                    class="w-full flex justify-between items-center text-left dropdown-color-hover  hover:text-white block rounded-md px-3 py-1.5 text-base font-medium">
                    Profil <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <div x-show="openProfil" class="pl-6 space-y-1">
                    <a href="{{ route('profil.visi-misi') }}"
                        class="block dropdown-color-hover  hover:text-white rounded-md px-3 py-1.5 text-sm">Visi
                        Misi</a>
                    <a href="{{ route('profil.sejarah-perusahaan') }}"
                        class="block dropdown-color-hover  hover:text-white rounded-md px-3 py-1.5 text-sm">Sejarah</a>
                    <a href="{{ route('profil.struktur-organisasi') }}"
                        class="block dropdown-color-hover  hover:text-white rounded-md px-3 py-1.5 text-sm">Struktur
                        Organisasi</a>
                    <a href="{{ route('profil.profil-cabang-dan-unit-ikk') }}"
                        class="block dropdown-color-hover  hover:text-white rounded-md px-3 py-1.5 text-sm">Profil
                        Cabang</a>
                </div>
            </div>

            <!-- Dropdown Pelayanan -->
            <div x-data="{ openPelayanan: false }">
                <button @click="openPelayanan = !openPelayanan"
                    class="w-full flex justify-between items-center text-left dropdown-color-hover  hover:text-white block rounded-md px-3 py-1.5 text-base font-medium">
                    Pelayanan <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <div x-show="openPelayanan" class="pl-6 space-y-1">
                    <a href="https://tagihan.pdampurbalingga.co.id/"
                        class="block dropdown-color-hover  hover:text-white rounded-md px-3 py-1.5 text-sm">Cek
                        Tagihan</a>
                    <a href="https://pengaduan.pdampurbalingga.co.id/"
                        class="block dropdown-color-hover  hover:text-white rounded-md px-3 py-1.5 text-sm">Pengaduan</a>
                </div>
            </div>

            <!-- Dropdown Pelanggan -->
            <div x-data="{ openPelanggan: false }">
                <button @click="openPelanggan = !openPelanggan"
                    class="w-full flex justify-between items-center text-left dropdown-color-hover  hover:text-white block rounded-md px-3 py-1.5 text-base font-medium">
                    Pelanggan <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <div x-show="openPelanggan" class="pl-6 space-y-1">
                    <a href="{{ route('pelanggan.abonemen') }}"
                        class="block dropdown-color-hover  hover:text-white rounded-md px-3 py-1.5 text-sm">Abonemen</a>
                    <a href="{{ route('pelanggan.tarif-dasar') }}"
                        class="block dropdown-color-hover  hover:text-white rounded-md px-3 py-1.5 text-sm">Tarif
                        Dasar</a>
                </div>
            </div>
        </div>
        <!-- <div class="border-t border-gray-700 pb-3 pt-4">
        </div> -->
    </div>
</nav>