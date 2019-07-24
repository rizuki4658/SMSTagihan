<?php require_once 'top_menu.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Orang Tua
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
              <h3 class="box-title">Input Data Orang Tua</h3>
            </div>
            <div class="box-body">
            	<form method="post" action="./proses_orgt/proses_simpan_orgt.php">
        <table class="table" style="margin-bottom: 1px;">
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
              <label for="exampleFormControlInput1"><i class="fa fa-barcode"></i> NIS Siswa</label>
                  <select class="form-control" name="nis" id="nis" onchange="changeValue(this.value)">
                        <?php
                            $link=mysqli_connect('localhost','root','','db_smp_zaenuddin');
                            $hasil = mysqli_query($link,"select * from siswa where status='AKTIF'");
                            $javaArray = "var KoPG = new Array();\n";
                            echo "<option value='0' dselected/>Pilih</option>";
                            while ($row = mysqli_fetch_array($hasil)) {
                            $javaArray .= "KoPG['" . $row['id'] . "'] = {namas:'" . addslashes($row['nama']) . "'};\n";  
                          }
                          mysqli_close($link);
                        ?>
                  </select>
            </td>
          </tr>
          <tr>
            <td>
              <label for="exampleFormControlInput1"><i class="fa fa-user"></i> Nama Siswa</label>
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" readonly>
            </td>
          </tr>
          <tr>
            <td>
              <label for="exampleFormControlInput1"><i class="ti ti-user"></i> Nama Orang Tua</label>
              <input type="text" class="form-control" name="orang_tua" id="orang_tua">
            </td>
          </tr>
          <tr>
            <td>
              <label for="exampleFormControlSelect1"><i class="fa fa-phone"></i> Telpon</label>
              <input type="text" class="form-control" name="telp" id="telp">
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
              <label for="exampleFormControlInput1"><i class="fa fa-suitcase"></i> Pekerjaan</label>
              <input type="text" class="form-control" name="pekerjaan" id="pekerjaan">
            </td>
          </tr>
          <tr>
            <td>
              <label for="exampleFormControlInput1"><i class="fa fa-money"></i> Penghasilan</label>
              <select class="form-control" name="penghasilan" id="penghasilan">
                <option value="Pilih">Pilih</option>
                <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000 - Rp. 1.000.000</option>
                <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
                <option value="Rp. 2.000.000 - Rp. 4.000.000">Rp. 2.000.000 - Rp. 4.000.000</option>
                <option value="> Rp. 4.000.000">> Rp. 4.000.000</option>
              </select>
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
 <?php require_once './validasi_orgt/modal_valid_orgt.php'; ?>
  </div>
  <!-- /.content-wrapper -->

 <?php require_once 'bottom_menu.php'; ?>
<script type="text/javascript">
  function validasi() {
    var kelas_siswa=document.getElementById('kelas').value;
    var nis_siswa=document.getElementById('nis').value;
    var nama_siswa=document.getElementById('nama').value;
    var orang_siswa=document.getElementById('orang_tua').value;
    var telp_orang=document.getElementById('telp').value;
    var alamat_orang=document.getElementById('alamat').value;
    var pekerjaan_orang=document.getElementById('pekerjaan').value;
    var penghasilan_orang=document.getElementById('penghasilan').value;
    if (kelas_siswa =="" || kelas_siswa==0){
      $('#modalwarningKelas').modal('show');
    }else if (nis_siswa==0){
      $('#modalwarningNIS').modal('show');
    }else if (nama_siswa==""){
      $('#modalwarningNama').modal('show');
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
<script>
   
    $("#kelas").change(function(){
   
        // variabel dari nilai combo box provinsi
        var id_kelas = $("#kelas").val();
       
        // tampilkan image load
        $("#imgLoad").show("");
       
        // mengirim dan mengambil data
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "nis_orang_tua.php",
            data: "id="+id_kelas,
            success: function(msg){
               
                // jika tidak ada data
                if(msg == ''){
                    alert('Tidak ada data NIS');
                }
               
                // jika dapat mengambil data,, tampilkan di combo box kota
                else{
                    $("#nis").html(msg);                                                     
                }
               
                // hilangkan image load
                $("#imgLoad").hide();
            }
        });    
    });
</script>

<script type="text/javascript">  
    <?php echo $javaArray; ?>
    function changeValue(nis){
    document.getElementById('nama').value = KoPG[nis].namas;
    };
    
</script>