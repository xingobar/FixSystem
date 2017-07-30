<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Service\BrandService;
use App\Http\Controllers\Repository\BrandRepository;
use App\Http\Controllers\Factory\RepositoryFactory;
use App\Http\Requests\CreateBrandRequest;
use App\Brand;

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

    public function store(CreateBrandRequest $request){
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

    public function edit(){
        $brands = $this->getBrand();
        return view('brand.edit',[
            'brands'=>$brands
        ]);
    }

    public function update($id,Request $request){
        $brandRepository = RepositoryFactory::getBrandRepository();
        $brandRepository->updateNameById($id,$request->name);
        return redirect()->back()->withErrors(array(['msg'=>'success']));
    }

    public function delete($id){
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->back()->withErrors(array(['msg'=>'delete_success']));
    }
}
