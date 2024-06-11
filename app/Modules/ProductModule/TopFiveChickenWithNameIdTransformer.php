<?php

namespace App\Modules\ProductModule;

class TopFiveChickenWithNameIdTransformer {
    public function transform($topFiveChicken) {
        return $topFiveChicken->map(function($product) {
            $product->name_id = $product->name . $product->id;
            return $product;
        });
    }
}
