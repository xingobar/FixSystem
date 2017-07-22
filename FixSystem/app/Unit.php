<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'unit';

    protected $fillable = ['name','department_id'];

    public function department(){
        return $this->belongsTo(Department::class,'department_id','id');
    }

    public function record(){
        return $this->belongsTo(Record::class,'id','unit_id');
    }
}
