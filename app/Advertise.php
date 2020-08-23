<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    public function payment()
    {
        return $this->hasMany(Payment::class,'advertise_id');
    }
    public function shop()
    {
        return $this->belongsTo('App\Shop','shop_id');
    }
}
