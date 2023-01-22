<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function ($user) {
            return $user->role_id == 1;
        });
        Gate::define('moder', function ($user) {
            return $user->role_id == 2;
        });
        Gate::define('admin-moderator', function ($user) {
            return $user->role_id == 1 || $user->role_id == 2;
        });
    }
}
