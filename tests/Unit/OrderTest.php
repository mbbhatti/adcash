<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Order;

class OrderTest extends TestCase
{
	/**
     * Add order form displayed.
     *
     * @return void
     */
    public function testAddFormDisplayed()
    {
        $response = $this->get('/order/add');
        $response->assertSuccessful();
        $response->assertViewIs('order.add');
        $response->assertStatus(200);
    }

    /**
     * Create Order.
     *
     * @return void
     */
    public function testAddOrder()
    {
        $order = factory(Order::class)->make();
        
        $response = $this->post('/order/add', [
            'user_id' => 1,
            'product_id' => 1,
            'quantity' => 3,
            'date' => date('Y-m-d H:i:s')
        ]);
        
        $response->assertRedirect('/order/add');
        $response->assertStatus(302);
    }

    /**
     * Edit order form displayed.
     *
     * @return void
     */
    public function testEditFormDisplayed()
    {
        $response = $this->get('/order/edit/1'); 
        $response->assertRedirect('/');       
        $response->assertStatus(302);
    }

    /**
     * Edit Order.
     *
     * @return void
     */
    public function testEditOrder()
    {
        $order = factory(Order::class)->make();
        
        $response = $this->post('/order/edit/1', [
            'user_id' => 1,
            'product_id' => 1,
            'quantity' => 3,
            'date' => date('Y-m-d H:i:s')
        ]);
        
        $response->assertRedirect('/order/edit/1');
        $response->assertStatus(302);
    }

    /**
     * Delete Order.
     *
     * @return void
     */
    public function testDeleteOrder()
    {
        $response = $this->get('/order/delete/1');
        $response->assertRedirect('/');
        $response->assertStatus(302);
    }
}
