<?php

namespace App\Http\Controllers\Service;

use App\Product;

class ProductService
{
    public function isExists($name,$model,$brand_id){
        $count = Product::where('name',$name)
                ->where('model',$model)
                ->where('brand_id',$brand_id)->count();
        return ($count > 0);
    }
}