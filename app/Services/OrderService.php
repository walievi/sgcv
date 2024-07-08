<?php

namespace App\Services;

use App\Models\Order;
use App\Http\Requests\OrderRequest;

class OrderService
{
    public function create(OrderRequest $request): Order
    {
        $order = Order::create($request->validated());
        $this->syncProducts($order, $request->input('products', []));
        return $order;
    }

    public function update(OrderRequest $request, Order $order): Order
    {
        $order->update($request->validated());
        $this->syncProducts($order, $request->input('products', []));
        return $order;
    }

    public function delete(Order $order): void
    {
        $order->delete();
    }

    protected function syncProducts(Order $order, array $products)
    {
        $data = [];
        foreach ($products as $productId => $details) {
            if (!empty($details['id'])) {
                $data[$productId] = ['quantity' => $details['quantity']];
            }
        }
        $order->products()->sync($data);
    }
}