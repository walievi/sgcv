<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supply;
use App\Http\Requests\ProductRequest;
use App\Services\ProductService;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $supplies = Supply::all();
        return view('products.create', compact('supplies'));
    }

    public function store(ProductRequest $request)
    {
        $this->productService->create($request);
        return redirect()->route('products.index')->with('success', 'Produto criado com sucesso!');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $supplies = Supply::all();
        return view('products.edit', compact('product', 'supplies'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $this->productService->update($request, $product);
        return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Product $product)
    {
        $this->productService->delete($product);
        return redirect()->route('products.index')->with('success', 'Produto deletado com sucesso!');
    }
}