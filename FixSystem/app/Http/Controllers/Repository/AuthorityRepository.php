<?php

namespace App\Http\Controllers\Repository;

use App\Authority;
use App\Http\Controllers\IRepository\AuthorityRepositoryInterface;

class AuthorityRepository implements AuthorityRepositoryInterface
{
    protected $auth;

    public function __construct(Authority $auth)
    {
        $this->auth = $auth;
    }

    public function getAllAuthority()
    {
        return $this->auth->orderBy('id','asc')->get();
    }
}