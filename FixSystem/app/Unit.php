<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{

    use softDeletes;

    protected $table = 'unit';

    protected $dates = ['deleted_at'];

    protected $fillable = ['name','department_id'];

    public function department(){
        return $this->belongsTo(Department::class,'department_id','id');
    }

    public function record(){
        return $this->belongsTo(Record::class,'id','unit_id');
    }
}
