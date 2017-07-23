<?php

namespace App\Http\Controllers\Repository;

use App\Product;

class ProductRepository
{
    public function insertProduct($product){
        $product = new Product($product);
        $product->save();
    }

    public function getSpecifiedProduct($brand_id){
        $product = Product::where('brand_id',$brand_id)->get();
        return $product;
    }
}