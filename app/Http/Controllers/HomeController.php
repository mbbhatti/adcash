<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\OrderRepository;

class HomeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for to present logged in user access.
    | Identify a user progress histroy
    |
    */

    /**
     * It is used for order model.
     *
     * @var object
     */
    protected $order;

    /**
     * Create a new controller instance.
     *     
     * @param  object  $order
     * @return void
     */
    public function __construct(OrderRepository $order)
    {        
        $this->order = $order;          
    }    

    /**
     * Show the application home page.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {           
        $filters = [
            'all' => 'All time', 
            'today' => 'Today',
            'week' => 'Last 7 days'            
        ];
        
        return view("homes.home", [
            'orders' => $this->order->getAll($request),
            'filters' => $filters,
            'filter' => request('filter'),
            'query' => request('q'),
        ]);
    }    
}
