<?php

namespace App\Filament\Resources\PostResource\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;

class Comment extends Widget
{
    protected static string $view = 'filament.resources.post-resource.widgets.comment';
    public ?int $postId = null; // Properti untuk menyimpan ID post

    protected function getViewData(): array
    {
        return [
            'postId' => $this->postId, // Kirim data ke Blade
        ];
    }
}
