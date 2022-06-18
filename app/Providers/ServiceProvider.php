<?php

namespace App\Providers;

use App\Services\CategoryService;
use App\Services\Interfaces\CategoryInterface;
use App\Services\Interfaces\ProductInterface;
use App\Services\ProductService;
use Illuminate\Support\ServiceProvider as BaseProvider;

class ServiceProvider extends BaseProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(CategoryInterface::class, CategoryService::class);
        $this->app->singleton(ProductInterface::class, ProductService::class);
    }
}
