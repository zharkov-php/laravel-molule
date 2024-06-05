<?php

// Modules/User/Providers/UserServiceProvider.php

namespace Modules\User\Providers;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(module_path('User', 'Database/Migrations'));
        $this->loadRoutesFrom(module_path('User', 'Routes/web.php'));
        $this->loadViewsFrom(module_path('User', 'Resources/views'), 'user');
        $this->loadTranslationsFrom(module_path('User', 'Resources/lang'), 'user');
        $this->loadFactoriesFrom(__DIR__.'/../Database/factories');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Register your service here
    }
}

