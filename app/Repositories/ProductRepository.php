<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository {
    public function findById($id){
        return Product::find($id);
    }
}
