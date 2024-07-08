<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = ['customer_name'];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity')->withTimestamps();
    }

    public function getTotalCostAttribute()
    {
        return $this->products->reduce(function ($totalCost, $product) {
            return $totalCost + ($product->pivot->quantity * $product->cost);
        }, 0);
    }
}