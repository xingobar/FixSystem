<?php

namespace App\Http\Controllers\Service;

use App\Unit;

class UnitService  
{
    public function isExists($department_id,$name){
        $count = Unit::where('department_id',$department_id)
                    ->where('name',$name)
                    ->count();
        return($count > 0);
    }
}