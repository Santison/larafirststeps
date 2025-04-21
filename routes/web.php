<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\ProfesorController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('post', PostController::class);

Route::resource('profe', ProfesorController::class);

Route::resource('dashboard/post', PostController::class)->names('dashboard.post');
