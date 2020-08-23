<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public function purchase()
    {
        return $this->hasMany(Purchase::class,'supplier_id');
    }
    public function shops()
    {
        return $this->belongsToMany(Shop::class,'shop_suppliers','supplier_id','shop_id');
    }
}
