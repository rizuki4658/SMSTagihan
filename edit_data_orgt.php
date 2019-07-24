<?php require_once 'top_menu.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Siswa
        <small>.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
<?php 
    $nis=$_GET['nis'];
    $link=mysqli_connect('localhost','root','','db_smp_zaenuddin');
    $cek="SELECT * FROM wali WHERE id='$nis' AND status='AKTIF'";
    $hasil=mysqli_query($link,$cek);
    if (mysqli_num_rows($hasil) > 0) {
      while ($data=mysqli_fetch_assoc($hasil)) { ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">Input Data Orang Tua</h3>
            </div>
            <div class="box-body">
            	<form method="post" action="./proses_orgt/proses_edit_orgt.php">
        <table class="table" style="margin-bottom: 1px;">
          <tr>
            <td>
              <label for="exampleFormControlInput1"><i class="fa fa-user"></i> NIS</label>
              <input type="text" class="form-control" name="nis" id="nis" placeholder="nis" readonly value="<?php echo $data['id']; ?>">
            </td>
          </tr>
          <tr>
            <td>
              <label for="exampleFormControlInput1"><i class="ti ti-user"></i> Nama Orang Tua</label>
              <input type="text" class="form-control" name="orang_tua" id="orang_tua" value="<?php echo $data['nama']; ?>">
            </td>
          </tr>
          <tr>
            <td>
              <label for="exampleFormControlSelect1"><i class="fa fa-phone"></i> Telpon</label>
              <input type="text" class="form-control" name="telp" id="telp" value="<?php echo $data['telp']; ?>">
            </td>
          </tr>
          <tr>
            <td>
               <label for="exampleFormControlTextarea1"><i class="ti ti-hand-point-right"></i> <i class="fa fa-map-marker"></i> Alamat</label>
              <textarea class="form-control" name="alamat" id="alamat" rows="3"><?php echo $data['alamat']; ?></textarea>
            </td>
          </tr>
          <tr>
            <td>
              <label for="exampleFormControlInput1"><i class="fa fa-suitcase"></i> Pekerjaan</label>
              <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="<?php echo $data['pekerjaan']; ?>">
            </td>
          </tr>
          <tr>
            <td>
              <label for="exampleFormControlInput1"><i class="fa fa-money"></i> Penghasilan</label>
              <select class="form-control" name="penghasilan" id="penghasilan">
                <option value="<?php echo $data['penghasilan']; ?>"><?php echo $data['penghasilan']; ?></option>
                <option value="Pilih">Pilih</option>
                <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000 - Rp. 1.000.000</option>
                <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
                <option value="Rp. 2.000.000 - Rp. 4.000.000">Rp. 2.000.000 - Rp. 4.000.000</option>
                <option value="> Rp. 4.000.000">> Rp. 4.000.000</option>
              </select>
            </td>
          </tr>
        </table>
        <input type="submit" name="Simpan" class="btn btn-success btn-md" value="Update" onmousedown="validasi()" style="width: 100%;">
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
<?php
      }
    }
?>

 <?php require_once './validasi_orgt/modal_valid_orgt.php'; ?>
  </div>
  <!-- /.content-wrapper -->

 <?php require_once 'bottom_menu.php'; ?>
<script type="text/javascript">
  function validasi() {
    var nis_siswa=document.getElementById('nis').value;
    var orang_siswa=document.getElementById('orang_tua').value;
    var telp_orang=document.getElementById('telp').value;
    var alamat_orang=document.getElementById('alamat').value;
    var pekerjaan_orang=document.getElementById('pekerjaan').value;
    var penghasilan_orang=document.getElementById('penghasilan').value;
    if (nis_siswa==0){
      $('#modalwarningNIS').modal('show');
    }else if (orang_siswa==""){
      $('#modalwarningOrang').modal('show');
    }else if (telp_orang==""){
      $('#modalwarningTelp').modal('show');
    }else if (alamat_orang==""){
      $('#modalwarningAlamat').modal('show');
    }else if (pekerjaan_orang==""){
      $('#modalwarningPekerjaan').modal('show');
    }else if (penghasilan_orang=="Pilih" || penghasilan_orang==0){
      $('#modalwarningPenghasilan').modal('show');
    }else{
      return true;
    }
  }
  
</script>