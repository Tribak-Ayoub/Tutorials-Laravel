<?php

use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('photos', PhotoController::class)->only(['index', 'create']);

Route::resource('photos', PhotoController::class)->except(['store', 'update']);