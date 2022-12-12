<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/dashboard/categories', function () {
    return view('categories');
})->middleware(['auth', 'verified'])->name('categories');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [PostsController::class, 'index'])->name('index');
    Route::post('/', [PostsController::class, 'store'])->name('store')->middleware('auth');
    Route::get('/create', [PostsController::class, 'create'])->name('create')->middleware('auth');
    Route::get('/search', [SearchController::class, 'index'])->name('search');
    Route::get('/{blog}', [PostsController::class, 'show'])->name('show');
    Route::match(['put', 'patch'], '/{blog}', [PostsController::class, 'update'])->name('update')->middleware('auth');
    Route::delete('/{blog}', [PostsController::class, 'destroy'])->name('destroy')->middleware('auth');
    Route::get('/{blog}/edit', [PostsController::class, 'edit'])->name('edit')->middleware('auth');
});