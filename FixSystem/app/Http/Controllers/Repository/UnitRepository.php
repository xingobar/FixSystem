<?php

namespace App\Http\Controllers\Repository;

use App\Unit;

class UnitRepository
{
    public function insertUnit($unit){
        $unit = new Unit($unit);
        $unit->save();
    }

    public function getSpecifiedUnit($department_id){
        $unit = Unit::where('department_id',$department_id)->get();
        return $unit;
    }

    public function getUnit(){
        $unit = Unit::orderBy('created_at','asc')->get();
        return $unit;
    }
}