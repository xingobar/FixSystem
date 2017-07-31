<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;

    protected $table = 'brand';

    protected $dates = ['deleted_at'];

    protected $fillable  =['name'];

    public function product(){
        return $this->hasMany(Product::class,'brand_id','id');
    }
}
