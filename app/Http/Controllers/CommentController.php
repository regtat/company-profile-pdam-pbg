<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required',
            'name' => 'required',
            // 'email' => 'required',
            'phone_number' => 'required',
            'post_id' => 'required|exists:posts,id',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        Comment::create([
            'comment' => $request->comment,
            'name' => $request->name,
            'email' => 'NULL',
            'phone_number' => $request->phoneNumber,
            'post_id' => $request->post_id,
            'parent_id' => $request->parent_id,
        ]);

        return back();
    }

    public function index($postId)
    {
        $comments = Comment::where('post_id', $postId)->with('replies')->get();
        return view('comments.index', compact('comments'));
    }
    // public function index($id){
    //     $post=Post::find($id);
    //     if(!$post){
    //         return redirect()->back()->with('error', 'Post not found.');
    //         // return response()->json([
    //         //     'success' => false,
    //         //     'message' => 'Post not found.',
    //         // ], 404);
    //     }
    //     $comments = $post->comments()->with('user')->get();
    //     return view('comments.index', compact('comments'));

        // return response()->json([
        //     'post_id' => $post->id,
        //     'comments' => $comments,
        // ]);
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Comments retrieved successfully.',
        //     'data' => $comments,
        // ], 200);
    }

    // public function update(Request $request, $id)
    // {
    //     $comment = Comment::find($id);

    //     if(!$comment)
    //     {
    //         return response([
    //             'message' => 'Comment not found.'
    //         ], 403);
    //     }

    //     if($comment->user_id != Auth::user()->id)
    //     {
    //         return response([
    //             'message' => 'Permission denied.'
    //         ], 403);
    //     }

    //     //validate fields
    //     $attrs = $request->validate([
    //         'comment' => 'required|string'
    //     ]);

    //     $comment->update([
    //         'comment' => $attrs['comment']
    //     ]);

    //     return response([
    //         'message' => 'Comment updated.'
    //     ], 200);
    // }

    // // delete a comment
    // public function destroy($id)
    // {
    //     $comment = Comment::find($id);

    //     if(!$comment)
    //     {
    //         return response([
    //             'message' => 'Comment not found.'
    //         ], 403);
    //     }

    //     if($comment->user_id != Auth::user()->id)
    //     {
    //         return response([
    //             'message' => 'Permission denied.'
    //         ], 403);
    //     }

    //     $comment->delete();

    //     return response([
    //         'message' => 'Comment deleted.'
    //     ], 200);
    // }


