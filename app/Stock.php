<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function owner()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
