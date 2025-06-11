<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = strtolower($request->input('keyword'));

        // Redirect khusus
        if (in_array($keyword, ['sejarah', 'sejarah perusahaan'])) {
            return redirect('/profil/sejarah-perusahaan');
        }

        if (in_array($keyword, ['visi', 'misi', 'visi misi'])) {
            return redirect('/profil/visi-misi');
        }

        if (in_array($keyword, ['struktur', 'organisasi', 'struktur organisasi'])) {
            return redirect('/profil/struktur-organisasi');
        }

        if (in_array($keyword, ['profil', 'cabang', 'profil cabang','unit ikk', 'unit', 'ikk'])) {
            return redirect('/profil/profil-cabang-dan-unik-ikk');
        }

        if (in_array($keyword, ['abonemen'])) {
            return redirect('/pelanggan/abonemen');
        }

        if (in_array($keyword, ['tarif','tarif dasar', 'dasar'])) {
            return redirect('/pelanggan/tarif-dasar');
        }

        // Kalau bukan kata khusus, cari di posts
        $posts = Post::where('title', 'like', '%' . $keyword . '%')->paginate(1);
        $categories = Category::all();

        return view('hasil-pencarian', [
            'posts' => $posts,
            'categories' => $categories,
            'keyword' => $request->keyword
        ]);
    }
}
