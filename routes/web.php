<?php

use Illuminate\Support\Facades\Artisan;
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

Route::middleware('guest')
    ->namespace('Auth')
    ->name('auth.')
    ->group(function () {
        //login
        Route::get('login', 'LoginController@index')->name('login');

        Route::post('login', 'LoginController@authenticate')->name('login.authenticate');

        //logout
        Route::get('logout', 'LoginController@logout')->name('logout')
            ->middleware('auth')
            ->withoutMiddleware('guest');

        //register
        Route::get('register', 'RegisterController@index')->name('register');

        Route::post('register', 'RegisterController@store')->name('register.store');

        //verify registered account
        Route::middleware('verified.redirect')->group(function () {
            Route::get('register/{id}/verification',
                'Verification\VerificationController@index')->name('register.verify.index');

            Route::get('register/{id}/verification/resend',
                'Verification\VerificationController@resend')->name('register.verify.resend');

            Route::get('register/{id}/{token}', 'Verification\VerificationController@verify')->name('register.verify');
        });

        //reset password
        Route::get('password-reset', 'ResetPasswordController@index')->name('password');

        Route::post('password-reset', 'ResetPasswordController@mail')->name('password.email');

        Route::get('reset-password/{token}', 'ResetPasswordController@form')->name('password.form');

        Route::post('reset-password/{token}', 'ResetPasswordController@reset')->name('password.reset');
    });

Route::middleware('verified')
    ->namespace('Client')
    ->name('client.')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('index');

        Route::get('/posts', 'PostController@index')->name('posts.index');

        Route::get('/post/{id}', 'PostController@show')->name('posts.show');

        Route::post('/post/{id}/store-comment', 'CommentController@store')->name('comments.store');
    });

Route::middleware(['auth', 'verified'])
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('index');

        //users
        Route::get('/users', 'UserController@list')->name('users.list');

        //block user
        Route::post('/users/block', 'UserController@block')->name('users.block');

        //unblock user
        Route::post('/users/unblock', 'UserController@unblock')->name('users.unblock');

        //search user
        Route::get('/users/search', 'UserController@search')->name('users.search');

        Route::get('/groups', 'UserController@group')->name('users.group');

        //posts
        Route::get('/posts', 'PostController@list')->name('posts.list');

        //new post
        Route::post('/posts', 'PostController@store')->name('posts.store');

        //search post
        Route::get('/posts/search', 'PostController@search')->name('posts.search');

        //show post
        Route::get('/posts/{id}', 'PostController@show')->name('posts.show');

        //update post
        Route::post('/posts/{id}', 'PostController@update')->name('posts.update');

        //remove post
        Route::post('/posts/{id}/remove', 'PostController@destroy')->name('posts.destroy');

        //restore post
        Route::post('/posts/{id}/remove/restore', 'PostController@restore')->name('posts.restore');

        //categories
        Route::get('/categories', 'CategoryController@list')->name('categories.list');

        //new categories
        Route::post('/categories', 'CategoryController@store')->name('categories.store');

        //show category
        Route::get('/categories/{id}', 'CategoryController@show')->name('categories.show');

        //update category
        Route::post('/categories/{id}', 'CategoryController@update')->name('categories.update');

        //remove category
        Route::delete('/categories/{id}', 'CategoryController@destroy')->name('categories.destroy');

        //update user profile
        //update password
        Route::get('/profile/password', 'ProfileController@password')->name('profile.password');
        Route::post('/profile/password', 'ProfileController@updatePassword')->name('profile.password.update');

        //update information
        Route::get('/profile/{username}', 'ProfileController@overview')->name('profile.overview');
        Route::post('/profile', 'ProfileController@update')->name('profile.update');

    });

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');

    return "Cache is cleared";
});
