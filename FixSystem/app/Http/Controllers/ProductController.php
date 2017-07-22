<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Factory\RepositoryFactory;
use App\Http\Controllers\Repository\ProductRepository;
use App\Http\Controllers\Service\ProductService;

class ProductController extends Controller
{

    protected $productRepository;
    protected $productServicel;

    public function __construct(ProductRepository $productRepository,ProductService $productService){
        $this->middleware('auth');
        $this->productRepository = $productRepository;
        $this->productService = $productService;
    }

    public function create(){
        $brandRepository = RepositoryFactory::getBrandRepository();
        $brand = $brandRepository->getBrand();
        return view('product.create',[
            'brands'=>$brand
        ]);
    }

    public function store(Request $request){
        $exists = $this->productService->isExists($request->name,
                                                  $request->model,
                                                  $request->brand_id);
        if($exists){
            return redirect()->back()->withErrors(array('msg'=>'exists'));
        }
        $this->productRepository->insertProduct($request->all());
        return redirect()->back()->withErrors(array('msg'=>'success'));
    }
}
