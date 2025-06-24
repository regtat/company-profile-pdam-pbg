<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Filament\Resources\PostResource\RelationManagers\CommentsRelationManager;
use App\Filament\Resources\PostResource\Widgets\Comment;
use App\Models\Post;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
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
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Support\Facades\Blade;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

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
                Forms\Components\Textarea::make('body')
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
                    ->searchable()
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->maxSize(102400)
                    ->rules([
                        'mimes:jpeg,png,jpg',
                    ])
                    ->preserveFilenames()
                    ->getUploadedFileNameForStorageUsing(
                        fn(TemporaryUploadedFile $file, \Filament\Forms\Get $get): string =>
                        $get('slug') . '.' . $file->getClientOriginalExtension()
                        // fn(TemporaryUploadedFile $file): string => (string) Str::slug($file->getClientOriginalName()) . $file->getClientOriginalExtension()
                    )
                    ->imageEditor()
                    ->required()
                    ->directory('posts'),
                Forms\Components\Toggle::make('active')
                ->visible(fn () => Auth::user()->roles==='Admin' )
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
                    ->limit(25)
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->limit(25)
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
                    ->label('Active')
                    ->boolean()
                    ->action(function($record, $column){
                        $name=$column->getName();
                        $record->update([
                            $name=>!$record->$name
                        ]);
                    }),
                Tables\Columns\IconColumn::make('comments_enabled')
                    ->label('Comments Enabled')
                    ->boolean()
                    ->action(function($record, $column){
                        $name=$column->getName();
                        $record->update([
                            $name=>!$record->$name
                        ]);
                    }),
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
                SelectFilter::make('user_id')
                    ->label('Author')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                ActionGroup::make([
                    // Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make()
                        ->visible(fn($record) => $record->user_id === Auth::id()),
                    Tables\Actions\DeleteAction::make()
                        ->visible(fn($record) => $record->user_id === Auth::id()),
                    // Action::make('Download')
                    //     ->url(fn(Post $record)=>route('post.pdf', $record))
                    //     ->openUrlInNewTab()
                    // Tables\Actions\Action::make('pdf')
                    //     ->label('PDF')
                    //     ->color('success')
                    //     ->url(fn(Post $record) => route('pdf', $record))
                    //     ->openUrlInNewTab(),
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
                                    'active' => !$post->active  // toggle between true and false
                                ]);
                            });
                        }),
                ]),
            ])
            ->headerActions([
                // BulkAction::make('Export')
                //     ->deselectRecordsAfterCompletion()
                //     ->action(function (Collection $records) {
                //         // $posts=Post::get();
                //         return response()->streamDownload(function () use ($records) {
                //             $pdfContent = Blade::render('postsPDF', [
                //                 'records' => $records
                //             ]);
                //             echo Pdf::loadHTML($pdfContent)
                //                 ->setPaper('A4', 'potrait')
                //                 ->stream();
                //         }, 'post.pdf');
                //     })
            ]);
        // Ambil data yang sudah difilter
        // $filteredData = Post::query()
        //     ->when(request()->has('published_from'), fn($query) => $query->whereDate('published_at', '>=', request('published_from')))
        //     ->when(request()->has('published_until'), fn($query) => $query->whereDate('published_at', '<=', request('published_until')))
        //     ->get();

        // // Generate PDF menggunakan DomPDF
        // $pdf = Pdf::loadView('postsPDF', ['posts' => $filteredData]);

        // // Mengembalikan PDF sebagai stream (langsung ditampilkan di browser)
        // return $pdf->stream('posts.pdf');

    }


    public static function getRelations(): array
    {
        return [
            CommentsRelationManager::class
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
