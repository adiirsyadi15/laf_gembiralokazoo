@extends('layouts.app_administrator')
@section('content')
<div class="container-fluid">
  <div class="row">
    @include('navbar.navbar_administrator')

    @include('sidebar.sidebar_administrator') 
  </div>
</div>
<div class="row">

  <div class="isi-konten">
     <div class="col-md-12">
     @include('flash::message')
        <h3>USER <small></small></h3>
        {!! Form::open(['url' => 'user', 'method'=>'get', 'class'=>'form-inline']) !!}
            <div class="form-group {!! $errors->has('q') ? 'has-error' : '' !!}">
              {!! Form::text('q', isset($q) ? $q : null, ['class'=>'form-control', 'placeholder' => 'Cari User']) !!}
              {!! $errors->first('q', '<p class="help-block">:message</p>') !!}
            </div>

          {!! Form::submit('Cari', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
        <table class="table table-hover tableuser">
          <thead>
            <tr>
              <td>No</td>
              <td>Username</td>
              <td>Email</td>
              <td>Hak Akses</td>
              <td>Blockir</td>
              <td>reset passord</td>
            </tr>
          </thead>
          <tbody>
          <?php $no = 1;?>
            @foreach($users as $user)
            <tr>
              <td> <p> {{ $no }} </p> </td>
              <td> <p> {{ $user->username }} </p></td>
              <td> <p> {{ $user->email }} </p></td>
              <td> <p> {{ $user->role }} </p></td>
              <td>
              @if ($user->active == "1")
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#blokir{{ $user->username }}">{{ "Aktif" }}</button>
              @else
                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#blokir{{ $user->username }}">{{ "Blokir" }}</button>
                
              @endif
              <!-- Modal active -->
            <div class="modal fade" id="blokir{{ $user->username }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Rubah Status Blokir</h4>
                  </div>
                  <div class="modal-body">
                    <p> Apakan <bold> {{ $user->username }} </bold> Akan dirubah status blokirnya ? </p>
                      <!-- {!! Form::model($user, ['route' => ['user.blokir', $user->username], 'method' =>'patch' ])!!} -->
                      {!! Form::open(['route' => ['user.blokir', $user->username], 'method' =>'post' ])!!}
                      {!! Form::hidden('active', $value = $user->active, $attributes = []) !!}
                      
                    
                  </div>
                  <div class="modal-footer">
                    {!! Form::submit('Ya', ['class'=>'btn btn-primary']); !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {!! Form::close() !!}
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
              
               </td>
               <td>
                  <!-- resetpassword -->
                  <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#resetpassword{{ $user->username }}" rel="tooltip" data-original-title='password akan direset menjadi gembiralokazoo' data-placement="right">Reset</button>
                  <!-- Modal active -->
                  <div class="modal fade" id="resetpassword{{ $user->username }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Reset password</h4>
                        </div>
                        <div class="modal-body">
                          <p> Apakan password <bold> {{ $user->username }} </bold> akan direset ? </p>
                            {!! Form::open(['route' => ['user.resetpassword', $user->username], 'method' =>'post' ])!!}
                            
                            <!-- <input type="hidden" name="pass" value="gembiralokazoo"> -->
                        </div>
                        <div class="modal-footer">
                          {!! Form::submit('Ya', ['class'=>'btn btn-primary']); !!}
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          {!! Form::close() !!}
                        </div>
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->

               </td>
               
              

             

            </tr>
            <?php $no++; ?>
            
            <!-- UPDATE BLOKIR ADMIN -->


            


            @endforeach

          </tbody>


        </table>

        <div class="paginate">
          
        {!! $users->links() !!}

        </div>
      </div>



</div>
</div>

@endsection
       
   