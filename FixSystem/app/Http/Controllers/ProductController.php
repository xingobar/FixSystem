<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Factory\RepositoryFactory;
use App\Http\Controllers\Repository\ProductRepository;

class ProductController extends Controller
{

    protected $productRepository;

    public function __construct(ProductRepository $productRepository){
        $this->middleware('auth');
        $this->productRepository = $productRepository;
    }

    public function create(){
        $brandRepository = RepositoryFactory::getBrandRepository();
        $brand = $brandRepository->getBrand();
        return view('product.create',[
            'brands'=>$brand
        ]);
    }

    public function store(){
        
    }
}
