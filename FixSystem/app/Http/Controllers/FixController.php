<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Factory\RepositoryFactory;
use App\Http\Controllers\Repository\RecordRepository;
use App\Http\Controllers\Service\WorkService;
use App\Http\Requests\ProgressTimeRequest;
use App\Http\Requests\RecordRequest;
use App\Http\Controllers\Service\RecordService;
use Log;
use App\Record;

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
        $productRepository = RepositoryFactory::getProductRepository();
        $brandRepository = RepositoryFactory::getBrandRepository();
        $unitRepository = RepositoryFactory::getUnitRepository();
        $departmentRepository = RepositoryFactory::getDepartmentRepository();


        $record = $recordRepository->getSpecifiedRecord($record_id);
        $products = $productRepository->getProduct();
        $brands = $brandRepository->getBrand();
        $units = $unitRepository->getUnit();
        $departments = $departmentRepository->getDepartment();

        return view('record.edit',[
            'record'=>$record[0],
            'products'=>$products,
            'brands'=>$brands,
            'units'=>$units,
            'departments'=>$departments
        ]);
    }

    public function update($record_id,RecordRequest $request){
        try{
            $recordRepository = RepositoryFactory::getRecordRepository();
            $productRepository = RepositoryFactory::getProductRepository();

            $record = $recordRepository->getSpecifiedRecord($record_id);
            $record =  $record[0];

            $recordRepository->updateReocrd($record,$request->all());

            return redirect()->back()->withErrors(array(['msg'=>'success']));
        }catch(Exception $ex){
            return redirect()->back()->withErrors(array(['msg'=>'error']));
        }
    }

    public function delete($record_id){
        $record = Record::findOrFail($record_id);
        $record->delete(); // soft delete
        return redirect()->back()->withErrors(array(['msg'=>'success']));
    }

    public function update_progress_time(ProgressTimeRequest $request , $record_id){
        $recordRepository = RepositoryFactory::getRecordRepository();

        if(WorkService::isGreaterThanZero($request->departure_time,$request->arrival_time)
           &&
           WorkService::isGreaterThanZero($request->work_start,$request->work_end)){
            
            $work_hour =WorkService::calculateWorkHour($request->work_start,$request->work_end);
            $traffic_hour = WorkService::calculateWorkHour($request->departure_time,$request->arrival_time);
            
            $work_hour = WorkService::getLastDayHour($request->work_start,$request->work_end,$work_hour);
            $traffic_hour = WorkService::getLastDayHour($request->departure_time,$request->arrival_time,$traffic_hour);

            Log::info($request->finish);
            $request->finish = ($request->finish === "1") ? true : false;
            

            $recordRepository->updateProgressTime($request->all(),$record_id);
            $recordRepository->saveWorkAndTrafficHour($record_id,$work_hour,$traffic_hour);
            return redirect()->back()->withErrors(array(['msg'=>'update_success']));
        }
        return redirect()->back()->withErrors(array(['msg'=>'update_error']))->withInput();

    }

    public function statistics(){
        $recordRepository = RepositoryFactory::getRecordRepository();
        $records = $recordRepository->getAllRecord();

        return view('record.statistics',['records'=>$records]);
    }

    public function search($category,$name){
        $recordRepository = RepositoryFactory::getRecordRepository();
        $column = RecordService::getSearchColumn($category);
        $record = RecordService::search($recordRepository,
                                        $column,
                                        $category,
                                        $name);
        return view('home',['records'=>$record])->render();
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
