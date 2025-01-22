<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View{
        $banners=Banner::where('active', '=', 1)->get();
        $posts=Post::with('category')
        ->where('active', '=', 1)
        ->whereDate('published_at', '<=', Carbon::now())
        ->orderBy('published_at', 'desc')
        ->get();
        return view('index', compact('banners', 'posts'));
    }

    public function show($id): View
    {
        $post = Post::findOrFail($id);
        return view('post', compact('post'));
    }
}
