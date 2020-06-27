<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $permissions = Permission::with('roles')->get();
        foreach( $permissions as $permission )
        {
            Gate::define($permission->name, function(User $user) use ($permission)
            {
                return $user->hasPermission($permission);
            });
        }

        Gate::before(function (User $user) {
            
            if( $user->hasAnyRoles('Desenvolvedor'))
                return true;

        });
    }
}
