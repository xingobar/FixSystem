<?php

namespace App\Http\Controllers\Repository;

use App\Department;
use Log;

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

    public function getDepartmentOrderByCreatedAt(){
        $department = Department::orderBy('created_at','asc')->get();
        return $department;
    }

    public function updateById($id,$request){
        $dep = Department::findOrFail($id);
        $dep->fill($request->all());
        $dep->save();
    }

    public function deleteById($id){
        $dep = Department::findOrFail($id);
        $dep->unit()->each(function($unit){
            Log::info('delete unit name : ' . $unit->name);
            $unit->delete();
        });
        Log::info('delete dep name : ' . $dep->name);
        $dep->delete();
    }
}