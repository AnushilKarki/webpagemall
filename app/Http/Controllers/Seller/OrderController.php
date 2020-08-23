<?php
namespace App\Http\Controllers\Seller;
use App\Order;
use App\SubOrder;
use App\OrderItem;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        // $orders=Order::whereHas('items.shop',function($q){
        //     $q->where('user_id',auth()->id());
        // })
        // ->addSelect(
        //     [
        //         'item_count_seller' => OrderItem::selectRaw('count(*) as item_count')
        //         ->whereColumn('order_id','orders.id')
        //         ->whereHas('product.shop',function($q){
        //             $q->where('user_id',auth()->id());
        //         }),
        //     ]
        // )
        // ->get();

        //this is after using suborders table for seller orders

        $orders = SubOrder::where('seller_id',auth()->id())->get();
        return view('sellers.orders.index',compact('orders'));

        // $orders->map(function($order){
        //     $orderStatus = 'processing';
        //     $undelivereditems=$order->items()
        //     ->whereHas('shop',function($q){
        //         $q->where('user_id',auth()->id());
        //     })->whereNull('delivered_at')->count();
        //     if($undelivereditems == 0){
        //         $orderStatus='completed';
        //     }
        //     $order['seller_order_status']=$orderStatus;
        //     return $order;
        // });
   
    }
    public function show(SubOrder $suborder)
    {
    //  $items=$order->items()->whereHas('shop',function($q){
    //      $q->where('user_id',auth()->id());
    //  })->get();
    $items = $suborder->items;
     return view('sellers.orders.show',compact('items'));
    }
    public function markDelivered(SubOrder $suborder)
    {
        // $items = $order->items()->whereHas('shop',function($q){
        //     $q->where('user_id',auth()->id());
        // })->update(['delivered_at'=>now()]);

        $suborder->status = 'completed';
        $suborder->save();

        //check if all suborder complete
        $pendingSubOrders = $suborder->order->subOrders()->where('status','!=','completed')->count();
          if($pendingSubOrders == 0)
          {
              $suborder->order()->update(['status'=>'completed']);
          }
        return redirect('/seller/orders')->withMessage('Order marked completed');
    }
}