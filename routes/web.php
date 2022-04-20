<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\NilaiController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('articles', ArticleController::class);

Route::get('article/cetak_pdf', [ArticleController::class, 'cetak_pdf']);

Route::resource('/mahasiswa', MahasiswaController::class);

Route::get('/mahasiswa/nilai/{mahasiswa}', [NilaiController::class, 'index']);

Route::get('/nilai/cetak/{mahasiswa}', [NilaiController::class, 'cetak_pdf']);
