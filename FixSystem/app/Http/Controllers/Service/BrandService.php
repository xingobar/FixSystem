<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;

class BrandService extends Controller
{
    public function isExists($name){
        $brand = Brand::where('name',$name)->count();
        return ($brand > 0);
    }
}