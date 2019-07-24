<?php require_once 'top_menu.php';?>
<script><!--
        function startCalc(){
        interval = setInterval("calc()",1);}
        function calc(){
        satu = document.tagih.biaya.value;
        dua = document.tagih.bayar.value;
        document.tagih.sisa.value = Number((satu * 1)) - Number((dua * 1));}
        function stopCalc(){
        clearInterval(interval);}
</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tagihan
        <small>.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
<?php
  $kode=$_GET['kode'];
  $con=mysqli_connect('localhost','root','','db_smp_zaenuddin');
  $ceks="SELECT * FROM tagihan WHERE kode='$kode'";
  $exc=mysqli_query($con,$ceks);
  while ($dataE=mysqli_fetch_assoc($exc)) {?>
  
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Input Data Pembayaran</h3>
            </div>
            <div class="box-body">
        <form method="post" action="./proses_bayar/proses_simpan_bayaran.php" name="tagih">
        <table class="table" style="margin-bottom: 1px;">         
          <tr>
            <td colspan="2">
              <label for="exampleFormControlInput1"><i class="fa fa-barcode"></i> Kode Tagihan</label>
              <input type="text" class="form-control" name="kode" id="kode" value="<?php echo $dataE['kode'];?>" readonly>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <label for="exampleFormControlInput1"><i class="fa fa-calendar-o"></i> Tgl. Pembayaran</label>
              <input type="date" class="form-control" name="tgl" id="tgl" value="<?php echo $dataE['tgl_byr']; ?>">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <label for="exampleFormControlSelect1">1. Total Biaya</label>
              <input type="text" class="form-control" name="biaya" id="biaya" style="text-align: right;" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $dataE['B1']+$dataE['B2']+$dataE['B3']+$dataE['B4']+$dataE['B5']+$dataE['B6']+$dataE['B7']+$dataE['B8']; ?>">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <label for="exampleFormControlSelect1">2. Bayar</label>
              <input type="text" class="form-control" name="bayar" id="bayar" style="text-align: right;" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $dataE['bayar']; ?>">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <center>
                <label for="exampleFormControlInput1"><i class="fa fa-money"></i> 3. Sisa</label>
                <input type="text" class="form-control" style="text-align: center;" name="sisa" id="sisa" readonly value="<?php echo $dataE['B1']+$dataE['B2']+$dataE['B3']+$dataE['B4']+$dataE['B5']+$dataE['B6']+$dataE['B7']+$dataE['B8']; ?>">
              </center>
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

<?php
  }

?>
 <?php require_once './validasi_bayar/modal_valid_bayar.php'; ?>
  </div>
  <!-- /.content-wrapper -->

 <?php require_once 'bottom_menu.php'; ?>
<script type="text/javascript">
  function validasi() {
    var tanggal_siswa=document.getElementById('tgl').value;
    var biaya_satu=document.getElementById('bayar').value;
    var biaya_dua=document.getElementById('sisa').value;
    if (tanggal_siswa =="" || tanggal_siswa==00-00-0000){
      $('#modalwarningTGL').modal('show');
    }else if (biaya_satu=="" || biaya_satu==0){
      $('#modalwarningB1').modal('show');
    }else if (biaya_dua=="" || biaya_dua !=0){
      $('#modalwarningB2').modal('show');
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
    <?php echo $javaArray; echo $javaArray2; ?>
    function changeValue(nis){
    document.getElementById('nama').value = KoPG[nis].nama;
    document.getElementById('orang_tua').value = KoPG2[nis].namas;
    document.getElementById('telp').value = KoPG2[nis].telps;
    };
</script>