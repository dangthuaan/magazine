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
        Route::middleware('verified')->group(function () {
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

        Route::get('/post', function () {
            return view('client.post.index');
        })->name('post.index');
    });

Route::namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('index');
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
