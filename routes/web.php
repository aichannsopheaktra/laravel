<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Article;

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
    $newsArticles = Article::where('type', true)->get(); // 1 for news
    return view('news::index',compact('newsArticles'));
});
Route::get('/tour', function () {
    $tourArticles = Article::where('type', false)->get(); // 1 for tour
    return view('tour::index',compact('tourArticles'));
});

