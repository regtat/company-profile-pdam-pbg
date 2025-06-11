<x-layout>
    <section class="relative" >
        <img src="{{asset('storage/background/bg-pelanggan.jpg')}}" alt="" class="w-full h-auto object-cover" style="z-index:-1">
        <ul class="overlay">
            <li>
                <p
                    class="font-extrabold leading-none text-left font-poppins profil">
                    Pelanggan</p>
            </li>
            <a href="{{ route('pelanggan.abonemen') }}">
                <li class="menu-profil">
                    <p class="pl-4 font-poppins">Abonemen</p>
                </li>
            </a>
            <a href="{{ route('pelanggan.tarif-dasar') }}">
                <li class="menu-profil">
                    <p class="pl-4 font-poppins">Tarif Dasar</p>
                </li>
            </a>
        </ul>

    </section>
</x-layout>