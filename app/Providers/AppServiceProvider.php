<?php

namespace App\Providers;

use App\Modules\ProductModule\Handlers\TopFiveChickenWithAllProductsHandler;
use App\Modules\ProductModule\Handlers\TopFiveChickenWithAllProductsHandlerInterface;
use App\Modules\ProductModule\Repositories\ChickenProductRepository;
use App\Modules\ProductModule\Repositories\ProductRepositoryInterface;
use App\Modules\ProductModule\Transformers\TopFiveChickenWithNameIdTransformer;
use App\Modules\ProductModule\Transformers\TopFiveChickenWithNameIdTransformerInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ChickenProductRepository::class);
        $this->app->bind(TopFiveChickenWithAllProductsHandlerInterface::class, TopFiveChickenWithAllProductsHandler::class);
        $this->app->bind(TopFiveChickenWithNameIdTransformerInterface::class, TopFiveChickenWithNameIdTransformer::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
