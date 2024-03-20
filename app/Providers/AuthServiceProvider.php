<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Enums\UserRole;

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
        $this->registerPolicies();

        /**
         * Define permissions
         * 
         * Please add permission at app/Enums/UserRole.php permissions() method
         */
        foreach (UserRole::permissions() as $permission => $roles) {
            Gate::define($permission, function ($user) use ($roles) {
                return in_array($user->role, $roles);
            });
        }
    }
}
