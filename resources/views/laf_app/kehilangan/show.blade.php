@extends('layouts.app_laf')
@section('content')

<div class="container">
	<div class="row habis-header">
		<div class="col-md-3">
			@include('sidebar.sidebar')
		</div>
		<div class="col-md-9">
        	<div class="row">
          		<div class="col-md-12">
		            <ol class="breadcrumb">
					     <li>Kehilangan -- Kategori: <a href="#">Semua</a></li>
						 
					</ol>
          		</div>

                
	        @foreach($kehilangans as $kehilangan)
            <div class="col-md-4 pull-left gallery-popup">
                        <img src="{{ url('images/fotobarang/'.$kehilangan->nama_foto) }}" alt="{{ $kehilangan->nama_barang }}" class="img-responsive img-rounded">
            </div>
            <div class="col-md-6">
                <h3>{{ $kehilangan->nama_barang }} </h3>
                <h5><span class="label label-default">{{ $kehilangan->status_kehilangan }}</span></h5>

                <p class="lead">telah hilang milik<h4 style="font-style: italic;"><b>{{ $kehilangan->nama_pemilik }}</b></h4></p>

                <p>Telah hilang {{ $kehilangan->nama_kategori }} {{ $kehilangan->nama_barang }} di {{ $kehilangan->lokasi }} jam {{ $kehilangan->waktu }} pada hari {{$kehilangan->hari}} tanggal {{ $kehilangan->tanggal }}, bagi yang merasa menemukan dapat menghubungi </p>

                <p>Hubungi via</p>
                <p><a href="#" data-toggle="popover" data-content="{{ $kehilangan->no_hp }}" data-placement="bottom" class="btn btn-call">Nomor Hp</a> <a href="#" data-toggle="popover" data-content="{{ 'aku' }}" data-placement="right" class="btn btn-call">Email</a></p>
                
                <p>Atau</p>
                <p class="alamatglz"  ><a href="#glzkontak" data-toggle="collapse"><b>Gembira Loka Zoo</b></a> </p>
                <div id="glzkontak" class="collapse">
                <p>Alamat : Jl. Kebun Raya No.2 Yogyakarta 55171</p>
                <p> Phone : 0274-373861 </p>
                <p>Fax : 0274-384666</p>
                <p>Email : Info@Gembiralokazoo.Com</p>
                </div>
                
                <!-- <a href="#" class="btn btn-info btn-hg">Found</a> -->
                
            </div>

            @endforeach
        </div>

      </div>
	</div>
</div>

@include('home.footer')
@endsection