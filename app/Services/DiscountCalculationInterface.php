<?php

namespace App\Services;

interface DiscountCalculationInterface
{
    /**
     * Get's order discount
     *
     * @param object
     * @return object
     */
    public function getOrderDiscount(object $response): object;
}