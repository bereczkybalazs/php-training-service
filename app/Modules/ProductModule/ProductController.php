<?php

namespace App\Modules\ProductModule;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        protected Product $product,
        protected User $user,
        protected ProductRepository $productRepository,
        protected TopFiveChickenWithAllProductsHandler $topFiveChickenWithAllProductsHandler
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // product
        // user
        // product -> top 5, name === 'chicken'
        //return $this->product->newQuery()->getThisWonder();
        return $this->topFiveChickenWithAllProductsHandler->handle();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->product->newQuery()->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //return $this->product->newQuery()->find($id);
        return $this->productRepository->findById($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->product->newQuery()->find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->product->newQuery()->find($id)->delete();
    }
}
