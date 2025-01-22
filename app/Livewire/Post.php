<?php

namespace App\Livewire;

use App\Models\Comment;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;

class Post extends Component implements HasForms
{
    use InteractsWithForms;
public $comment='';
public $name='';
public $email='';
public $phone_number='';
public $postId;

public function mount($postId)
{
    $this->postId = $postId;
}

public function form(Form $form): Form{
    return $form
        ->schema([
            Card::make()
            ->schema([
                Textarea::make('comment')
                ->label('Komentar')
                ->required(),
                TextInput::make('name')
                ->label('Nama')
                ->required(),
                TextInput::make('email')
                ->label('Email'),
                TextInput::make('phone_number')
                ->label('Nomor Telepon')
                ->required()
                ->minLength(12)
                ->maxLength(13)
                ->placeholder('081234567891'),
            ])
            ]);
}
    public function render()
    {
        return view('livewire.post');
    }

    public function save():void {
        $data= $this->form->getState();
        $data['post_id'] = $this->postId;
        Comment::insert($data);
        session()->flash('message', 'Berhasil memberikan komentar');
    }
}
