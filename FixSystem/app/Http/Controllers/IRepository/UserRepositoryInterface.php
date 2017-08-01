<?php

namespace App\Http\Controllers\IRepository;

interface UserRepositoryInterface
{
    public function insertUser($request);
    public function getCountByName($name);
    public function getAllUser();
    public function updateById($id,$request);
    public function deleteById($id);
}