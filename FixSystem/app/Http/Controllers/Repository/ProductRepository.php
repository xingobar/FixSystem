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

    public function getFirstProductName(){
        $product = Product::select('name')->orderBy('id','asc')->first();
        return $product->name;
    }

    public function getModelByProductName($name){
        $model = Product::select('model','id')
                          ->where('name',$name)
                          ->get();
        return $model;
    }
}