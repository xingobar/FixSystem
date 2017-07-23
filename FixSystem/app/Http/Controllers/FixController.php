<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Factory\RepositoryFactory;
use App\Http\Controllers\Repository\RecordRepository;
use Log;

class FixController extends Controller
{

    protected $recordRepository;

    public function __construct(RecordRepository $recordRepository){
        $this->middleware('auth');
        $this->recordRepository = $recordRepository;
    }

    public function create(){
        
        $departmentRepository = RepositoryFactory::getDepartmentRepository();
        $brandRepository = RepositoryFactory::getBrandRepository();
        $unitRepository = RepositoryFactory::getUnitRepository();
        $productRepository = RepositoryFactory::getProductRepository();

        $department = $departmentRepository->getDepartment();
        $departmentId = $departmentRepository->getFirstDepartmentId();
        
        $unit = $unitRepository->getSpecifiedUnit($departmentId);
        $brand = $brandRepository->getBrand();
        $brandId = $brandRepository->getFirstBrandId();
        
        $product = $productRepository->getSpecifiedProduct($brandId);
        $productName = $productRepository->getFirstProductName();
        
        $model = $productRepository->getModelByProductName($productName);
        Log::info('productName : ' . $productName);
        Log::info('model count :  ' . count($model) );

        return view('record.create',[
            'departments'=>$department,
            'brands'=>$brand,
            'units'=>$unit,
            'products'=>$product,
            'models' => $model
        ]);
    }

    public function store(Request $request){
        $record = $request->except(['model','brand','department_id']);
        Log::info($record);
        $this->recordRepository->insertRecord($record);
        return redirect()->back()->withErrors(array(['msg'=>'success']));
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

    public function getModelByProductName($name){
        $productRepository = RepositoryFactory::getProductRepository();
        $model = $productRepository->getModelByProductName($name);
        return((object)$model);
    }
}
