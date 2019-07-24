<?php require_once 'top_menu.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Data Tagihan
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
              <h3 class="box-title">Laporan Data Tagihan Per Tanggal dan Kelas</h3>
            </div>
            <div class="box-body">
            	<form method="post" action="laporan_tagihan_tgl_kelas.php">
  			<table class="table" style="margin-bottom: 1px;">
  				<tr>
  					<td>
  						<label for="exampleFormControlInput1"><i class="fa fa-calendar"></i> Tanggal</label>
		    			<input type="date" class="form-control" name="tgl1" id="tgl1">
  					</td>
  				</tr>
  				<tr>
  					<td>
  						<label for="exampleFormControlSelect1"><i class="fa fa-building"></i> Kelas</label>
					    <select class="form-control" name="kelas1" id="kelas1">
					      <option value="0">Pilih Kelas</option>
					      <option value="VII A">VII A</option>
					      <option value="VII B">VII B</option>
					      <option value="VII C">VII C</option>
					      <option value="VII D">VII D</option>
					      <option value="VIII E">VII E</option>
					      <option value="VIII A">VIII A</option>
					      <option value="VIII B">VIII B</option>
					      <option value="VIII C">VIII C</option>
					      <option value="VIII D">VIII D</option>
					      <option value="VIII E">VIII E</option>
					      <option value="IX A">IX A</option>
					      <option value="IX B">IX B</option>
					      <option value="IX C">IX C</option>
					      <option value="IX D">IX D</option>
					      <option value="IX E">IX E</option>
					    </select>
  					</td>
  				</tr>
  				<tr>
  					<td>
  						
  					</td>
  				</tr>
  			</table>
  			<input type="submit" class="btn btn-info btn-md" value="Cetak" onmousedown="valid_arsip()" style="width: 100%;">
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
<?php require_once './validasi_laporan_tagihan/validasi_per_tgl_kls.php'; ?>
 <?php require_once 'bottom_menu.php'; ?>

<script type="text/javascript">
  function valid_arsip(){
    var tanggalnya1=document.getElementById('tgl1').value;
    var tanggalnya2=document.getElementById('kelas1').value;
    if (tanggalnya1=="" || tanggalnya1==00-00-0000) {
      $('#modalwarningTGLKLS1').modal('show');
    }else if (tanggalnya2 =="" || tanggalnya2 ==0){
      $('#modalwarningTGLKLS2').modal('show');
    }else{
      return true;
    }
  }
</script>