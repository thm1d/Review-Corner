<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\TvController;


Route::get('/', [MoviesController::class, 'index'])->name('movies.index');
Route::get('/movies/{movie}', [MoviesController::class, 'show'])->name('movies.show');

Route::get('/tv', [TvController::class, 'index'])->name('tv.index');
Route::get('/tv/{tv}', [TvController::class, 'show'])->name('tv.show');

Route::get('/actors', [ActorController::class, 'index'])->name('actors.index');
Route::get('/actors/page/{page?}', [ActorController::class, 'index'])->name('actors.index');

Route::get('/actors/{actor}', [ActorController::class, 'show'])->name('actors.show');

