<x-layout>
<div class="flex flex-col font-poppins">
    <div class="h-[315px] relative">
      <img src="{{ asset('storage/background/bg-baru.jpg') }}" class="object-cover w-full">
      <div class="absolute top-1/4 left-10 text-white">
        <p class="font-extrabold leading-none text-left font-poppins profil">Hasil Pencarian: "{{ $keyword }}"</p>
        <div class="block bg-white w-100 h-1 my-4"></div>
      </div>
    </div>

    <!-- konten -->
    <div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mx-10">
        
        <!-- sidebar kategori -->
        <div class="flex flex-col mb-8 ">
          <div>
            <ul>
              <li class="font-bold text-2xl text-black mb-4">Kategori</li>
              @foreach ($categories as $cat)
              <a href="{{ route('berita.kategori', $cat->slug) }}">
                <li class="list-profil flex flex-row items-center mb-2 {{ request()->is('berita/kategori/'.$cat->slug) ? 'font-semibold text-blue-600' : '' }}">
                  <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.157 7.71114L1.5 13.3681L0.0859985 11.9541L5.036 7.00414L0.0859985 2.05414L1.5 0.640137L7.157 6.29714C7.34447 6.48466 7.44978 6.73897 7.44978 7.00414C7.44978 7.2693 7.34447 7.52361 7.157 7.71114Z" fill="#6E6A6A"/>
                  </svg>
                  <span class="pl-2">{{ $cat->name }}</span>
                </li>
              </a>
              @endforeach

              <a href="{{ route('berita') }}">
                <li class="list-profil flex flex-row items-center mb-2">
                  <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.157 7.71114L1.5 13.3681L0.0859985 11.9541L5.036 7.00414L0.0859985 2.05414L1.5 0.640137L7.157 6.29714C7.34447 6.48466 7.44978 6.73897 7.44978 7.00414C7.44978 7.2693 7.34447 7.52361 7.157 7.71114Z" fill="#6E6A6A"/>
                  </svg>
                  <span class="pl-2">Semua</span>
                </li>
              </a>
            </ul>
          </div>
        </div>

        <!-- hasil pencarian posts -->
        <div class="col-span-2 ml-4">
          @if ($posts->count())
            @foreach ($posts as $post)
              <a href="/post/{{ $post->id }}">
                <div class="flex flex-row gap-x-4 mb-8">
                  <div class="w-1/2">
                      <img class="h-48 w-full object-cover rounded-md" src="{{ asset('storage/'.$post->image) }}" alt="Post image">
                  </div>
                  <div class="w-1/2 flex flex-col">
                    <div class="all-posts-title">{{ $post->shortTitle2() }}</div>
                    <div class="flex flex-row items-center mt-2 text-gray-500 text-sm">
                      <svg width="14" height="14" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-1">
                        <path d="M15 1.5H10.9965V0.5C10.9965 0.224 10.7727 0 10.4965 0C10.2203 0 9.9965 0.224 9.9965 0.5V1.5H5.9965V0.5C5.9965 0.224 5.77275 0 5.4965 0C5.22025 0 4.9965 0.224 4.9965 0.5V1.5H1C0.44775 1.5 0 1.94775 0 2.5V15C0 15.5522 0.44775 16 1 16H15C15.5522 16 16 15.5522 16 15V2.5C16 1.94775 15.5522 1.5 15 1.5ZM15 15H1V2.5H15V15Z" fill="#6E6A6A"/>
                      </svg>
                      <span>{{ \Carbon\Carbon::parse($post->published_at)->format('d F Y') }}</span>
                    </div>
                  </div>
                </div>
              </a>
            @endforeach
            {{ $posts->links() }}
          @else
            <div class="text-center text-gray-500 text-lg mt-10">
              Mohon maaf, pencarian Anda tidak ditemukan.
            </div>
          @endif
        </div>

      </div>
    </div>
</div>
</x-layout>
