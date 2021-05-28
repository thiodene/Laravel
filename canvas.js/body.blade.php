<?php date_default_timezone_set("America/Toronto"); ?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <!-- Vue-multiselect default styling -->
        <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">
        <!-- in-house styling -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">  

        <!--
          <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        -->
        <!-- <script src="{{ asset('js/all.js') }}"></script> -->
        <!--
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        -->
        <script src="{{ asset('js/canvasjs.min.js') }}"></script> 
        @yield('styles')
        <title>Subscriptions - Pusher</title>
    </head>

<body>
    <div id="app">
        @include('layouts.header')
        
        <div class="mb main">
            @yield('content')
        </div>
        
        @include('layouts.footer')
    </div>

    <!-- popper and bootstrap are in package.json but don't seem to be working -->
    
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script> 
    @yield('scripts')

    <script>
         $(document).ready(function() {
            $("body").tooltip({ selector: '[data-toggle=tooltip]' });   
        });

    </script>
    <!--
    <script src="{{ asset('js/modifications.js') }}"></script>
    -->
</body>
	
</html>
