<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ArticleController;
use Modules\News\Http\Controllers\NewsController;
use Modules\Tour\Http\Controllers\TourController;


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

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Redirect from root if logged in
Route::get('/', function () {
    return Auth::check() ? redirect('/news') : view('login');
});


// Routes for articles
Route::prefix('/')->group(function () {
    Route::get('/create', [ArticleController::class, 'create'])->name('create');
    Route::post('/', [ArticleController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [ArticleController::class, 'edit'])->name('edit');
    Route::put('/{id}', [ArticleController::class, 'update'])->name('update');
});

