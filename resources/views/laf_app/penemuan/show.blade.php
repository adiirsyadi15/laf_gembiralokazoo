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
                         <li>Penemuan -- Kategori: <a href="#">Semua</a></li>
                    </ol>
          		</div>

                
	        @foreach($penemuans as $p)
            <div class="col-md-4 pull-left gallery-popup">
                        <img src="{{ url('images/fotobarang/'.$p->nama_foto) }}" alt="{{ $p->nama_barang }}" class="img-responsive img-rounded">
            </div>
            <div class="col-md-6">
                <h3>{{ $p->nama_barang }} </h3>
                <h5><span class="label label-default">{{ $p->status_pengambilan }}</span></h5>


                <p>Telah ditemukan {{ $p->nama_kategori }} {{ $p->nama_barang }} di {{ $p->lokasi }} jam {{ $p->waktu }} pada hari {{$p->hari}} tanggal {{ $p->tanggal }}, bagi yang merasa memiliki dapat menghubungi </p>

                @if(empty($p->nama_barang))
                <p>Hubungi via</p>
                <p><a href="#" data-toggle="popover" data-content="{{ $p->no_hp }}" data-placement="bottom" class="btn btn-call">Nomor Hp</a> <a href="#" data-toggle="popover" data-content="{{ 'aku' }}" data-placement="right" class="btn btn-call">Email</a></p>
                
                <p>Atau</p>

                @endif
                <p class="alamatglz"  ><a href="#glzkontak" data-toggle="collapse"><b>Gembira Loka Zoo</b></a> </p>
                <div id="glzkontak" class="collapse">
                <p>Alamat : Jl. Kebun Raya No.2 Yogyakarta 55171</p>
                <p> Phone : 0274-373861 </p>
                <p>Fax : 0274-384666</p>
                <p>Email : Info@Gembiralokazoo.Com</p>
                </div>
            </div>
            @endforeach
            <div class="col-md-2">
                @include('home.share')
            </div>
        </div>
      </div>
	</div>
</div>

@include('home.footer')
@endsection