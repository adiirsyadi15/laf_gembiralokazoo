<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LaF | GEMBIRA LOKA ZOO</title>
    {!! Html::style('/assets/css/bootstrap.min.css') !!}
    {!! Html::style('/assets/css/bootstrap-social.css') !!}
    {!! Html::style('/assets/css/laf_administrator/nav_sidebar.css') !!}
    {!! Html::style('/assets/css/laf_administrator/kontenpanel.css') !!}
    {!! Html::style('/assets/css/laf_administrator/style.css') !!}
    {!! Html::style('/assets/css/font-awesome.css') !!}
    
    <link rel="icon" type="image/png" href="images/logo.png">
   
</head>
<body>

<!-- <div class="container-fluid"> -->
    @yield('content')
<!-- </div> -->
 
 <!-- JavaScripts -->
    {!! Html::script('/assets/js/jquery.js') !!}
    {!! Html::script('/assets/js/bootstrap.min.js') !!}
    {!! Html::script('/assets/js/laf_administrator.js') !!}
    {!! Html::script('/assets/js/step.js') !!}
</body>
</html>
