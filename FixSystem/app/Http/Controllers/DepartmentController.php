<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Service\DepartmentService;
use App\Http\Controllers\Repository\DepartmentRepository;
use Log;

class DepartmentController extends Controller
{
    protected $departmentService;
    protected $departmentRepository;

    public function __construct(DepartmentService $departmentService,
                        DepartmentRepository $departmentRepository){
        $this->middleware('auth');
        $this->departmentService = $departmentService;
        $this->departmentRepository = $departmentRepository;
    }

    public function create(){
        return view('dep.create');
    }

    public function store(Request $request){
        $exists = $this->departmentService->isExists($request->name);
        if($exists){
            Log::info('department exists');
            return redirect()->back()->withErrors(array(['msg'=>'exists']))->withInput();
        }
        $this->departmentRepository->insertDepartment($request->all());
        return redirect()->back()->withErrors(array(['msg'=>'success']));
    }
}
