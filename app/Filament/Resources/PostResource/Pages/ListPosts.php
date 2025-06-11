<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use App\Filament\Resources\PostResource\Widgets\StatsOverview;
use App\Models\Post;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\ButtonAction::make('Laporan')
            //     ->url(fn()=>route('posts.pdf'))
            //     ->openUrlInNewTab(),
            // Action::make('download')
            //     ->label('Unduh Laporan')
            //     ->url(fn () => route('wd.cetakKritikSaran', ['month' => request('tableFilters')['month'] ?? '']))
            //     ->openUrlInNewTab()
            //     ->icon('heroicon-o-download'),
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array{
        return[
            StatsOverview::class
        ];
    }

    protected function getTableQuery(): Builder
    {
    //     $user = auth()->user();
    //     $model = (new (static::$resource::getModel()))->with('roles')->where('id', '!=', auth()->user()->id);

    //     if (!$user->isSuperAdmin()) {
    //         $model = $model->whereDoesntHave('roles', function ($query) {
    //             $query->where('name', '=', config('filament-shield.super_admin.name'));
    //         });
    //     }

    //     return $model;
    // }
    $user = auth()->user();
    $model = (new (static::$resource::getModel()))->with('user');

    if ($user->hasRole('Admin')) {
        return $model;
    }
    //tampilkan post yang user_id = id user yg sedang login
    return $model->where('user_id', $user->id);

    }
}
