<?php require_once 'top_menu.php' ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tulis SMS
        <small>.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">SMS</a></li>
        <li class="active">Tulis SMS</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">SMS Tagihan</h3>
            </div>
            <div class="box-body">
        		<form method="post" action="./proses_sms/proses_kirim_tagihan.php" name="tagih">
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
			              <label for="exampleFormControlSelect1"><i class="fa fa-barcode"></i> Kode Tagihan</label>
			              <select class="form-control" name="kode_tagihan" id="kode_tagihan" onchange="changeValue(this.value)">
			              	<option value="0">Pilih Kode</option>
			              	<?php
			              	$link=mysqli_connect('localhost','root','','db_smp_zaenuddin');
			              	$cek="SELECT * FROM tagihan WHERE sisa !=0 AND status='Belum Dibayar'";
			              	$hasil = mysqli_query($link,$cek);
			              	$javaArray = "var KoPG = new Array();\n";
			              	while ($row = mysqli_fetch_array($hasil)) {
			              		$javaArray .= "KoPG['" . $row['kode'] . "'] = {kls:'" . addslashes($row['kelas']) . "',nois:'" . addslashes($row['nis']) . "',namas:'" . addslashes($row['siswa']) . "',walis:'" . addslashes($row['wali']) . "',telps:'" . addslashes($row['telp']) . "',b1:'" . addslashes($row['B1']) . "',b2:'" . addslashes($row['B2']) . "',b3:'" . addslashes($row['B3']) . "',b4:'" . addslashes($row['B4']) . "',b5:'" . addslashes($row['B5']) . "',b6:'" . addslashes($row['B6']) . "',b7:'" . addslashes($row['B7']) . "',b8:'" . addslashes($row['B8']) . "',tgls:'" . addslashes($row['tgl']) . "'};\n";
			              	}
			              	mysqli_close($link);
			              	?>
			              </select>
			            </td>
			          </tr>
			          <tr>
			            <td colspan="2">
			              <label for="exampleFormControlSelect1"><i class="fa fa-phone"></i> No. Telpon</label>
			              <input type="text" class="form-control" name="telp" id="telp" readonly>
			            </td>
			          </tr>
			          <tr>
			            <td colspan="2">
			                <label for="exampleFormControlInput1"><i class="fa fa-money"></i> Pesan</label>
			                <textarea class="form-control" name="pesan" id="pesan" style="height: 300px;"></textarea>
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
              <h3 class="box-title">SMS Tunggakan</h3>
            </div>
            <div class="box-body">
        		<form method="post" action="./proses_sms/proses_kirim_tunggakan.php" name="tagih">
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
			              <label for="exampleFormControlSelect1"><i class="fa fa-barcode"></i> Kode Tunggakan</label>
			              <select class="form-control" name="kode_tagihans" id="kode_tagihans" onchange="changeValueS(this.value)">
			              	<option value="0">Pilih Kode</option>
			              	<?php
			              	$link2=mysqli_connect('localhost','root','','db_smp_zaenuddin');
			              	$cek2="SELECT * FROM tagihan WHERE sisa !=0 AND status='Belum Dibayar'";
			              	$hasil2 = mysqli_query($link2,$cek2);
			              	$javaArray2 = "var KoPG2 = new Array();\n";
			              	while ($row2 = mysqli_fetch_array($hasil2)) {
			              		$javaArray2 .= "KoPG2['" . $row2['kode'] . "'] = {kls:'" . addslashes($row2['kelas']) . "',nois:'" . addslashes($row2['nis']) . "',namas:'" . addslashes($row2['siswa']) . "',walis:'" . addslashes($row2['wali']) . "',telps:'" . addslashes($row2['telp']) . "',sisas:'" . addslashes($row2['sisa']) . "',tgls:'" . addslashes($row2['tgl']) . "'};\n";
			              	}
			              	mysqli_close($link2);
			              	?>
			              </select>
			            </td>
			          </tr>
			          <tr>
			            <td colspan="2">
			              <label for="exampleFormControlSelect1"><i class="fa fa-phone"></i> No. Telpon</label>
			              <input type="text" class="form-control" name="telps" id="telps" readonly>
			            </td>
			          </tr>
			          <tr>
			            <td colspan="2">
			                <label for="exampleFormControlInput1"><i class="fa fa-money"></i> Pesan</label>
			                <textarea class="form-control" name="pesans" id="pesans" style="height: 300px;"></textarea>
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
<?php require_once './validasi_tulis_sms/validasi_tagihan.php'; ?>
<?php require_once './validasi_tulis_sms/validasi_tunggakan.php'; ?>
<?php require_once 'bottom_menu.php' ?>

<script>
   
    $("#tgl").change(function(){
   
        // variabel dari nilai combo box provinsi
        var tgl = $("#tgl").val();
       
        // tampilkan image load
        $("#imgLoad").show("");
       
        // mengirim dan mengambil data
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "kode_tagihan.php",
            data: "id="+tgl,
            success: function(msg){
               
                // jika tidak ada data
                if(msg == ''){
                    alert('Tidak ada data Kode');
                }
               
                // jika dapat mengambil data,, tampilkan di combo box kota
                else{
                    $("#kode_tagihan").html(msg);                                                     
                }
               
                // hilangkan image load
                $("#imgLoad").hide();
            }
        });    
    });
</script>
<script type="text/javascript">  
    <?php echo $javaArray; ?>
    function changeValue(kode_tagihan){
    document.getElementById('telp').value = KoPG[kode_tagihan].telps;
    var x =Number(KoPG[kode_tagihan].b1) + Number(KoPG[kode_tagihan].b2) + Number(KoPG[kode_tagihan].b3) + Number(KoPG[kode_tagihan].b4) + Number(KoPG[kode_tagihan].b5) + Number(KoPG[kode_tagihan].b6) + Number(KoPG[kode_tagihan].b7) + Number(KoPG[kode_tagihan].b8);
    var A=Number(KoPG[kode_tagihan].b1);
    var B=Number(KoPG[kode_tagihan].b2);
    var C=Number(KoPG[kode_tagihan].b3);
    var D=Number(KoPG[kode_tagihan].b4);
    var E=Number(KoPG[kode_tagihan].b5);
    var F=Number(KoPG[kode_tagihan].b6);
    var G=Number(KoPG[kode_tagihan].b7);
    var H=Number(KoPG[kode_tagihan].b8);
    var bilangan = Number(x);
    var number_string1 = A.toString()
    var number_string2 = B.toString()
    var number_string3 = C.toString()
    var number_string4 = D.toString()
    var number_string5 = E.toString()
    var number_string6 = F.toString()
    var number_string7 = G.toString()
    var number_string8 = H.toString()
    var number_string = bilangan.toString(),
    sisa1 = number_string1.length % 3,
    sisa2 = number_string2.length % 3,
    sisa3 = number_string3.length % 3,
    sisa4 = number_string4.length % 3,
    sisa5 = number_string5.length % 3,
    sisa6 = number_string6.length % 3,
    sisa7 = number_string7.length % 3,
    sisa8 = number_string8.length % 3,
    sisa = number_string.length % 3,
    rupiah1  = number_string1.substr(0, sisa1),
    rupiah2  = number_string2.substr(0, sisa2),
    rupiah3  = number_string3.substr(0, sisa3),
    rupiah4  = number_string4.substr(0, sisa4),
    rupiah5  = number_string5.substr(0, sisa5),
    rupiah6  = number_string6.substr(0, sisa6),
    rupiah7  = number_string7.substr(0, sisa7),
    rupiah8  = number_string8.substr(0, sisa8),
    rupiah  = number_string.substr(0, sisa),
    ribuan1  = number_string1.substr(sisa1).match(/\d{3}/g),
    ribuan2  = number_string2.substr(sisa2).match(/\d{3}/g),
    ribuan3  = number_string3.substr(sisa3).match(/\d{3}/g),
    ribuan4  = number_string4.substr(sisa4).match(/\d{3}/g),
    ribuan5  = number_string5.substr(sisa5).match(/\d{3}/g),
    ribuan6  = number_string6.substr(sisa6).match(/\d{3}/g),
    ribuan7  = number_string7.substr(sisa7).match(/\d{3}/g),
    ribuan8  = number_string8.substr(sisa8).match(/\d{3}/g),
    ribuan  = number_string.substr(sisa).match(/\d{3}/g);
    if (ribuan || ribuan1 || ribuan2 || ribuan3 || ribuan4 || ribuan5 || ribuan6 || ribuan7 || ribuan8) {
    separator1 = sisa1 ? '.' : '';
    separator2 = sisa2 ? '.' : '';
    separator3 = sisa3 ? '.' : '';
    separator4 = sisa4 ? '.' : '';
    separator5 = sisa5 ? '.' : '';
    separator6 = sisa6 ? '.' : '';
    separator7 = sisa7 ? '.' : '';
    separator8 = sisa8 ? '.' : '';
    separator = sisa ? '.' : '';
    rupiah1 += separator1 + ribuan1.join('.');
    rupiah2 += separator2 + ribuan2.join('.');
    rupiah3 += separator3 + ribuan3.join('.');
    rupiah4 += separator4 + ribuan4.join('.');
    rupiah5 += separator5 + ribuan5.join('.');
    rupiah6 += separator6 + ribuan6.join('.');
    rupiah7 += separator7 + ribuan7.join('.');
    rupiah8 += separator8 + ribuan8.join('.');
    rupiah += separator + ribuan.join('.');
    }
    document.getElementById('pesan').innerText= "Yth. " + KoPG[kode_tagihan].walis + "  Wali Dari :  " + KoPG[kode_tagihan].namas +"\r\n, Kelas "+ KoPG[kode_tagihan].kls +"\r\n, NIS "+ KoPG[kode_tagihan].nois + "\r\n, Biaya Tagihan Tgl.  " + KoPG[kode_tagihan].tgls+ "\r\n, Biaya Infaq Sarana Prasarana " +"Rp."+ rupiah1+ "\r\n, Biaya Infaq Pendidikan " +"Rp."+ rupiah2+ "\r\n, Biaya Infaq Pengembangan Siswa " +"Rp."+ rupiah3+ "\r\n, Biaya Kesehatan " +"Rp."+ rupiah4+ "\r\n, Biaya Syahriyyah " +"Rp."+ rupiah5+ "\r\n, Ekskull & Life Skill " +"Rp."+ rupiah6+ "\r\n, UTS/UAS " +"Rp."+ rupiah7+ "\r\n, Biaya Lain-lain " +"Rp."+ rupiah8+ "\r\n Total Biaya " +"Rp."+ rupiah +". "+"\r\nHarap Segera Melakukan Pembayaran."+"\r\n"+" Admin SMP Al-Quaran Zaenuddin." +"\r\n Terimakasih.";
    };
    
</script>

<script>
   
    $("#tgls").change(function(){
   
        // variabel dari nilai combo box provinsi
        var tgl = $("#tgls").val();
       
        // tampilkan image load
        $("#imgLoad").show("");
       
        // mengirim dan mengambil data
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "kode_tunggakan.php",
            data: "id="+tgl,
            success: function(msg){
               
                // jika tidak ada data
                if(msg == ''){
                    alert('Tidak ada data Kode');
                }
               
                // jika dapat mengambil data,, tampilkan di combo box kota
                else{
                    $("#kode_tagihans").html(msg);                                                     
                }
               
                // hilangkan image load
                $("#imgLoad").hide();
            }
        });    
    });
</script>
<script type="text/javascript">  
    <?php echo $javaArray2; ?>
    function changeValueS(kode_tagihans){
    document.getElementById('telps').value = KoPG2[kode_tagihans].telps;
    var x =Number(KoPG2[kode_tagihans].sisas);
    var bilangan = Number(x);
    var number_string = bilangan.toString(),
    sisa    = number_string.length % 3,
    rupiah  = number_string.substr(0, sisa),
    ribuan  = number_string.substr(sisa).match(/\d{3}/g);
    if (ribuan) {
    separator = sisa ? '.' : '';
    rupiah += separator + ribuan.join('.');
    }
    document.getElementById('pesans').innerText= "Yth. " + KoPG2[kode_tagihans].walis + " Wali Dari :  " + KoPG2[kode_tagihans].namas +"\r\n, Kelas "+ KoPG2[kode_tagihans].kls +"\r\n, NIS "+ KoPG2[kode_tagihans].nois + "\r\n, Anda Belum Membayar Tagihan untuk Tgl.  "+ KoPG2[kode_tagihans].tgls + "\r\n, Dengan Total Biaya Sebesar. " +"Rp."+ rupiah +"\r\n. Harap Segera Melakukan Pembayaran. "+"\r\n"+"Admin SMP Al-Quaran Zaenuddin. " +"\r\nTerimakasih.";
    };   
</script>

<script type="text/javascript">
	function validasi() {
		var user_zenziva=document.getElementById('userkey').value;
		var pass_zenziva=document.getElementById('passkey').value;
		var tgl_tagihan=document.getElementById('tgl').value;
		var kode_sms=document.getElementById('kode_tagihan').value;
		if (user_zenziva=="") {
			$('#modalwarninguser').modal('show');
		}else if (pass_zenziva=="") {
			$('#modalwarningpass').modal('show');
		}else if (tgl_tagihan=="" || tgl_tagihan==00-00-0000) {
			$('#modalwarningTGL').modal('show');
		}else if (kode_sms=="" || kode_sms==0) {
			$('#modalwarningKode').modal('show');
		}
	}
</script>

<script type="text/javascript">
	function validasiS() {
		var user_zenzivas=document.getElementById('userkeys').value;
		var pass_zenzivas=document.getElementById('passkeys').value;
		var tgl_tagihans=document.getElementById('tgls').value;
		var kode_smss=document.getElementById('kode_tagihans').value;
		if (user_zenzivas=="") {
			$('#modalwarninguserS').modal('show');
		}else if (pass_zenzivas=="") {
			$('#modalwarningpassS').modal('show');
		}else if (tgl_tagihans=="" || tgl_tagihans==00-00-0000) {
			$('#modalwarningTGLS').modal('show');
		}else if (kode_smss=="" || kode_smss==0) {
			$('#modalwarningKodeS').modal('show');
		}
	}
</script>
