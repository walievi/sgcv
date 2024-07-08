<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Supply;
use App\Http\Requests\SupplyRequest;
use App\Services\SupplyService;

class SupplyController extends Controller
{
    protected $supplyService;

    public function __construct(SupplyService $supplyService)
    {
        $this->supplyService = $supplyService;
    }

    public function index()
    {
        $supplies = Supply::all();
        return view('supplies.index', compact('supplies'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        return view('supplies.create', compact('suppliers'));
    }

    public function store(SupplyRequest $request)
    {
        $supply = $this->supplyService->create($request);
        return redirect()->route('supplies.index')->with('success', 'Insumo criado com sucesso!');
    }

    public function show(Supply $supply)
    {
        return view('supplies.show', compact('supply'));
    }

    public function edit(Supply $supply)
    {
        $suppliers = Supplier::all();
        return view('supplies.edit', compact('supply', 'suppliers'));
    }

    public function update(SupplyRequest $request, Supply $supply)
    {
        $this->supplyService->update($request, $supply);
        return redirect()->route('supplies.index')->with('success', 'Insumo atualizado com sucesso!');
    }

    public function destroy(Supply $supply)
    {
        $this->supplyService->delete($supply);
        return redirect()->route('supplies.index')->with('success', 'Insumo deletado com sucesso!');
    }
}