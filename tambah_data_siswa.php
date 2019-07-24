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

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Input Data Siswa</h3>
            </div>
            <div class="box-body">
            	<form method="post" action="./proses_siswa/proses_simpan_siswa.php">
  			<table class="table" style="margin-bottom: 1px;">
  				<tr>
  					<td>
  						<label for="exampleFormControlInput1"><i class="fa fa-barcode"></i> Nomor Induk Siswa</label>
		    			<input type="text" class="form-control" name="nis" id="nis" placeholder="NIS">
  					</td>
  				</tr>
  				<tr>
  					<td>
  						<label for="exampleFormControlInput1"><i class="fa fa-user"></i> Nama Siswa</label>
		    			<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
  					</td>
  				</tr>
  				<tr>
  					<td>
  						<label for="exampleFormControlInput1"><i class="fa fa-calendar"></i> Tanggal Lahir</label>
		    			<input type="date" class="form-control" name="tgl" id="tgl">
  					</td>
  				</tr>
  				<tr>
  					<td>
  						<label for="exampleFormControlSelect1"><i class="fa fa-building"></i> Kelas</label>
					    <select class="form-control" name="kelas" id="kelas">
					      <option value="0">Pilih Kelas</option>
					      <option value="1">VII A</option>
					      <option value="2">VII B</option>
					      <option value="3">VII C</option>
					      <option value="4">VII D</option>
					      <option value="5">VIII E</option>
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
  						<label for="exampleFormControlSelect2"><i class="fa fa-eye"></i> Laki-Laki / Perempuan</label>
		    				<select class="form-control" id="jenis" name="jenis">
						      <option value="Pilih L/P">Pilih L/P</option>
						      <option value="Laki-Laki">Laki-Laki</option>
						      <option value="Perempuan">Perempuan</option>
						    </select>
  					</td>
  				</tr>
  				<tr>
  					<td>
  						 <label for="exampleFormControlTextarea1"><i class="ti ti-hand-point-right"></i> <i class="fa fa-map-marker"></i> Alamat</label>
		    			<textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
  					</td>
  				</tr>
  				<tr>
  					<td>
  						<label for="exampleFormControlInput1"><i class="fa fa-calendar-o"></i> Angkatan</label>
		    			<input type="date" class="form-control" name="angkatan" id="angkatan">
  					</td>
  				</tr>
  				<tr>
  					<td>
  						
  					</td>
  				</tr>
  			</table>
  			<input type="submit" name="Simpan" class="btn btn-info btn-md" value="Simpan" onmousedown="validasi()" style="width: 100%;">
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
 <?php require_once './validasi_siswa/modal_valid_siswa.php'; ?>
  </div>
  <!-- /.content-wrapper -->

 <?php require_once 'bottom_menu.php'; ?>
<script type="text/javascript">
	function validasi() {
		var no_induk=document.getElementById('nis').value;
		var nama_siswa=document.getElementById('nama').value;
		var tanggal_lahir=document.getElementById('tgl').value;
		var kelas_siswa=document.getElementById('kelas').value;
		var kelamin_siswa=document.getElementById('jenis').value;
		var alamat_siswa=document.getElementById('alamat').value;
		var angkatan_siswa=document.getElementById('angkatan').value;
		if (no_induk ==""){
			$('#modal-warning-nis').modal('show');
		}else if(nama_siswa==""){
			$('#modal-warning-nama').modal('show');
		}else if(tanggal_lahir=="" || tanggal_lahir==00-00-0000){
			$('#modal-warning-tgl').modal('show');
		}else if(kelas_siswa=="" || kelas_siswa==0){
			$('#modal-warning-kelas').modal('show');
		}else if(kelamin_siswa=="Pilih L/P"){
			$('#modal-warning-LP').modal('show');
		}else if(alamat_siswa==""){
			$('#modal-warning-alamat').modal('show');
		}else if(angkatan_siswa=="" || angkatan_siswa==00-00-0000){
			$('#modal-warning-angkatan').modal('show');
		
		}else{
			return true;
		}
	}
	
</script>