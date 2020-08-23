<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assets extends Model
{
    public function payment()
    {
        return $this->hasMany(Payment::class,'asset_id');
    }
    public function shop()
    {
        return $this->belongsTo(Shop::class,'shop_id');
    }
    protected $table='assets';
}
