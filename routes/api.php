<?php

use App\Http\Controllers\Api\AlbumController;
use App\Http\Controllers\Api\ArtistController;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\PlaylistController;
use App\Http\Controllers\Api\SongController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::apiResource('artists' , ArtistController::class);
Route::apiResource('albums' , AlbumController::class);
Route::apiResource('genres' , GenreController::class);
Route::apiResource('songs' , SongController::class);
Route::apiResource('playlists' , PlaylistController::class);