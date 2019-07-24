<?php require_once 'top_menu.php';?>
<script><!--
        function startCalc(){
        interval = setInterval("calc()",1);}
        function calc(){
        satu = document.tagih.B1.value;
        dua = document.tagih.B2.value;
        tiga = document.tagih.B3.value;
        empat = document.tagih.B4.value;
        lima = document.tagih.B5.value;
        enam = document.tagih.B6.value;
        tujuh = document.tagih.B7.value;
        delapan = document.tagih.B8.value;
        document.tagih.total.value = Number((satu * 1)) + Number((dua * 1)) + Number((tiga * 1))+ Number((empat * 1))+ Number((lima * 1))+ Number((enam * 1))+ Number((tujuh * 1))+ Number((delapan * 1));}
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
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">Edit Data Tagihan</h3>
            </div>
            <div class="box-body">
        <form method="post" action="./proses_tagihan/proses_edit_tagihan.php" name="tagih">
        <table class="table" style="margin-bottom: 1px;">         
          <tr>
            <td colspan="2">
              <label for="exampleFormControlInput1"><i class="fa fa-barcode"></i> Kode Tagihan</label>
              <input type="text" class="form-control" name="kode" id="kode" value="<?php echo $dataE['kode'];?>" readonly>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <label for="exampleFormControlInput1"><i class="fa fa-calendar-o"></i> Tgl. Tagihan</label>
              <input type="date" class="form-control" name="tgl_s" id="tgl_S" value="<?php echo $dataE['tgl']; ?>">
            </td>
          </tr>
          <tr>
            <td>
              <?php
                  $link=mysqli_connect('localhost','root','','db_smp_zaenuddin');
                  $query="SELECT * FROM kelas";
                  $tampil=mysqli_query($link,$query);
                  if (mysqli_num_rows($tampil)>0) {?>
              <label for="exampleFormControlSelect1"><i class="fa fa-building"></i> Kelas</label>
              <select class="form-control" name="kelas" id="kelas">
                <?php 
                if ($dataE['kelas']=="VII A") {
                  $idkls=1;
                }elseif ($dataE['kelas']=="VII B") {
                  $idkls=2;
                }elseif ($dataE['kelas']=="VII C") {
                  $idkls=3;
                }elseif ($dataE['kelas']=="VII D") {
                  $idkls=4;
                }elseif ($dataE['kelas']=="VII E") {
                  $idkls=5;
                }elseif ($dataE['kelas']=="VIII A") {
                  $idkls=6;
                }elseif ($dataE['kelas']=="VIII B") {
                  $idkls=7;
                }elseif ($dataE['kelas']=="VIII C") {
                  $idkls=8;
                }elseif ($dataE['kelas']=="VIII D") {
                  $idkls=9;
                }elseif ($dataE['kelas']=="VIII E") {
                  $idkls=10;
                }elseif ($dataE['kelas']=="IX A") {
                  $idkls=11;
                }elseif ($dataE['kelas']=="IX B") {
                  $idkls=12;
                }elseif ($dataE['kelas']=="IX C") {
                  $idkls=13;
                }elseif ($dataE['kelas']=="IX D") {
                  $idkls=14;
                }elseif ($dataE['kelas']=="IX E") {
                  $idkls=15;
                } 
                ?>

                <?php echo "<option selected value='".$idkls."'>".$dataE['kelas']."</option>"; ?>
                  <?php while ($data = mysqli_fetch_assoc($tampil)) { ?>
                    <?php echo "<option value='".$data['id_kelas']."'>".$data['nama']."</option>"; ?>
                <?php 
                    }
                    } 
                    ?>
              </select>
            </td>
            <td>
              <label for="exampleFormControlInput1"><i class="fa fa-barcode"></i> NIS Siswa</label>
                <select class="form-control" name="nis" id="nis" onchange="changeValue(this.value)">
                    <option value="<?php echo $dataE['nis']; ?>"><?php echo $dataE['nis']; ?></option>
                          <?php
                          $link=mysqli_connect('localhost','root','','db_smp_zaenuddin');
                          $hasil = mysqli_query($link,"select * FROM siswa");
                          $javaArray = "var KoPG = new Array();\n";
                          while ($row = mysqli_fetch_array($hasil)) {
                          $javaArray .= "KoPG['" . $row['id'] . "'] = {nama:'" . addslashes($row['nama']) . "'};\n";
                          }                      
                          mysqli_close($link);
                          ?>
                                                <?php
                                                $link2=mysqli_connect('localhost','root','','db_smp_zaenuddin');
                                                $hasil2 = mysqli_query($link2,"select * FROM wali");
                                                $javaArray2 = "var KoPG2 = new Array();\n";
                                                echo "<option value='0' dselected/>Pilih</option>";
                                                while ($row2= mysqli_fetch_array($hasil2)) {
                                                    $javaArray2 .= "KoPG2['" . $row2['id'] . "'] = {namas:'" . addslashes($row2['nama']) . "',telps:'" . addslashes($row2['telp']) . "'};\n";
                                                }
                                                
                                                mysqli_close($link);
                                                ?>
                </select>
            </td>
          </tr>
          <tr>
            <td>
              <label for="exampleFormControlInput1"><i class="fa fa-user"></i> Nama Siswa</label>
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama siswa" readonly value="<?php echo $dataE['siswa']; ?>">
            </td>
            <td>
              <label for="exampleFormControlInput1"><i class="ti ti-user"></i> Nama Orang Tua</label>
              <input type="text" class="form-control" name="orang_tua" id="orang_tua" placeholder="Nama Orang Tua" readonly value="<?php echo $dataE['wali']; ?>">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <label for="exampleFormControlSelect1"><i class="fa fa-phone"></i> Telpon</label>
              <input type="text" class="form-control" name="telp" id="telp" style="text-align: center;" readonly value="<?php echo $dataE['telp']; ?>">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <label for="exampleFormControlSelect1"><i class="fa fa-calendar"></i> Tahun Ajaran</label>
              <input type="text" class="form-control" name="tahun" id="tahun" style="text-align: center;" placeholder="contoh. 2018/2019" value="<?php echo $dataE['ajaran']; ?>">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <center><label for="exampleFormControlInput1"><i class="fa fa-money"></i> Biaya-Biaya</label></center>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <label for="exampleFormControlInput1">1. Infaq Sarana Prasarana</label>
              <input type="text" class="form-control" name="B1" id="B1" style="text-align: right;" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $dataE['B1']; ?>">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <label for="exampleFormControlSelect1">2. Infaq Pendidikan</label>
              <input type="text" class="form-control" name="B2" id="B2" style="text-align: right;" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $dataE['B2']; ?>">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <label for="exampleFormControlInput1">3. Infaq Pengembangan Siswa</label>
              <input type="text" class="form-control" name="B3" id="B3" style="text-align: right;" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $dataE['B3']; ?>">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <label for="exampleFormControlSelect1">4. Biaya Kesehatan</label>
              <input type="text" class="form-control" name="B4" id="B4" style="text-align: right;" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $dataE['B4']; ?>">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <label for="exampleFormControlInput1">5. Biaya Syahriyyah</label>
              <input type="text" class="form-control" name="B5" id="B5" style="text-align: right;" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $dataE['B5']; ?>">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <label for="exampleFormControlSelect1">6. Ekskull & Life Skill</label>
              <input type="text" class="form-control" name="B6" id="B6" style="text-align: right;" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $dataE['B6']; ?>">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <label for="exampleFormControlInput1">7. UTS/UAS</label>
              <input type="text" class="form-control" name="B7" id="B7" style="text-align: right;" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $dataE['B7']; ?>">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <label for="exampleFormControlSelect1">8. Biaya Lain-lain</label>
              <input type="text" class="form-control" name="B8" id="B8" style="text-align: right;" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $dataE['B4']; ?>">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <center>
                <label for="exampleFormControlInput1"><i class="fa fa-money"></i> Total Biaya</label>
                <input type="text" class="form-control" style="text-align: center;" name="total" id="total" readonly value="<?php echo $dataE['B1']+$dataE['B2']+$dataE['B3']+$dataE['B4']+$dataE['B5']+$dataE['B6']+$dataE['B7']+$dataE['B8']; ?>">
              </center>
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

?>
 <?php require_once './validasi_tagihan/modal_valid_tagihan.php'; ?>
  </div>
  <!-- /.content-wrapper -->

 <?php require_once 'bottom_menu.php'; ?>
<script type="text/javascript">
  function validasi() {
    var kelas_siswa=document.getElementById('kelas').value;
    var tanggal_siswa=document.getElementById('tgl_S').value;
    var nis_siswa=document.getElementById('nis').value;
    var tahun_ajaran=document.getElementById('tahun').value;
    var biaya_satu=document.getElementById('B1').value;
    var biaya_dua=document.getElementById('B2').value;
    var biaya_tiga=document.getElementById('B3').value;
    var biaya_empat=document.getElementById('B4').value;
    var biaya_lima=document.getElementById('B5').value;
    var biaya_enam=document.getElementById('B6').value;
    var biaya_tujuh=document.getElementById('B7').value;
    var biaya_delapan=document.getElementById('B8').value;
    if (tanggal_siswa =="" || tanggal_siswa==00-00-0000){
      $('#modalwarningTGL').modal('show');
    }else if (kelas_siswa =="" || kelas_siswa==0){
      $('#modalwarningKelas').modal('show');
    }else if (nis_siswa==0){
      $('#modalwarningNIS').modal('show');
    }else if (tahun_ajaran==0 || tahun_ajaran==""){
      $('#modalwarningAjaran').modal('show');
    }else if (biaya_satu==""){
      $('#modalwarningB1').modal('show');
    }else if (biaya_dua==""){
      $('#modalwarningB2').modal('show');
    }else if (biaya_tiga==""){
      $('#modalwarningB3').modal('show');
    }else if (biaya_empat==""){
      $('#modalwarningB4').modal('show');
    }else if (biaya_lima==""){
      $('#modalwarningB5').modal('show');
    }else if (biaya_enam==""){
      $('#modalwarningB6').modal('show');
    }else if (biaya_tujuh==""){
      $('#modalwarningB7').modal('show');
    }else if (biaya_delapan==""){
      $('#modalwarningB8').modal('show');
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