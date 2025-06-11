<?php

namespace App\Http\Controllers;

use App\Models\BranchOffice;
use App\Models\Category;
use App\Models\Office;
use App\Models\Post;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    // semua berita
    public function index(): View{
        $posts=Post::with('category','user')
        ->where('active', '=', 1)
        ->whereDate('published_at', '<', Carbon::now())
        ->orderBy('published_at', 'desc')
        ->withCount('comments')
        ->latest()
        ->paginate(1)
        ;
        $artikelLain = Post::all();

        $categories=Category::all();
        return view('berita', compact('posts', 'categories','artikelLain'));
    }
    // public function cetak(Request $request)
    // {
    //     //ambil nilai parameter bulan dari request
    //     $month = $request->get('month');

    //     //konversi ke int
    //     $month = (int) $month;

    //     //ambil data kritik saran yang sesuai dengan bulan (created_at) yang dipilih
    //     $data = Post::whereMonth('published_at', $month)->get();

    //     //library Barryvdh\DomPDF\Facade\Pdf, muat view dengan data dan bulan ke file pdf
    //     $pdf = Pdf::loadView('cetakPost', compact('data', 'month'));
    //     $pdf->setPaper('A4', 'portrait');
    //     //pdf bs diunduh
    //     return $pdf->stream('posts.pdf');
    // }

    // public function list(){
    //     $posts=Post::all();
    //     return view('components.list-post', compact('posts'));
    // }
    public function show($id)
{
    $post = Post::findOrFail($id); // get the current post

    return view('post', compact('post')); 
}

public function showByCategory($slug)
{
    // Ambil kategori berdasarkan slug
    $category = Category::where('slug', $slug)->firstOrFail();

    $categories = Category::all();

    $artikel = Post::where('category_id', $category->id)->latest()->paginate(1);

    $artikelLain = Post::all();

    return view('berita.kategori', compact('category', 'artikel', 'artikelLain', 'categories'));
}

public function list(): View
{
    $posts = Post::with('category')->where('active', 1)->whereDate('published_at', '<', Carbon::now())->orderBy('published_at', 'desc')->get();

    $cabang=BranchOffice::with('office')->orderBy('name')->get();

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

        return view('index', compact('posts','banners'));
    }


// <a href="{{ route('wd.cetakKritikSaran', ['month' => request('month')]) }}" target="_blank">
//                 <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-black font-medium rounded-lg text-sm px-8 py-2.5 me-2 mb-2">
//                     UNDUH LAPORAN
//                 </button>
//             </a>

// <form method="GET" action="{{ route('wd.kritiksarans') }}" class="flex items-center">
//                 <select name="month" class="text-xs text-gray-700 uppercase py-1 ml-2 bg-EED3E6 rounded-md">
//                     <option  value="">Pilih Bulan</option>
//                     @foreach(range(1, 12) as $month)
//                         <option value="{{ $month }}" {{ request('month') == $month ? 'selected' : '' }}>
//                             {{ \Carbon\Carbon::create()->month($month)->translatedFormat('F') }}
//                         </option>
//                     @endforeach
//                 </select>
//                 <button type="submit" class="ml-2 mr-2 p-2 bg-EED3E6 text-gray-700 rounded-md">FILTER</button>
//             </form>
}