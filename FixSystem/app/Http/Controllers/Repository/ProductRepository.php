<?php

namespace App\Http\Controllers\Repository;

use App\Product;

class ProductRepository
{
    public function insertProduct($product){
        $product = new Product($product);
        $product->save();
    }
}