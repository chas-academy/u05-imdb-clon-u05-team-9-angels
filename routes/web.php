<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ActorController;

use App\Http\Controllers\UserController;

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

Route::get('/user/{id}', [UserController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
