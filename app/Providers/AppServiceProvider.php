<?php

namespace App\Providers;

use App\Modules\ProductModule\Repositories\ChickenProductRepository;
use App\Modules\ProductModule\Repositories\ProductRepository;
use App\Modules\ProductModule\Repositories\ProductRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ChickenProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
