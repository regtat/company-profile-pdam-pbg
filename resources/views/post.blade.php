<x-layout>
    <div class="flex flex-col font-poppins">
        <div class="h-[315px] relative">
            <img src="{{ asset('storage/background/bg-baru.jpg') }}" class="object-cover w-full">
            <div class="absolute top-10 left-10 text-white">
                <p class="font-extrabold leading-none text-left font-poppins profil">Artikel & Pengumuman</p>
                <div class="block bg-white w-100 h-1 my-4"></div>
                <p>Semua</p>
            </div>
        </div>
        <div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mx-10">
                <div class="flex flex-col">
                    <div>
                        <ul>
                            <li class="font-bold text-2xl text-black mb-4">KATEGORI</li>
                            @foreach ($category as $cat)
                                <a href="{{ route('berita.kategori', $cat->slug) }}">
                                    <li
                                        class="list-profil flex flex-row items-center mb-2
                                      {{ request()->is('berita/kategori/' . $cat->slug) ? 'font-semibold text-blue-600' : '' }}">
                                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.157 7.71114L1.5 13.3681L0.0859985 11.9541L5.036 7.00414L0.0859985 2.05414L1.5 0.640137L7.157 6.29714C7.34447 6.48466 7.44978 6.73897 7.44978 7.00414C7.44978 7.2693 7.34447 7.52361 7.157 7.71114Z"
                                                fill="#6E6A6A" />
                                        </svg>
                                        <span class="pl-2">{{$cat->name}}</span>
                                    </li>
                                </a>
                            @endforeach
                            <li class="list-profil flex flex-row items-center mb-2">
                                <svg width="8" height="14" viewBox="0 0 8 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.157 7.71114L1.5 13.3681L0.0859985 11.9541L5.036 7.00414L0.0859985 2.05414L1.5 0.640137L7.157 6.29714C7.34447 6.48466 7.44978 6.73897 7.44978 7.00414C7.44978 7.2693 7.34447 7.52361 7.157 7.71114Z"
                                        fill="#6E6A6A" />
                                </svg>
                                <a href="{{ route('berita') }}">
                                    <span class="pl-2">Semua</span></a>
                            </li>
                        </ul>
                        <div>
                            <p class="font-poppins mt-10 flex items-start uppercase text-2xl">Artikel Lainnya</p>
                            <hr class="mt-3 mb-4">
                            @foreach ($artikelLain as $item)
                                <a href="/post/{{$item->id}}">
                                    <div class="flex flex-row gap-x-5 mb-16">
                                        <div class="w-1/2">
                                            <img class="h-32 w-full object-cover rounded-md"
                                                src="{{asset('storage/' . $item->image)}}" alt="Post image">
                                        </div>
                                        <div class="w-1/2 flex flex-col">
                                            <div class="short-title">{{ $item->shortTitle() }}</div>
                                            <div class="date mt-3">
                                                {{Carbon\Carbon::parse($post->published_at)->isoFormat('D MMMM Y')}}</div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-span-2 ml-4">
                    <div class="flex flex-col">
                        <div class="post-title pb-2">{{$post->title}}</div>
                        <div class="flex flex-col">
                            <div class="flex flex-row items-center pb-3">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15 1.49844L10.9965 1.49845V0.501953C10.9965 0.225703 10.7727 0.00195312 10.4965 0.00195312C10.2203 0.00195312 9.9965 0.225703 9.9965 0.501953V1.4982H5.9965V0.501953C5.9965 0.225703 5.77275 0.00195312 5.4965 0.00195312C5.22025 0.00195312 4.9965 0.225703 4.9965 0.501953V1.4982H1C0.44775 1.4982 0 1.94595 0 2.4982V14.9982C0 15.5504 0.44775 15.9982 1 15.9982H15C15.5522 15.9982 16 15.5504 16 14.9982V2.4982C16 1.94619 15.5522 1.49844 15 1.49844ZM15 14.9982H1V2.4982H4.9965V3.00195C4.9965 3.27819 5.22025 3.50195 5.4965 3.50195C5.77275 3.50195 5.9965 3.27819 5.9965 3.00195V2.49845H9.9965V3.0022C9.9965 3.27845 10.2203 3.5022 10.4965 3.5022C10.7727 3.5022 10.9965 3.27845 10.9965 3.0022V2.49845H15V14.9982ZM11.5 7.99844H12.5C12.776 7.99844 13 7.77444 13 7.49844V6.49844C13 6.22244 12.776 5.99844 12.5 5.99844H11.5C11.224 5.99844 11 6.22244 11 6.49844V7.49844C11 7.77444 11.224 7.99844 11.5 7.99844ZM11.5 11.9982H12.5C12.776 11.9982 13 11.7744 13 11.4982V10.4982C13 10.2222 12.776 9.99819 12.5 9.99819H11.5C11.224 9.99819 11 10.2222 11 10.4982V11.4982C11 11.7747 11.224 11.9982 11.5 11.9982ZM8.5 9.99819H7.5C7.224 9.99819 7 10.2222 7 10.4982V11.4982C7 11.7744 7.224 11.9982 7.5 11.9982H8.5C8.776 11.9982 9 11.7744 9 11.4982V10.4982C9 10.2224 8.776 9.99819 8.5 9.99819ZM8.5 5.99844H7.5C7.224 5.99844 7 6.22244 7 6.49844V7.49844C7 7.77444 7.224 7.99844 7.5 7.99844H8.5C8.776 7.99844 9 7.77444 9 7.49844V6.49844C9 6.22219 8.776 5.99844 8.5 5.99844ZM4.5 5.99844H3.5C3.224 5.99844 3 6.22244 3 6.49844V7.49844C3 7.77444 3.224 7.99844 3.5 7.99844H4.5C4.776 7.99844 5 7.77444 5 7.49844V6.49844C5 6.22219 4.776 5.99844 4.5 5.99844ZM4.5 9.99819H3.5C3.224 9.99819 3 10.2222 3 10.4982V11.4982C3 11.7744 3.224 11.9982 3.5 11.9982H4.5C4.776 11.9982 5 11.7744 5 11.4982V10.4982C5 10.2224 4.776 9.99819 4.5 9.99819Z"
                                        fill="black" />
                                </svg>
                                <p class="ml-3 detail-date">
                                    {{\Carbon\Carbon::parse($post->published_at)->format('Y-m-d')}}
                                </p>
                                <p class="ml-5 detail-date">|</p>
                                <svg class="ml-5" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0C5.8 0 4 2.24 4 5C4 7.76 5.8 10 8 10C10.2 10 12 7.76 12 5C12 2.24 10.2 0 8 0ZM3.82 10C1.7 10.1 0 11.84 0 14V16H16V14C16 11.84 14.32 10.1 12.18 10C11.1 11.22 9.62 12 8 12C6.38 12 4.9 11.22 3.82 10Z"
                                        fill="black" />
                                </svg>
                                <p class="ml-3 detail-date">{{$post->user->email}}</p>
                            </div>
                            <div class="pb-4">{{ $post->body }}</div>
                            <div><img src="{{asset('storage/' . $post->image)}}"></div>
                            <div class="my-3 bg-white p-4 shadow-lg w-full">
                                <!-- Komentar -->
                                @livewire('comments-section', ['post' => $post])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>