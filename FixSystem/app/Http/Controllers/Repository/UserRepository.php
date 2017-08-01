<?php

namespace App\Http\Controllers\Repository;

use App\Http\Controllers\IRepository\UserRepositoryInterface;
use App\User;
use Log;

class UserRepository implements UserRepositoryInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user  = $user;
    }

    public function insertUser($request)
    {
        Log::info($request);
        // $user = User::create([
        //     'name'=>$request['name'],
        //     'password'=>bcrypt($request['password'])
        // ]);
        $user = new User([
            'name'=>$request['name'],
            'password'=>bcrypt($request['password'])
        ]);
        $user->authority_id = $request['authority_id'];
        $user->save();
    }

    public function getCountByName($name)
    {
        return $this->user->where('name',$name)->count();
    }

    public function getAllUser()
    {
        return $this->user->orderBy('created_at','desc')->get();
    }

    public function updateById($id,$request)
    {
        $user = $this->user->findOrFail($id);
        $user->fill($request);
        $user->authority_id = $request['authority_id'];
        $user->save();
    }

    public function deleteById($id)
    {
        $this->user->destroy($id);
    }
    
}