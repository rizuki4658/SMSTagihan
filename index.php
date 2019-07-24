
<?php require_once 'top_menu.php' ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php
              $link=mysqli_connect('localhost','root','','db_smp_zaenuddin');
              $select="SELECT * FROM siswa";
              $hasil=mysqli_query($link,$select);
              if (mysqli_num_rows($hasil)>0) { ?> 
              <h3><?php echo mysqli_num_rows($hasil); ?></h3>
              <?php
               }else{?>
               <h3>0</h3>
              <?php
               }
              ?>
              <p>Jumlah Siswa</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="data_siswa_orgt.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php
              $link=mysqli_connect('localhost','root','','db_smp_zaenuddin');
              $select="SELECT * FROM siswa";
              $hasil=mysqli_query($link,$select);
              if (mysqli_num_rows($hasil)>0) { ?> 
              <h3><?php echo mysqli_num_rows($hasil); ?><sup style="font-size: 20px"></sup></h3>
              <?php
               }else{?>
               <h3>0</h3>
              <?php
               }
              ?>
              <p>Jumlah Orang Tua</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="data_siswa_orgt.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php
              $link=mysqli_connect('localhost','root','','db_smp_zaenuddin');
              $total=0;
              $select="SELECT * FROM tagihan";
              
              $hasil=mysqli_query($link,$select);
              if (mysqli_num_rows($hasil)>0) { 
                while ($data=mysqli_fetch_assoc($hasil)) 
                    $total+=$data['B1']+$data['B2']+$data['B3']+$data['B4']+$data['B5']+$data['B6']+$data['B7']+$data['B8'];
                  {?>
                   
              <h3><?php echo number_format($total); ?></h3>
              <?php
                }
                ?>
              <?php
               }else{?>
               <h3>Rp. 0</h3>
              <?php
               }
              ?>
              <p>Jumlah Tagihan</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <a href="data_tagihan_pembayaran.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <?php
              $link=mysqli_connect('localhost','root','','db_smp_zaenuddin');
              $total=0;
              $select="SELECT * FROM tagihan";
              
              $hasil=mysqli_query($link,$select);
              if (mysqli_num_rows($hasil)>0) { 
                while ($data=mysqli_fetch_assoc($hasil)) 
                    $total+=$data['sisa'];
                  {?>
                   
              <h3><?php echo number_format($total); ?></h3>
              <?php
                }
                ?>
              <?php
               }else{?>
               <h3>Rp. 0</h3>
              <?php
               }
              ?>
              <p>Jumlah Belum Dibayarkan</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="data_tagihan_pembayaran.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-12 connectedSortable">

          <!-- Map box -->
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
          <!-- /.box -->
          <!-- Calendar -->
          <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendar</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#">Add new event</a></li>
                    <li><a href="#">Clear events</a></li>
                    <li class="divider"></li>
                    <li><a href="#">View calendar</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once 'bottom_menu.php' ?>
