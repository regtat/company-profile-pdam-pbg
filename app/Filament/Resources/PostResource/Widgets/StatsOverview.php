<?php

namespace App\Filament\Resources\PostResource\Widgets;

use App\Models\Post;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    // protected function getStats(): array
    // {
    //     $activePosts=Post::where('active', '=','1')->count();
    //     return [
    //         Stat::make('Active', $activePosts)->color('success'),
    //     ];
    // }
}
