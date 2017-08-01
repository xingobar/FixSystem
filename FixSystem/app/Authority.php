<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authority extends Model
{
    protected $table = 'authority';

    public function user()
    {
        return $this->hasMany(User::class,'authority_id','id');
    }
}
