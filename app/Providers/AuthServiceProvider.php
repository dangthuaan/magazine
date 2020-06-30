<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\Models\User' => 'App\Policies\UserPolicy',
        'App\Models\Role' => 'App\Policies\RolePolicy',
        'App\Models\Post' => 'App\Policies\PostPolicy',
        'App\Models\Category' => 'App\Policies\CategoryPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //profile
        Gate::define('profile.view', 'App\Policies\UserPolicy@overviewProfile');
        Gate::define('profile.update', 'App\Policies\UserPolicy@updateProfile');

        //users
        Gate::define('users.view', 'App\Policies\UserPolicy@view');
        Gate::define('users.update', 'App\Policies\UserPolicy@update');

        //roles
        Gate::resource('roles', 'App\Policies\RolePolicy');

        //posts
        Gate::resource('posts', 'App\Policies\PostPolicy');

        //categories
        Gate::resource('categories', 'App\Policies\CategoryPolicy');
    }
}
