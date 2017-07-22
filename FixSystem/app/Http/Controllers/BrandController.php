<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Service\BrandService;
use App\Http\Controllers\Repository\BrandRepository;

class BrandController extends Controller
{
    protected $brandService;
    protected $brandRepository;

    public function __construct(BrandService $brandService,BrandRepository $brandRepository){
        $this->middleware('auth');
        $this->brandService = $brandService;
        $this->brandRepository = $brandRepository;
    }

    public function create(){
        return view('brand.create');
    }

    public function store(Request $request){
        $exists = $this->brandService->isExists($request->name);
        if($exists){
            return redirect()->back()->withErrors(array(['msg'=>'exists']))->withInput();
        }
        $this->brandRepository->insertBrand($request->all());
        return redirect()->back()->withErrors(array(['msg'=>'success']));
    }

    public function getBrand(){
        return $this->brandRepository->getBrand();
    }
}
