<fieldset>
    <h4> Step 1: Tambah kejadian </h4>
    <div class="form-group  {!! $errors->has('hari') ? 'has-error' : '' !!}">
        <div class="form-group">
            <label for="hari">hari</label>
            {!! Form::select('hari', ['senin' => 'senin', 'selasa' => 'selasa', 'rabu' => 'rabu', 'kamis' => 'kamis', 'jumat' => 'jumat', 'sabtu' => 'sabtu', 'minggu' => 'minggu'], 'senin', ['class'=>'form-control']) !!}
        </div>
        {!! $errors->first('hari', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group  {!! $errors->has('waktu') ? 'has-error' : '' !!}">
        <div class="form-group">
            <label for="waktu">waktu</label>
            {!! Form::time('waktu', null, ['class'=>'form-control', 'placeholder'=>'masukkan waktu']) !!}
        </div>
        {!! $errors->first('nomor', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group {!! $errors->has('tanggal_kejadian') ? 'has-error' : '' !!}">
      {!! Form::label('tanggal_kejadian', 'tanggal kejadian') !!}
      {!! Form::date('tanggal_kejadian', null, ['class'=>'form-control']) !!}
      {!! $errors->first('tanggal_kejadian', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group {!! $errors->has('lokasi') ? 'has-error' : '' !!}">
      {!! Form::label('lokasi', 'lokasi') !!}
      {!! Form::textarea('lokasi', null, ['class'=>'form-control']) !!}
      {!! $errors->first('lokasi', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group {!! $errors->has('keterangan') ? 'has-error' : '' !!}">
      {!! Form::label('keterangan', 'Keterangan') !!}
      {!! Form::textarea('keterangan', null, ['class'=>'form-control']) !!}
      {!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
    </div>

    <input type="button" name="next" class="next btn btn-info pull-right" value="Next" />
</fieldset>