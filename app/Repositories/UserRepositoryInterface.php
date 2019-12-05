<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    /**
     * Get's all users.
     *
     * @return object
     */
    public function getAll(): object;
}