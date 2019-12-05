<?php

namespace App\Repositories;

use App\Product;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * Get all products.
     *     
     * @return object
     */
    public function getAll(): object
    {
        return Product::pluck('name', 'id');
    } 
}