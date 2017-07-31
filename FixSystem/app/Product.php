<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use softDeletes;

    protected $table = 'product';

    protected $dates = ['deleted_at'];

    protected $fillable = ['name','model','brand_id'];

    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }

    public function record(){
        return $this->belongsTo(Record::class,'id','product_id');
    }

}
