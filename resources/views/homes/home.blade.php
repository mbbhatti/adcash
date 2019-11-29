@extends('layouts/layout')

@section('pageTitle', 'Home')

@section('content')
<div class="container"> 
    <div class="row">     
        <div class="col-lg-12 col-md-12"> 
            @if (count($orders) > 0)      
                @include('homes/search')  
                <div class="panel-heading">
                    <h3 class="panel-title">Orders List
                    <a href="{{ route('order.add') }}" 
                        class='btn btn-primary float-right'>
                        Add Order
                    </a>
                    </h3>
                </div>
                <div class="table-responsive">                   
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>User</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->username }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->price }}&nbsp;€</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->total }}&nbsp;€</td>
                                    <td>{{ $order->date }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('order.edit', ['id' => $order->id]) }}" 
                                            class='btn btn-secondary'>
                                            Edit
                                        </a>
                                        <a href="{{ route('order.delete', ['id' => $order->id]) }}" 
                                            class='btn btn-danger'>
                                            Delete
                                        </a>
                                    </td>
                                </tr>  
                            @endforeach 
                        </tbody>
                    </table>            
                </div>
                <div class="float-right">
                    {{ $orders->links() }}
                </div>            
            @else                
                <h6 class="text-center">
                    Order not found. Please click
                    <a href="{{ route('order.add') }}">here</a>
                    to add order
                </h6> 
            @endif
        </div>
    </div>
</div>
@stop