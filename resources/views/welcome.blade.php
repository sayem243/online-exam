<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')Online- </title>

    <link href="{{asset('/file/css/bootstrap.min.css')}} " rel="stylesheet" type="text/css">


    <link href="{{asset('/file/css/style.css')}} " rel="stylesheet">

</head>

<body>





<div class="main-background">
    @yield('body')


{{--    <img src="{{asset('/images/device.png')}}" class="main-pageBackground">--}}






</div>

<script src="{{asset('/file/js/jquery.min.js')}} "></script>
<script src="{{asset('/file/js/popper.min.js')}}"></script>
<script src="{{asset('/file/js/bootstrap.min.js')}}"></script>
</body>

</html>

