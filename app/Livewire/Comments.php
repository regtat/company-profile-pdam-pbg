<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;

class Comments extends Component
{
//     public $postId;
//     public $name;
//     public $phoneNumber;
//     public $email;
//     public $comment;
//     public $parentId = null;

//     protected $rules = [
//         'name' => 'required|string',
//         'email' => 'nullable|email',
//         'phone_number' => 'required|string|min:12|max:13',
//         'comment' => 'required|string',
//     ];

//     public function submit() {
//         $this->validate();
//         Comment::create([
//             'post_id' => $this->postId,
//             'name' => $this->name,
//             'email' => $this->email,
//             'phone_number' => $this->phoneNumber,
//             'comment' => $this->comment,
//             'parent_id' => $this->parentId
//         ]);
        
//         $this->reset(['name', 'email', 'phone_number', 'comment', 'parent_id']);
//     }

//     public function setReply($commentId) {
//         $this->reply_of = $commentId;
//     }
//     public function render()
//     {
//         return view('livewire.comments', [
//             'comments' => Comment::where('post_id', $this->post_id)->whereNull('parent_id')->with('replies')->get()
//         ]);
    // }
    public int $postId;

    public function render()
    {
        return view('livewire.comments-section', [
            'comments' => Comment::where('post_id', $this->postId)->get()
        ]);
    }
}
