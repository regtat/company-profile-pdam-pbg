<x-layout>
    <section class="relative">
        <img src="{{asset('image/bg-image-pdam-1.jpg')}}" alt="" class="w-full h-auto object-fill" style="z-index:-1">
        <ul class="absolute inset-0 ml-16">
            <li>
                <b>
                    <h1 class="mt-16 mb-10 text-xl font-extrabold leading-none text-white text-left md:text-xl lg:text-6xl"
                        style="font-weight: 700; font-size: 35px; color: #FFFFFF; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); text-decoration: underline; text-underline-offset: 8px;">
                        Pelanggan</h1>
                </b>
            </li>

            <a href="{{ route('pelanggan.abonemen') }}">
                <li>
                    <p
                        style="font-weight: 700; font-size: 26px; color: #FFFFFF; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                        Abonemen</p>
                </li>
            </a>
            <a href="{{ route('pelanggan.tarif-dasar') }}">
                <li>
                    <p
                        style="font-weight: 700; font-size: 26px; color: #FFFFFF; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                        Tarif Dasar</p>
                </li>
            </a>
            <a href="{{ route('pelanggan.informasi-pelanggan')}}">
                <li>
                    <p
                        style="font-weight: 700; font-size: 26px; color: #FFFFFF; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                        Informasi Pelanggan</p>
                </li>
            </a>
        </ul>

    </section>
</x-layout>