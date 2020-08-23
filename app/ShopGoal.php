<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopGoal extends Model
{
    public function owner()
    {
        return $this->belongsTo(Shop::class,'shop_id');
    }

protected $table='shop_goals';
}
