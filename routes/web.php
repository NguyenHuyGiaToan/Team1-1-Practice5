<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenRouterController;
//Nguyễn Huy Gia Toàn
Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);
Route::get('/theloai/{id}', [App\Http\Controllers\MovieController::class, 'theloai']);
//
Route::get('/openrouter', [OpenRouterController::class, 'chat']);

//Nguyễn Trọng Minh
Route::get('/movie_add', [App\Http\Controllers\AdminMovieController::class, 'movie_add'])->name("movie_add");
Route::post('/movie_add', [App\Http\Controllers\AdminMovieController::class, 'movie_add_func'])->name("movie_add_func");
Route::post('/movie_delete/{id}', [App\Http\Controllers\AdminMovieController::class, 'movie_delete'])->name("movie_delete");
Route::get('/movie_manager', [App\Http\Controllers\AdminMovieController::class, 'movie_manager'])->name("movie_manager");

//Nguyễn Thị Bích Ngân
Route::get('/chitiet/{id}', [App\Http\Controllers\DetailMovieController::class, 'chitiet']);
Route::post('/timkiem', [App\Http\Controllers\DetailMovieController::class, 'search']);
