<?php

namespace App\Modules\ProductModule;

class TopFiveChickenWithAllProductsHandler
{
    public function __construct(private ProductRepository $productRepository, private TopFiveChickenWithNameIdTransformer $topFiveChickenWithNameIdTransformer) {}
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
