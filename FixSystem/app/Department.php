<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'department';
    
    protected $fillable = ['name'];

    public function unit(){
        return $this->hasMany(Unit::class,'department_id','id');
    }
}
