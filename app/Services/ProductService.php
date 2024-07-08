<?php

namespace App\Services;

use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductService
{
    public function create(ProductRequest $request): Product
    {
        $product = Product::create($request->validated());
        $product->supplies()->sync($request->input('supplies', []));
        return $product;
    }

    public function update(ProductRequest $request, Product $product): Product
    {
        $product->update($request->validated());
        $product->supplies()->sync($request->input('supplies', []));
        return $product;
    }

    public function delete(Product $product): void
    {
        $product->delete();
    }
}