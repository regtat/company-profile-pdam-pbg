<article class="p-1 mb-2 text-base bg-white rounded-lg dark:bg-gray-900 {{ $comment->parent_id ? 'ml-6 lg:ml-12' : '' }}">
    <div class="flex justify-between items-center mb-2">
        <div class="flex items-center">
            <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                <img class="mr-1 w-7 h-7 rounded-full" src="{{asset('storage/img-assets/profile-img.png')}}" alt="{{ $comment->name }}">
                {{ $comment->name }}
            </p>
            <!-- <p class="text-sm text-gray-600 dark:text-gray-400">
                <time pubdate datetime="{{ $comment->created_at->toIso8601String() }}" title="{{ $comment->created_at->format('F j, Y, g:i a') }}">
                    {{ $comment->created_at->diffForHumans() }}
                </time>
            </p> -->
        </div>
    </div>
    <div>
        <p class="text-gray-500 dark:text-gray-400">{{ $comment->comment }}</p>
    </div>

    <div class="flex items-center mt-2 space-x-4 mb-4">
        @auth
            @if(auth()->user())
                <button type="button" wire:click="toggleReplyForm('{{ $comment->id }}')" class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                    <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"/>
                    </svg>
                    Balas
                </button>
                <button type="button" wire:click="confirmCommentDeletion('{{ $comment->id }}')" class="flex items-center text-sm text-red-600 hover:underline dark:text-red-500 font-medium ml-4">
                    <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                        <path d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM7 2h4v2H7V2Zm1 12v-6a1 1 0 0 1 2 0v6a1 1 0 0 1-2 0Zm4 0v-6a1 1 0 0 1 2 0v6a1 1 0 0 1-2 0ZM3 6h12v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6Z"/>
                    </svg>
                    Hapus
                </button>
            @endif
        @endauth
    </div>

    <!-- form balas -->
    @if ($replyTo === $comment->id)
        <form wire:submit.prevent="addReply" class="my-4">
            @csrf
            <div class="py-2 px-4 mb-2 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <label for="reply-{{$comment->id}}" class="sr-only">Balasan Anda</label>
                <textarea id="reply-{{$comment->id}}" rows="3" wire:model="replyText"
                    class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                    placeholder="Tulis balasan..." required></textarea>
            </div>
            @error('replyText') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            <div class="flex space-x-2">
                <button type="submit" class="inline-flex items-center py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                    Kirim Balasan
                </button>
                <button type="button" wire:click="toggleReplyForm('{{ $comment->id }}')" class="inline-flex items-center py-2 px-3 text-xs font-medium text-center text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-gray-900">
                    Batal
                </button>
            </div>
        </form>
    @endif

    {{-- Rekursi untuk replies --}}
    @if ($comment->replies->isNotEmpty())
        @foreach ($comment->replies as $reply)
            @include('livewire.comment-item', ['comment' => $reply])
        @endforeach
    @endif
</article>