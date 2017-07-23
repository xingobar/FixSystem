<?php

namespace App\Http\Controllers\Repository;

use App\Brand;

class BrandRepository
{
    public function getBrand(){
        return Brand::select('id','name')->get();
    }

    public function insertBrand($name){
        $brand = new Brand($name);
        $brand->save();
    }

    public function getFirstBrandId(){
        $brandId = Brand::select('id')
                         ->orderBy('id','asc')
                         ->first();
        return $brandId->id;
    }

}


