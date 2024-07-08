<?php
namespace App\Services;

use App\Models\Supplier;
use App\Http\Requests\SupplierRequest;

class SupplierService
{
    public function create(SupplierRequest $request): Supplier
    {
        return Supplier::create($request->validated());
    }

    public function update(SupplierRequest $request, Supplier $supplier): Supplier
    {
        $supplier->update($request->validated());
        return $supplier;
    }

    public function delete(Supplier $supplier): void
    {
        $supplier->delete();
    }
}