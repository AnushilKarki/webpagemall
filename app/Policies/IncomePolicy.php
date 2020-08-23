<?php

namespace App\Policies;

use App\Income;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IncomePolicy
{
    use HandlesAuthorization;


    //policy filter so admin can be authorized for all action
    public function before($user,$ability)
    {
        if($user->hasRole('admin'))
        {
            return true;
        }
    }
//let the seller view Shop
    public function browse(User $user)
    {
        return $user->hasRole('Seller');
    }
//let only exact seller to read 

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Shop  $shop
     * @return mixed
     */
    
    public function read(User $user, Income $income)
    {
        if(empty($income->shop)){
            return false;
        }
        return $user->id==$income->shop->user_id;
    }
    
    public function edit(User $user, Income $income)
    {
        if (empty($income->shop)) {
            return false;
        }

        return $user->id==$income->shop->user_id;
    }
    

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function add(User $user)
    {
       return $user->hasRole('Seller');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Shop  $shop
     * @return mixed
     */
    public function update(User $user, Income $income)
    {
        if(empty($income->shop())){
            return false;
        }
        return $user->id==$income->shop->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Shop  $shop
     * @return mixed
     */
    public function delete(User $user, Income $income)
    {
        if (empty($income->shop)) {
            return false;
        }
        return $user->id==$income->shop->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Shop  $shop
     * @return mixed
     */
 

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Shop  $shop
     * @return mixed
     */
 
}
