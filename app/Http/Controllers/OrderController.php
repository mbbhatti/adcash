<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\UserRepository;
use App\Repositories\ProductRepository;
use App\Repositories\OrderRepository;

class OrderController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Order Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles new order for user product and request validation.
    |
    */
    
    /**
     * Where to redirect.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Use for product model.
     *
     * @var object
     */
    protected $product;

    /**
     * Use for user model.
     *
     * @var object
     */
    protected $user;

    /**
     * Use for order model.
     *
     * @var object
     */
    protected $order;
    
    /**
     * Create a new controller instance.
     *     
     * @param  object  $user    
     * @param  object  $product              
     * @param  object  $order       
     * @return void
     */
    public function __construct(
    	UserRepository $user,
        ProductRepository $product,     	
    	OrderRepository $order
    )
    {
        $this->product = $product;
        $this->user = $user;
        $this->order = $order;
    }

    /**
     * Validate incoming request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user' => 'required',
            'product' => 'required',
            'quantity' => 'required'
        ]);
    }

    /**
     * Show order form.
     *
     * @param  int  $id  identify add or edit form
     * @return \Illuminate\Http\Response
     */
    public function show($id = 0)
    {
        $data = [];
        $data['products'] = $this->product->getAll();
        $data['users'] = $this->user->getAll();

        // If id found show edit from, else show add form
        if($id > 0) {
            $msg = [];
            if(is_numeric($id)) {                         
                $order = $this->order->getById($id);                                    
                if(count($order) > 0) {               
                    $data['id'] = $id;
                    $data['order'] = $order;

                    return view("order.edit")->with($data);               
                } else {
                    $msg['warning'] = "Order not found!";
                }
            } else {
                $msg['error'] = "Invalid order id!";
            }
            return redirect($this->redirectTo)->with($msg);        
        } else {
            return view("order.add")->with($data);
        }
    }

    /**
     * Save order.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {             
        $id = '';
        $method = 'add';
        $msg = 'created!';

        if(null !== request('id')) {
            $id = request('id');
            $method = 'edit/';
            $msg = 'updated!';
        }

        // Form data validation        
        $validator = $this->validator($request->all());
        
        // Check validation
        if ($validator->fails()) {
            return redirect('/order/'.$method . $id)
                ->withErrors($validator)
                ->withInput();
        } else {
            $this->order->saveOrder($request);
        }

        return redirect($this->redirectTo)
            ->with('success','Order has been ' . $msg);
    } 

    /**
     * Delete order.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {        
        $msg = [];        
        if(is_numeric($id) && $id > 0) {   
            $record = $this->order->deleteOrder($id);
            if($record == false) {
                $msg['warning'] = 'Order not found!';                
            } else {        
                $msg['success'] = 'Order has been deleted!';
            }
        } else {
            $msg['error'] = 'Invalid order id!';
        }
        
        return redirect($this->redirectTo)->with($msg);        
    }   
}
