<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use softDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function record(){
        return $this->hasMany(Record::class,'user_id','id');
    }

    public function authority()
    {
        return $this->belongsTo(Authority::class,'authority_id','id');
    }

    public function isAdmin()
    {
        // 權限是主管或者是維護者
        return ($this->authority_id === 1 || $this->authority_id === 2);
    }

}
