<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Shop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="{{asset('js/main.js')}}" type="text/javascript"></script>
    </head>
    <body>

        <div class="">
                    @yield('banner')
        </div>


        <div class="">
                @yield('list')
        </div>

    </body>
</html>

<!--
<div class="container-fluid">
    <div class="container-fluid banner">@yield('banner')</div>
    <div class="container-fluid product_list">@yield('list')</div>
    <div class="container-fluid content">@yield('content')</div>
</div>
––>
