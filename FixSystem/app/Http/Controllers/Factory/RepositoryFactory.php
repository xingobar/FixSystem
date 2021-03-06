<?php

namespace App\Http\Controllers\Factory;

use App\Http\Controllers\Repository\BrandRepository;
use App\Http\Controllers\Repository\DepartmentRepository;
use App\Http\Controllers\Repository\ProductRepository;
use App\Http\Controllers\Repository\UnitRepository;
use App\Http\Controllers\Repository\RecordRepository;
use App\Http\Controllers\Repository\UserRepository;

class RepositoryFactory
{
    private static $brandRepository;
    private static $departmentRepository;
    private static $productRepository;
    private static $unitRepository;
    private static $recordRepository;
    private static $userRepository;

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

    public static function getRecordRepository(){
        if(self::$recordRepository){
            return self::$recordRepository;
        }
        self::$recordRepository = new RecordRepository();
        return self::$recordRepository;
    }

    public static function getUserRepository(){
        if(is_null(self::$userRepository)){
            self::$userRepository = new UserRepository();
        }
        return self::$userRepository;
    }
}
