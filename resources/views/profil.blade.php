<x-layout>
    <section class="relative" >
        <img src="{{asset('storage/background/bg-depan.jpg')}}" alt="" class="w-full h-auto object-cover" style="z-index:-1">
        <ul class="overlay">
            <li>
                <p
                    class="font-extrabold leading-none text-left font-poppins profil">
                    Profil</p>
            </li>
            <a href="{{ route('profil.visi-misi') }}">
                <li class="menu-profil">
                    <p class="pl-3 font-poppins">Visi Misi</p>
                </li>
            </a>
            <a href="{{ route('profil.sejarah-perusahaan') }}">
                <li class="menu-profil">
                    <p class="pl-3 font-poppins">Sejarah Perusahaan</p>
                </li>
            </a>
            <a href="{{ route('profil.struktur-organisasi')}}">
                <li class="menu-profil">
                    <p class="pl-3 font-poppins">Struktur Organisasi</p>
                </li>
            </a>
            <a href="{{ route('profil.profil-cabang-dan-unit-ikk')}}">
                <li class="menu-profil">
                    <p class="pl-3 font-poppins" ">Profil Cabang & Unit IKK</p>
                </li>
            </a>
        </ul>

    </section>
</x-layout>