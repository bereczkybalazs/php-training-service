<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository {

    public function __construct(protected Product $product) {}
    public function findById($id){
        return $this->product->newQuery()->find($id);
    }
}
