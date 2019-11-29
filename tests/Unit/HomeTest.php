<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * A home page can be displayed
     * with all time filter
     *
     * @return void
     */
    public function testFilterAllTime()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * Today order filter.
     *
     * @return void
     */
    public function testFilterToday()
    {
    	$response = $this->get('/?filter=today');
        $response->assertStatus(200);
    }

    /**
     * Last week order filter.
     *
     * @return void
     */
    public function testFilterWeek()
    {
    	$response = $this->get('/?filter=week');
        $response->assertStatus(200);
    }

    /**
     * Order filter by query string.
     *
     * @return void
     */
    public function testQuery()
    {
    	$response = $this->get('/?q=coca');
        $response->assertStatus(200);
    }

    /**
     * Order search by filter and query string.
     *
     * @return void
     */
    public function testFilterQuery()
    {
    	$response = $this->get('/?filter=week&q=coca');
        $response->assertStatus(200);
    }
}
