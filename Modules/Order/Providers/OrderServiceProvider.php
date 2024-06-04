<?php

// Modules/Order/Providers/OrderServiceProvider.php

namespace Modules\Order\Providers;

use Illuminate\Support\ServiceProvider;

class OrderServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(module_path('Order', 'Database/Migrations'));
        $this->loadRoutesFrom(module_path('Order', 'Routes/web.php'));
        $this->loadViewsFrom(module_path('Order', 'Resources/views'), 'order');
        $this->loadTranslationsFrom(module_path('Order', 'Resources/lang'), 'order');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Register your services here
    }
}

