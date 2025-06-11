<x-filament-panels::page>
    @foreach($posts as $post)
    <livewire:group-post-overview :group="$post->id" :key="$post->id">
    @endforeach
 
</x-filament-panels::page>