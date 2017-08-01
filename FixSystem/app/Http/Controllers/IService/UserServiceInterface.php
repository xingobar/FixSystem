<?php

namespace App\Http\Controllers\IService;

interface UserServiceInterface
{
    public function isExists($name);
}