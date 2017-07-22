<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brand';

    protected $fillable  =['name'];

    public function product(){
        return $this->hasMany(Product::class,'brand_id','id');
    }
}
