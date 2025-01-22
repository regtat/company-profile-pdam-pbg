<x-layout>
    <div class="font-poppins px-16 flex flex-row w-full bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 pb-5">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h1 class=" mb-2 text-3xl font-bold tracking-tight text-gray-900 dark:text-white" style="font-family: 'Poppins', sans-serif;">{{$post->title}}</h1>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{!! $post->body !!}</p>
        </div>
    </div>

    <div class="flex items-center justify-center h-screen" id="comment">
        <div class="bg-white p-4 shadow-lg w-1/2">
            <h1 class="mb-3 font-bold">Komentar</h1>
            <!-- Form -->
            @livewire('post',['postId' => $post->id])
        </div>
    </div>

</x-layout>