<?php require_once 'top_menu.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Siswa
        <small>.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Laporan Per Angkatan</h3>
            </div>
            <div class="box-body">
              <form action="laporan_siswa_angkatan.php" method="post">
        <table class="table" style="margin-bottom: 1px;">
          <tr>
            <td>
              <label for="exampleFormControlInput1"><i class="fa fa-calendar-o"></i> Angkatan</label>
              <input type="date" name="angkatan1" id="angkatan1" class="form-control">
            </td>
          </tr>
          <tr>
            <td>
              
            </td>
          </tr>
        </table>
        <input type="submit" class="btn btn-info btn-md" value="Cetak" onmousedown="validasi_Siswa2()" style="width: 100%;">
        <br>
        <br>
        <input type="Reset" name="Reset" class="btn btn-default btn-md" value="Reset" style="width: 100%;">
    </form>
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
<?php require_once './validasi_laporan_siswa/validasi_laporan_siswa.php';?>
 <?php require_once 'bottom_menu.php'; ?>

<script type="text/javascript">
  function validasi_Siswa2() {
    var angkatan_siswa = document.getElementById('angkatan1').value;
    if (angkatan_siswa=="" || angkatan_siswa==00-00-0000) {
      $('#modalwarning2').modal('show');
    }else{
      return true;
    }
  }
</script>