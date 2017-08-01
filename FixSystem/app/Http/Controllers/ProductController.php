<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Factory\RepositoryFactory;
use App\Http\Controllers\Repository\ProductRepository;
use App\Http\Controllers\Service\ProductService;
use App\Http\Requests\CreateProductRequest;
use App\Product;

class ProductController extends Controller
{

    protected $productRepository;
    protected $productServicel;

    public function __construct(ProductRepository $productRepository,ProductService $productService){
        $this->middleware(['auth','admin']);
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

    public function store(CreateProductRequest $request){
        $exists = $this->productService->isExists($request->name,
                                                  $request->model,
                                                  $request->brand_id);
        if($exists){
            return redirect()->back()->withErrors(array('msg'=>'exists'));
        }
        $this->productRepository->insertProduct($request->all());
        return redirect()->back()->withErrors(array('msg'=>'success'));
    }

    public function edit(){
        $products = $this->productRepository->getProduct();
        return view('product.edit',[
            'products'=>$products
        ]);
    }

    public function update($id,Request $request){
        $this->productRepository->updateProductById($id,$request);
        return redirect()->back()->withErrors(array(['msg'=>'update_success']));
    }

    public function delete($id){
        $this->productRepository->deleteById($id);
        return redirect()->back()->withErrors(array(['msg'=>'delete_success']));
    }
}
