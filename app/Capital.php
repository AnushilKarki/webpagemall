<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capital extends Model
{
    public function payment()
    {
        return $this->hasMany(Payment::class,'capital_id');
    }
    public function shop()
    {
        return $this->belongsTo(Shop::class,'shop_id');
    }
}
