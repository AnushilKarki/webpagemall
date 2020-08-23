<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Models\Category as ModelsCategory;
class Category extends ModelsCategory
{
    public function products()
    {
        return $this->belongsToMany(Product::class,'product_categories');
    }
    public function child()
   {
       return $this->hasMany(Category::class,'parent_id');
   }
   public function allProducts()
   {
       $allProducts=collect([]);
       $mainCategoryProducts = $this->products;
       $allProducts = $allProducts->concat($mainCategoryProducts);
  
        foreach($this->children as $child){
            $allProducts=$allProducts->concat($child->products);
               }
       
       return $allProducts;
   }
}
