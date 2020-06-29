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

        Route::get('reset-password/{token}',
            'ResetPasswordController@form')->name('password.form')->withoutMiddleware('guest');

        Route::post('reset-password/{token}',
            'ResetPasswordController@reset')->name('password.reset')->withoutMiddleware('guest');
    });

Route::middleware('verified')
    ->namespace('Client')
    ->name('client.')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('index');

        Route::get('/posts', 'PostController@index')->name('posts.index');

        Route::get('/post/{id}', 'PostController@show')->name('posts.show');

        Route::post('/post/{id}/comment', 'CommentController@store')->name('comments.store');

        Route::get('/comment/{commentId}', 'CommentController@edit')->name('comments.edit');

        Route::put('/comment/{commentId}', 'CommentController@update')->name('comments.update');

        Route::delete('/comment/{commentId}', 'CommentController@destroy')->name('comments.destroy');
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

        //show user role form
        Route::get('/users/{id}/roles', 'UserController@showRole')->name('users.roles.show');

        //set user role
        Route::post('/users/{id}/roles', 'UserController@assignRole')->name('users.roles.assign');

        //user groups (roles)
        Route::get('/groups', 'RoleController@index')->name('users.group');

        //new groups (roles)
        Route::post('/groups', 'RoleController@store')->name('users.group.store');

        //show group (role)
        Route::get('/groups/{id}', 'RoleController@edit')->name('users.group.edit');

        //update group (role)
        Route::put('/groups/{id}', 'RoleController@update')->name('users.group.update');

        //delete group (role)
        Route::delete('/groups/{id}', 'RoleController@destroy')->name('users.group.destroy');

        //permissions
        Route::get('/groups/{id}/permissions', 'PermissionController@show')->name('users.group.permission.show');

        //permission role update
        Route::post('/groups/{id}/permissions', 'PermissionController@update')->name('users.group.permission.update');

        //posts
        Route::get('/posts', 'PostController@list')->name('posts.list');

        //form new post
        Route::get('/posts/new', 'PostController@form')->name('posts.new');

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

        //form new categories
        Route::get('/categories/new', 'CategoryController@form')->name('categories.new');

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
        Route::put('/profile/password', 'ProfileController@updatePassword')->name('profile.password.update');

        //forgot password
        Route::post('profile/forgot-password', 'ProfileController@forgotPassword')->name('profile.password.forgot');

        //update information
        Route::get('/profile/{username}', 'ProfileController@overview')->name('profile.overview');
        Route::post('/profile/{username}', 'ProfileController@update')->name('profile.update');

    });

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');

    return "Cache is cleared";
});
