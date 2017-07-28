<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Record extends Model
{

    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */

    protected $table = 'record';
    
    protected $dates = ['deleted_at'];

    protected $fillable  = ['customer_name',
                            'customer_phone',
                            'description',
                            'location',
                            'unit_id',
                            'product_id',
                            'work_start',
                            'work_end',
                            'departure_time',
                            'arrival_time'];
    
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
