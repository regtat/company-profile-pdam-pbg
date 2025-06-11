<header class="shadow">
    <div class="container px-4 py-2 flex items-center justify-between header">
        <!-- logo -->
        <a href="/">
            <img class="" src="{{asset('storage/logo tirta perwira.png')}}" alt="PDAM Purbalingga">
        </a>
        <div class="flex flex-col items-center mx-auto font-teachers">
            <p class="text-white text-center font-bold text-2xl md:text-md sm:text-sm ml-17">
                Tirta Perwira</p>
            <span class="text-white text-lg md:text-md sm:text-sm lg:text-lg ml-17">Kami
                Siap Melayani Anda</span>
        </div>
    </div>
</header>
<nav class="shadow flex items-center justify-between px-10 py-2 dark:bg-gray-900 font-poppins">
    <button data-collapse-toggle="navbar-default" type="button"
        class="items-center p-2 w-10 md:w-7 sm:w-4 h-10 md:h-7 sm:h-4 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
        aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M1 1h15M1 7h15M1 13h15" />
        </svg>
    </button>

    <div class="flex items-center space-x-6 hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="flex text-lg md:text-md sm:text-sm lg:text-lg flex-col md:p-0 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0" style="text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25)">
            <li>
                <a class="hover:text-gray-500 {{ Request::is('/') ? 'font-bold' : '' }} md:bg-transparent md:text-black md:p-0 dark:text-white md:dark:text-gray-500"
                    aria-current="page" href="/">Beranda</a>
            </li>
            <li>
                <a class="hover:text-gray-500 {{ Request::routeIs('profil') || Request::routeIs('profil.visi-misi') || Request::routeIs('profil.sejarah-perusahaan') || Request::routeIs('profil.struktur-organisasi') || Request::routeIs('profil.profil-cabang-dan-unit-ikk') ? 'font-bold' : '' }} md:bg-transparent md:text-black md:p-0 dark:text-white md:dark:text-gray-500"
                    href="{{route('profil')}}">Profil</a>
            </li>
            <li>
                <a class="hover:text-gray-500 {{ Request::is('pelayanan') ? 'font-bold' : '' }} md:bg-transparent md:text-black md:p-0 dark:text-white md:dark:text-gray-500"
                    href="{{route('pelayanan')}}">Pelayanan</a>
            </li>
            <li>
                <a class="hover:text-gray-500 {{ Request::routeIs('pelanggan') || Request::routeIs('pelanggan.abonemen') || Request::routeIs('pelanggan.tarif-dasar') || Request::routeIs('pelanggan.informasi-pelanggan') ? 'font-bold' : '' }} md:bg-transparent md:text-black md:p-0 dark:text-white md:dark:text-gray-500"
                    href="/pelanggan">Pelanggan</a>
            </li>
        </ul>
        <!-- <a class="hover:text-gray-500" href="#">Galeri</a>
            <a class="hover:text-gray-500" href="#">Kontak</a> -->
    </div>
<div>
            <form class="flex items-center max-w-sm mx-auto" method="GET" action="{{ url('/search') }}">
                @if(request('category'))
                <input type="hidden" name="category" value="{{request('category')}}">
                @endif
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">

                    <input type="text" id="simple-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-4 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Cari..." name="search" />
                </div>
                <button type="submit"
                    style="background-color: #1856DE;" class="p-2.5 ms-2 text-sm font-medium text-white rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Cari</span>
                </button>
            </form>
            </div>
</nav>
