<fieldset>
    <h4> Step 2: Tambah data Barang</h4>
<div class="form-group  {!! $errors->has('nama_barang') ? 'has-error' : '' !!}">
    <div class="form-group">
    <label for="nama_barang">nama barang</label>
    {!! Form::text('nama_barang', null, ['class'=>'form-control', 'placeholder'=>'masukkan nama barang']) !!}
    </div>
    {!! $errors->first('nama_barang', '<p class="help-block">:message</p>') !!}
  </div>

  <div class="form-group  {!! $errors->has('kategori') ? 'has-error' : '' !!}">
      <div class="form-group">
          <label for="kategori">kategori</label>
          {!! Form::select('id_kategori', $kategoris, null,['class' => 'form-control']) !!}
      </div>
      {!! $errors->first('kategori', '<p class="help-block">:message</p>') !!}
  </div>

  <div class="form-group {!! $errors->has('ciri_ciri') ? 'has-error' : '' !!}">
    {!! Form::label('ciri_ciri', 'ciri ciri') !!}
    {!! Form::textarea('ciri_ciri', null, ['class'=>'form-control']) !!}
    {!! $errors->first('ciri_ciri', '<p class="help-block">:message</p>') !!}
  </div>

  <div class="form-group {!! $errors->has('foto_barang_1') ? 'has-error' : '' !!}">
    {!! Form::label('foto_barang_1', 'foto barang 1') !!}
    {!! Form::file('foto_barang_1', null, ['class'=>'form-control']) !!}
    {!! $errors->first('foto_barang_1', '<p class="help-block">:message</p>') !!}
  </div>

  <div class="form-group {!! $errors->has('foto_barang_2') ? 'has-error' : '' !!}">
    {!! Form::label('foto_barang_2', 'foto barang 2') !!}
    {!! Form::file('foto_barang_2', null, ['class'=>'form-control']) !!}
    {!! $errors->first('foto_barang_2', '<p class="help-block">:message</p>') !!}
  </div>

  <div class="form-group {!! $errors->has('foto_barang_3') ? 'has-error' : '' !!}">
    {!! Form::label('foto_barang_3', 'foto barang 3') !!}
    {!! Form::file('foto_barang_3', null, ['class'=>'form-control']) !!}
    {!! $errors->first('foto_barang_3', '<p class="help-block">:message</p>') !!}
  </div>

    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="simpan" class="next btn btn-info pull-right" value="simpan" />
</fieldset>