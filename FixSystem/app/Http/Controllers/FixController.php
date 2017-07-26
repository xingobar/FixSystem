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

    public function edit($record_id = 1){
        $recordRepository = RepositoryFactory::getRecordRepository();
        $record = $recordRepository->getSpecifiedRecord($record_id);
        return view('record.edit',[
            'record'=>$record[0]
        ]);
    }

    public function update($record_id,Request $request){
        try{
            $recordRepository = RepositoryFactory::getRecordRepository();
            $productRepository = RepositoryFactory::getProductRepository();

            $record = $recordRepository->getSpecifiedRecord($record_id);
            $record =  $record[0];

            $product = $productRepository->getProductById($record->product_id);
            $productRepository->updateProductName($product,$request->product);

            $recordRepository->updateReocrd($record,$request->all());


            return redirect()->back()->withErrors(array(['msg'=>'success']));
        }catch(Exception $ex){
            return redirect()->back()->withErrors(array(['msg'=>'error']));
        }
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
