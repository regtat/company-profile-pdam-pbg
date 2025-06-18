<x-layout>
    <!-- <div id="controls-carousel" class="relative w-full" data-carousel="static">
    Carousel wrapper
    <div class="relative h-96 overflow-hidden md:h-96">
        @foreach ($banners as $index => $banner)
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('storage/' . $banner->image) }}" class="absolute block w-full h-full object-fill"
                        alt="...">
                </div>
            @endforeach
        </div>
    Slider controls
    <button type="button" class="absolute top-0 start-0 z-10 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div> -->

    <div id="default-carousel" class="relative w-full mb-5" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-[696px] overflow-hidden">
            @foreach($banners as $index => $banner)
                <!-- Item {{$index + 1}} -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('storage/' . $banner->image) }}"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="Banner Image {{ $index + 1 }}">
                </div>
            @endforeach
        </div>

        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-9 left-1/2 space-x-3 rtl:space-x-reverse">
            @foreach($banners as $index => $banner)
                <button type="button" class="w-5 h-5 rounded-full" aria-current="{{ $index == 0 ? 'true' : 'false' }}"
                    aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}"></button>
            @endforeach
        </div>

        <!-- Slider controls -->
        <button type="button"
            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    <!-- <img class="flex align-items-center" src="{{asset('image/Selamat-datang.jpg')}}"
        style="display: block; margin-left: auto; margin-right: auto;"> -->

    <!-- berita -->
    <div class="px-4 py-4">
        <div class="columns-1 md:columns-2 sm:columns-1 py-2">
            @foreach ($posts as $post)
                <div class="mx-auto max-w-lg overflow-hidden rounded-xl bg-white shadow-md md:max-w-2xl mb-12">
                    <div class="flex-row">
                        <div class="md:shrink-0 w-full">
                            <img class="rounded-t-lg h-[300px] object-cover w-full"
                                src="{{asset('storage/' . $post->image)}}" alt="" />
                        </div>
                        <div class="px-6 pt-4 pb-7 card-utama">
                            <a href="/post/{{$post['id']}}"
                                class="block text-lg leading-tight font-bold text-black hover:underline">
                                {{$post->title}}
                            </a>
                            <p class="mb-3 mt-2 font-normal text-gray-700 dark:text-gray-400">{!! $post->shortBodyFirst() !!}</p>
                            <a href="/post/{{$post['id']}}"
                                class="flex justify-center w-1/2 md:w-1 inline-block bg-[#00284E] rounded-md text-white text-center py-1 ">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex justify-center py-6">
            <a href="{{route('berita') }}" class="w-1/2 md:w-1 text-center lihat-semua-color text-white py-2">Lihat Semua Artikel & Pengumuman</a>
</div>
    </div>

</x-layout>