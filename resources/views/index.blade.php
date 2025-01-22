<x-layout>
    <!-- image slider -->
    <div id="default-carousel" class="relative w-full h-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-[915px] md:h-[500px] overflow-hidden ">
            @foreach ($banners as $banner)
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{asset('storage/' . $banner->image)}}" class="absolute block w-full h-full object-fill"
                        alt="...">
                </div>
            @endforeach
            <!--<div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{asset('image/Selamat-datang.jpg')}}" class="absolute block w-full h-full object-fill" alt="...">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{asset('image/Pengaduan-Pelanggan.jpg')}}" class="absolute block w-full h-full object-fill" alt="...">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{asset('image/Prosedur-Pendaftaran-SR.jpg')}}" class="absolute block w-full h-full object-fill" alt="...">
        </div> -->
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                data-carousel-slide-to="2"></button>
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
    <div class="ml-8 mr-8 py-4 pt-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach ($posts as $post)
                <!-- Berita Item -->
                <!-- <div
                    class="flex flex-col md:flex-row bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <div class="flex items-center w-55">
                        <img class="object-cover h-40"
                            src="{{asset('storage/' . $post->image)}}" alt="">
                    </div>
                    <div class="flex flex-col justify-between p-4 leading-normal w-1/2 md:w-2/3">
                        <a href="#">
                        <div class="flex justify-center items-center h-full">
                                <p class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{$post->title}}
                                </p>
                            </div>
                        </a>
                        <div class="flex flex-wrap block bg-black bg-opacity-10 gap-2 h-10 items-center text-sm mb-3">
                            <span class="flex items-center gap-1 ml-2">
                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.99977 7.25C5.72977 7.25 5.26977 3.81 5.26977 3.81C4.99977 2.02 5.81977 0 7.96977 0C10.1298 0 10.9498 2.02 10.6798 3.81C10.6798 3.81 10.2698 7.25 7.99977 7.25ZM7.99977 9.82L10.7198 8C13.1098 8 15.2398 10.33 15.2398 12.53V15.02C15.2398 15.02 11.5898 16.15 7.99977 16.15C4.34977 16.15 0.759766 15.02 0.759766 15.02V12.53C0.759766 10.28 2.69977 8.05 5.22977 8.05L7.99977 9.82Z"
                                        fill="#121212" />
                                </svg>
                                {{$post->category->name}}
                            </span>

                            <span class="flex items-center gap-1 ml-2">
                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.99977 7.25C5.72977 7.25 5.26977 3.81 5.26977 3.81C4.99977 2.02 5.81977 0 7.96977 0C10.1298 0 10.9498 2.02 10.6798 3.81C10.6798 3.81 10.2698 7.25 7.99977 7.25ZM7.99977 9.82L10.7198 8C13.1098 8 15.2398 10.33 15.2398 12.53V15.02C15.2398 15.02 11.5898 16.15 7.99977 16.15C4.34977 16.15 0.759766 15.02 0.759766 15.02V12.53C0.759766 10.28 2.69977 8.05 5.22977 8.05L7.99977 9.82Z"
                                        fill="#121212" />
                                </svg>
                                {{$post->user->name}}
                            </span>

                            <span class="flex items-center gap-1 ml-2">
                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.99977 7.25C5.72977 7.25 5.26977 3.81 5.26977 3.81C4.99977 2.02 5.81977 0 7.96977 0C10.1298 0 10.9498 2.02 10.6798 3.81C10.6798 3.81 10.2698 7.25 7.99977 7.25ZM7.99977 9.82L10.7198 8C13.1098 8 15.2398 10.33 15.2398 12.53V15.02C15.2398 15.02 11.5898 16.15 7.99977 16.15C4.34977 16.15 0.759766 15.02 0.759766 15.02V12.53C0.759766 10.28 2.69977 8.05 5.22977 8.05L7.99977 9.82Z"
                                        fill="#121212" />
                                </svg>
                                {{\Carbon\Carbon::parse($post->published_at)->format('d-m-Y')}}
                            </span>
                        </div>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{!! $post->shortBody() !!}</p>
                    </div>
                </div> -->
                <a href="/post/{{$post['id']}}" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="object-fill w-50 rounded-t-lg h-30 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="{{asset('storage/'. $post->image)}}" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$post->title}}</h5>
        <div class="flex flex-wrap block bg-black bg-opacity-10 gap-2 h-10 items-center text-sm mb-3">
                            <span class="flex items-center gap-1 ml-2">
                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.99977 7.25C5.72977 7.25 5.26977 3.81 5.26977 3.81C4.99977 2.02 5.81977 0 7.96977 0C10.1298 0 10.9498 2.02 10.6798 3.81C10.6798 3.81 10.2698 7.25 7.99977 7.25ZM7.99977 9.82L10.7198 8C13.1098 8 15.2398 10.33 15.2398 12.53V15.02C15.2398 15.02 11.5898 16.15 7.99977 16.15C4.34977 16.15 0.759766 15.02 0.759766 15.02V12.53C0.759766 10.28 2.69977 8.05 5.22977 8.05L7.99977 9.82Z"
                                        fill="#121212" />
                                </svg>
                                {{$post->category->name}}
                            </span>

                            <span class="flex items-center gap-1 ml-2">
                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.99977 7.25C5.72977 7.25 5.26977 3.81 5.26977 3.81C4.99977 2.02 5.81977 0 7.96977 0C10.1298 0 10.9498 2.02 10.6798 3.81C10.6798 3.81 10.2698 7.25 7.99977 7.25ZM7.99977 9.82L10.7198 8C13.1098 8 15.2398 10.33 15.2398 12.53V15.02C15.2398 15.02 11.5898 16.15 7.99977 16.15C4.34977 16.15 0.759766 15.02 0.759766 15.02V12.53C0.759766 10.28 2.69977 8.05 5.22977 8.05L7.99977 9.82Z"
                                        fill="#121212" />
                                </svg>
                                {{$post->user->name}}
                            </span>

                            <span class="flex items-center gap-1 ml-2">
                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.99977 7.25C5.72977 7.25 5.26977 3.81 5.26977 3.81C4.99977 2.02 5.81977 0 7.96977 0C10.1298 0 10.9498 2.02 10.6798 3.81C10.6798 3.81 10.2698 7.25 7.99977 7.25ZM7.99977 9.82L10.7198 8C13.1098 8 15.2398 10.33 15.2398 12.53V15.02C15.2398 15.02 11.5898 16.15 7.99977 16.15C4.34977 16.15 0.759766 15.02 0.759766 15.02V12.53C0.759766 10.28 2.69977 8.05 5.22977 8.05L7.99977 9.82Z"
                                        fill="#121212" />
                                </svg>
                                {{\Carbon\Carbon::parse($post->published_at)->format('F j, Y')}}
                            </span>
                            @if($post->comments_enabled==1)
                            <span class="flex items-center gap-1 ml-2">
                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.99977 7.25C5.72977 7.25 5.26977 3.81 5.26977 3.81C4.99977 2.02 5.81977 0 7.96977 0C10.1298 0 10.9498 2.02 10.6798 3.81C10.6798 3.81 10.2698 7.25 7.99977 7.25ZM7.99977 9.82L10.7198 8C13.1098 8 15.2398 10.33 15.2398 12.53V15.02C15.2398 15.02 11.5898 16.15 7.99977 16.15C4.34977 16.15 0.759766 15.02 0.759766 15.02V12.53C0.759766 10.28 2.69977 8.05 5.22977 8.05L7.99977 9.82Z"
                                        fill="#121212" />
                                </svg>
                                Komentar
                            </span>
                            @endif

                        </div>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{!! $post->shortBody() !!}</p>
    </div>
</a>
            @endforeach
        </div>
    </div>
</x-layout>