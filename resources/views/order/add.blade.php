@extends('layouts/layout')

@section('pageTitle', 'Add Order')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 offset-sm-3 offset-md-4">
            {{ Form::open(array('url' => '/order/add', 'method' => 'POST', 'id' => 'addForm', 'name' => 'addForm')) }}
                <fieldset>
                    <h2>Add Order</h2>                        
                    @if ($errors->any())
                        <div class="error">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <hr class="colorgraph">
                    <div class="form-group">
                        {{ Form::label('user', 'User', array('class' => 'control-label')) }}
                        {{ Form::select('user', $users, null, array('class' => 'form-control', 'id' => 'user', 'placeholder' => 'Select a user')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('product', 'Product', array('class' => 'control-label')) }}
                        {{ Form::select('product', $products, null, array('class' => 'form-control', 'id' => 'product', 'placeholder' => 'Select a product')) }}
                    </div>
                    <div class="form-group">           
                        {{ Form::label('quantity', 'Quantity', array('class' => 'control-label')) }}
                        {{ Form::number('quantity', old('quantity'), array('class' => 'form-control', 'id' => 'quantity', 'placeholder' => 'Enter quantity')) }}
                    </div>     
                    <hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            {{ Form::submit('Add', array('class' => 'btn btn-lg btn-primary btn-block')) }}
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <a href="{{ route('home') }}" class="btn btn-lg btn-primary btn-block">Cancel</a>
                        </div>
                    </div>
                </fieldset>
            {{ Form::close() }}
        </div>
    </div>
</div>
<script src="{{ asset('js/order.js') }}"></script>
@stop