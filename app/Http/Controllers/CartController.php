<?php

namespace App\Http\Controllers;
use App\Coupon;
use Illuminate\Http\Request;
use App\Product;
class CartController extends Controller
{
    public function add(Product $product)
    {
   \Cart::session(auth()->id())->add(array(
'id'=> $product->id,
'name' => $product->name,
'price' => $product->subunitprice,
'quantity'=>1,
'attributes'=>array(),
'associateModel'=>$product
   ));
   return redirect()->route('cart.index');
    }
    public function index()
    {
        $cartitems=\Cart::session(auth()->id())->getContent();
        return view('cart.index',compact('cartitems'));
    }
    public function destroy($itemid)
    {
        \Cart::session(auth()->id())->remove($itemid);
        return back();
    }
   public function update($rowid)
   {
       \Cart::session(auth()->id())->update($rowid,[
           'quantity' =>[
               'relative'=>false,
               'value'=>request('quan')
           ]
       ]);
       return back();
   }
   public function checkout()
   {
       return view('cart.checkout');
   }
    public function applyCoupon()
    {
        $couponCode = request('coupon_code');

        $couponData = Coupon::where('code', $couponCode)->first();

        if(!$couponData) {
            return back()->withMessage('Sorry! Coupon does not exist');
        }


        //coupon logic
        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => $couponData->name,
            'type' => $couponData->type,
            'target' => 'total',
            'value' => $couponData->value,
        ));

        Cart::session(auth()->id())->condition($condition); // for a speicifc user's cart


        return back()->withMessage('coupon applied');

    }
}
