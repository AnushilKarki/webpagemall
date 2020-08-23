<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function return()
    {
        return $this->belongsToMany(ReturnProduct::class,'sales_returned_details','sale_id','return_id')->withPivot('quantity','price');
    }
    public function sales()
    {
        return $this->belongsToMany(Product::class,'sales_product_details','sale_id','product_id')->withPivot('quantity','price');
    }
    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }
    public function owner()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
