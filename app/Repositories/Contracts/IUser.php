<?php

namespace App\Repositories\Contracts;

interface IUser
{
    public function getUsersWithDetails($country_id);
    public function getUser($userId);
}