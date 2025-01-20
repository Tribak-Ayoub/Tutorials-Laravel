<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;

Route::get('/welcome', [ExampleController::class, 'showWelcome']);
Route::get('/user/{id}', [ExampleController::class, 'showUser']);
