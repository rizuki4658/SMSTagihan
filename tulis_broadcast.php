<?php require_once 'top_menu.php' ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tulis Broadcast SMS
        <small>.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">SMS</a></li>
        <li class="active">Broadcast SMS</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Broadcast SMS Tagihan</h3>
            </div>
            <div class="box-body">
        		<form method="post" action="./proses_bc/proses_bc_tagihan.php" name="tagih">
			        <table class="table" style="margin-bottom: 1px;">         
			          <tr>
			            <td colspan="2">
			              <label for="exampleFormControlInput1"><i class="fa fa-user"></i> Userkey Zenziva</label>
			              <input type="text" class="form-control" name="userkey" id="userkey" autocomplete="off">
			            </td>
			          </tr>
			          <tr>
			            <td colspan="2">
			              <label for="exampleFormControlInput1"><i class="fa fa-lock"></i> Passkey Zenziva</label>
			              <input type="text" class="form-control" name="passkey" id="passkey" autocomplete="off">
			            </td>
			          </tr>
			          <tr>
			            <td colspan="2">
			              <label for="exampleFormControlSelect1"><i class="fa fa-calendar"></i> Tanggal Tagihan</label>
			              <input type="date" class="form-control" name="tgl" id="tgl">
			            </td>
			          </tr>
			          <tr>
			            <td colspan="2">
			              <label for="exampleFormControlSelect1"><i class="fa fa-credit-card"></i> Nama Rek. SMP</label>
			              <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama">
			            </td>
			          </tr>
			          <tr>
			            <td colspan="2">
			                <label for="exampleFormControlInput1"><i class="fa fa-building"></i> Bank & No. Rek.</label>
			                <input type="text" id="bank_rek" name="bank_rek" placeholder="Bank & Rek SMP" class="form-control">
			            </td>
			          </tr>
			          <tr>
			            <td>
			                <input type="submit" name="kirim" class="btn btn-success btn-md" value="Kirim" onmousedown="validasi()" style="width: 100%;">
			            </td>
			            <td>
			            	<input type="reset" name="Reset" class="btn btn-default btn-md" value="Reset" style="width: 100%;">
			            </td>
			          </tr>
			        </table>
    			</form>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Broadcast SMS Tunggakan</h3>
            </div>
            <div class="box-body">
        		<form method="post" action="./proses_bc/proses_bc_tunggakan.php" name="tagih">
			        <table class="table" style="margin-bottom: 1px;">         
			          <tr>
			            <td colspan="2">
			              <label for="exampleFormControlInput1"><i class="fa fa-user"></i> Userkey Zenziva</label>
			              <input type="text" class="form-control" name="userkeys" id="userkeys" autocomplete="off">
			            </td>
			          </tr>
			          <tr>
			            <td colspan="2">
			              <label for="exampleFormControlInput1"><i class="fa fa-lock"></i> Passkey Zenziva</label>
			              <input type="text" class="form-control" name="passkeys" id="passkeys" autocomplete="off">
			            </td>
			          </tr>
			          <tr>
			            <td colspan="2">
			              <label for="exampleFormControlSelect1"><i class="fa fa-calendar"></i> Tanggal Tunggakan</label>
			              <input type="date" class="form-control" name="tgls" id="tgls">
			            </td>
			          </tr>
			          <tr>
			            <td colspan="2">
			              <label for="exampleFormControlSelect1"><i class="fa fa-credit-card"></i> Nama Rek. SMP</label>
			              <input type="text" name="namas" id="namas" class="form-control" placeholder="Nama">
			            </td>
			          </tr>
			          <tr>
			            <td colspan="2">
			              <label for="exampleFormControlSelect1"><i class="fa fa-building"></i> Bank & No. Rek.</label>
			              <input type="text" id="bank_reks" name="bank_reks" placeholder="Bank & Rek SMP" class="form-control">
			            </td>
			          </tr>
			          <tr>
			            <td>
			                <input type="submit" name="kirims" class="btn btn-info btn-md" value="Kirim" onmousedown="validasiS()" style="width: 100%;">
			            </td>
			            <td>
			            	<input type="Reset" name="Resets" class="btn btn-default btn-md" value="Reset" style="width: 100%;">
			            </td>
			          </tr>
			        </table>
    			</form>
            </div>
          </div>
        </div>



        <div class="col-md-12">
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
      </div>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once './validasi_tulis_broadcast/valid_bc_tagihan.php'; ?>
<?php require_once './validasi_tulis_broadcast/valid_bc_tunggakan.php'; ?>
<?php require_once 'bottom_menu.php' ?>
<script type="text/javascript">
    function validasi() {
        var user_zenziva=document.getElementById('userkey').value;
        var pass_zenziva=document.getElementById('passkey').value;
        var tgl_tagihan=document.getElementById('tgl').value;
        var nama_rekening=document.getElementById('nama').value;
        var bank_rekening=document.getElementById('bank_rek').value;
        if (user_zenziva=="") {
            $('#modalwarninguser').modal('show');
        }else if (pass_zenziva=="") {
            $('#modalwarningpass').modal('show');
        }else if (tgl_tagihan=="" || tgl_tagihan==00-00-0000) {
            $('#modalwarningTGL').modal('show');
        }else if (nama_rekening=="" || nama_rekening==0) {
            $('#modalwarningNama').modal('show');
        }else if (bank_rekening=="" || bank_rekening==0) {
            $('#modalwarningBank').modal('show');
        }else{
            return true;
        }
    }
</script>

<script type="text/javascript">
    function validasiS() {
        var user_zenzivas=document.getElementById('userkeys').value;
        var pass_zenzivas=document.getElementById('passkeys').value;
        var tgl_tagihans=document.getElementById('tgls').value;
        var nama_rekenings=document.getElementById('namas').value;
        var bank_rekenings=document.getElementById('bank_reks').value;
        if (user_zenzivas=="") {
            $('#modalwarninguserS').modal('show');
        }else if (pass_zenzivas=="") {
            $('#modalwarningpassS').modal('show');
        }else if (tgl_tagihans=="" || tgl_tagihans==00-00-0000) {
            $('#modalwarningTGLS').modal('show');
        }else if (nama_rekenings=="" || nama_rekenings==0) {
            $('#modalwarningNamaS').modal('show');
        }else if (bank_rekenings=="" || bank_rekenings==0) {
            $('#modalwarningBankS').modal('show');
        }else{
            return true;
        }
    }
</script>

