<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::define('categories.view' , function ($user){

        });
        Gate::define('categories.create' , function ($user){

        });
        Gate::define('categories.update' , function ($user){

        });
        Gate::define('categories.delete' , function ($user){

        });
    }
}
