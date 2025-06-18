<?php

namespace App\Http\Controllers;

use App\Models\BranchOffice;
use App\Models\Category;
use App\Models\Office;
use App\Models\Post;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PostController extends Controller
{
    // semua berita
    public function index(): View
    {
        $posts = Post::with('category', 'user')
            ->where('active', '=', 1)
            ->whereDate('published_at', '<', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->withCount('comments')
            ->latest()
            ->paginate(1)
        ;
        $artikelLain = Post::all();

        $categories = Category::all();
        return view('berita', compact('posts', 'categories', 'artikelLain'));
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);
        if (!$post->active){
            return redirect()->route('post-unavailable');
        }

        return view('post', compact('post'));
    }

    public function showByCategory($slug)
    {
        // ambil kategori berdasarkan slug
        $category = Category::where('slug', $slug)->firstOrFail();

        $categories = Category::all();

        $artikel = Post::where('category_id', $category->id)->latest()->paginate(1);

        $artikelLain = Post::all();

        return view('berita.kategori', compact('category', 'artikel', 'artikelLain', 'categories'));
    }

    public function list(): View
    {
        $posts = Post::with('category')->where('active', 1)->whereDate('published_at', '<', Carbon::now())->orderBy('published_at', 'desc')->get();

        $cabang = BranchOffice::with('office')->orderBy('name')->get();

        return view('profil.profil-cabang', compact('posts', 'cabang'));
    }
    public function search(Request $request)
    {
        $searchQuery = $request->input('search');

        if (str_contains(strtolower($searchQuery), 'visi') || str_contains(strtolower($searchQuery), 'misi')) {
            return redirect()->route('profil.visi-misi');
        }

        if (str_contains(strtolower($searchQuery), 'sejarah perusahaan')) {
            return redirect()->route('profil.sejarah-perusahaan');
        }
        $posts = Post::filter(['search' => $searchQuery])->get();

        return view('index', compact('posts', 'banners'));
    }
}