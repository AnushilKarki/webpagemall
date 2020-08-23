<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function shop()
    {
        return $this->belongsTo(Shop::class,'shop_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function credit()
    {
        return $this->belongsTo(Credit::class,'credit_id');
    }
    public function income()
    {
        return $this->belongsTo(Income::class,'income_id');
    }
    public function expense()
    {
        return $this->belongsTo(Expense::class,'expense_id');
    }
    public function asset()
    {
        return $this->belongsTo(Assets::class,'asset_id');
    }
    public function capital()
    {
        return $this->belongsTo(Capital::class,'capital_id');
    }
    public function liability()
    {
        return $this->belongsTo(Liability::class,'liability_id');
    }
    public function return()
    {
        return $this->belongsTo(ReturnProduct::class,'return_id');
    }
    public function advertise()
    {
        return $this->belongsTo(Advertise::class,'advertise_id');
    }
    public function purchase()
    {
        return $this->belongsTo(Purchase::class,'purchase_id');
    }
}
