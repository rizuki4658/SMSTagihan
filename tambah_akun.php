<?php require_once 'top_menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pengguna
        <small>.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Akun</a></li>
        <li class="active">Tambah Akun</li>
      </ol>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Tambah Data Pengguna</h3>
            </div>
            <div class="box-body">
        <form method="post" action="./proses_akun/proses_tambah.php">
        <table class="table" style="margin-bottom: 1px;">         
          <tr>
            <td colspan="2">
              <label for="exampleFormControlInput1"><i class="fa fa-male"></i> Nama</label>
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <label for="exampleFormControlInput1"><i class="fa fa-envelope"></i> email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="ex. celenoteam17@gmail.com">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <label for="exampleFormControlSelect1">*<i class="fa fa-user"></i> username</label>
              <input type="text" class="form-control" name="username" id="username" autocomplete="off">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <label for="exampleFormControlSelect1">*<i class="fa fa-unlock"></i> password</label>
              <input type="password" class="form-control" name="password" id="password">
            </td>
          </tr>
          <tr>
            <td colspan="2">
                <label for="exampleFormControlInput1">*<i class="fa fa-lock"></i> konfirmasi password</label>
                <input type="password" class="form-control" name="konfirm" id="konfirm">
            </td>
          </tr>
        </table>
        <input type="submit" name="Simpan" class="btn btn-primary btn-md" value="+ Akun" onmousedown="validasi()" style="width: 100%;">
        <br>
        <br>
        <input type="Reset" name="Reset" class="btn btn-default btn-md" value="Reset" style="width: 100%;">
    </form>
            </div>
          </div>
        </div>



        <div class="col-md-6">
          <div class="box box-solid bg-light-blue-gradient">
            <div class="box-header">
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip"
                        title="Date range">
                  <i class="fa fa-calendar"></i></button>
                <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse"
                        data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                  <i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools -->

              <i class="fa fa-map-marker"></i>

              <h3 class="box-title">
                Map Vector
              </h3>
            </div>
            <div class="box-body">
              <div id="world-map" style="height: 250px; width: 100%;"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
    </section>

</div>
  <!-- /.content-wrapper -->
<?php require_once './validasi_akun/validasi_akun.php';?>
 <?php require_once 'bottom_menu.php'; ?>
<script type="text/javascript">
  function validasi() {
    var nama_lengkap=document.getElementById('nama').value;
    var alamat_email=document.getElementById('email').value;
    var nama_user=document.getElementById('username').value;
    var password_user=document.getElementById('password').value;
    var konfirmasi_password=document.getElementById('konfirm').value;
    if (nama_lengkap ==""){
      $('#modalwarningNama').modal('show');
    }else if (alamat_email==""){
      $('#modalwarningMail').modal('show');
    }else if (nama_user==""){
      $('#modalwarningUser').modal('show');
    }else if (password_user==""){
      $('#modalwarningPass').modal('show');
    }else if (konfirmasi_password==""){
      $('#modalwarningKonfirmKosong').modal('show');
    }else if (konfirmasi_password != password_user){
      $('#modalwarningKonfirmTdkSama').modal('show');
    }else{
      return true;
    }
  }
  
</script>