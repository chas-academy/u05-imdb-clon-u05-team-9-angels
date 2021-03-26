<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

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
// get all
Route::get('/movie', [MovieController::class, 'index']);
Route::get('/movies/all', [MovieController::class, 'getAll']);
Route::post('/movies/edit/{id}', [MovieController::class, 'store']); // creates post route, sending request to moviecontroller class and runs store fx

// get specific
Route::get('/movies/{id}', [MovieController::class, 'getMovie']);

Route::resource('actors', ActorController::class);

Route::get('/', function () {
    return view('welcome');
});

//Auth stuff
//profile
Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['auth'])->name('dashboard');

//SuperUser stuff
// handle users
Route::get('/dashboard/users', [UserController::class, 'getUsersForAdmin'])->middleware(['auth'])->name('users');
Route::get('/dashboard/users/edit/{id}', [UserController::class, 'editUser'])->middleware(['auth']);
Route::post('/dashboard/users/edit/{id}/update', [UserController::class, 'store'])->middleware(['auth']);
Route::delete('/dashboard/users/edit/{id}/delete', [UserController::class, 'destroy'])->middleware(['auth']);
Route::post('/dashboard/users/edit/create', [UserController::class, 'create'])->middleware(['auth']);
Route::post('/dashboard/movies/create', [MovieController::class, 'create'])->middleware(['auth']);

//comments
Route::post('/movies/comment/create/{id}', [CommentController::class, 'create'])->middleware(['auth']);
Route::post('/movies/comment/update/{id}', [CommentController::class, 'update'])->middleware(['auth']);
Route::delete('/movies/comment/delete/{id}', [CommentController::class, 'destroy'])->middleware(['auth']);

//create movie
Route::get('/dashboard/movie', [MovieController::class, 'createMoviePage'])->middleware(['auth'])->name('movie');

require __DIR__ . '/auth.php';