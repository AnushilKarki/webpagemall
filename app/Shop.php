<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable=['name','description',];
    public function owner()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function product()
    {
        return $this->hasMany(Product::class,'shop_id');
    }
    public function goal()
    {
        return $this->hasMany(ShopGoal::class,'shop_id');
    }
    public function credit()
    {
        return $this->hasMany(Credit::class,'shop_id');
    }
    public function income()
    {
        return $this->hasMany(Income::class,'shop_id');
    }
    public function expense()
    {
        return $this->hasMany(Expense::class,'shop_id');
    }
    public function asset()
    {
        return $this->hasMany(Assets::class,'shop_id');
    }
    public function capital()
    {
        return $this->hasMany(Capital::class,'shop_id');
    }
    public function liability()
    {
        return $this->hasMany(Liability::class,'shop_id');
    }
    public function purchase()
    {
        return $this->hasMany(Purchase::class,'shop_id');
    }
    public function return()
    {
        return $this->hasMany(ReturnProduct::class,'shop_id');
    }
    public function advertise()
    {
        return $this->hasMany(Advertise::class,'shop_id');
    }
    public function feedback()
    {
        return $this->hasMany(Feedback::class,'shop_id');
    }
    public function payment()
    {
        return $this->hasMany(Payment::class,'shop_id');
    }
    public function order()
    {
        return $this->belongsToMany(Order::class,'shop_orders','shop_id','order_id');
    }
protected $table='shops';
}
