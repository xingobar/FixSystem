<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Factory\RepositoryFactory;
use App\Http\Controllers\Repository\UnitRepository;
use App\Http\Controllers\Service\UnitService;
use App\Http\Requests\CreateUnitRequest;
use Log;

class UnitController extends Controller
{
    protected $unitService;
    protected $unitRepository;

    public function __construct(UnitRepository $unitRepository,
                        UnitService $unitService){
        $this->middleware(['auth','admin']);
        $this->unitRepository = $unitRepository;
        $this->unitService = $unitService;
    }

    public function create(){
        $departmentRepository  = RepositoryFactory::getDepartmentRepository();
        $departments = $departmentRepository->getDepartment();
        return view('unit.create',[
            'departments'=>$departments
        ]);
    }

    public function store(CreateUnitRequest $request){
        $exists = $this->unitService->isExists($request->department_id,
                                               $request->name);
        if($exists){
            return redirect()->back()->withErrors(array(['msg'=>'exists']))->withInput();
        }
        Log::info($request->department_id);
        $this->unitRepository->insertUnit($request->all());
        return redirect()->back()->withErrors(array(['msg'=>'success']))->withInput();
    }

    public function edit(){
        $units = $this->unitRepository->getUnit();
        return view('unit.edit',[
            'units'=>$units
        ]);
    }

    public function update($id,Request $request){
        $this->unitRepository->updateById($id,$request);
        return redirect()->back()->withErrors(array(['msg'=>'update_success']));
    }

    public function delete($id){
        $this->unitRepository->deleteById($id);
        return redirect()->back()->withErrors(array(['msg'=>'delete_success']));
    }
}
