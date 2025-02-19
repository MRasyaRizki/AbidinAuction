<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Gate::define('isAdmin', function ($user) {
            return $user->id_level == 1;
        });

        Gate::define('isPetugas', function ($user) {
            return $user->id_level == 2;
        });

        Gate::define('isMasyarakat', function ($user) {
            return auth()->guard('masyarakat')->check();
        });
    }
}
