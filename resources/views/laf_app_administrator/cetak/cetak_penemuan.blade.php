<html>
<head>
	<title>Cetak Penemuan</title>
	<script src="{{ url('/assets/js/jquery.js') }}"></script>
	
	<style type="text/css">
		body{
			width: 21cm;
    		min-height: 29.7cm;
    		height: 29.7cm;
    		padding-left: 1cm;
		}
		#header{
			width: 16.5cm;
			margin-left: 1cm;
			margin-right: 2cm;
			margin-top: 1cm; 
		}
		
		#judul h4{
			text-align: center;
		}
		.tab {
		    position: absolute;
		    left: 200px;
		}
		.tab_ttd{
			margin-left: 320px;
		}
		.tab_ttd_pemilik_kosong{
			margin-left: 340px;
		}
		.tab_petugas{
			margin-left: 270px;
			text-align: justify;
		}
		.tab_petugas_pemilik_kosong{
			margin-left: 350px;
			text-align: justify;
		}
		#penandatangan{
			margin-top: -30px;
		}
		.img_ttd img{
			height: 70px;
			margin-top: -80px;
			margin-left: 380px;
		}
		.cap img{
			margin-top: -10px;
			height: 100px;
			margin-left: 330px;
  			transform: rotate(-35deg);
  			opacity: 0.7;
		}
		.tanda_tangan p{
			margin-left: 70px;
		}
		.ket_ttd{
			margin-left: 30px;
		}
		.barang{
			margin-left: 150px;
		}
		#konten p{
			margin-left: 50px;
		}

	</style>
</head>
<body>
	<div id="header">
		<div id="judul">
			<h4>FORM PENEMUAN BARANG</h4>
		</div>
	</div>
	<div id="konten">
	@foreach($penemuans as $p)
		<label>Hari</label><span class="tab">: {{ $p->hari }}</span> <br>
		<label>Tanggal</label><span class="tab">: {{ $p->tanggal }}</span> <br> <br>

		<label>Telah ditemukan </label><span class="tab">:</span>
			<div class="barang">
				<ul>
					@foreach($barangs as $b)
					<li>{{ $b->nama_barang }}</li>
					@endforeach
				</ul>
			</div>
		<label>Di lokasi</label><span class="tab">: {{ $p->lokasi }}</span> <br>
		
		@if(isset($pemilik))
		<label>Pengambilan</label><span class="tab">: diambil</span> <br>
		@else
		<label>Pengambilan</label><span class="tab">: belum diambil</span> <br>
		@endif
	@endforeach
	</div>

	@if(isset($pemilik))
	<div id="header">
		<div id="judul">
			<h4>BIODATA PEMILIK</h4>
		</div>
	</div>

	<div id="konten">
		<label>Nama</label><span class="tab">: {{ $pemilik->nama }}</span> <br>
		<label>Tempat/Tanggal Lahir</label><span class="tab">: {{ $pemilik->tempat_lahir }} / {{ $pemilik->tanggal_lahir }}</span> <br>
		<label>Jenis Kelamin</label>
		<span class="tab">: 
		<?php 
			$jk = ($pemilik->jenis_kelamin=='L') ? 'Laki-laki' : 'Perempuan'; 
		?>
		{{ $jk }}
		</span> <br>
		<label>Alamat</label><span class="tab">: {{ $pemilik->alamat }}</span> <br>
		
		<p>Selanjutnya barang tersebut kami serahkan kepada pemiliknya dalam keadaan apa adanya. </p>
	@else
	<div id="header">
		<div id="judul">
			<h4>BIODATA PEMILIK</h4>
			<p>
			Belum ada biodata Pemilik karena barang belum diambil
			</p>
		</div>
		<br><br>
	</div>
	@endif

		<div id="tanda_tangan">
			<div class="ket_ttd">
			@if(isset($pemilik))
				<p>Pemilik <span class="tab_ttd">Petugas Piket</span></p>
			@else
				<p><span class="tab_ttd_pemilik_kosong">Petugas Piket</span></p>
			@endif
			</div>
			<div class="cap">
				<img src="{{ url('images/logo_cap.gif') }}">
			</div>
			<div class="img_ttd">
				<img src="{{ url('images/ttd.png') }}" >
			</div>
			<div id="penandatangan">
			@if(isset($pemilik))
				@foreach($penemuans as $p)
					<p>( {{ $pemilik->nama  }} )<span class="tab_petugas">(  {{ $p->nama }})</span></p>
				@endforeach
			@else
				@foreach($penemuans as $p)
					<p><span class="tab_petugas_pemilik_kosong">(  {{ $p->nama }})</span></p>
				@endforeach
			@endif
				
			</div>
		</div>

	</div>
</body>
</html>