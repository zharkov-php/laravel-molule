<?php

// Modules/Product/Providers/ProductServiceProvider.php

namespace Modules\Product\Providers;

use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(module_path('Product', 'Database/Migrations'));
        $this->loadRoutesFrom(module_path('Product', 'Routes/web.php'));
        $this->loadViewsFrom(module_path('Product', 'Resources/views'), 'product');
        $this->loadTranslationsFrom(module_path('Product', 'Resources/lang'), 'product');
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

