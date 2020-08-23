<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturnProduct extends Model
{
    public function payment()
    {
        return $this->hasMany(Payment::class,'return_id');
    }
    public function shop()
    {
        return $this->belongsTo('App\Shop','shop_id');
    }
    public function items()
    {
        return $this->belongsToMany(Product::class,'product_returns','return_id','product_id')->withPivot('quantity','price');
    }
}
