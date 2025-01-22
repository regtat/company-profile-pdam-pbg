<x-layout>
    <section class="relative ">
        <img src="{{asset('image/image.png')}}" alt="" class="w-full h-auto object-cover " style="z-index:-1">
        <!-- content -->
        <h1 class="absolute inset-0 ml-10 mt-10 mb-10 text-xl font-extrabold leading-none text-white text-left md:text-2xl lg:text-6xl"
            style="font-weight: 700; font-size: 35px; color: #FFFFFF; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); text-decoration: underline; text-underline-offset: 8px;">
            Abonemen
        </h1>
        <div class="absolute inset-0 mt-36 flex flex-col items-center space-y-8 px-5 sm:px-8 md:px-12">
            <img src="{{asset('image/tarif-abonemen.png')}}" class="rounded-lg" />
            <span>Tarif Abonemen PDAM Kabuapten Purbalingga</span>
        </div>
    </section>
</x-layout>