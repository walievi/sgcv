<?php

namespace App\Services;

use App\Models\Supply;
use App\Http\Requests\SupplyRequest;

class SupplyService
{
    public function create(SupplyRequest $request): Supply
    {
        $supply = Supply::create($request->validated());
        $this->syncSuppliers($supply, $request->input('suppliers', []));
        return $supply;
    }

    public function update(SupplyRequest $request, Supply $supply): Supply
    {
        $supply->update($request->validated());
        $this->syncSuppliers($supply, $request->input('suppliers', []));
        return $supply;
    }

    public function delete(Supply $supply): void
    {
        $supply->delete();
    }

    protected function syncSuppliers(Supply $supply, array $suppliers)
    {
        $data = [];
        foreach ($suppliers as $supplierId => $details) {
            if (!empty($details['id'])) {
                $data[$supplierId] = ['price' => $details['price']];
            }
        }
        $supply->suppliers()->sync($data);
    }
}