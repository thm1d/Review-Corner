<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;


Route::get('/', [MoviesController::class, 'index'])->name('movies.index');
Route::get('/movies/{movie}', 'MoviesController@show')->name('movies.show');

