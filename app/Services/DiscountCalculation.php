<?php

namespace App\Services;

class DiscountCalculation implements DiscountCalculationInterface
{
    public function getOrderDiscount(object $response): object
    {
        $response->map(function ($data) { 
            $total = 0;           
            if($data->quantity > 2 && $data->name === 'Pepsi Cola') {
                $total = (($data->quantity * $data->price) * 80) / 100;
            } else {
                $total = $data->quantity * $data->price;
            }

            return $data->total = round($total,2);
        });

        return $response;
    }
}