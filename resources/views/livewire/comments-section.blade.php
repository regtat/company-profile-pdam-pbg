<div class="antialiased max-w-screen-md pr-8 pt-6">

    @if (session()->has('success'))
        <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                {{ session('success') }}
            </div>
            <button type="button" onclick="this.parentElement.remove()" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif
    <div class="card-comment px-8">
    <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Komentar</h3>
    <form wire:submit.prevent="addComment" class="mb-6">
        @guest
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mb-4">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <input type="text" wire:model.defer="name" class="bg-gray-100 border-0 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama Anda">
                    @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" wire:model.defer="email" class="bg-gray-100 border-0 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Email Anda">
                    @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-4">
                <label for="phoneNumber" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor HP</label>
                <input type="text" wire:model.defer="phoneNumber" class="bg-gray-100  text-gray-900 text-sm rounded-lg border-0 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="08xxxxxxxxxx" maxlength="13">
                @error('phoneNumber') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>
        @endguest
        <div class="mb-4">
            <label for="newComment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Komentar</label>
            <div class="py-2 px-4 mb-4 bg-gray-100 rounded-lg rounded-t-lg dark:bg-gray-800">
                <textarea rows="6" wire:model.defer="newComment" class="px-0 w-full text-sm text-gray-900 bg-gray-100 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" placeholder="Tulis komentar Anda..."></textarea>
            </div>
            @error('newComment') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
        </div>
        <div class="pb-5">
            <button type="submit" class="inline-flex items-center py-2 px-8 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
            KIRIM
        </button>
        </div>
    </form>
    </div>

    @foreach ($comments as $comment)
        @include('livewire.comment-item', ['comment' => $comment])
    @endforeach
</div>

 
