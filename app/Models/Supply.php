<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supply extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description'];

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class)->withPivot('price')->withTimestamps();
    }

    public function getCheapestSupplierAttribute()
    {
        return $this->suppliers->sortBy('pivot.price')->first();
    }
}