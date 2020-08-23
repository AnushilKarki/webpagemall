<?php
use App\Order;
namespace App\Http\Controllers;
use NunoMaduro\Collision\Provider;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
class PayPalController extends Controller
{
    public function getExpressCheckout()
    {
  
        $cart=\Cart::session(auth()->id());

        $cartitems = array_map( function($item){
            return[
                'name'=>$item['name'],
                'price'=>$item['price'],
                'qty'=>$item['quantity']
            ];
        },$cart->getContent()->toarray());


        $checkoutData = [
            'items'=>$cartitems,

            'return_url'=>route('paypal.success'),
            'cancel_url'=>route('paypal.cancel'),
            'invoice_id'=>uniqid(),
            'invoice_description'=>"order description",
            'total'=>$cart->getTotal()
        ];
        $provider = new ExpressCheckout;
        $response = $provider->setExpressCheckout($checkoutData);
 dd($response);

       //  return redirect($response['paypal_link']);
    }
    public function cancelpage()
    {
dd('payment_canceled');
    }
}
