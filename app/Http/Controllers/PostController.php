<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View{
        $posts=Post::with('category')
        ->where('active', '=', 1)
        ->whereDate('published_at', '<', Carbon::now())
        ->orderBy('published_at', 'desc')
        ->withCount('comments')
        ->get();
        return view('index', compact('posts'));
    }
}
