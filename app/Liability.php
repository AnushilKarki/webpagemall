<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liability extends Model
{
    public function payment()
    {
        return $this->hasMany(Payment::class,'liability_id');
    }
    public function shop()
    {
        return $this->belongsTo(Shop::class,'shop_id');
    }
}
