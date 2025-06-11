<x-layout>
  <div class="flex flex-col font-poppins">
    <div class="h-[315px] relative">
      <img src="{{ asset('storage/background/bg-baru.jpg') }}" class="object-cover w-full">
      <div class="absolute top-1/4 left-10 text-white">
        <p class="font-extrabold leading-none text-left font-poppins profil">Artikel & Pengumuman</p>
        <div class="block bg-white w-100 h-1 my-4"></div>
        <p>Semua</p>
      </div>
    </div>
    <!-- konten -->
    <div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mx-10">
        <!-- sidebar -->
        <div class="flex flex-col">
          <div>
            <ul>
              <li class="font-bold text-2xl text-black mb-4">Kategori</li>
              @foreach ($categories as $cat)
          <a href="{{ route('berita.kategori', $cat->slug) }}">
          <li class="list-profil flex flex-row items-center mb-2
          {{ request()->is('berita/kategori/' . $cat->slug) ? 'font-semibold text-blue-600' : '' }}">
            <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M7.157 7.71114L1.5 13.3681L0.0859985 11.9541L5.036 7.00414L0.0859985 2.05414L1.5 0.640137L7.157 6.29714C7.34447 6.48466 7.44978 6.73897 7.44978 7.00414C7.44978 7.2693 7.34447 7.52361 7.157 7.71114Z"
              fill="#6E6A6A" />
            </svg>
            <span class="pl-2">{{$cat->name}}</span>
          </li>
          </a>
        @endforeach
              <li class="list-profil flex flex-row items-center mb-2">
                <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M7.157 7.71114L1.5 13.3681L0.0859985 11.9541L5.036 7.00414L0.0859985 2.05414L1.5 0.640137L7.157 6.29714C7.34447 6.48466 7.44978 6.73897 7.44978 7.00414C7.44978 7.2693 7.34447 7.52361 7.157 7.71114Z"
                    fill="#6E6A6A" />
                </svg>
                <span class="pl-2">Semua</span>
              </li>
            </ul>
            <div>
              <!-- <p class="font-poppins mt-10 flex items-start uppercase text-2xl">Artikel Lainnya</p>
          @foreach ($posts as $post)
              <hr class="my-4">
              <a href="/post/{{$post->id}}">
                  <div class="flex flex-row gap-x-4 mb-4">
                      <div class="w-1/2">
                          <img class="h-24 w-full object-cover rounded-md" src="{{asset('storage/'.$post->image)}}" alt="Post image">
                      </div>
                      <div class="w-1/2 flex flex-col">
                        <div class="short-title">{{ $post->shortTitle() }}</div>
                        <div class="date mt-3">{{\Carbon\Carbon::parse($post->published_at)->format('d F Y')}}</div>
                      </div>
                  </div>
              </a>
          @endforeach -->
            </div>
          </div>
        </div>
        <div class="col-span-2 ml-4">
          @foreach ($posts as $post)
        <a href="/post/{{$post->id}}">
        <div class="flex flex-row gap-x-4 mb-8">
          <div class="w-1/2">
          <img class="h-48 w-full object-cover rounded-md" src="{{asset('storage/' . $post->image)}}"
            alt="Post image">
          </div>
          <div class="w-1/2 flex flex-col">
          <div class="all-posts-title">{{ $post->shortTitle2() }}</div>
          <div class="flex flex-row items-center">
            <svg width="14" height="14" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M15 1.49844L10.9965 1.49845V0.501953C10.9965 0.225703 10.7727 0.00195312 10.4965 0.00195312C10.2203 0.00195312 9.9965 0.225703 9.9965 0.501953V1.4982H5.9965V0.501953C5.9965 0.225703 5.77275 0.00195312 5.4965 0.00195312C5.22025 0.00195312 4.9965 0.225703 4.9965 0.501953V1.4982H1C0.44775 1.4982 0 1.94595 0 2.4982V14.9982C0 15.5504 0.44775 15.9982 1 15.9982H15C15.5522 15.9982 16 15.5504 16 14.9982V2.4982C16 1.94619 15.5522 1.49844 15 1.49844ZM15 14.9982H1V2.4982H4.9965V3.00195C4.9965 3.27819 5.22025 3.50195 5.4965 3.50195C5.77275 3.50195 5.9965 3.27819 5.9965 3.00195V2.49845H9.9965V3.0022C9.9965 3.27845 10.2203 3.5022 10.4965 3.5022C10.7727 3.5022 10.9965 3.27845 10.9965 3.0022V2.49845H15V14.9982ZM11.5 7.99844H12.5C12.776 7.99844 13 7.77444 13 7.49844V6.49844C13 6.22244 12.776 5.99844 12.5 5.99844H11.5C11.224 5.99844 11 6.22244 11 6.49844V7.49844C11 7.77444 11.224 7.99844 11.5 7.99844ZM11.5 11.9982H12.5C12.776 11.9982 13 11.7744 13 11.4982V10.4982C13 10.2222 12.776 9.99819 12.5 9.99819H11.5C11.224 9.99819 11 10.2222 11 10.4982V11.4982C11 11.7747 11.224 11.9982 11.5 11.9982ZM8.5 9.99819H7.5C7.224 9.99819 7 10.2222 7 10.4982V11.4982C7 11.7744 7.224 11.9982 7.5 11.9982H8.5C8.776 11.9982 9 11.7744 9 11.4982V10.4982C9 10.2224 8.776 9.99819 8.5 9.99819ZM8.5 5.99844H7.5C7.224 5.99844 7 6.22244 7 6.49844V7.49844C7 7.77444 7.224 7.99844 7.5 7.99844H8.5C8.776 7.99844 9 7.77444 9 7.49844V6.49844C9 6.22219 8.776 5.99844 8.5 5.99844ZM4.5 5.99844H3.5C3.224 5.99844 3 6.22244 3 6.49844V7.49844C3 7.77444 3.224 7.99844 3.5 7.99844H4.5C4.776 7.99844 5 7.77444 5 7.49844V6.49844C5 6.22219 4.776 5.99844 4.5 5.99844ZM4.5 9.99819H3.5C3.224 9.99819 3 10.2222 3 10.4982V11.4982C3 11.7744 3.224 11.9982 3.5 11.9982H4.5C4.776 11.9982 5 11.7744 5 11.4982V10.4982C5 10.2224 4.776 9.99819 4.5 9.99819Z"
              fill="black" />
            </svg>
            <p class="ml-3 detail-post">{{\Carbon\Carbon::parse($post->published_at)->format('Y-m-d')}}</p>
            <p class="ml-3 detail-date">|</p>
            <svg class="ml-3" width="14" height="14" viewBox="0 0 16 16" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M8 0C5.8 0 4 2.24 4 5C4 7.76 5.8 10 8 10C10.2 10 12 7.76 12 5C12 2.24 10.2 0 8 0ZM3.82 10C1.7 10.1 0 11.84 0 14V16H16V14C16 11.84 14.32 10.1 12.18 10C11.1 11.22 9.62 12 8 12C6.38 12 4.9 11.22 3.82 10Z"
              fill="black" />
            </svg>
            <p class="ml-3 detail-post">{{ $post->user->name }}</p>
          </div>
          <div class="all-posts-body">{!! $post->shortBody() !!}</div>
          </div>
        </div>
        </a>
      @endforeach

          <!-- pagination -->
          <div class="flex justify-between mb-7">
            <!-- Previous Button -->
            @if ($posts->onFirstPage())

      @else
            <a href="{{ $posts->previousPageUrl() }}"
              class="flex items-center justify-center px-3 h-8 me-3 text-sm font-medium text-white pagination hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
              <!-- <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
          </svg> -->
              <svg class="pr-2" width="25" height="13" viewBox="0 0 25 13" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M8.86384 2.92404C8.98823 2.8211 9.08802 2.69695 9.15726 2.55898C9.22649 2.42101 9.26375 2.27206 9.26682 2.121C9.26988 1.96995 9.23869 1.81989 9.1751 1.67978C9.11151 1.53967 9.01682 1.41238 8.89669 1.3055C8.77655 1.19862 8.63343 1.11434 8.47586 1.05769C8.3183 1.00103 8.14951 0.973172 7.97957 0.975762C7.80964 0.978352 7.64203 1.01134 7.48675 1.07276C7.33148 1.13418 7.19171 1.22277 7.0758 1.33325L1.58926 6.20582L0.692844 7.00042L1.58687 7.79582L7.06908 12.6732C7.30758 12.8784 7.62717 12.9921 7.95901 12.9898C8.29086 12.9875 8.60841 12.8695 8.84327 12.6611C9.07813 12.4527 9.21151 12.1706 9.21468 11.8757C9.21785 11.5807 9.09056 11.2964 8.86022 11.084L5.53716 8.12757L23.0517 8.13534C23.3874 8.13548 23.7094 8.0171 23.9468 7.80623C24.1842 7.59535 24.3177 7.30927 24.3178 7.0109C24.318 6.71253 24.1848 6.42632 23.9475 6.21524C23.7102 6.00415 23.3884 5.88548 23.0527 5.88534L5.53815 5.87757L8.86384 2.92404Z"
                fill="white" />
              </svg>
              Sebelumnya
            </a>
      @endif

            <!-- Next Button -->
            @if ($posts->hasMorePages())
            <a href="{{ $posts->nextPageUrl() }}"
              class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white pagination hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
              Selanjutnya
              <!-- <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
          </svg> -->
              <svg class="pl-2" width="25" height="13" viewBox="0 0 25 13" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M16.1433 10.0798C16.019 10.1828 15.9192 10.307 15.8501 10.445C15.7809 10.583 15.7437 10.732 15.7407 10.8831C15.7377 11.0341 15.769 11.1842 15.8326 11.3242C15.8963 11.4643 15.991 11.5916 16.1112 11.6984C16.2314 11.8052 16.3745 11.8894 16.5321 11.946C16.6897 12.0026 16.8585 12.0304 17.0284 12.0277C17.1984 12.0251 17.366 11.992 17.5212 11.9305C17.6765 11.869 17.8162 11.7804 17.9321 11.6698L23.4164 6.79485L24.3125 5.99985L23.4181 5.20485L17.9338 0.329846C17.6952 0.124816 17.3755 0.0112867 17.0437 0.0137099C16.7118 0.0161331 16.3943 0.134315 16.1596 0.342802C15.9248 0.551289 15.7915 0.833398 15.7885 1.12837C15.7855 1.42334 15.9129 1.70757 16.1433 1.91985L19.4677 4.87485H1.95312C1.61746 4.87485 1.29554 4.99337 1.05819 5.20435C0.820842 5.41533 0.6875 5.70148 0.6875 5.99985C0.6875 6.29821 0.820842 6.58436 1.05819 6.79534C1.29554 7.00632 1.61746 7.12485 1.95312 7.12485H19.4677L16.1433 10.0798Z"
                fill="white" />
              </svg>

            </a>
      @else

      @endif
          </div>

        </div>
      </div>
    </div>
  </div>
</x-layout>