<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StrukturController extends Controller
{
    public function employee(){
        $posts = Post::with('category')->where('active', 1)->whereDate('published_at', '<=', Carbon::now())->orderBy('published_at', 'desc')->get();

        $positions = Position::orderBy('order')->get();

        $employees = Employee::with('position')
            ->orderBy('name')
            ->get();
            return view('profil.struktur-organisasi', compact('positions', 'employees', 'posts'));
        }
}
