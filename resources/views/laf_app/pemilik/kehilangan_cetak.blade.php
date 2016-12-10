<html>
<head>
	<title></title>
	<script src="{{ url('/assets/js/jquery.js') }}"></script>
	
	<style type="text/css">
		body{
			width: 21cm;
    		min-height: 29.7cm;
    		height: 29.7cm;
		}
		#header{
			width: 16.5cm;
			border-bottom: solid 5px #000;
			margin-left: 1cm;
			margin-right: 2cm;
		}
		
		#judul{
			text-align: center;
		}
		#judul_atas{
			font-size: 20px;
			margin-top: 0.5cm;
		}
		#judul_tengah{
			font-size: 20px;
		}
		#judul_bawah{
			font-size: 15px;
			margin-bottom: 5px;
		}
		#judul_konten{
			text-align: center;
			font-size: 20px;
			margin-top: 10px;
		}
		#nomor_surat{
			text-align: center;
			margin-bottom: 20px;
		}
		#kepala, #mahasiswa{
			padding-left: 30px;
			margin-bottom: 20px;
		}
		#konten{
			margin-left: 1cm;
			margin-right: 3cm;
		}
		#tanda_tangan{
			margin-left: 50px;
		}
		.cap img{
			margin-top: -20px;
			height: 100px;
			margin-left: 330px;
  			transform: rotate(-35deg);
  			opacity: 0.7;
		}
		#nama_kota{
			text-align: left;
			margin-left: 400px;
		}
		
		.isi_surat{
			text-align: justify;
		}
		.tab {
		    position: absolute;
		    left: 220px;
		   }
		.tab_ttd{
			margin-left: 300px;
		}
		.tab_petugas{
			margin-left: 270px;
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

	</style>
</head>
<body>
	<div id="header">
		<div id="judul">
			<div id="judul_atas">KORPS SAT-PAM GEMBIRALOKA ZOO</div>
			<div id="judul_tengah">Jl. Kebun Raya No.2 Yogyakarta - Indonesia 55171</div>
			<div id="judul_bawah">Telp. (0274)373861 Fax 384666</div>
		</div>
	</div>
	<div id="konten">
		@foreach($kehilangans as $k)
		<div id="judul_konten">SURAT KERETANGAN</div>
		<div id="nomor_surat">Nomor : {{ $k->id_proses }}/GL-Zoo/{{ $tanggal_surat }} <span id="tahun"></span>
		</div>
		
		<label>Pada hari ini tanggal</label><span class="tab">: {{ $tanggal_surat }}</span><br>
		<label>Pukul</label><span class="tab">: {{ $pukul_surat }} WIB</span><br>
		<label>Telah datang seorang</label>
		@if($pemilik->jenis_kelamin == "L")
		<span class="tab">: Laki-laki</span>
		@else
		<span class="tab">: Perempuan</span>
		@endif
		<br>
		<label>Yang bernama</label><span class="tab">: {{ $pemilik->nama }}</span><br>
		<label>Alamat</label><span class="tab">: {{ $pemilik->alamat }}</span><br>
		<label>Umur</label><span class="tab">: {{ $umur }} tahun</span><br>
		<label>Tempat/Tanggal Lahir</label><span class="tab">: {{ $pemilik->tempat_lahir }} , {{$pemilik->tanggal_lahir}}</span><br>
		<label>Pekerjaan</label><span class="tab">: {{ $pemilik->pekerjaan }}</span><br>
		<label>Nomor hp </label><span class="tab">: {{ $pemilik->no_hp }}</span><br>
		<label>Hari, Tanggal Kehilangan</label><span class="tab">: {{ $k->hari }}, {{ $k->tanggal }}</span><br>
		<label>Sekitar Wilayah/Jalan</label><span class="tab">: {{ $k->lokasi }}</span><br>
		@endforeach
		<div id="judul_konten">TELAH KEHILANGAN</div>
		<ol>
			@foreach($barangs as $b)
			<li>{{ $b->kategori }} : {{ $b->nama_barang }}</li>
			@endforeach
		</ol>
		<div class="isi_surat">
		Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya.
		</div>
		<br><br>
			<div id="nama_kota">
				Dikeluarkan di : Yogyakarta  <br>
				Tanggal : {{ $tanggal_surat }}  <br>
				<span id="tanggal">
				</span><br>
			</div>
		<div id="tanda_tangan">
				<p>yang melapor <span class="tab_ttd">Petugas Piket</span></p>
				<div class="cap">
					<img src="{{ url('images/logo_cap.gif') }}">
				</div>
				<div class="img_ttd">
					<img src="{{ url('images/ttd.png') }}" >
				</div>
				
			<div id="penandatangan">
				<p>( {{ $pemilik->nama }} )<span class="tab_petugas">@foreach($kehilangans as $k)(  {{ $k->nama_petugas }} )@endforeach</span></p>
			</div>
		</div>
		
	</div>
</body>
</html>