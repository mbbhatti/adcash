<?php

namespace App\Repositories;

interface ProductRepositoryInterface
{
    /**
     * Get's all product.
     *
     * @return object
     */
    public function getAll(): object;
}