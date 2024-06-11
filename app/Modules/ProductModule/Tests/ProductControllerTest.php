<?php

namespace App\Modules\ProductModule\Tests;

use App\Builders\WonderBuilder;
use App\Models\Product;
use App\Models\User;
use App\Modules\ProductModule\ProductController;
use App\Modules\ProductModule\Repositories\ProductRepositoryInterface;
use App\Modules\ProductModule\TopFiveChickenWithAllProductsHandler;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;

class ProductControllerTest extends TestCase
{
    private function getProductController(Builder $builder)
    {
        $productMock = $this->createMock(Product::class);

        $productMock->expects($this->once())
            ->method('newQuery')
            ->willReturn($builder);

        $productRepositoryMock = $this->createMock(ProductRepositoryInterface::class);
        $topFiveChickenWithAllProductsHandlerMock = $this->createMock(TopFiveChickenWithAllProductsHandler::class);
        $userMock = $this->createMock(User::class);
        return new ProductController($productMock, $userMock, $productRepositoryMock, $topFiveChickenWithAllProductsHandlerMock);
    }

    private function getRequestMock($request){
        $requestMock = $this->createMock(Request::class);
        $requestMock->expects($this->once())->method('all')->willReturn($request);

        return $requestMock;
    }

    private function getFindByIdQueryBuilderMock($id, $willReturn = []) {
        $queryBuilderMock = $this->createMock(Builder::class);
        $queryBuilderMock->expects($this->once())
            ->method('find')
            ->with($id)
            ->willReturn($willReturn);

        return $queryBuilderMock;
    }

    public function test_index_page() {
        $productMock = $this->createMock(Product::class);
        $userMock = $this->createMock(User::class);
        $productRepositoryMock = $this->createMock(ProductRepositoryInterface::class);
        $topFiveChickenWithAllProductsHandlerMock = $this->createMock(TopFiveChickenWithAllProductsHandler::class);


        $topFiveChickenWithAllProductsHandlerMock->expects($this->once())->method('handle');

        $productController = new ProductController($productMock, $userMock, $productRepositoryMock, $topFiveChickenWithAllProductsHandlerMock);
        $productController->index();
    }

    public function test_show_page() {
        $id = 2;

        //$queryBuilderMock = $this->getFindByIdQueryBuilderMock($id);
        //$queryBuilderMock = $this->createMock(Builder::class);

        $productMock = $this->createMock(Product::class);
        $userMock = $this->createMock(User::class);
        $productRepositoryMock = $this->createMock(ProductRepositoryInterface::class);
        $topFiveChickenWithAllProductsHandlerMock = $this->createMock(TopFiveChickenWithAllProductsHandler::class);


        $productRepositoryMock->expects($this->once())->method('findById')->with($id);

        $productController = new ProductController($productMock, $userMock, $productRepositoryMock, $topFiveChickenWithAllProductsHandlerMock);
        $productController->show($id);


//        $productRepositoryMock->expects($this->once())
//            ->method('find')
//            ->with($id)
//            ->willReturn($queryBuilderMock);

        // $this->getProductController($queryBuilderMock)->show($id);
    }

    public function test_store() {
        $request = [
            'name' => 'new product name',
            'price' => 200
        ];

        $requestMock = $this->getRequestMock($request);

        $queryBuilderMock = $this->createMock(Builder::class);
        $queryBuilderMock
            ->expects($this->once())
            ->method('create')
            ->with($request);

        $this->getProductController($queryBuilderMock)->store($requestMock);
    }

    public function test_update() {
        $id = 4;
        $request = [
            'name' => 'asdqwe',
            'price' => 100
        ];

        $requestMock = $this->getRequestMock($request);

        $productMock = $this->createMock(Product::class);
        $productMock
            ->expects($this->once())
            ->method('update')
            ->with($request);

        $queryBuilderMock = $this->getFindByIdQueryBuilderMock($id, $productMock);


        $this->getProductController($queryBuilderMock)->update($requestMock, $id);
    }

    public function test_destroy() {
        $id = 3;

        $productMock = $this->createMock(Product::class);
        $productMock
            ->expects($this->once())
            ->method('delete');

        $queryBuilderMock = $this->getFindByIdQueryBuilderMock($id, $productMock);

        $this->getProductController($queryBuilderMock)->destroy($id);
    }
}
