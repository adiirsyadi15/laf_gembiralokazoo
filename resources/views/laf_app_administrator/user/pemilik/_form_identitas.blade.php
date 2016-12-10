<fieldset>
    <div class="col-md-6">
        <h4>identitas 1</h4>
        <hr>
        <div class="form-group  {!! $errors->has('jenis_1') ? 'has-error' : '' !!}">
            <div class="form-group">
                <label for="jenis_1">Jenis Identitas</label>
                {!! Form::text('jenis_1', null, ['class'=>'form-control', 'placeholder'=>'masukkan jenis']) !!}
            </div>
            {!! $errors->first('jenis_1', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group  {!! $errors->has('nomor_1') ? 'has-error' : '' !!}">
            <div class="form-group">
                <label for="nomor_1">nomor</label>
                {!! Form::text('nomor_1', null, ['class'=>'form-control', 'placeholder'=>'masukkan nomor']) !!}
            </div>
            {!! $errors->first('nomor_1', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group {!! $errors->has('gambar_1') ? 'has-error' : '' !!}">
          {!! Form::label('gambar_1', 'Gambar') !!}
          {!! Form::file('gambar_1', null, ['class'=>'form-control']) !!}
          {!! $errors->first('gambar_1', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    
    <div class="col-md-6">
        <h4>identitas 2</h4>
        <hr>
        <div class="form-group  {!! $errors->has('jenis_2') ? 'has-error' : '' !!}">
            <div class="form-group">
                <label for="jenis_2">Jenis Identitas</label>
                {!! Form::text('jenis_2', null, ['class'=>'form-control', 'placeholder'=>'masukkan jenis']) !!}
            </div>
            {!! $errors->first('jenis_2', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group  {!! $errors->has('nomor_2') ? 'has-error' : '' !!}">
            <div class="form-group">
                <label for="nomor_2">nomor</label>
                {!! Form::text('nomor', null, ['class'=>'form-control', 'placeholder'=>'masukkan nomor']) !!}
            </div>
            {!! $errors->first('nomor_2', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group {!! $errors->has('gambar_2') ? 'has-error' : '' !!}">
          {!! Form::label('gambar_2', 'Gambar') !!}
          {!! Form::file('gambar_2', null, ['class'=>'form-control']) !!}
          {!! $errors->first('gambar_2', '<p class="help-block">:message</p>') !!}
        </div> 
    </div>
   
</fieldset>