<?php

namespace App\Http\Controllers\Repository;

use App\Unit;

class UnitRepository
{
    public function insertUnit($unit){
        $unit = new Unit($unit);
        $unit->save();
    }
}