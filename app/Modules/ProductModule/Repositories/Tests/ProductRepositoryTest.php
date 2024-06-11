<?php

namespace App\Modules\ProductModule\Repositories\Tests;

use App\Models\Product;
use App\Modules\ProductModule\Repositories\ProductRepository;
use Illuminate\Database\Query\Builder;
use PHPUnit\Framework\TestCase;

class ProductRepositoryTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_find_by_id(): void
    {
        $id = 5;

        $queryBuilderMock = $this->createMock(Builder::class);
        $queryBuilderMock->expects($this->once())
            ->method('find')
            ->with($id);

        $productMock = $this->createMock(Product::class);
        $productMock->expects($this->once())
            ->method('newQuery')
            ->willReturn($queryBuilderMock);

        $productRepository = new ProductRepository($productMock);
        $productRepository->findById($id);
    }
}
