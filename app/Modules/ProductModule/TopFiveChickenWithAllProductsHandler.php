<?php

namespace App\Modules\ProductModule;

use App\Modules\ProductModule\Repositories\ProductRepositoryInterface;

class TopFiveChickenWithAllProductsHandler
{
    public function __construct(private ProductRepositoryInterface $productRepository, private TopFiveChickenWithNameIdTransformer $topFiveChickenWithNameIdTransformer) {}
    public function handle()  {
        $topFiveChicken = $this->productRepository->getTopFiveChicken();
        $products = $this->productRepository->getAllProducts();

        return [
            'topFiveChicken' => $topFiveChicken,
            'products' => $products,
            'topFiveChickenWithNameIds' => $this->topFiveChickenWithNameIdTransformer->transform($topFiveChicken)
        ];
    }
}
