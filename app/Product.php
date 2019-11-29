<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'price'
    ];

    /**
     * Many to Many relation with User.
     *     
     * @return object
     */
    public function users(): object
    {
        return $this->belongsToMany(User::class);
    }

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
