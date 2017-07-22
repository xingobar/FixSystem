<?php

namespace App\Http\Controllers\Factory;

use App\Http\Controllers\Repository\BrandRepository;
use App\Http\Controllers\Repository\DepartmentRepository;

class RepositoryFactory
{
    private static $brandRepository;
    private static $departmentRepository;

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
}
