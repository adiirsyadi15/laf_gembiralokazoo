<fieldset>
    <h2> Step 1: Tambah data Pemilik</h2>

    <input type="hidden" name="password" value="gembiralokazoo">
    <input type="hidden" name="role" value="pemilik">
    <input type="hidden" name="active" value="1">
    <input type="hidden" name="status_verifikasi" value="1">

    <div class="form-group  {!! $errors->has('nama') ? 'has-error' : '' !!}">
        <div class="form-group">
            <label for="nama">Nama</label>
            {!! Form::text('nama', null, ['class'=>'form-control', 'placeholder'=>'Masukkan Nama']) !!}
        </div>
        {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group  {!! $errors->has('email') ? 'has-error' : '' !!}">
        <div class="form-group">
            <label for="email">Email</label>
            {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'masukkan email']) !!}
        </div>
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group  {!! $errors->has('username') ? 'has-error' : '' !!}">
        <div class="form-group">
            <label for="username">username</label>
            {!! Form::text('username', null, ['class'=>'form-control', 'placeholder'=>'masukkan username']) !!}
        </div>
        {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group  {!! $errors->has('jk') ? 'has-error' : '' !!}">
        <div class="form-group">
            <label for="jk">Jenis Kelamin</label>
            <div class="radio">
                <label>
                  <input type="radio" name="jk" id="L" value="L" checked>
                  Laki-laki
                </label>
                <label>
                  <input type="radio" name="jk" id="P" value="P">
                 Perempuan
                </label>
              </div>
        </div>
        {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group {!! $errors->has('tempat_lahir') ? 'has-error' : '' !!}">
          {!! Form::label('tempat_lahir', 'Tempat Lahir') !!}
          {!! Form::text('tempat_lahir', null, ['class'=>'form-control']) !!}
          {!! $errors->first('tempat_lahir', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group {!! $errors->has('tanggal_lahir') ? 'has-error' : '' !!}">
      {!! Form::label('tanggal_lahir', 'Tanggal Lahir') !!}
      {!! Form::date('tanggal_lahir', null, ['class'=>'form-control']) !!}
      {!! $errors->first('tanggal_lahir', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group {!! $errors->has('alamat') ? 'has-error' : '' !!}">
      {!! Form::label('alamat', 'Alamat *') !!}
      {!! Form::textarea('alamat', null, ['class'=>'form-control']) !!}
      {!! $errors->first('alamat', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group {!! $errors->has('agama') ? 'has-error' : '' !!}">
        {!! Form::label('agama', 'Agama') !!}
        {!! Form::select('agama', ['islam' => 'islam', 'kristen' => 'kristen', 'ketolik' => 'ketolik', 'hindu' => 'hindu', 'budha' => 'budha'], 'islam', ['class'=>'form-control']) !!}
        {!! $errors->first('agama', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group {!! $errors->has('no_hp') ? 'has-error' : '' !!}">
              {!! Form::label('no_hp', 'Nomor Hp *') !!}
              {!! Form::text('no_hp', null, ['class'=>'form-control']) !!}
              {!! $errors->first('no_hp', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group {!! $errors->has('foto_profile') ? 'has-error' : '' !!}">
      {!! Form::label('foto', 'foto') !!}
      {!! Form::file('foto', null, ['class'=>'form-control']) !!}
      {!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
    </div>
    <br>
    <input type="submit" name="submit" class="submit btn btn-success pull-right" value="Submit" />
</fieldset>