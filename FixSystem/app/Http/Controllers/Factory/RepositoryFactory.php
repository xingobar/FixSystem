<?php

namespace App\Http\Controllers\Factory;

use App\Http\Controllers\Repository\BrandRepository;
use App\Http\Controllers\Repository\DepartmentRepository;
use App\Http\Controllers\Repository\ProductRepository;
use App\Http\Controllers\Repository\UnitRepository;

class RepositoryFactory
{
    private static $brandRepository;
    private static $departmentRepository;
    private static $productRepository;
    private static $unitRepository;

    public static function getBrandRepository(){
        if(self::$brandRepository){
            return self::$brandRepository;
        }
        self::$brandRepository = new BrandRepository();
        return self::$brandRepository;
    }

    public static function getDepartmentRepository(){
        if(self::$departmentRepository){
            return self::$departmentRepository;
        }
        self::$departmentRepository = new DepartmentRepository();
        return self::$departmentRepository;
    }

    public static function getProductRepository(){
        if(self::$productRepository){
            return self::$productRepository;
        }
        self::$productRepository = new ProductRepository();
        return self::$productRepository;
    }

    public static function getUnitRepository(){
        if(self::$unitRepository){
            return self::$unitRepository;
        }
        self::$unitRepository = new UnitRepository();
        return self::$unitRepository;
    }
}
