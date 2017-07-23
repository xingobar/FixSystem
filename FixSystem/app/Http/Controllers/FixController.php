<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Factory\RepositoryFactory;
use Log;

class FixController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        $departmentRepository = RepositoryFactory::getDepartmentRepository();
        $brandRepository = RepositoryFactory::getBrandRepository();
        $department = $departmentRepository->getDepartment();
        $brand = $brandRepository->getBrand();
        return view('record.create',[
            'departments'=>$department,
            'brands'=>$brand
        ]);
    }

    public function store(){

    }

    public function getSpecifiedProduct($brand_id){
        Log::info('selected brand id ' . $brand_id);
        $productRepository = RepositoryFactory::getProductRepository();
        $product = $productRepository->getSpecifiedProduct($brand_id);
        return ((object)$product);
    }

    public function getSpecifiedUnit($department_id){
        Log::info('selected department id ' . $department_id);
        $unitRepository = RepositoryFactory::getUnitRepository();
        $unit = $unitRepository->getSpecifiedUnit($department_id);
        return((object)$unit);
    }
}
