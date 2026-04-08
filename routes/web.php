<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenRouterController;
//Nguyễn Huy Gia Toàn
Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);

Route::get('/theloai/{id}', [App\Http\Controllers\MovieController::class, 'theloai']);
//

Route::get('/openrouter', [OpenRouterController::class, 'chat']);
Route::get('/chitiet/{id}', [App\Http\Controllers\DetailMovieController::class, 'chitiet']);

Route::post('/timkiem', [App\Http\Controllers\DetailMovieController::class, 'search']);