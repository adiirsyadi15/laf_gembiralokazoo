<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LaF | GEMBIRA LOKA ZOO</title>
    {!! Html::style('/assets/css/bootstrap.css') !!}
    {!! Html::style('/assets/css/laf_app/lostandfound.css') !!}
    {!! Html::style('/assets/css/laf_app/main.css') !!}
    {!! Html::style('/assets/css/laf_app/slider.css') !!}
    {!! Html::style('/assets/css/font-awesome.min.css') !!}

    <link rel="icon" type="image/png" href="images/logo.png">

   
</head>
<body>
 
        @include('navbar.navbar')

        @yield('content')

    

    {!! Html::script('/assets/js/jquery.js') !!}
    {!! Html::script('/assets/js/bootstrap.min.js') !!}
    {!! Html::script('/assets/js/step.js') !!}
    {!! Html::script('/assets/js/laf.js') !!}
    {!! Html::script('/assets/js/slider.js') !!}
</body>
</html>
