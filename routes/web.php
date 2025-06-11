<?php

use App\Http\Controllers\AbonemenController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\TarifController;
use App\Models\Post;
use App\Models\TarifDasar;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index'
);

// Route::get('/search')->name('search');

Route::get('/post/{id}', [HomeController::class, 'show']);


// Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/search', [SearchController::class, 'search'])->name('search'); 
// dipake



// Route::get('/search', function () {
//     $searchQuery = request('search');
//     $searchQuery = strtolower($searchQuery);
//     $routes = [
//         'visi' => 'profil.visi-misi',
//         'misi' => 'profil.visi-misi',
//         'sejarah' => 'profil.sejarah-perusahaan',
//     ];

//     foreach ($routes as $keyword => $route) {
//         if (str_contains($searchQuery, $keyword)) {
//             return redirect()->route($route);
//         }
//     }
//     return redirect('/');
// });



// Route::get('/pencarian', function(){
//     return view('posts', ['title'=>'Hasil Pencarian', 'posts'=>Post::filter(request(['search', 'category']))->latest()->get()]);
// });

// Route::get('/post/{id}/comments', [CommentController::class, 'index']);
// Route::post('/post/{id}/comments', [CommentController::class, 'create']);
// Route::put('/comments/{id}', [CommentController::class, 'update']);
// Route::delete('comments/{id}', [CommentController::class, 'destroy']);

Route::get('/profil', function () {
    return view('profil');
})->name('profil');

Route::get('/berita', [PostController::class, 'index'])->name('berita');
Route::get('/berita/kategori/{slug}', [PostController::class, 'showByCategory'])->name('berita.kategori');


Route::get('/pelayanan', function () {
    return view('pelayanan');
})->name('pelayanan');
Route::prefix('profil')->group(function () {
    Route::get('/visi-misi',  [HomeController::class, 'posts'])->name('profil.visi-misi');
    Route::get('/sejarah-perusahaan', [SejarahController::class, 'posts'])->name('profil.sejarah-perusahaan');
    Route::get('/struktur-organisasi', [StrukturController::class, 'employee', 'posts'])->name('profil.struktur-organisasi');
    Route::get('/profil-cabang-dan-unit-ikk', [PostController::class, 'list'])->name('profil.profil-cabang-dan-unit-ikk');
});

Route::get('/pelanggan', function () {
    return view('pelanggan');
})->name('pelanggan');
Route::prefix('pelanggan')->group(function () {
    Route::get('/abonemen', [AbonemenController::class, 'posts'])->name('pelanggan.abonemen');
    Route::get('/tarif-dasar',[TarifController::class, 'posts'])->name('pelanggan.tarif-dasar');
    Route::get('/informasi-pelanggan', function () {
        return view('pelanggan.informasi-pelanggan');
    })->name('pelanggan.informasi-pelanggan');
});


// Route::get('download', [PdfController::class, 'downloadPosts'])->name('posts.pdf');
// Route::get('download/{id}', [PdfController::class, 'downloadPost'])->name('post.pdf');

// Route::get('cetakPost', [PostController::class, 'cetak'])->name('cetak.pdf');

Route::get('pdf/{post}', PdfController::class)->name('pdf'); 

Route::get('list-post', [PostController::class, 'show'])->name('list-post');
