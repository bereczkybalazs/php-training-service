<?php

namespace App\Modules\ProductModule;

use App\Models\Product;

class ProductRepository {

    public function __construct(protected Product $product) {}
    public function findById($id){
        return $this->product->newQuery()->find($id);
    }

    public function getTopFiveChicken() {
        return $this->product->newQuery()->where('name', '=', 'chicken')->limit(5)->get();
    }

    public function getAllProducts() {
        return $this->product->newQuery()->all();
    }
}
