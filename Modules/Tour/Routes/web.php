<?php

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

// Protected routes
Route::middleware('auth.redirect')->group(function () {
    Route::prefix('tour')->group(function() {
        Route::get('/', [TourController::class, 'index'])->name('tour.index');
        Route::get('/{id}', [TourController::class, 'show'])->name('tour.show');
    });
});
