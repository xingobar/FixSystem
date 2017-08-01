<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\IService\UserServiceInterface;
use App\Http\Controllers\IRepository\UserRepositoryInterface;
use App\User;

class UserService implements UserServiceInterface
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function isExists($name)
    {
        $count = $this->userRepo->getCountByName($name);
        return ($count > 0);
    }
}