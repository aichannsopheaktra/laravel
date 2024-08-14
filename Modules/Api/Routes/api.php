<?php

use Illuminate\Http\Request;
use Modules\Api\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/articleList', [ApiController::class, 'articleList'])->name('article.List')->middleware('auth:api');
Route::get('/article/{id}', [ApiController::class, 'articleById'])->name('article.by.id')->middleware('auth:api');
Route::post('/login', [ApiController::class, 'login'])->name('login');
Route::middleware('auth:api')->get('/api', function (Request $request) {
    return $request->user();
});
