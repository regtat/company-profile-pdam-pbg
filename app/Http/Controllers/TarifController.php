<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    public function posts(){
        $posts = Post::with('category')->where('active', 1)->whereDate('published_at', '<=', Carbon::now())->orderBy('published_at', 'desc')->get();

            return view('pelanggan.tarif-dasar', compact( 'posts'));
        }
}
