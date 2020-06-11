<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('index');
        Route::get('/login', 'HomeController@login')->name('login');
        Route::get('/register', 'HomeController@register')->name('register');
        Route::get('/forgot', 'HomeController@forgot')->name('forgot');
        Route::get('/users', 'UserController@list')->name('users.list');
        Route::get('/groups', 'UserController@group')->name('users.group');
        Route::get('/posts', 'PostController@list')->name('posts.list');
        Route::get('/categories', 'CategoryController@list')->name('categories.list');
        Route::get('/profile', 'ProfileController@overview')->name('profile.overview');
        Route::get('/profile/password', 'ProfileController@password')->name('profile.password');
    });

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');

    return "Cache is cleared";
});
