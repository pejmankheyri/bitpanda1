<?php

namespace App\Repositories\Contracts;

interface IUser
{
    public function getUsersWithDetails();
    public function getAllUsers();
    public function getUser($userId);
}