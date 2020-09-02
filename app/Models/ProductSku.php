<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class ProductSku extends Model
{
    protected $fillable = ['title', 'description', 'price', 'stock'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

//    public function cartItem()
//    {
//        return $this->hasMany(Carbon::class);
//    }
}
