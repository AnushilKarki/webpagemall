<?php
use App\Order;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/contact', 'HomeController@contact')->name('contact');

Route::get('/addtocart/{product}','CartController@add')->name('cart.add')->middleware('auth');

Route::get('/cart','CartController@index')->name('cart.index')->middleware('auth');

Route::get('/cartdestroy/{itemid}','CartController@destroy')->name('cart.destroy')->middleware('auth');

Route::get('/cartupdate/{itemid}','CartController@update')->name('cart.update')->middleware('auth');

Route::get('/cartcheckout','CartController@checkout')->name('cart.checkout')->middleware('auth');

Route::resource('orders','OrderController')->middleware('auth');

Route::get('/paypal/checkout','PayPalController@getExpressCheckout')->name('paypal.checkout');

Route::get('/paypal/checkout-success','PayPalController@getExpressCheckoutsuccess')->name('paypal.success');

Route::get('/products/search','ProductController@search')->name('product.search');

Route::get('/cart/apply-coupon', 'CartController@applyCoupon')->name('cart.coupon')->middleware('auth');

//Route::get('/paypal/checkout-cancel','PayPalController@getExpressCheckoutcancel')->name('paypal.cancel');

Route::resource('shops','ShopController');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::resource('products','ProductController');

Route::group(['prefix'=>'seller','middleware'=>'auth'],function(){
    Route::redirect('/','seller/orders');
    Route::get('/orders/delivered/{suborder}','Seller\OrderController@markDelivered')->name('seller.order.delivered');
    Route::get('/orders/show/{suborder}','Seller\OrderController@show')->name('seller.orders.show');
Route::resource('/orders','Seller\OrderController');
});

Route::group(['prefix'=>'seller','middleware'=>'auth'],function(){
    Route::redirect('/','seller/payments');
    Route::get('/payment/completed/{particular}','Seller\PaymentController@markCompleted')->name('seller.payment.completed');
    Route::get('/payment/show/asset/{particular}','Seller\PaymentController@showAsset')->name('seller.payment.show.asset');
  Route::get('/payment/show/capital/{particular}','Seller\PaymentController@showCapital')->name('seller.payment.show.capital');
 Route::get('/payment/show/liability/{particular}','Seller\PaymentController@showLiability')->name('seller.payment.show.liability');
  Route::get('/payment/show/income/{particular}','Seller\PaymentController@showIncome')->name('seller.payment.show.income');
 Route::get('/payment/show/expense/{particular}','Seller\PaymentController@showExpense')->name('seller.payment.show.expense');
  Route::get('/payment/show/purchase/{particular}','Seller\PaymentController@showPurchase')->name('seller.payment.show.purchase');
  Route::get('/payment/show/return/{particular}','Seller\PaymentController@showReturn')->name('seller.payment.show.return');
Route::resource('/payments','Seller\PaymentController');
});

Route::get('/test',function(){
$o = Order::find(2);
$o->generateSubOrders();
});
