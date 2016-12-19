<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LaF | GEMBIRA LOKA ZOO</title>
    {!! Html::style('/assets/css/bootstrap.min.css') !!}
    {!! Html::style('/assets/css/font-awesome.css') !!}
    {!! Html::style('/assets/css/404.css') !!}
    
    <link rel="icon" type="image/png" href="images/logo.png">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="eror_404">
                <h2>Maaf, halaman ini tidak tersedia</h2>
                <h4>Konten yang anda cari mungkin telah rusak, atau halaman telah dihapus.</h4>
                <br>
                <img src="{{ url('images/logo.png') }}">
                <br>
                <br>
                <a href="{{ url('/') }}"><p>HOME</p></a>
            </div>
        </div>
    </div>
</div>

    {!! Html::script('/assets/js/jquery.js') !!}
    {!! Html::script('/assets/js/bootstrap.min.js') !!}
</body>
</html>
