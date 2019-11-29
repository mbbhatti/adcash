<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Test - @yield('title')</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">        
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
        
        <!-- Scripts -->
        <script src="{{ asset('js/jquery.js') }}"></script>                
        <script src="{{ asset('js/jquery.validate.js') }}"></script>   
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>     
    </head>
    <body>
        <div id="app">  
            @include('alerts')
                      
            @yield('content')            
        </div>        
    </body>
</html>