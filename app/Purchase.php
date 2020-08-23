<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function payment()
    {
        return $this->hasMany('App\Payment','purchase_id');
    }
    public function shop()
    {
        return $this->belongsTo('App\Shop','shop_id');
    }
    public function items()
    {
        return $this->belongsToMany(Product::class,'purchased_product_details','purchase_id','product_id')->withPivot('quantity','price');
    }
    public function returns()
    {
        return $this->belongsToMany(ReturnProduct::class,'purchased_return_details','purchase_id','return_id')->withPivot('quantity','total_amount');
    }
    public function supplier()
    {
        return $this->belongsTo('App\Supplier','supplier_id');
    }
}
