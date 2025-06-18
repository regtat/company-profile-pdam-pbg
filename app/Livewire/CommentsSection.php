<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentsSection extends Component
{
    public Post $post;
    public $name, $email, $phoneNumber;
    public $newComment = '';
    public $replyText = '';
    public $replyTo = null;
    public $showDeleteConfirmation = false;
    public $commentToDelete = null;
    public $editingCommentId = null;
    public $editingText = '';

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
        $this->comments = Comment::where('post_id', $this->post->id)
        ->where('approved', true)
            ->whereNull('parent_id')
            ->with(['replies' => function ($query) {
                $query->where('approved', true); // replies hrs approved
            }])
            // ->with(['replies', 'replies.parent'])
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
            'parent_id' => null,
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
        $this->reset(['name', 'email', 'phoneNumber', 'newComment']);
    }

    public function toggleReplyForm($commentId)
    {
        $this->replyTo = $this->replyTo === $commentId ? null : $commentId;
    }

    public function addReply()
    {
        $this->validateOnly('replyText');

        Comment::create([
            'post_id' => $this->post->id,
            'user_id' => Auth::id(),
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'phone_number' => null,
            'comment' => $this->replyText,
            'parent_id' => $this->replyTo,
        ]);

        $this->replyText = '';
        $this->replyTo = null;
        session()->flash('success', 'Balasan berhasil dikirim. Menunggu persetujuan admin');
    }

    public function confirmCommentDeletion($commentId)
    {
        $this->commentToDelete = $commentId;
        $this->showDeleteConfirmation = true;
    }

    public function deleteComment()
    {
        $comment = Comment::find($this->commentToDelete);
        if (!$comment) return;

    if (!Auth::user() || !$comment->canBeManagedBy(Auth::user())) {
        abort(403, 'Unauthorized');
    }

    if ($comment->parent_id === null) {
        Comment::where('parent_id', $comment->id)->delete();
    }

        $comment->delete();
        $this->showDeleteConfirmation = false;
        session()->flash('success', 'Komentar berhasil dihapus.');
    }

    public function cancelCommentDeletion()
    {
        $this->showDeleteConfirmation = false;
    }

    public function startEditing($commentId)
{
    $comment = Comment::find($commentId);

    if (!$comment || !Auth::check() || !$comment->canBeManagedBy(Auth::user())) {
        abort(403);
    }

    $this->editingCommentId = $commentId;
    $this->editingText = $comment->comment;
}

public function cancelEditing()
{
    $this->editingCommentId = null;
    $this->editingText = '';
}

public function updateComment()
{
    $this->validate([
        'editingText' => 'required|max:500',
    ]);

    $comment = Comment::find($this->editingCommentId);

    if (!$comment || !Auth::check() || !$comment->canBeManagedBy(Auth::user())) {
        abort(403);
    }

    $comment->update([
        'comment' => $this->editingText,
    ]);

    session()->flash('success', 'Komentar berhasil diperbarui.');

    $this->editingCommentId = null;
    $this->editingText = '';
    $this->loadComments();
}

    public function render()
    {
        return view('livewire.comments-section', [
            'comments' => Comment::where('post_id', $this->post->id)
            ->where('approved', true)
            ->whereNull('parent_id')
            ->with(['replies' => function ($query) {
                $query->where('approved', true);
            }, 'replies.parent'])
            ->orderByDesc('created_at')
            ->get(),
        ]);
    }
}
