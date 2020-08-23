<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function order()
    {
      return $this->belongsTO('App\Order','order_id');  
    }
}
