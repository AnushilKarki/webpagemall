<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function items()
    {
        return $this->belongsToMany(Product::class,'order_items','order_id','product_id')->withPivot('quantity','price');
    }
    public function service()
    {
        return $this->hasOne(Service::class,'order_id');
    }
    public function invoice()
    {
        return $this->hasOne(Invoice::class,'order_id');
    }
    public function sale()
    {
        return $this->hasOne(Sale::class,'order_id');
    }
    public function owner()
    {
        return $this->belongsTo(User::class,'user_id');
    }
   public function shop()
    {
        return $this->belongsToMany(Shop::class,'shop_orders','order_id','shop_id');
    }
    public function subOrders()
    {
        return $this->hasMany(SubOrder::class);
    }
    public function generateSubOrders()
    {
        $orderItems=$this->items;
        foreach($orderItems->groupBy('shop_id') as $shopId => $products){
            $shop = Shop::find($shopId);
        
           $suborder= $this->subOrders()->create([
                'order_id'=> $this->id,
                'seller_id'=>$shop->user_id,
                'grand_total'=>$products->sum('pivot.price'),
                'item_count'=> $products->count()
            ]);
            foreach($products as $product){
                $suborder->items()->attach($product->id,['price'=>$product->pivot->price,'quantity'=>$product->pivot->quantity]);

            }
        }

        
    }
}
