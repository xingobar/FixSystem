<?php

namespace App\Http\Controllers\Factory;

use App\Http\Controllers\Repository\BrandRepository;

class RepositoryFactory
{
    private static $brandRepository;

    public static function getBrandRepository(){
        if(self::$brandRepository){
            return self::$brandRepository;
        }
        self::$brandRepository = new BrandRepository();
        return self::$brandRepository;
    }
}
