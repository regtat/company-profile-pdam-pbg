<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/post/{id}', [HomeController::class, 'show']);

Route::get('/post/{id}/comments', [CommentController::class, 'index']);
Route::post('/post/{id}/comments', [CommentController::class, 'create']);
Route::put('/comments/{id}', [CommentController::class, 'update']);
Route::delete('comments/{id}', [CommentController::class, 'destroy']);

Route::get('/profil', function () {
    return view('profil');
})->name('profil');

Route::get('/pelayanan', function () {
    return view('pelayanan');
})->name('pelayanan');
Route::prefix('profil')->group(function () {
    Route::get('/visi-misi', function () {
        return view('profil.visi-misi');
    })->name('profil.visi-misi');
    Route::get('/sejarah-perusahaan', function () {
        return view('profil.sejarah-perusahaan');
    })->name('profil.sejarah-perusahaan');
    Route::get('/struktur-organisasi', function () {
        return view('profil.struktur-organisasi');
    })->name('profil.struktur-organisasi');
    Route::get('/profil-cabang-dan-unit-ikk', function () {
        return view('profil.profil-cabang');
    })->name('profil.profil-cabang-dan-unit-ikk');
});

Route::get('/pelanggan', function () {
    return view('pelanggan');
})->name('pelanggan');
Route::prefix('pelanggan')->group(function () {
    Route::get('/abonemen', function () {
        return view('pelanggan.abonemen');
    })->name('pelanggan.abonemen');
    Route::get('/tarif-dasar', function () {
        return view('pelanggan.tarif-dasar');
    })->name('pelanggan.tarif-dasar');
    Route::get('/informasi-pelanggan', function () {
        return view('pelanggan.informasi-pelanggan');
    })->name('pelanggan.informasi-pelanggan');
});
