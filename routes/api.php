<?php

use App\Http\Controllers\Movie\CreateMovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/movie',[CreateMovieController::class , 'index']);