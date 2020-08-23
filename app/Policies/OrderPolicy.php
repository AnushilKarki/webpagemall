<?php

namespace App\Policies;

use App\Order;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    public function before($user,$ability)
    {
        if($user->hasRole('admin'))
        {
            return true;
        }
    }
  

 


}
