<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $table = 'record';

    protected $fillabel  = ['customer_name',
                            'customer_phone',
                            'description',
                            'location'];
    
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function unit(){
        return $this->hasOne(Unit::class,'id','unit_id');
    }

    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
