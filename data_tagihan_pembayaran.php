
<?php require_once 'top_menu.php' ?>
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

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Tagihan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" style="font-size: 9pt;">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tgl.</th>
                  <th>Kode</th>
                  <th>Kelas</th>
                  <th>NIS</th>
                  <th>Orang Tua</th>
                  <th>Telepon</th>
                  <th>Total</th>
                  <th>Bayar</th>
                  <th>Sisa</th>
                  <th>Tgl. Bayar</th>
                  <th>Status</th>
                  <th><center>
                  Input 
                  Edit 
                  Hapus</center></th>
                </tr>
                </thead>
                <tbody>
                  <?php  
                  $connect=mysqli_connect('localhost','root','','db_smp_zaenuddin');
                  $check="SELECT * FROM tagihan WHERE status='Belum Dibayar' OR status='Sudah Dibayar'";
                  $result=mysqli_query($connect,$check);
                  $number=1;
                  $credit=0;
                  if (mysqli_num_rows($result)>0) {
                    while ($tabs=mysqli_fetch_assoc($result)) {
                        $credit=$tabs['B1']+$tabs['B2']+$tabs['B3']+$tabs['B4']+$tabs['B5']+$tabs['B6']+$tabs['B7']+$tabs['B8'];
                      ?>                    
                  <tr>
                     <td><?php echo $number++; ?></td>
                     <td><?php echo $tabs['tgl'];?></td>
                     <td><?php echo $tabs['kode'];?></td>
                     <td><?php echo $tabs['kelas'];?></td>
                     <td><?php echo $tabs['nis'];?></td>
                     <td><?php echo $tabs['wali'];?></td>
                     <td><?php echo $tabs['telp'];?></td>
                     <td><?php echo number_format($credit);?></td>
                     <td><?php echo number_format($tabs['bayar']); ?></td>
                     <td><?php echo number_format($tabs['sisa']);?></td>
                     <td><?php echo $tabs['tgl_byr'];?></td>
                     <td><?php echo $tabs['status'];?></td>
                     <td>
                        <a href="<?php echo "tambah_data_pembayaran.php?kode=$tabs[kode]"; ?>" title="Pembayaran <?php echo $tabs['kode']; ?>" class="btn btn-info"  style="border-radius: 20px;">
                          <i class="fa fa-money"></i>
                        </a>
                        <a href="tambah_data_tagihan.php" title="Tambah Data Tagihan " class="btn btn-success"  style="border-radius: 20px;">
                          <i class="fa fa-plus"></i>
                        </a>

                        <a href="<?php echo "edit_data_tagihan.php?kode=$tabs[kode]";?>" title="Edit Data Tagihan <?php echo $tabs['kode']; ?>" class="btn btn-warning text-black"  style="border-radius: 20px;">
                          <i class="fa fa-eye"></i>
                        </a>

                       <a href="<?php echo "./proses_tagihan/hapus_tagihan.php?kode=$tabs[kode]";?>" title="Hapus Data Tagihan" class="btn btn-danger" onclick="return confirm('Hapus data Tagihan?')" style="border-radius: 20px;">
                          <i class="fa fa-trash-o"></i>
                        </a>
                     </td>
                    </tr>
                  <?php
                    }
                  }else{?>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><center>
                        <a href="tambah_data_tagihan.php" title="Tambah Data Tagihan " class="btn btn-success"  style="border-radius: 20px;">
                          <i class="fa fa-plus"></i>
                        </a>
                      </center></td>
                  </tr>

              <?php }    ?>  
                </tbody>
                <tfoot>
                    <th colspan="13">
                        <center>Data Tagihan& Pembayaran</center>
                      </th>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

       <div class="row">
        <div class="col-lg-12 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php
              $link=mysqli_connect('localhost','root','','db_smp_zaenuddin');
              $select="SELECT * FROM tagihan WHERE status='Belum Dibayar' OR status='Sudah Dibayar'";
              $total=0;
              $hasil=mysqli_query($link,$select);
              if (mysqli_num_rows($hasil)>0) { 
                while ($data=mysqli_fetch_assoc($hasil)) {
                  $total+=$data['bayar'];
                }

                ?> 

              <h1><?php echo "Rp. ".number_format($total); ?><sup style="font-size: 20px"></sup></h1>
              <?php
               }else{?>
               <h3>0</h3>
              <?php
               }
              ?>
              <p>Jumlah Yang Sudah Dibayarkan</p>
            </div>
            <div class="icon">
              <i class="ion ion-cash"></i>
            </div>
            <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-12 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php
              $link=mysqli_connect('localhost','root','','db_smp_zaenuddin');
              $total=0;
              $select="SELECT * FROM tagihan WHERE status='Belum Dibayar' OR status='Sudah Dibayar'";
              
              $hasil=mysqli_query($link,$select);
              if (mysqli_num_rows($hasil)>0) { 
                while ($data=mysqli_fetch_assoc($hasil)) 
                    $total+=$data['B1']+$data['B2']+$data['B3']+$data['B4']+$data['B5']+$data['B6']+$data['B7']+$data['B8'];
                  {?>
                   
              <h3><?php echo "Rp. ".number_format($total); ?></h3>
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
            <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-12 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <?php
              $link=mysqli_connect('localhost','root','','db_smp_zaenuddin');
              $total=0;
              $select="SELECT * FROM tagihan WHERE status='Belum Dibayar' OR status='Sudah Dibayar'";
              
              $hasil=mysqli_query($link,$select);
              if (mysqli_num_rows($hasil)>0) { 
                while ($data=mysqli_fetch_assoc($hasil)) 
                    $total+=$data['sisa'];
                  {?>
                   
              <h3><?php echo "Rp. ".number_format($total); ?></h3>
              <?php
                }
                ?>
              <?php
               }else{?>
               <h3>Rp. 0</h3>
              <?php
               }
              ?>
              <p>Jumlah Yang Belum Dibayarkan</p>
            </div>
            <div class="icon">
              <i class="ion ion-card"></i>
            </div>
            <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </section>
  </div>
  <!-- /.content-wrapper -->
<?php require_once 'bottom_menu.php' ?>
