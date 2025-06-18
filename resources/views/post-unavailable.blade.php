<x-layout>
    <div class="text-center py-20 flex flex-col items-center">
        <h1 class="text-3xl font-bold text-red-600">Berita Tidak Tersedia</h1>
        <p class="mt-4 text-gray-700">Mohon maaf, berita yang Anda cari tidak tersedia atau belum dipublikasikan.</p>
        <a href="{{ route('berita') }}"
            class="flex items-center justify-center px-3 h-10 text-sm font-medium text-white pagination hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white rounded mt-6 mx-auto w-fit">
            <svg class="pr-2" width="25" height="13" viewBox="0 0 25 13" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M8.86384 2.92404C8.98823 2.8211 9.08802 2.69695 9.15726 2.55898C9.22649 2.42101 9.26375 2.27206 9.26682 2.121C9.26988 1.96995 9.23869 1.81989 9.1751 1.67978C9.11151 1.53967 9.01682 1.41238 8.89669 1.3055C8.77655 1.19862 8.63343 1.11434 8.47586 1.05769C8.3183 1.00103 8.14951 0.973172 7.97957 0.975762C7.80964 0.978352 7.64203 1.01134 7.48675 1.07276C7.33148 1.13418 7.19171 1.22277 7.0758 1.33325L1.58926 6.20582L0.692844 7.00042L1.58687 7.79582L7.06908 12.6732C7.30758 12.8784 7.62717 12.9921 7.95901 12.9898C8.29086 12.9875 8.60841 12.8695 8.84327 12.6611C9.07813 12.4527 9.21151 12.1706 9.21468 11.8757C9.21785 11.5807 9.09056 11.2964 8.86022 11.084L5.53716 8.12757L23.0517 8.13534C23.3874 8.13548 23.7094 8.0171 23.9468 7.80623C24.1842 7.59535 24.3177 7.30927 24.3178 7.0109C24.318 6.71253 24.1848 6.42632 23.9475 6.21524C23.7102 6.00415 23.3884 5.88548 23.0527 5.88534L5.53815 5.87757L8.86384 2.92404Z"
              fill="white" />
            </svg>
            Lihat Berita Lain
        </a>
    </div>
</x-layout>

