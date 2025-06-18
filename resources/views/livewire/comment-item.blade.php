<article class="p-1 text-base bg-white rounded-lg dark:bg-gray-900 {{ $comment->parent_id ? 'ml-6 lg:ml-12' : '' }}">
    <div class="flex justify-between items-center mb-1">
        <div class="flex items-center">
            <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                <img class="mr-1 w-7 h-7 rounded-full" src="{{ asset('storage/img-assets/profile-img.png') }}" alt="{{ $comment->name}}">
                {{ $comment->name}}
            </p>
            <!-- <span class="text-sm text-gray-600 dark:text-gray-400">
                {{ $comment->created_at }}
            </span> -->
        </div>
    </div>
    <p class="text-gray-500 dark:text-gray-400">{{ $comment->comment }}</p>

    @auth
    <!-- {{ Auth::user()->name }} -->
    @if ($comment->canBeManagedBy(auth()->user()))
        <div class="flex items-center mt-2 space-x-4 mb-3">
            <div class="flex flex-row items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 28 24"><g fill="none" stroke="#656565" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1-3 3h-5l-5 3v-3H6a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3z"/><path d="m11 8l-3 3l3 3m5-3H8"/></g></svg>
                <button type="button" wire:click="toggleReplyForm({{ $comment->id }})" class="text-sm text-gray-500 hover:underline dark:text-gray-400">
                Balas
            </button>
            </div>
            <!-- <div class="flex flex-row items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 28 24"><g fill="none" stroke="#fab215" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"/></g></svg>
                <button type="button" wire:click="startEditing({{ $comment->id }})" class="text-sm text-yellow-400 hover:underline dark:text-gray-400">
                Edit
            </button>
            </div> -->
            <div class="flex flex-row items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 28 28"><g fill="none"><path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="#ff4040" d="M14.28 2a2 2 0 0 1 1.897 1.368L16.72 5H20a1 1 0 1 1 0 2l-.003.071l-.867 12.143A3 3 0 0 1 16.138 22H7.862a3 3 0 0 1-2.992-2.786L4.003 7.07L4 7a1 1 0 0 1 0-2h3.28l.543-1.632A2 2 0 0 1 9.721 2zm3.717 5H6.003l.862 12.071a1 1 0 0 0 .997.929h8.276a1 1 0 0 0 .997-.929zM10 10a1 1 0 0 1 .993.883L11 11v5a1 1 0 0 1-1.993.117L9 16v-5a1 1 0 0 1 1-1m4 0a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0v-5a1 1 0 0 1 1-1m.28-6H9.72l-.333 1h5.226z"/></g></svg>
                <button type="button" wire:click="confirmCommentDeletion({{ $comment->id }})" class="text-sm text-red-600 hover:underline dark:text-red-500">
                    Hapus
                </button>
            </div>
        </div>

        @if ($replyTo === $comment->id)
            <form wire:submit.prevent="addReply" class="my-4">
                <div class="py-2 px-4 mb-2 bg-white rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <textarea wire:model.defer="replyText" rows="3" class="w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 focus:ring-0" placeholder="Tulis balasan..."></textarea>
                </div>
                @error('replyText') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

                <div class="flex space-x-2">
                    <button type="submit" class="px-3 py-1 text-sm text-white bg-blue-600 rounded hover:bg-blue-700">Kirim Balasan</button>
                    <button type="button" wire:click="toggleReplyForm({{ $comment->id }})" class="px-3 py-1 text-sm text-gray-600 border border-gray-300 rounded hover:bg-gray-100">Batal</button>
                </div>
            </form>
        @endif
        @if ($editingCommentId === $comment->id)
    <form wire:submit.prevent="updateComment" class="my-4">
        <div class="py-2 px-4 mb-2 bg-white rounded-lg border dark:bg-gray-800 dark:border-gray-700">
            <textarea wire:model.defer="editingText" rows="3"
                class="w-full text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                placeholder="Edit komentar..."></textarea>
        </div>
        @error('editingText') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

        <div class="flex space-x-2">
            <button type="submit" class="px-3 py-1 bg-green-600 text-white text-sm rounded hover:bg-green-700">
                Simpan Perubahan
            </button>
            <button type="button" wire:click="cancelEditing" class="px-3 py-1 text-sm border rounded hover:bg-gray-100 dark:hover:bg-gray-700">
                Batal
            </button>
        </div>
    </form>
@endif

    @endif
    @endauth

    {{-- Rekursif untuk menampilkan balasan --}}
    @foreach ($comment->replies as $reply)
        @include('livewire.comment-item', ['comment' => $reply])
    @endforeach

    @if ($showDeleteConfirmation)
        <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10 mb-4">
                                <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c.-1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    Hapus Komentar
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Apakah Anda yakin ingin menghapus komentar ini?
                                    </p>
                                </div>
                            </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 justify-center sm:px-6 sm:flex sm:flex-row-reverse">
                        <button wire:click="deleteComment" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                            Ya, Hapus
                        </button>
                        <button wire:click="cancelCommentDeletion" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</article>
