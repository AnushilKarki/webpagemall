<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryid=request('category_id');
        $categoryName = null;
        if($categoryid)
        {
            $category=Category::find($categoryid);
            $categoryName = $category->name;
            $products=$category->products;
        }
        else
        {
            $products=Product::take(30)->get();
        }
        return view('product.index',compact('products','categoryName'));
    }

 public function search(Request $request)
 {
  $query=$request->input('query');
  $products=Product::where('name','LIKE',"%$query%")->paginate(3);
  return view('product.catalog',compact('products'));   
 }
}
