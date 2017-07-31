<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use softDeletes;

    protected $table = 'department';

    protected $dates = ['deleted_at'];
    
    protected $fillable = ['name'];

    public function unit(){
        return $this->hasMany(Unit::class,'department_id','id');
    }
}
