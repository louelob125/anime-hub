<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController; 
use App\Http\Controllers\AnimeController; 
use App\Http\Controllers\AuthorController; 
use App\Http\Controllers\GenreController; 
use App\Http\Controllers\TypeController; 
use App\Http\Controllers\PlatformController; 
use App\Http\Controllers\CollectionController; 
use App\Http\Controllers\CharacterController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('admin', AdminController::class);
    Route::resource('anime', AnimeController::class);
    Route::resource('author', AuthorController::class);
    Route::resource('genre', GenreController::class);
    Route::resource('type', TypeController::class);
    Route::resource('platform', PlatformController::class);
    Route::resource('collection', CollectionController::class);
    Route::resource('character', CharacterController::class);

});

require __DIR__.'/auth.php';
