<?php

namespace App\Livewire;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Livewire\Component;
use App\Models\Group;
use App\Models\Post;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;

class GroupPostOverview extends Component implements HasTable, HasForms
{
    
    use InteractsWithTable;
    use InteractsWithForms;

    public int $post;
    private Post $postDetails;
    public function mount():void{
        $this->postDetails=Post::find($this->post);
    }
    public function render()
    {
        return view('livewire.group-post-overview',[
            'postDetails'=>$this->postDetails
        ]);
    }
    public function table(Table $table): Table{
        return $table
        ->query(
            Post::query()
            ->where('active', $this->posts)
            ->orderBy('published_at')
        )
        ->columns([
            TextColumn::make('title')
                ->limit(25)
                    ->searchable(),
            TextColumn::make('slug')
                ->limit(25)
                    ->searchable(),
            TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable(),
            TextColumn::make('user.name')
                    ->label('Author')
                    ->numeric()
                    ->sortable(),
            TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
            ImageColumn::make('image'),
            IconColumn::make('active')
                    ->boolean(),
            IconColumn::make('comments_enabled')
                    ->boolean(),
            TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
        ]);
    }
    // protected static ?string $navigationIcon = 'heroicon-o-document-text';
 
    // protected static string $view = 'filament.pages.groups-overview';
 
    // protected function getViewData(): array
    // {
    //     return [
    //         // This adds the group data to our views
    //         'posts' => Post::all()
    //     ];
    // }
}
