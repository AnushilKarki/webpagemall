<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    public function owner()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function shop()
    {
        return $this->belongsTo('App\Shop','shop_id');
    }
    public function payment()
    {
        return $this->hasMany(Payment::class,'credit_id');
    }
protected $table='credits';
}
