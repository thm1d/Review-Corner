<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\TvController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PaymentController;

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

// Route::get('/dashboard', [ProfileController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::group(['middleware' => ['auth']], function() {
	Route::get('/dashboard', [ProfileController::class, 'index'])->name('dashboard');
	Route::post('/dashboard/{id}', [ProfileController::class, 'update'])->name('user.update');

	Route::get('/admin/users', [AdminController::class, 'usersIndex'])->name('admin.users');
	Route::post('/admin/users/{id}', [AdminController::class, 'userDestroy'])->name('user.destroy');
	Route::get('/admin/ratings', [AdminController::class, 'ratingsIndex'])->name('admin.ratings');
	Route::get('/admin/donations', [AdminController::class, 'donationsIndex'])->name('admin.donation');
	Route::post('/admin/donations/{id}', [AdminController::class, 'donationUpdate'])->name('donation.update');
	Route::get('/admin/reviews', [AdminController::class, 'reviewsIndex'])->name('admin.reviews');
	Route::post('/admin/reviews/{id}', [AdminController::class, 'reviewDestroy'])->name('review.destroy');
	Route::get('/admin/messages', [AdminController::class, 'formIndex'])->name('admin.msgs');

	Route::get('/superadmin/users', [SuperAdminController::class, 'usersIndex'])->name('super.users');
	Route::post('/superadmin/users/{id}', [SuperAdminController::class, 'userDestroy'])->name('super.user.destroy');
	Route::get('/superadmin/admins', [SuperAdminController::class, 'adminsIndex'])->name('super.admins');
	Route::post('/superadmin/admins/{id}', [SuperAdminController::class, 'adminDestroy'])->name('super.admin.destroy');
	Route::get('/superadmin/ratings', [SuperAdminController::class, 'ratingsIndex'])->name('super.ratings');
	Route::get('/superadmin/donations', [SuperAdminController::class, 'donationsIndex'])->name('super.donation');
	Route::post('/superadmin/donations/{id}', [SuperAdminController::class, 'donationUpdate'])->name('super.update');
	Route::get('/superadmin/reviews', [SuperAdminController::class, 'reviewsIndex'])->name('super.reviews');
	Route::post('/superadmin/reviews/{id}', [SuperAdminController::class, 'reviewDestroy'])->name('super.review.destroy');
	Route::get('/superadmin/messages', [SuperAdminController::class, 'formIndex'])->name('super.msgs');

});

require __DIR__.'/auth.php';

Route::get('/profile/your_watchlist', [ProfileController::class, 'showList'])->name('profile.list');
Route::get('/profile/your_donations', [ProfileController::class, 'showDonations'])->name('profile.donation');
Route::get('/profile/your_ratings', [ProfileController::class, 'showRatings'])->name('profile.rating');

Route::get('/', [HomePageController::class, 'index'])->name('home.index');
Route::get('/genres/{key}/{value}', [HomePageController::class, 'showGenre'])->name('home.genre');
Route::get('/years/{year}', [HomePageController::class, 'showYear'])->name('home.year');

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
Route::get('/actors/page/{page?}', [ActorController::class, 'index'])->name('actorsp.index');
Route::get('/actors/{actor}', [ActorController::class, 'show'])->name('actors.show');
Route::post('/actors/{actor}', [ActorController::class, 'store'])->name('actors.rate');
Route::post('/actor/{actor}/review', [ActorController::class, 'storeReview'])->name('actors.review');

Route::get('/games', [GamesController::class, 'index'])->name('games.index');
Route::get('/games/{slug}', [GamesController::class, 'show'])->name('games.show');
Route::post('/games/{slug}', [GamesController::class, 'store'])->name('games.rate');
Route::post('/games/{slug}/review', [GamesController::class, 'storeReview'])->name('games.review');

Route::get('/slug', [HomePageController::class, 'comingSoon'])->name('home.temp');

Route::get('/donation', [PaymentController::class, 'index'])->name('donate.index');
Route::post('/donation', [PaymentController::class, 'store'])->name('donate.store');

Route::get('/contact', function(){
	return view('contact');
})->name('contact.index');
Route::post('/contact', [HomePageController::class, 'contactController'])->name('contact.store');

