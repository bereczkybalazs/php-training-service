<?php

namespace App\Modules\ProductModule\Handlers;

use App\Modules\ProductModule\Repositories\ProductRepositoryInterface;
use App\Modules\ProductModule\Transformers\TopFiveChickenWithNameIdTransformerInterface;

class TopFiveChickenWithAllProductsHandler implements TopFiveChickenWithAllProductsHandlerInterface
{
    public function __construct(private ProductRepositoryInterface $productRepository, private TopFiveChickenWithNameIdTransformerInterface $topFiveChickenWithNameIdTransformer) {}
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
