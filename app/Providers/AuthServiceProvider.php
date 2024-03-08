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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    public static $permissions = [
        'operator-only'      => ['manager', 'operator'],
        'manager-only'       => ['manager'],
        'manage-backends'    => ['manager', 'operator'],
        'manage-managers'    => ['manager'],
        'manage-resellers'   => ['manager'],
        'manage-members'     => ['manager', 'operator'],
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Roles based authorization
        Gate::before(
            function ($user, $ability) {
                if ($user->role === 'admin') {
                    return true;
                }
            }
        );

        foreach (self::$permissions as $action => $roles) {
            Gate::define(
                $action,
                function ($user) use($roles) {
                    if (in_array($user->role, $roles)) {
                        return true;
                    }
                }
            );
        }

    }
}
