<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public function shop()
    {
        return $this->belongsTo(Shop::class,'shop_id');
    }
    public function payment()
    {
        return $this->hasMany(Payment::class,'expense_id');
    }
}
