<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentLog extends Model
{
    protected $fillable = [
        'comment_id',
        'action',
        'old_value',
        'new_value',
        'user_id',
        'action_time'
    ];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function updateComment(Request $request, $id)
{
    $comment = Comment::findOrFail($id);
    $oldComment = $comment->comment;
    $newComment = $request->input('comment');

    // Update komentar
    $comment->update(['comment' => $newComment]);

    // Log ke 
    CommentLog::create([
        'comment_id' => $comment->id,
        'user_id' => Auth::id(),  // User yang mengedit
        'action' => 'update',
        'old_value' => $oldComment,
        'new_value' => $newComment,
        'action_time' => now(),
    ]);
}
}