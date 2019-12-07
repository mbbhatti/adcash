<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{

    public function register()
    {        
        $this->app->bind(
            'App\Services\DiscountCalculationInterface',
            'App\Services\DiscountCalculation'
        );
    }
}