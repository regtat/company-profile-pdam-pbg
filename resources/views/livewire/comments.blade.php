<div>
    {{-- Be like water. --}}
    <h2 class="text-lg font-bold">Komentar</h2>

    <!-- Form Komentar -->
    <form wire:submit.prevent="submit" class="mb-4">
        <input type="hidden" wire:model="post_id">
        <input type="hidden" wire:model="reply_of">

        <div class="mb-2">
            <label class="block">Nama:</label>
            <input type="text" wire:model="name" class="border p-2 w-full">
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-2">
            <label class="block">Email:</label>
            <input type="email" wire:model="email" class="border p-2 w-full">
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-2">
            <label class="block">Nomor Telepon:</label>
            <input type="text" wire:model="phone_number" class="border p-2 w-full">
            @error('phone_number') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-2">
            <label class="block">Komentar:</label>
            <textarea wire:model="comment" class="border p-2 w-full"></textarea>
            @error('comment') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            {{ $reply_of ? 'Balas Komentar' : 'Tambah Komentar' }}
        </button>
    </form>

    <!-- List Komentar -->
    <ul>
        @foreach ($comments as $comment)
            <li class="border-b p-2">
                <p><strong>{{ $comment->name }}</strong> - {{ $comment->comment }}</p>
                <button wire:click="setReply({{ $comment->id }})" class="text-blue-500 text-sm">
                    Balas
                </button>

                <!-- Balasan -->
                @if ($comment->replies)
                    <ul class="ml-4 border-l pl-4 mt-2">
                        @foreach ($comment->replies as $reply)
                            <li>
                                <p><strong>{{ $reply->name }}</strong> - {{ $reply->comment }}</p>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</div>
