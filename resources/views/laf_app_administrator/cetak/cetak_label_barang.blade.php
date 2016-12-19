<html>
<head>
	<title>Cetak Label Barang</title>
	
	<style type="text/css">
		body{
			width: 18cm;
    		min-height: 29.7cm;
    		height: 29.7cm;
		}
		.label{
			border: 2px solid #000;
			padding: 10px 10px 10px 200px;
			float: left;
		}

		.kiri img{
			width: 80px;
			margin-left: -100px;
		}
		.kanan{
			position: relative;
		}
	</style>
</head>
<body>
<div class="label">
	<div class="kiri">
		<img src="{{ url('images/logo_cap.gif') }}">
	</div>
	<div class="kanan">
		<label><b>Nama Barang   :</b>     {{ $barang->nama }} di {{ $barang->lokasi }}</label> <br>
		<label><b>Hari, Tanggal   :</b>    {{ $barang->hari }}, {{ $barang->tanggal }}</label> <br>
	</div>
</div>
</body>
</html>