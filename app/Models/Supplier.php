<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'contact', 'email'];

    public function supplies()
    {
        return $this->belongsToMany(Supply::class)->withPivot('price')->withTimestamps();
    }
}