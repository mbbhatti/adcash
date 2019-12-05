<?php

namespace App\Repositories;

use App\User;

class UserRepository implements UserRepositoryInterface
{
    /**
     * Get all users.
     *     
     * @return object
     */
    public function getAll(): object
    {
        return User::pluck('name', 'id');
    } 
}