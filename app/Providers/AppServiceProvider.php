<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        try {
            Permission::get()->map(function ($permission) {
                Gate::define($permission->name, function ($user) use ($permission) {
                    return $user->hasPermissionTo($permission);
                });
            });
        } catch (\Exception $e) {
            report($e);
        }

        Blade::directive('role', function ($role) {
            return "<?php if(auth()->check() && auth()->user()->hasRole({$role})) : ?>";
        });

        Blade::directive('endrole', function ($role) {
            return "<?php endif; ?>";
        });
        
        Blade::directive('can', function ($permission) {
            return "<?php if(auth()->check() && auth()->user()->can({$permission})) : ?>";
        });

        Blade::directive('endcan', function () {
            return "<?php endif; ?>";
        });
    }

    
}
