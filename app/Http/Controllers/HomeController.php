<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use TCG\Voyager\Models\Category;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     //   $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        return view('contact');
    }
    public function index()
    {
        $products=Product::take(20)->get();
$categories=Category::whereNull('parent_id')->get();

        return view('home',['products'=>$products,'categories'=>$categories]);
    }
}
