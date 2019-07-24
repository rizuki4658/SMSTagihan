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
              <h3 class="box-title">Laporan Data Tagihan Per Tanggal</h3>
            </div>
            <div class="box-body">
            	<form method="post" action="laporan_tagihan_tgl.php">
  			<table class="table" style="margin-bottom: 1px;">
  				<tr>
  					<td>
  						<label for="exampleFormControlInput1"><i class="fa fa-calendar"></i> Tanggal</label>
		    			<input type="date"  name="tgl" id="tgls" class="form-control">
  					</td>
  				</tr>
  				<tr>
  					<td>
  						
  					</td>
  				</tr>
  			</table>
  			<input type="submit" class="btn btn-info btn-md" value="Cetak" onmousedown="tagihan_tgl()" style="width: 100%;">
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
<?php require_once './validasi_laporan_tagihan/validasi_per_tgl.php';?>
 <?php require_once 'bottom_menu.php'; ?>

 <script type="text/javascript">
  function tagihan_tgl(){
    var tanggalnya1=document.getElementById('tgls').value;
    if (tanggalnya1 ==""|| tanggalnya1 == 00-00-0000) {
      $('#modalwarningTGL').modal('show');
    }else{
      return true;
    }
  }
</script>