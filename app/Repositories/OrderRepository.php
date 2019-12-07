<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Order;
use App\Services\DiscountCalculation;

class OrderRepository implements OrderRepositoryInterface
{
    /**
     * Used to get order discount.
     *
     * @var object
     */
    protected $discount;

    /**
     * Create a new controller instance.
     *     
     * @param  object  $order
     * @return void
     */
    public function __construct(DiscountCalculation $discount)
    {        
        $this->discount = $discount;          
    }

    /**
     * Get order by id.
     *
     * @param  int    $id
     * @return array
     */
    public function getById(int $id): array
    {
        $order =  Order::find($id, [
            'id', 
            'user_id', 
            'product_id', 
            'quantity'
        ]);
        
        if($order == null) {
            return [];
        }

        return $order->toArray();
    }

    /**
     * Create | Update order.
     *
     * @param  object  $request
     * @return int     last record id
     */
    public function saveOrder(object $request): int
    {   
        $order = Order::firstOrNew(['id' => request('id')]);
        $order->user_id = request('user');
        $order->product_id = request('product');
        $order->quantity = request('quantity');
        $order->date = date('Y-m-d H:i:s');
        $order->save();

        return $order->id;
    }

    /**
     * Delete order.
     *
     * @param  int      $id
     * @return bool
     */
    public function deleteOrder(int $id): bool
    {   
        $order = Order::find($id);
        if($order == null) {
            return false;
        }
        
        return $order->delete();
    }

    /**
     * Get orders by filter or query string
     * with pagination.
     *     
     * @param  object  $request
     * @return object
     */
    public function getAll(object $request): object
    {   
        $query = Order::query();

        // Find today records
        $query->when(request('filter') == 'today', function ($q) {
            return $q->whereRaw('Date(date) = CURDATE()');
        });

        // Find one week records
        $query->when(request('filter') == 'week', function ($q) {
            return $q->whereRaw('Date(date) > DATE_SUB(CURDATE(), INTERVAL 7 DAY)');
        });

        // Find records by query params
        $query->when(request('q') != '', function ($q) {
            return $q->where('products.name', 'LIKE', "%".request('q')."%") 
                    ->orWhere('users.name', 'LIKE', "%".request('q')."%");
        });

        $response = $query->select(
            'users.name as username', 
            'products.name', 
            'products.price', 
            'orders.id',
            'orders.quantity', 
            'orders.date'            
        )->join('users', 'users.id', '=', 'orders.user_id')
        ->join('products', 'products.id', '=', 'orders.product_id')
        ->paginate(10)
        ->appends(request()->query());  

        $this->discount->getOrderDiscount($response);
        
        return $response;
    }
}