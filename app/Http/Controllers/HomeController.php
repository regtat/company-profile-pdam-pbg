<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $banners = Banner::where('active', '=', 1)->get();
        $posts = Post::with('category')
            ->where('active', '=', 1)
            ->whereDate('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->limit(4)
            ->latest()
            ->get();

        return view('index', compact('banners', 'posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id); // Get the current post
        if (!$post->active) {
            return redirect()->route('post-unavailable');
        }
        $artikelLain = Post::latest()->where('id', '!=', $id)->take(5)->get();
        $category = Category::all();

        return view('post', compact('post', 'category', 'artikelLain'));
    }


    public function search(Request $request)
    {
        $banners = Banner::where('active', '=', 1)->get();

        $searchQuery = $request->input('search');
        $routes = [
            'visi' || 'misi' => 'profil.visi-misi',
            'struktur' || 'organisasi' => 'profil.struktur-organisasi',
            'abonemen' => 'pelanggan.abonemen',
            'tarif' || 'dasar' || 'tarif dasar' => 'pelanggan.tarif-dasar',
            'cek' || 'tagihan' || 'cek tagihan' => 'pelayanan',
            'sejarah' => 'profil.sejarah-perusahaan',
        ];
        foreach ($routes as $keyword => $route) {
            if (str_contains(strtolower($searchQuery), $keyword)) {
                return redirect()->route($route);
            }
        }

        // pencarian menggunakan scopeFilter pada model Post
        $posts = Post::filter(['search' => $searchQuery])->get();

        return view('index', compact('posts', 'searchQuery', 'banners'));
    }

    public function category()
    {
        $category = Category::all();
        return view('profil.visi-misi', compact('category'));
    }

    public function posts()
    {
        $posts = Post::with('category')
            ->where('active', true)
            ->whereDate('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->limit(4)
            ->latest()
            ->get();
        return view('profil.visi-misi', compact('posts'));
    }

}
