<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;  
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');  
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::middleware('auth')->get('/{any}', function () {
    return view('app'); // Blade view that mounts your Vue app
})->where('any', '.*');
