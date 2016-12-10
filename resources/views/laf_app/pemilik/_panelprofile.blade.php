<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Kelola Akun</h3>
  </div>
  <div class="list-group">
  <?php 
  $username = Auth::user()->username;
  ?>
    <a href="{{ url('profile/'.$username) }}" class="list-group-item">profile</a>
    <a href="{{ url('profile/'.$username.'/identitas') }}" class="list-group-item">idenitas</a>
    <a href="{{ url('profile/'.$username.'/kehilangan') }}" class="list-group-item">kehilangan</a>
  </div>
</div>

        