<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        Gate::define('isUser', function () {
            return Auth::user()->role == 0;
        });
        Gate::define('isAdmin', function () {
            return Auth::user()->role == 1;
        });
        Gate::define('isKepalaDepartemen', function () {
            return Auth::user()->role == 2;
        });
    }
}
