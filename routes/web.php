<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\TvController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', [ProfileController::class, 'index'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/profile/your_watchlist', [ProfileController::class, 'showList'])->name('profile.list');
Route::get('/profile/your_ratings', [ProfileController::class, 'showRatings'])->name('profile.rating');

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/genres/{key}', [HomeController::class, 'showGenre'])->name('home.genre');
Route::get('/years/{year}', [HomeController::class, 'showYear'])->name('home.year');

Route::get('/movies', [MoviesController::class, 'index'])->name('movies.index');
Route::get('/movies/{movie}', [MoviesController::class, 'show'])->name('movies.show');
Route::post('/movies/{movie}', [MoviesController::class, 'store'])->name('movies.rate');
Route::post('/movies/{movie}/list', [MoviesController::class, 'storeList'])->name('movies.add');
Route::post('/movies/{movie}/review', [MoviesController::class, 'storeReview'])->name('movies.review');

Route::get('/tv', [TvController::class, 'index'])->name('tv.index');
Route::get('/tv/{tv}', [TvController::class, 'show'])->name('tv.show');
Route::post('/tv/{tv}', [TvController::class, 'store'])->name('tv.rate');
Route::post('/tv/{tv}/list', [TvController::class, 'storeList'])->name('tv.add');
Route::post('/tv/{tv}/review', [TvController::class, 'storeReview'])->name('tv.review');

Route::get('/actors', [ActorController::class, 'index'])->name('actors.index');
Route::get('/actors/page/{page?}', [ActorController::class, 'index'])->name('actors.index');
Route::get('/actors/{actor}', [ActorController::class, 'show'])->name('actors.show');
Route::post('/actors/{actor}', [ActorController::class, 'store'])->name('actors.rate');
Route::post('/actor/{actor}/review', [ActorController::class, 'storeReview'])->name('actors.review');

Route::get('/games', [GamesController::class, 'index'])->name('games.index');
Route::get('/games/{slug}', [GamesController::class, 'show'])->name('games.show');
Route::post('/games/{slug}', [GamesController::class, 'store'])->name('games.rate');
Route::post('/games/{slug}/review', [GamesController::class, 'storeReview'])->name('games.review');

Route::get('/slug', [HomeController::class, 'comingSoon'])->name('home.temp');

Route::get('/membership', function () {
    return view('membership');
	})->name('member.index');

Route::post('/membership', function () {
    return view('membership');
	})->name('member.store');

