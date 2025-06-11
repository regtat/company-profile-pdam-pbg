<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CommentsSection extends Component
{
    public Post $post;
    public $comments;

    // form komentar utama
    public $newComment;
    public $name;
    public $email;
    public $phoneNumber;

    // balas komentar
    public $replyTo = null;
    public $replyText = '';
    
    // hapus komentar
    public $commentToDeleteId = null;
    public $showDeleteConfirmation = false;

    protected function rules()
    {
        $rules = [
            'newComment' => 'required|max:500',
        ];

        if (!Auth::check()) {
            $rules['name'] = 'required';
            $rules['email'] = 'required|email';
            $rules['phoneNumber'] = 'required|regex:/^[0-9]{12,13}$/';
        }
        
        return $rules;
    }

    // validasi
    protected $messages = [
        'name.required' => 'Nama wajib diisi.',
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'phoneNumber.required' => 'Nomor HP wajib diisi.',
        'phoneNumber.regex' => 'Nomor HP harus terdiri dari 12-13 angka, dengan format 08....',
        'newComment.required' => 'Komentar tidak boleh kosong!',
        'newComment.max' => 'Komentar terlalu panjang, maksimal 500 karakter.',
        'replyText.required' => 'Balasan tidak boleh kosong!',
        'replyText.max' => 'Balasan terlalu panjang, maksimal 500 karakter.',
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->loadComments();
    }

    public function loadComments()
    {
        // memuat komentar parent dan eager load semua replies scr rekursif
        $this->comments = $this->post->comments()
            ->whereNull('parent_id')
            ->where('approved', true)
            ->with('replies')
            ->orderBy('created_at', 'desc')
            ->get();
    }
    
    public function addComment()
    {
        $this->validate();

        $commentData = [
            'post_id' => $this->post->id,
            'comment' => $this->newComment,
            'approved' => false,
        ];

        if (Auth::check()) {
            $commentData['name'] = Auth::user()->name;
            $commentData['email'] = Auth::user()->email;
            $commentData['phone_number'] = null;
        } else {
            $commentData['name'] = $this->name;
            $commentData['email'] = $this->email;
            $commentData['phone_number'] = $this->phoneNumber;
        }

        Comment::create($commentData);
        session()->flash('success', 'Komentar Anda berhasil dikirim. Menunggu verifikasi admin');
        $this->reset(['name','email','phoneNumber', 'newComment']);
        
    }

    public function toggleReplyForm($commentId)
    {
        // jika form balasan utk komentar yg sama diklik lg, tutup form.
        $this->replyTo = ($this->replyTo == $commentId) ? null : $commentId;
        $this->replyText = ''; // reset teks balasan setiap kali form dibuka
    }

    public function addReply()
    {
        $this->validate([
            'replyText' => 'required|max:500'
        ]);

        Comment::create([
            'post_id' => $this->post->id,
            'comment' => $this->replyText,
            'parent_id' => $this->replyTo,
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'approved' => true,
        ]);

        session()->flash('success', 'Balasan Anda berhasil dikirim.');
        $this->reset(['replyTo', 'replyText']);
        $this->loadComments();
    }

    public function render()
    {
        return view('livewire.comments-section');
    }
//     public Post $post;
//     public $comment;
//     public $name;
//     public $email;
//     public $phone;
//     public $parentId = null;
//     public $confirmingCommentDeletion = false;
//     public $commentIdBeingDeleted;
//     public $showReplyFormFor = null;
//     public $showModal = false;

//     public function postComment()
//     {
//         if (!Auth::check()) {
//         $this->validate([
//             'name' => 'required|string|max:50',
//             'email' => 'required|email|max:50',
//             'phone' => ['required', 'regex:/^[0-9]{12,13}$/'],
//             'comment' => 'required|max:500',
//         ], [
//             'name.required' => 'Nama wajib diisi.',
//             'email.required' => 'Email wajib diisi.',
//             'phone.required' => 'Nomor HP wajib diisi.',
//             'phone.regex' => 'Nomor HP harus terdiri dari 12-13 angka, dengan format 08....',
//             'comment.required' => 'Komentar tidak boleh kosong!',
//             'comment.max' => 'Komentar terlalu panjang, maksimal 500 karakter.',
//         ]);
//     } else {
//         $this->validate([
//             'comment' => 'required|max:500',
//         ], [
//             'comment.required' => 'Komentar tidak boleh kosong!',
//             'comment.max' => 'Komentar terlalu panjang, maksimal 500 karakter.',
//         ]);
//     }

//     Comment::create([
//         'post_id' => $this->post->id,
//         'comment' => $this->comment,
//         'name' => Auth::check() ? Auth::user()->name : $this->name,
//         'email' => Auth::check() ? Auth::user()->email : $this->email,
//         'phone' => Auth::check() ? null : $this->phone,
//         'approved' => false,
//         'parent_id' => $this->parentId,
//     ]);

//         $this->reset(['comment','name','email','phone']);
//         session()->flash('success', 'Komentar berhasil dikirim. Menunggu persetujuan admin.');
//     }

//     public function confirmDelete($id)
// {
//     $this->commentIdBeingDeleted = $id;
//     $this->showModal = true;
// }

//     public function deleteComment()
//     {
//         $comment = Comment::find($this->commentIdBeingDeleted);

//         if (Auth::check() && Auth::user() && $comment) {
//             $comment->delete();
//         }

//         $this->confirmingCommentDeletion = false;
//     }

//     public function replyTo($id)
//     {
//         $this->parentId = $id;
//         $this->showReplyFormFor = $id;
//     }

//     public function cancelReply()
//     {
//         $this->reset(['parentId', 'showReplyFormFor']);
//     }

//     public function render()
//     {
//         return view('livewire.comments-section', [
//             'comments' => $this->post->comments()->whereNull('parent_id')->with('replies')->latest()->get(),
//         ]);
//     }
    // public Post $post;
    // public $name, $email, $phone, $comment;
    // public $parentId = null;

    // protected $rules = [
    //     'comment' => 'required|min:2',
    // ];

    // public function postComment()
    // {
    //     if(!Auth::check()){
    //         $this->validate([
    //             'name' => 'required|string|max:25',
    //             'email' => 'required|string|max:25',
    //             'phone' => 'required|regex:/^[0-9]{12,13}$/',
    //             'comment'=>'required|string|max:500'
    //     ],[
    //         'name.required' => 'Nama wajib diisi.',
    //         'email.required' => 'Email wajib diisi.',
    //         'phone.required' => 'Nomor HP wajib diisi.',
    //         'phone.regex' => 'Nomor HP harus terdiri dari 12-13 angka, dengan format 08....',
    //         'comment.required' => 'Komentar tidak boleh kosong!',
    //         'comment.max' => 'Komentar terlalu panjang, maksimal 500 karakter.',
    //     ]);
    // }else{
    //     $this->validate([
    //         'comment'=>'required|string|max:500'
    //     ],[
    //         'comment.required' => 'Komentar tidak boleh kosong!',
    //         'comment.max' => 'Komentar terlalu panjang, maksimal 500 karakter.',
    //     ]);
    // }

    //     Comment::create([
    //         'post_id' => $this->post->id,
    //         'comment' => $this->comment,
    //         'name' => Auth::check() ? Auth::user()->name: $this->name,
    //         'email' => Auth::check() ? Auth::user()->email: $this->email,
    //         'phone' => Auth::check() ? Auth::user()->phone ?? null: $this->phone,
    //         'approved' => false,
    //         'parent_id' => $this->parentId,
    //     ]);
    //     $this->reset(['comment', 'name', 'email', 'phone', 'parentId']);
    //     session()->flash('success', 'Komentar berhasil dikirim. Menunggu persetujuan dari Admin.');
    // }


    // public function setReply($commentId)
    // {
    //     $this->parentId = $commentId;
    // }

    // public function cancelReply()
    // {
    //     $this->reset('parentId');
    // }

    // public function deleteComment($id)
    // {
    //     if (Auth::check()) {
    //         $comment = Comment::find($id);
    //         if ($comment) {
    //             $comment->delete();
    //         }
    //     }
    // }

    // public function render()
    // {
    //     $comments = Comment::where('post_id', $this->post->id)
    //         ->whereNull('parent_id')
    //         ->where('approved', true)
    //         ->with('replies')
    //         ->orderByDesc('created_at')
    //         ->get();

    //     return view('livewire.comments-section', compact('comments'));
    // }


    // public $postId;
    // public $name, $email, $phone_number, $comment;
    // public $replyingTo = null;

    // public $replyName, $replyEmail, $replyPhoneNumber, $replyComment;
    // public $showReplyForm = false;
    // public $showEditForm = false;
    // public $successMessage = null;
    // protected $rules = [
    //     'name' => 'required|string|max:255',
    //     'email' => 'nullable|email|max:255',
    //     'phone_number' => 'required|string|min:12|max:13|regex:/^(08)[0-9]{10,11}$/',
    //     'comment' => 'required|string',
    // ];

    // public function submitComment()
    // {
    //     // Jika pengguna login, gunakan data pengguna untuk nama dan email
    //     if (Auth::check()) {
    //         Comment::create([
    //             'name' => Auth::user()->name,
    //             'email' => Auth::user()->email,
    //             'phone_number' => NULL,  // Akan tetap null jika sudah login
    //             'comment' => $this->comment,
    //             'post_id' => $this->postId,
    //             'parent_id' => $this->replyingTo ?? NULL,
    //         ]);
    //         $this->successMessage = "Berhasil menambahkan komentar. Menunggu verifikasi.";

    //         // Reset form
    //         $this->reset(['name', 'email', 'phone_number', 'comment', 'replyingTo']);
    //     } else {
    //         $this->validate();

    //         // Simpan komentar ke database
    //         Comment::create([
    //             'name' => $this->name,
    //             'email' => $this->email,
    //             'phone_number' => $this->phone_number,  // Akan tetap null jika sudah login
    //             'comment' => $this->comment,
    //             'post_id' => $this->postId,
    //             'parent_id' => $this->replyingTo ?? NULL,
    //         ]);
    //         $this->successMessage = "Berhasil menambahkan komentar. Menunggu verifikasi";

    //         // Reset form
    //         $this->reset(['name', 'email', 'phone_number', 'comment', 'replyingTo']);
    //     }
    // }
    // public function closeAlert()
    // {
    //     $this->successMessage = null;
    // }


    // public function replyTo($commentId)
    // {
    //     $this->replyingTo = $commentId;
    //     $this->showReplyForm = true;
    // }

    // public function submitReply()
    // {
    //     if (Auth::check()) {
    //         Comment::create([
    //             'name' => Auth::user()->name,
    //             'email' => Auth::user()->email,
    //             'phone_number' => NULL,
    //             'comment' => $this->replyComment,
    //             'post_id' => $this->postId,
    //             'parent_id' => $this->replyingTo,
    //         ]);

    //         $this->successMessage = "Berhasil menambahkan balasan. Menunggu verifikasi.";

    //         $this->reset(['replyName', 'replyEmail', 'replyPhoneNumber', 'replyComment']);
    //         $this->showReplyForm = false;
    //     } else {
    //         $this->validate([
    //             'replyName' => 'required|string|max:255',
    //             'replyEmail' => 'nullable|email|max:255',
    //             'replyPhoneNumber' => 'required|string|min:12|max:13|regex:/^(08)[0-9]{10,11}$/',
    //             'replyComment' => 'required|string',
    //         ]);
    //         Comment::create([
    //             'name' => $this->replyName,
    //             'email' => $this->replyEmail,
    //             'phone_number' => $this->replyPhoneNumber,
    //             'comment' => $this->replyComment,
    //             'post_id' => $this->postId,
    //             'parent_id' => $this->replyingTo,
    //         ]);

    //         $this->successMessage = "Berhasil menambahkan balasan.";

    //         $this->reset(['replyName', 'replyEmail', 'replyPhoneNumber', 'replyComment']);
    //         $this->showReplyForm = false;
    //     }
    // }
    // public function editComment($commentId)
    // {
    //     $this->replyingTo = $commentId;
    //     $this->showEditForm = true;
    //     // Ambil komentar yang akan diedit
    //     $comment = Comment::find($commentId);
    //     if ($comment) {
    //         $this->replyComment = $comment->comment;  // Set nilai replyComment
    //     }
    // }
    // public function submitEdit()
    // {
    //     $comment = Comment::find($this->replyingTo);
    //     if ($comment) {
    //         $comment->update([
    //             'comment' => $this->replyComment,
    //         ]);

    //         $this->successMessage = "Berhasil mengubah komentar.";

    //         $this->reset(['replyComment']);
    //         $this->showEditForm = false;
    //     }
    // }

    // public function deleteComment($id)
    // {
    //     // Ambil komentar yang akan dihapus
    //     $comment = Comment::find($id);

    //     if ($comment) {
    //         // jika komentar utama, hapus semua balasan
    //         if ($comment->parent_id === null) {
    //             Comment::where('parent_id', $id)->delete();
    //         }
    //         // hapus komentar utama
    //         $comment->delete();

    //         $this->successMessage = "Komentar berhasil dihapus.";
    //     }
    // }
    // public function render()
    // {
    //     $comments = Comment::where('post_id', $this->postId)
            
    //         ->with([
    //             'replies' => function ($query) {
    //                 $query->where('approved', true);
    //             }
    //         ])
    //         ->get();

    //     return view('livewire.comments-section', compact('comments'));
    // }
}
