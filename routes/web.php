<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ActorController;

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
// Route::get('/movie', [MovieController::class, 'index']);
// Route::get('/movie', [MovieController::class, 'getAll']);
Route::get('/movies/all', [MovieController::class, 'getAll']);

// get specific
Route::get('/movies/{id}', [MovieController::class, 'getMovie']);
Route::get('/actor/{id}', [ActorController::class, 'getActor']);

Route::get('/actor', [ActorController::class, 'getAll']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
