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
        Gate::define('roles.view', 'App\Policies\RolePolicy@view');
        Gate::define('roles.create', 'App\Policies\RolePolicy@create');
        Gate::define('roles.update', 'App\Policies\RolePolicy@update');
        Gate::define('roles.delete', 'App\Policies\RolePolicy@delete');

        //posts
        Gate::define('posts.view', 'App\Policies\PostPolicy@view');
        Gate::define('posts.create', 'App\Policies\PostPolicy@create');
        Gate::define('posts.update', 'App\Policies\PostPolicy@update');
        Gate::define('posts.delete', 'App\Policies\PostPolicy@delete');

        //categories
        Gate::define('categories.view', 'App\Policies\CategoryPolicy@view');
        Gate::define('categories.create', 'App\Policies\CategoryPolicy@create');
        Gate::define('categories.update', 'App\Policies\CategoryPolicy@update');
        Gate::define('categories.delete', 'App\Policies\CategoryPolicy@delete');
    }
}
