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
              <h3 class="box-title">Laporan Per Kelas</h3>
            </div>
            <div class="box-body">
            	<form action="laporan_siswa_kelas.php" method="post">
  			<table class="table" style="margin-bottom: 1px;">
  				<tr>
  					<td>
  						<label for="exampleFormControlSelect1"><i class="fa fa-building"></i> Kelas</label>
					    <select name="kelas" id="kelas" class="form-control">
					      <option value="0">Pilih Kelas</option>
					      <option value="1">VII A</option>
					      <option value="2">VII B</option>
					      <option value="3">VII C</option>
					      <option value="4">VII D</option>
					      <option value="5">VII E</option>
					      <option value="6">VIII A</option>
					      <option value="7">VIII B</option>
					      <option value="8">VIII C</option>
					      <option value="9">VIII D</option>
					      <option value="10">VIII E</option>
					      <option value="11">IX A</option>
					      <option value="12">IX B</option>
					      <option value="13">IX C</option>
					      <option value="14">IX D</option>
					      <option value="15">IX E</option>
					    </select>
  					</td>
  				</tr>
  				<tr>
  					<td>
  						
  					</td>
  				</tr>
  			</table>
  			<input type="submit" class="btn btn-info btn-md" value="Cetak" onmousedown="validasi_Siswa1()" style="width: 100%;">
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
  function validasi_Siswa1() {
    var kelas_siswa = document.getElementById('kelas').value;
    if (kelas_siswa =="" || kelas_siswa == 0) {
      $('#modalwarning1').modal('show');
    }else{
      return true;
    }
  }
</script>