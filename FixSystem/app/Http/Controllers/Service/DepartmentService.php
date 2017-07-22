<?php

namespace App\Http\Controllers\Service;

use App\Department;
use Log;

class DepartmentService
{
    public function isExists($name){
        $count = Department::where('name',$name)->count();
        Log::info(($count > 0));
        return ($count > 0);
    }
}