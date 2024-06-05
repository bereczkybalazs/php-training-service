<?php

namespace Tests\Integration\Controller;

use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use PHPUnit\Framework\TestCase;

class ProductControllerTest extends TestCase
{
    private function getProductController(Builder $builder)
    {
        $productMock = $this->createMock(Product::class);

        $productMock->expects($this->once())
            ->method('newQuery')
            ->willReturn($builder);

        $userMock = $this->createMock(User::class);
        return new ProductController($productMock, $userMock);
    }

    public function test_index_page() {
        $queryBuilderMock = $this->createMock(Builder::class);
        $queryBuilderMock
            ->expects($this->once())
            ->method('get');

        $this->getProductController($queryBuilderMock)->index();
    }
}
