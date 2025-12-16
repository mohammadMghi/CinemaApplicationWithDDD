<?php

use App\Http\Controllers\Movie\AllMovieController;
use App\Http\Controllers\Movie\CreateMovieController;
use App\Http\Controllers\Movie\UpdateMovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/movie',[CreateMovieController::class , 'index']);
Route::get('/movie',[AllMovieController::class , 'index']);
Route::put('/movie',[UpdateMovieController::class , 'index']);