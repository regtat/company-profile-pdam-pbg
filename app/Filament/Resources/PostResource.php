<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Filament\Exports\PostExporter;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Actions\Exports\Models\Export;
use Filament\Tables\Actions\ExportAction;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-up-on-square-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->unique(ignoreRecord: true)
                    ->validationMessages([
                        'unique' => 'Judul sudah ada',
                    ])
                    ->rules([
                        fn(Get $get): Closure => function (string $attribute, $value, Closure $fail) use ($get) {
                            if ($get('title') <= 125) {
                                $fail("Mohon maaf, judul terlalu panjang.");
                            }
                        },
                    ])->validationAttribute('title'),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('body')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\DateTimePicker::make('published_at')
                    ->required(),
                // Forms\Components\Select::make('user_id')
                //     ->relationship('user', 'name')
                //     ->required(),
                Forms\Components\Select::make('category_id')
                    // ->searchable()
                    ->preload()
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required(),
                Forms\Components\Toggle::make('active')
                    ->default(false)
                // ->visible(fn () => Auth::user()->roles==='Admin' )
                ,
                Forms\Components\Toggle::make('comments_enabled')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->groups([
                Group::make('active')
                    ->label('Active'),
                Group::make('category.name')
                    ->label('Category'),
            ])
            ->defaultGroup('active')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Author')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\IconColumn::make('comments_enabled')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Filter::make('published_at')
                    ->form([
                        DatePicker::make('published_from'),
                        DatePicker::make('published_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['published_from'],
                                fn(Builder $query, $date): Builder => $query->whereDate('published_at', '>=', $date),
                            )
                            ->when(
                                $data['published_until'],
                                fn(Builder $query, $date): Builder => $query->whereDate('published_at', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): ?string {
                        $publishedFrom = Carbon::parse($data['published_from'])->toFormattedDateString();
                        $publishedUntil = Carbon::parse($data['published_until'])->toFormattedDateString();
                        if ($data['published_from'] && $data['published_until']) {
                            return 'Published from ' . $publishedFrom . ' until ' . $publishedUntil;
                        }
                        if ($data['published_from']) {
                            return 'Published from ' . $publishedFrom;
                        }
                        if ($data['published_until']) {
                            return 'Published until ' . $publishedUntil;
                        }

                        return null;


                    }),
                SelectFilter::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make()
                        ->visible(fn($record) => $record->user_id === Auth::id()),
                    Tables\Actions\DeleteAction::make()
                        ->visible(fn($record) => $record->user_id === Auth::id())
                ])->tooltip('Actions')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('active')
                        ->label('Active')
                        ->tooltip('Update post to active or non active')
                        ->action(function (Collection $records) {
                            // Perbarui hanya kolom 'active' untuk semua record yang dipilih
                            $records->each(function (Post $post) {
                                // Toggle nilai 'active'
                                $post->update([
                                    'active' => !$post->active, // toggle between true and false
                                ]);
                            });
                        }),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'view' => Pages\ViewPost::route('/{record}'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    // public static function getEloquentQuery(): Builder{
    //     return parent::getEloquentQuery()->whereHas('user', function($query){
    //         $query->where('user_id', Auth::user()->id);
    //     });
    // }

    // menyembunyikan user dengan role admin pada user resource
    // public static function getEloquentQuery(): Builder
    // {
    //     $admin = User::whereHas('roles', function ($query) {
    //         $query->where('name', 'admin');
    //     })->get()->pluck('id');
    //     return parent::getEloquentQuery()->whereNotIn('id', $admin);
    // }
}
