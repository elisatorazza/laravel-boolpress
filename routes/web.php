<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::prefix('admin')->name('admin.')->namespace('Admin')->middleware('auth')->group(function() {
    Route::resource('article', 'ArticleController');
    });

Route::get('article', 'ArticleController@index')->name('articles.index');
Route::get('article/{slug}', 'ArticleController@show')->name('articles.show');