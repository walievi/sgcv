<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description'];

    public function supplies()
    {
        return $this->belongsToMany(Supply::class);
    }

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class, 'supplier_product')->withPivot('price');
    }

    public function getCostAttribute()
    {
        return $this->supplies->reduce(function ($totalCost, $supply) {
            $cheapestSupplier = $supply->suppliers->sortBy('pivot.price')->first();
            return $totalCost + ($cheapestSupplier->pivot->price ?? 0);
        }, 0);
    }
}