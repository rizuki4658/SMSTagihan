<?php require_once 'top_menu.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Arsip Data Tagihan
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
              <h3 class="box-title">Arsip Data Tagihan</h3>
            </div>
            <div class="box-body">
            	<form method="post" action="laporan_arsip.php">
  			<table class="table" style="margin-bottom: 1px;">
  				<tr>
  					<td>
  						<label for="exampleFormControlInput1"><i class="fa fa-calendar"></i> Dari Tanggal</label>
		    			<input type="date" class="form-control" name="dari" id="dari">
  					</td>
  				</tr>
          <tr>
            <td>
              <label for="exampleFormControlInput1"><i class="fa fa-calendar"></i> Sampai Tanggal</label>
              <input type="date" class="form-control" name="sampai" id="sampai">
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
<?php require_once './validasi_laporan_tagihan/validasi_arsip.php';?>
 <?php require_once 'bottom_menu.php'; ?>

 <script type="text/javascript">
  function valid_arsip(){
    var tanggalnya1=document.getElementById('dari').value;
    var tanggalnya2=document.getElementById('sampai').value;
    if (tanggalnya1=="" || tanggalnya1==00-00-0000) {
      $('#modalwarningTGLA1').modal('show');
    }else if (tanggalnya2 =="" || tanggalnya2 ==00-00-0000){
      $('#modalwarningTGLA2').modal('show');
    }else{
      return true;
    }
  }
</script>