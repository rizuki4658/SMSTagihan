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
  <title>Tagihan SMP Al-Qur'an Zaenuddin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href='logo.jpg' rel='shortcut icon'>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="./bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="./bower_components/Ionicons/css/ionicons.min.css">

  <link rel="stylesheet" href="./bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="./dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="./bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="./bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="./bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="./bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<!-- fullCalendar -->
  <link rel="stylesheet" href="./bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="./bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
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
<div class="wrapper">

  <header class="main-header" >
    <!-- Logo -->
    <a href="index.php" class="logo" style="background-image: url('035 Itmeo Branding.png');"><!--ganti-->
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>SMP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>SMP</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-image: url('035 Itmeo Branding.png');"><!--ganti-->
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu" style="background-image: url('035 Itmeo Branding.png');"><!--ganti-->
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $_SESSION['ses_foto']; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs">SMP Al-Quran Zaenuddin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $_SESSION['ses_foto']; ?>" class="img-circle" alt="User Image">

                <p>
                  SMP Al-Quran - Web Apps
                  <small>Build since Aug. 2018</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="Profil.php" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="cek_logout.php" class="btn btn-default btn-flat" onclick="return confirm('Anda Ingin Keluar Dari Aplikasi ?')">Logout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $_SESSION['ses_foto']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin SMP</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="data_siswa_orgt.php">
            <i class="fa fa-database"></i>
            <span>Siswa & Orang Tua</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"><i class="fa fa-exclamation-circle"></i></small>
            </span>
          </a>
        </li>
        <li>
          <a href="data_tagihan_pembayaran.php">
            <i class="fa fa-money"></i> <span>Tagihan & Pembayaran</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow"><i class="fa fa-exclamation-circle"></i></small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-whatsapp"></i>
            <span>SMS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="tulis_sms.php">
                <i class="fa fa-circle-o text-aqua"></i> Tulis SMS 
                <i class="fa fa-pencil"></i>
              </a>
            </li>
            <li>
              <a href="tulis_broadcast.php">
                <i class="fa fa-circle-o text-green"></i> Broadcast
                <i class="fa fa-bullhorn"></i>
              </a>
            </li>
            <li>
              <a href="sms_inbox.php">
                <i class="fa fa-circle-o text-yellow"></i> Inbox 
                <i class="fa fa-inbox"></i>
              </a>
            </li>
            <li>
              <a href="sms_outbox.php">
                <i class="fa fa-circle-o text-red"></i> Outbox 
                <i class="fa fa-paper-plane"></i>
              </a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Siswa
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="siswa_kelas.php"><i class="fa fa-circle-o text-red"></i> Per Kelas</a></li>
                <li><a href="siswa_angkatan.php"><i class="fa fa-circle-o text-green"></i> Per Angkatan</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o text-green"></i> Tagihan
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="tagihan_tgl.php"><i class="fa fa-circle-o text-red"></i> Per Tgl</a></li>
                <li><a href="tagihan_tgl_kelas.php"><i class="fa fa-circle-o text-yellow"></i> Per Kelas & Tgl</a></li>
                <li><a href="tagihan_struk.php"><i class="fa fa-circle-o text-green"></i> (Struk Tagihan)</a></li>
                <li><a href="tagihan_arsip.php"><i class="fa fa-circle-o text-blue"></i> Arsip</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li>
          <a href="calendar.php">
            <i class="fa fa-calendar"></i> <span>Kalender</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"><i class="fa fa-tasks"></i></small>
              <small class="label pull-right bg-blue"><i class="fa fa-smile-o"></i></small>
            </span>
          </a>
        </li>
        <li><a href="settings.php"><i class="fa fa-gears"></i> <span>Setting API</span></a></li>
        <li><a href="tambah_akun.php">+ <i class="fa fa-user"></i> <span>Akun Pengguna</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
