<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function shop()
    {
      return $this->belongsTO(Shop::class,'shop_id');  
    }
    public function feedback()
    {
        return $this->hasMany(Feedback::class,'product_id');
    }
    public function stock()
    {
        return $this->hasOne(Stock::class,'product_id');
    }
       public function unit()
    {
      return $this->belongsTO(Unit::class,'unit_id');  
    }
}
