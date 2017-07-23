<?php

namespace App\Http\Controllers\Repository;

use App\Department;

class DepartmentRepository
{
    public function insertDepartment($name){
        $department = new Department($name);
        $department->save();
    }

    public function getDepartment(){
        $department = Department::select('id','name')->get();
        return $department;
    }

    public function getFirstDepartmentId(){
        $departmentId = Department::select('id')
                                  ->orderBy('id','asc')
                                  ->first();
        return $departmentId->id;
    }
}