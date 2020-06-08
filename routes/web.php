<?php

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

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::namespace('Client')
    ->name('client.')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('index');

        Route::get('/posts', 'PostController@index')->name('posts.index');

        Route::get('/post', function () {
            return view('client.post.index');
        })->name('post.index');
    });
