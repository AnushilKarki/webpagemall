<?php

namespace App\Observers;
use Illuminate\Support\Facades\Mail;
use App\Shop;
use App\Order;
use App\Mail\ShopActivated;
class OrderObserver
{
    /**
     * Handle the shop "created" event.
     *
     * @param  \App\Shop  $shop
     * @return void
     */
    public function created(Shop $shop)
    {
        //
    }

    /**
     * Handle the shop "updated" event.
     *
     * @param  \App\Shop  $shop
     * @return void
     */
    public function updated(Order $order)
    {
       
       //check if active column is changed from inactive to active

       
if($order->getOriginal('is_paid')==false && $order->is_paid == true)
{
//send mail to customer
//Mail::to($shop->owner)->send(new ShopActivated($shop));

//change role from scustomer to sel ler
//$shop->owner->setRole('seller');

$sale = $order->sale()->create([
    'order_id' => $order->id,
    'user_id' => $order->user_id,
    'grand_total' => $order->grand_total,
    'item_count' => $order->item_count,
]);
}

    }

    /**
     * Handle the shop "deleted" event.
     *
     * @param  \App\Shop  $shop
     * @return void
     */
    public function deleted(Shop $shop)
    {
        //
    }

    /**
     * Handle the shop "restored" event.
     *
     * @param  \App\Shop  $shop
     * @return void
     */
    public function restored(Shop $shop)
    {
        //
    }

    /**
     * Handle the shop "force deleted" event.
     *
     * @param  \App\Shop  $shop
     * @return void
     */
    public function forceDeleted(Shop $shop)
    {
        //
    }
}
