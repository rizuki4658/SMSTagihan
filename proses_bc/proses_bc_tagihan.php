<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['ses_user']) || !isset($_SESSION['ses_pass'])){ //cek apakah user sudah login
        header("location:login.php");
    }else {

    $link=mysqli_connect("localhost","root","","db_smp_zaenuddin");
    $user=$_SESSION['ses_user'];
    $login=mysqli_query($link,"SELECT * FROM user_db WHERE username = '$user'");
    $t=mysqli_fetch_array($login);

    }?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tagihan SMP | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">

  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

   <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php
    $conn = mysqli_connect('localhost','root','','db_smp_zaenuddin');
    $tgl=$_POST['tgl'];
    $atas=$_POST['nama'];
    $bank=$_POST['bank_rek'];
    
    $bayar=0;
    $query="SELECT * FROM tagihan WHERE tgl='$tgl' AND bayar='$bayar'";
    $execut=mysqli_query($conn,$query);
    if (mysqli_num_rows($execut)){
        while ($data=mysqli_fetch_assoc($execut)) {
        $no=$data['telp'];
        $total=($data['B1'])+($data['B2'])+($data['B3'])+($data['B4'])+($data['B5'])+($data['B6'])+($data['B7'])+($data['B8']);
        $b1=number_format($data['B1']);
        $b2=number_format($data['B2']);
        $b3=number_format($data['B3']);
        $b4=number_format($data['B4']);
        $b5=number_format($data['B5']);
        $b6=number_format($data['B6']);
        $b7=number_format($data['B7']);
        $b8=number_format($data['B8']);
        $pesan="Yth. .".$data['wali']."  Wali Dari :  ".$data['siswa']." : Kelas ".$data['kelas'].", NIS ".$data['nis']."    Biaya Tagihan tgl.  ".$data['tgl'].". Infaq Sarana Prasarana Rp. ".$b1.", Infaq Pendidikan Rp. ".$b2.", Infaq Pengembangan Siswa Rp. ".$b3.", Biaya Kesehatan Rp. ".$b4.", Biaya Syahriyyah Rp. ".$b5.", Ekskull & Life Skill Rp. ".$b6.", UTS/UAS Rp. ".$b7.", Biaya lain-lain Rp. ".$b8.", Total Rp. ".number_format($total)." Harap Segera Melakukan Pembayaran. "." Jika Transfer silahkan ke- ".$bank.", atas nama ".$atas.",    Admin SMP Al-Quran Zaenuddin.";
        
            $userkey = $_POST['userkey'];
            $passkey = $_POST['passkey'];
            $nohp = $no;
            $message = $pesan;
            $url = "https://reguler.zenziva.net/apps/smsapi.php";
            $curlHandle = curl_init();
            curl_setopt($curlHandle, CURLOPT_URL, $url);
            curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey='.$userkey.'&passkey='.$passkey.'&nohp='.$nohp.'&pesan='.urlencode($message));
            curl_setopt($curlHandle, CURLOPT_HEADER, 0);
            curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
            curl_setopt($curlHandle, CURLOPT_POST, 1);
            $results = curl_exec($curlHandle);
            if ($results) {
              $link=mysqli_connect('localhost','root','','db_smp_zaenuddin');
              $cekS="INSERT INTO outbox (no,no_tujuan,pesan) VALUES('','".$data['telp']."','".$pesan."')";
              $act=mysqli_query($link,$cekS);
              ?>

      <div class="modal modal-success fade" id="modal-warning-nis">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Informasi SMS Brodacast Tagihan!</h4>
              </div>
              <div class="modal-body">
                <center>
                <p><h1><i class="fa  fa-paper-plane"></i></h1></p>
                <p><h1>SMS Dalam Proses Kirim&hellip;</h1></p>
                </center>
              </div>
              <div class="modal-footer">
                <a type="button" class="btn btn-outline" href="../tulis_broadcast.php">OK</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

            <?php }elseif(!$results){ ?>

        <div class="modal modal-danger fade" id="modal-warning-nis">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Informasi SMS Brodacast Tagihan!</h4>
              </div>
              <div class="modal-body">
                <center>
                <p><h1><i class="fa  fa-paper-plane"></i></h1></p>
                <p><h1>SMS Gagal Di Proses&hellip;</h1></p>
                </center>
              </div>
              <div class="modal-footer">
                <a type="button" class="btn btn-outline" href="../tulis_broadcast.php">OK</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

<?php

                  }
              }
          }
      
?>


<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../bower_components/raphael/raphael.min.js"></script>
<script src="../bower_components/morris.js/morris.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>


<script>
$('#modal-warning-nis').modal('show');
</script>    
</body>
</html>