<?php 
  session_start(); 
  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tagihan SMP | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link href='logo.jpg' rel='shortcut icon'>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="./bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="./bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="./plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style>
.tengah{
position: absolute;margin-top: 0px;margin-left: -200px;left: 50%;top: 50%;width: 400px;height: 220px;background-color: brown;
}
</style>
</head>
<body class="hold-transition login-page" style="background-image: url('035 Itmeo Branding.png');">

<div class="login-box">
  <div class="login-logo">
    <b>SMP Al-Qur'an Zaenuddin</b>
  </div>
  <!-- /.login-logo -->
  <div class="box-body">
    <p class="login-box-msg">Sign in to start your apps</p>

    <form action="./validasi_login/cek_login.php?OP=in" method="post">
      <div class=" has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username" id="username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <br>
      <div class=" has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="passwords" id="passwords">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <br>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" class="btn btn-primary btn-block btn-flat" name="masuk" id="masuk" value="Masuk" onmousedown="validasi()">
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="text-center">
      
    </div>
  </div>
  <!-- /.login-box-body -->
</div>

<!-- /.login-box -->
<?php require_once './validasi_login/validasi_login.php'; ?>
<script src="./bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="./plugins/iCheck/icheck.min.js"></script>



</body>
</html>
<script type="text/javascript">
  function validasi() {
    var kelas_siswa=document.getElementById('username').value;
    var nis_siswa=document.getElementById('passwords').value;
    if (kelas_siswa =="" || kelas_siswa==0){
      $('#modalwarning1').modal('show');
    }else if (nis_siswa==""){
      $('#modalwarning2').modal('show');
    }else{
      return true;
    }
  }
  
</script>