<?php require_once 'top_menu.php'; ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profil
        <small>.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Profil</a></li>
        <li class="active">Profil Pengguna</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-3">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive" src="<?php echo $_SESSION['ses_foto']; ?>" alt="User profile picture">

              <h3 class="profile-username text-center">
                              <?php
                                  $iniuser=$_SESSION['ses_user'];
                                  $perintahnya="SELECT * FROM user_db WHERE username='$iniuser'";
                                  $hasilnya=mysqli_query($link,$perintahnya);
                                  while ($namanya=mysqli_fetch_assoc($hasilnya)) {
                                    echo $namanya['nama'];
                                  }

                                ?></h3>

              <p class="text-muted text-center">Admin SMP Al-Qur'an Zaenuddin</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>username</b> <a class="pull-right"><?php echo $_SESSION['ses_user']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>e-mail</b> <a class="pull-right">
                                <?php
                                  $usernya=$_SESSION['ses_user'];
                                  $cekes="SELECT * FROM user_db WHERE username='$usernya'";
                                  $aksi=mysqli_query($link,$cekes);
                                  while ($emailnya=mysqli_fetch_assoc($aksi)) {
                                    echo $emailnya['email'];
                                  }

                                ?>

                                </a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tentang Sekolah</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Kontak</strong>

              <p class="text-muted">
              	<i class="fa fa-google"></i>mail: smp.zaenuddin@gmail.com
              </p>
              <p>
              	
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Jalan Raya Pantura, KM 9 Tegal – Pemalang, 
Maribaya - Kramat- Kabupaten Tegal - Propinsi Jawa Tengah.</p>

              <hr>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->


        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Update Profil</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <form class="form-horizontal" action="./proses_akun/proses_update.php" method="post">
                  <table class="table">
                  	<tr>
                  		<td>
                        <input type="hidden" name="username_awal" value="<?php echo $_SESSION['ses_user']; ?>">
                  			<label for="exampleFormControlSelect1"><i class="fa fa-male"></i> Nama</label>
                  			<input type="text" name="nama_user" id="nama_user" class="form-control">
                  		</td>
                  	</tr>
                  	<tr>
                  		<td>
                  			<label for="exampleFormControlSelect1"><i class="fa fa-envelope"></i> email</label>
                  			<input type="mail" name="email" id="email" class="form-control">
                  		</td>
                  	</tr>
                  	<tr>
                  		<td>
                  			<label for="exampleFormControlSelect1"><i class="fa fa-user"></i> username</label>
                  			<input type="text" name="username" id="username" class="form-control" autocomplete="off">
                  		</td>
                  	</tr>
                  	<tr>
                  		<td>
                  			<label for="exampleFormControlSelect1"><i class="fa fa-key"></i> password</label>
                  			<input type="password" name="pass" id="pass" class="form-control">
                  		</td>
                  	</tr>
                  	<tr>
                  		<td>
                  			<label for="exampleFormControlSelect1">*<i class="fa fa-lock"></i> password Baru</label>
                  			<input type="password" name="new_pass" id="new_pass" class="form-control">
                  		</td>
                  	</tr>
                  	<tr>
                  		<td>
                  			<label for="exampleFormControlSelect1">*<i class="fa fa-unlock"></i> Konfirmasi password</label>
                  			<input type="password" name="konf_pass" id="konf_pass" class="form-control">
                  		</td>
                  	</tr>
                  	<tr>
                  		<td>
                  			<input type="submit" name="UPDATE" id="UPDATE" value="Update" class="btn btn-info" onmousedown="validasi()">
                  		</td>
                  	</tr>
                  </table>
                </form>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>

        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Foto</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="./proses_akun/proses_upload.php">
                  <table class="table">
                  	<tr>
                  		<td>
                  			<center>
                  			<img src="<?php echo $_SESSION['ses_foto']; ?>" class="img-responsive" id="preview" style="width: 114px; height: 152px;">
                  			</center>
                  		</td>
                  	</tr>
                  	<tr>
                  		<td>
                        <input type="hidden" name="usernamenya" value="<?php echo $_SESSION['ses_user']; ?>">
                  			<label for="exampleFormControlSelect1"><i class="fa fa-picture"></i> Pilih</label>
                  			<input type="file" name="foto" id="foto" class="form-control" onchange="tampilkanPreview(this,'preview')">
                  		</td>
                  	</tr>
                  	<tr>
                  		<td>
                  			<input type="submit" name="Upload" id="Upload" value="Upload" class="btn btn-primary" onmousedown="validasiS()">
                  		</td>
                  	</tr>
                  </table>
                </form>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
      </div>
      <!-- /.row -->
	</section>
  </div>
  <!-- /.content-wrapper -->
<?php require_once './validasi_profil/validasi_update_akun.php';?>
<?php require_once 'bottom_menu.php'; ?>

<script type="text/javascript">
function tampilkanPreview(foto,idpreview)
{
  var gb = foto.files;
  for (var i = 0; i < gb.length; i++)
  {
    var gbPreview = gb[i];
    var imageType = /image.*/;
    var preview=document.getElementById(idpreview);
    var reader = new FileReader();
    if (gbPreview.type.match(imageType))
    {
      //jika tipe data sesuai
      preview.file = gbPreview;
      reader.onload = (function(element)
      {
        return function(e)
        {
          element.src = e.target.result;
        };
      })(preview);
      //membaca data URL gambar
      reader.readAsDataURL(gbPreview);
    }
      else
      {
        //jika tipe data tidak sesuai
        alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
      }
  }
}
</script>

<script type="text/javascript">
  function validasi() {
    var nama_lengkap=document.getElementById('nama_user').value;
    var alamat_email=document.getElementById('email').value;
    var nama_user=document.getElementById('username').value;
    var password_user=document.getElementById('pass').value;
    var new_password=document.getElementById('new_pass').value;
    var konfirmasi_password=document.getElementById('konf_pass').value;
    if (nama_lengkap ==""){
      $('#modalwarningNama').modal('show');
    }else if (alamat_email==""){
      $('#modalwarningMail').modal('show');
    }else if (nama_user==""){
      $('#modalwarningUser').modal('show');
    }else if (password_user==""){
      $('#modalwarningPass').modal('show');
    }else if (konfirmasi_password != new_password){
      $('#modalwarningKonfirmTdkSama').modal('show');
    }else{
      return true;
    }
  }
</script>
<script type="text/javascript">
  function validasiS() {
    var upload_foto=document.getElementById('foto').value;
    if (upload_foto =="" || upload_foto==''){
      $('#modalwarningFoto').modal('show');
    }else{
      return true;
    }
  }
</script>