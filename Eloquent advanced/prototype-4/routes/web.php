<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth', 'role:admin')->group(function() {

Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');
Route::get('/store', [ArticleController::class, 'store'])->name('articles.store');
Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});


Route::get('/', [ArticleController::class, 'index'])->name('articles.index');

