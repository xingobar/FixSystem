<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = ['name','model','brand_id'];

    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }

    public function record(){
        return $this->belongsTo(Record::class,'id','product_id');
    }

}
