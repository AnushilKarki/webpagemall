<?php
namespace App\Http\Controllers\Seller;
use App\Order;
use App\SubOrder;
use App\OrderItem;
use App\Product;
use App\Assets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Capital;
use App\Liability;
use App\Income;
use App\Expense;
use App\Purchase;
use App\ReturnProduct;
use App\Payment;
use Illuminate\Support\Facades\DB;
class PaymentController extends Controller
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

        //this is after particular table for seller 
        
 //Assets of particular seller
         $assets=Assets::whereHas('shop',function($q){
             $q->where('user_id',auth()->id());
         })->get();
   //Capital of particular seller
         $capitals=Capital::whereHas('shop',function($q){
             $q->where('user_id',auth()->id());
         })->get();
   //Liability of particular seller
         $liabilities=Liability::whereHas('shop',function($q){
             $q->where('user_id',auth()->id());
         })->get();
 //Income of particular seller
         $incomes=Income::whereHas('shop',function($q){
             $q->where('user_id',auth()->id());
         })->get();
   //Expense of particular seller
         $expenses=Expense::whereHas('shop',function($q){
             $q->where('user_id',auth()->id());
         })->get();
   //Purchase of particular seller
         $purchases=Purchase::whereHas('shop',function($q){
             $q->where('user_id',auth()->id());
         })->get();
 //Return of particular seller
         $returns=ReturnProduct::whereHas('shop',function($q){
             $q->where('user_id',auth()->id());
         })->get();
   
        return view('sellers.payments.index',compact('assets','capitals','liabilities','incomes','expenses','purchases','returns'));

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
    public function showAsset($particular)
    {
    //  $items=$order->items()->whereHas('shop',function($q){
    //      $q->where('user_id',auth()->id());
    //  })->get();
$particulars = DB::table('assets')->where('id', $particular)->get();
  
    $paymentfor='asset';
     return view('sellers.payments.show',compact('particulars','paymentfor'));
    }
 public function showCapital($particular)
    {
    //  $items=$order->items()->whereHas('shop',function($q){
    //      $q->where('user_id',auth()->id());
    //  })->get();
$particulars = DB::table('capitals')->where('id', $particular)->get();
   
  $paymentfor='capital';
     return view('sellers.payments.show',compact('particulars','paymentfor'));
    }
 public function showLiability($particular)
    {
    //  $items=$order->items()->whereHas('shop',function($q){
    //      $q->where('user_id',auth()->id());
    //  })->get();
$particulars = DB::table('liabilities')->where('id', $particular)->get();
  $paymentfor='liability';
     return view('sellers.payments.show',compact('particulars','liability'));
    }
 public function showIncome($particular)
    {
    //  $items=$order->items()->whereHas('shop',function($q){
    //      $q->where('user_id',auth()->id());
    //  })->get();
  $particulars = DB::table('incomes')->where('id', $particular)->get();
  $paymentfor='income';
     return view('sellers.payments.show',compact('particulars','paymentfor'));
    }
 public function showExpense($particular)
    {
    //  $items=$order->items()->whereHas('shop',function($q){
    //      $q->where('user_id',auth()->id());
    //  })->get();
  $particulars = DB::table('expenses')->where('id', $particular)->get();
  $paymentfor='expense';
     return view('sellers.payments.show',compact('particulars','paymentfor'));
    }
 public function showPurchase($particular)
    {
    //  $items=$order->items()->whereHas('shop',function($q){
    //      $q->where('user_id',auth()->id());
    //  })->get();
    $particulars = DB::table('purchases')->where('id', $particular)->get();
  $paymentfor='purchase';
     return view('sellers.payments.show',compact('particulars','paymentfor'));
    }
 public function showReturn($particular)
    {
    //  $items=$order->items()->whereHas('shop',function($q){
    //      $q->where('user_id',auth()->id());
    //  })->get();
  $particulars = DB::table('return_products')->where('id', $particular)->get();
  $paymentfor='return';
     return view('sellers.payments.show',compact('particulars','paymentfor'));
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

    public function store(Request $request)
    {
  $request->validate([
        'paymentfor' => 'required',
        'total' => 'required',
        'particular' => 'required',
        'type' => 'required',
        'payment_method' => 'required',
        'paid' => 'required',
        'id'=>'required'
        ]);
      
        $payment=new Payment();
        $payment->shop_id = auth()->user()->shop->id;
       
        $payment->total = $request->input('total');
        $payment->particular = $request->input('particular');
        $payment->type = $request->input('type');
        $payment->payment_method = $request->input('payment_method');
        $payment->paid = $request->input('paid');
 $type = $request->input('paymentfor');
 $total = $request->input('total');
 $paid = $request->input('paid');
$remaining=$total-$paid;
$payment->remaining = $remaining;
if($remaining<0)
{
return redirect()->back();
}
$id = $request->input('id');
if($type=='asset')
{
$payment->asset_id = $request->input('id');
}
elseif($type=='capital')
{
$payment->capital_id = $request->input('id');
}
elseif($type=='income')
{
$payment->income_id = $request->input('id');
}
elseif($type=='expense')
{
$payment->expense_id = $request->input('id');
}
elseif($type=='purchase')
{
$payment->purchase_id = $request->input('id');
}
elseif($type=='return')
{
$payment->return_id = $request->input('id');
}
else
{
$payment->liability_id = $request->input('id');
}
$payment->save();
//to update the is_paid table for particular
if($remaining==0)
{
if($type=='asset')
{
 $affected = DB::table('assets')
              ->where('id',$id)
              ->update(['is_paid' => true]);

}
elseif($type=='capital')
{
 $affected = DB::table('capitals')
              ->where('id',$id)
              ->update(['is_paid' => true]);
}
elseif($type=='income')
{
 $affected = DB::table('incomes')
              ->where('id',$id)
              ->update(['is_paid' => true]);
}
elseif($type=='expense')
{
 $affected = DB::table('expenses')
              ->where('id',$id)
              ->update(['is_paid' => true]);
}
elseif($type=='purchase')
{
 $affected = DB::table('purchases')
              ->where('id',$id)
              ->update(['is_paid' => true]);
}
elseif($type=='return')
{
 $affected = DB::table('returns')
              ->where('id',$id)
              ->update(['is_paid' => true]);
}
else
{
 $affected = DB::table('liabilities')
              ->where('id',$id)
              ->update(['is_paid' => true]);
}
}
else
{
    if($type=='asset')
{
 $affected = DB::table('assets')
              ->where('id',$id)
              ->update(['total' => $remaining]);

}
elseif($type=='capital')
{
 $affected = DB::table('capitals')
              ->where('id',$id)
              ->update(['total' => $remaining]);
}
elseif($type=='income')
{
 $affected = DB::table('incomes')
              ->where('id',$id)
              ->update(['total' => $remaining]);
}
elseif($type=='expense')
{
 $affected = DB::table('expenses')
              ->where('id',$id)
              ->update(['total' => $remaining]);
}
elseif($type=='purchase')
{
 $affected = DB::table('purchases')
              ->where('id',$id)
              ->update(['total' => $remaining]);
}
elseif($type=='return')
{
 $affected = DB::table('returns')
              ->where('id',$id)
              ->update(['total' => $remaining]);
}
else
{
 $affected = DB::table('liabilities')
              ->where('id',$id)
              ->update(['total' => $remaining]);
}
}
   return redirect('/seller/payments')->withMessage('payment completed');
    }
}
