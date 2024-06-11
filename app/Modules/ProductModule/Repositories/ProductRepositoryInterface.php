<?php

namespace App\Modules\ProductModule\Repositories;

interface ProductRepositoryInterface {
    public function findById($id);
    public function getTopFiveChicken();
    public function getAllProducts();
}
