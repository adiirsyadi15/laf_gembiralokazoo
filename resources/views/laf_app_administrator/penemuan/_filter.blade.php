<a class="btn btn-primary" role="button" data-toggle="collapse" href="#filter" >
  Filter
</a>
<div class="collapse" id="filter">
	{!! Form::open(['url' => 'pengolahan/penemuan', 'method'=>'get', 'class'=>'form-inline']) !!}
		<div class="form-group {!! $errors->has('q') ? 'has-error' : '' !!}">
			{!! Form::text('q', isset($q) ? $q : null, ['class'=>'form-control', 'placeholder' => 'Cari Nama']) !!}
			{!! $errors->first('q', '<p class="help-block">:message</p>') !!}
		</div>
			{!! Form::submit('Cari', ['class'=>'btn btn-primary']) !!}
	{!! Form::close() !!}
</div>
