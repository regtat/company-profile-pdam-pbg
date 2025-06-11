<x-filament-widgets::widget>
    <x-filament::section>
        {{-- Widget content --}}
        @livewire('comments-section', ['postId' => $postId])
    </x-filament::section>
</x-filament-widgets::widget>
