<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\WatchlistController;
use App\Models\User;


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

// MOVIE ROUTES
// get all movies
Route::get('/movies', [MovieController::class, 'index']);
// edit movie
Route::post('/movies/edit/{id}', [MovieController::class, 'store']); // creates post route, sending request to moviecontroller class and runs store fx
// delete movie
Route::delete('/movies/delete/{id}', [MovieController::class, 'destroy']); 
// get specific movie
Route::get('/movies/{id}', [MovieController::class, 'getMovie']);
// create movie
Route::get('/dashboard/movie', [MovieController::class, 'createMoviePage'])->middleware(['auth'])->name('movie');
Route::post('/dashboard/movies/create', [MovieController::class, 'create'])->middleware(['auth']);

// ACTORS
Route::resource('actors', ActorController::class);

Route::get('/', [WelcomeController::class, 'index']);


//AUTH STUFF
// profile
Route::get('/dashboard', [UserController::class, 'getUser'])->middleware(['auth'])->name('dashboard');

//SUPER-USER STUFF
// handle users
Route::get('/dashboard/users', [UserController::class, 'getUsersForAdmin'])->middleware(['auth'])->name('users');
Route::get('/dashboard/users/edit/{id}', [UserController::class, 'editUser'])->middleware(['auth']);
Route::post('/dashboard/users/edit/{id}/update', [UserController::class, 'store'])->middleware(['auth']);
Route::delete('/dashboard/users/edit/{id}/delete', [UserController::class, 'destroy'])->middleware(['auth']);
Route::post('/dashboard/users/edit/create', [UserController::class, 'create'])->middleware(['auth']);

// COMMENTS
Route::post('/movies/comment/create/{id}', [CommentController::class, 'create'])->middleware(['auth']);
Route::post('/movies/comment/update/{id}', [CommentController::class, 'update'])->middleware(['auth']);
Route::delete('/movies/comment/delete/{id}', [CommentController::class, 'destroy'])->middleware(['auth']);

// WATCHLIST
// add to watchlist
Route::get('/movies/add-to-watchlist/{id}', [WatchlistController::class, 'create'])->middleware(['auth']);
// remove from watchlist
Route::get('/movies/remove-from-watchlist/{id}', [WatchlistController::class, 'destroy'])->middleware(['auth']); // possible to use DELETE method?

require __DIR__ . '/auth.php';
