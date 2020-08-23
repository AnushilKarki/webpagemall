<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    
    public function shop()
    {
        return $this->belongsTo(Shop::class,'shop_id');
    }
    public function payment()
    {
        return $this->hasMany(Payment::class,'income_id');
    }
}
