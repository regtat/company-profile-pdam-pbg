<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'comment',
        'name',
        'email',
        'phone_number',
        'approved',
        'parent_id'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
    
    public function replies()
{
    return $this->hasMany(Comment::class, 'parent_id')->with('replies');
}

public function parent()
{
    return $this->belongsTo(Comment::class, 'parent_id');
}


    protected static function booted()
    {
        static::updated(function ($comment) {
            CommentLog::create([
                'comment_id' => $comment->id,
                'action' => 'update',
                'old_value' => $comment->getOriginal('comment'),
                'new_value' => $comment->comment,
                'user_id' => Auth::id(),
                'timestamp' => now(),
            ]);
        });

        static::deleted(function ($comment) {
            CommentLog::create([
                'comment_id' => $comment->id,
                'action' => 'delete',
                'old_value' => $comment->comment,
                'new_value' => null,
                'user_id' => Auth::id(),
                'timestamp' => now(),
            ]);
        });
    }

    public function canBeManagedBy($user)
{
    // admin bs kelola semua
    if ($user->hasRole('Admin') || $user->hasRole('admin')) {
        return true;
    }

    // jika user bkn admin, mk bs kelola komentar milik sndri
    if ($this->email === $user->email) {
        return true;
    }

    // jika ini adalah balasan trhdp komentar milik user
    if ($this->parent && $this->parent->email === $user->email) {
        return true;
    }

    // jika komentar berada di postingan milik sendiri
    if ($this->post && $this->post->user_id === $user->id) {
        return true;
    }

    return false;
}
}