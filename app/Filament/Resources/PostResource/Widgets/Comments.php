<?php

namespace App\Filament\Resources\PostResource\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;

class Comments extends Widget
{
    protected static string $view = 'filament.resources.post-resource.widgets.comments';

    public Model $record;
}
