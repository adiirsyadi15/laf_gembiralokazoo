<div class="form-group  {!! $errors->has('jenis') ? 'has-error' : '' !!}">
<div class="form-group">
    <label for="jenis">Jenis Identitas</label>
    {!! Form::select('jenis', ['ktp' => 'ktp', 'sim' => 'sim', 'stnk' => 'stnk', 'instansi' => 'instansi'], 'ktp', ['class'=>'form-control']) !!}
</div>
    {!! $errors->first('jenis', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group {!! $errors->has('gambar') ? 'has-error' : '' !!}">
  {!! Form::label('gambar', 'Gambar') !!}
  {!! Form::file('gambar', null, ['class'=>'form-control']) !!}
  {!! $errors->first('gambar', '<p class="help-block">:message</p>') !!}
</div>

