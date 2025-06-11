<?php

namespace App\Filament\Resources\PostResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommentsRelationManager extends RelationManager
{
    protected static string $relationship = 'comments';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('comment')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone_number')
                    ->tel()
                    ->required()
                    ->maxLength(13)
                    ->minLength(12)
                    ->placeholder('081234567891')
                    ->rules(['regex:/^(08)[0-9]{10,11}$/']) // Contoh validasi regex untuk nomor telepon
                    ->validationMessages([
                        'regex' => 'Format nomor telepon tidak valid. Minimal 12 digit atau maksimal 13 digit',
                    ]),
                Forms\Components\Toggle::make('approved'),
                // Forms\Components\TextInput::make('comment_id')
                //     ->numeric(),
                Forms\Components\Select::make('parent_id')
                    ->label('Balasan untuk')
                    ->relationship('replies', 'comment')
                    ->nullable()
                    ->searchable()
                    ->preload(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('comment')
            ->columns([
                Tables\Columns\TextColumn::make('comment'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('parent.comment')
                    ->label('Replies')
                    ->getStateUsing(function ($record) {
                        // Periksa apakah relasi 'parent' ada
                        return $record->parent ? $record->parent->comment : 'No parent';
                    }),
                    Tables\Columns\IconColumn::make('approved')
                    ->label('Approved')
                    ->boolean()
                    ->action(function($record, $column){
                        $name=$column->getName();
                        $record->update([
                            $name=>!$record->$name
                        ]);
                    }),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    
}
