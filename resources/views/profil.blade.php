<x-layout>
    <section class="relative">
        <img src="{{asset('storage/background/bg-image-pdam-1.jpg')}}" alt="" class="w-full h-auto object-fill" style="z-index:-1">
        <ul class="absolute inset-0 ml-16 text-white">
            <li>
                <p
                    class="mt-16 mb-10 text-xl font-extrabold leading-none text-left md:text-xl lg:text-6xl font-poppins" style="font-size: 35px; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); text-decoration: underline; text-underline-offset: 8px;">
                    Profil</p>
            </li>
            <a href="{{ route('profil.visi-misi') }}">
                <li>
                    <p class="font-poly mb-2" style="font-weight: 400; font-size: 30px; text-shadow: 12px 6px 2px rgba(0, 0, 0, 0.25);">Visi Misi</p>
                </li>
            </a>
            <a href="{{ route('profil.sejarah-perusahaan') }}">
                <li>
                    <p class="font-poly mb-2" style="font-weight: 400; font-size: 30px; text-shadow: 12px 6px 2px rgba(0, 0, 0, 0.25);">Sejarah Perusahaan</p>
                </li>
            </a>
            <a href="{{ route('profil.struktur-organisasi')}}">
                <li>
                    <p class="font-poly mb-2" style="font-weight: 400; font-size: 30px; text-shadow: 12px 6px 2px rgba(0, 0, 0, 0.25);">Struktur Organisasi</p>
                </li>
            </a>
            <a href="{{ route('profil.profil-cabang-dan-unit-ikk')}}">
                <li>
                    <p class="font-poly mb-2" style="font-weight: 400; font-size: 30px; text-shadow: 12px 6px 2px rgba(0, 0, 0, 0.25);">Profil Cabang dan Unit IKK</p>
                </li>
            </a>
        </ul>

    </section>
</x-layout>