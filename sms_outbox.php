<?php require_once 'top_menu.php'; ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Kotak Keluar
        <small>.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">SMS</a></li>
        <li class="active">Outbox</li>
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
                  <th>No. Tujuan</th>
                  <th>Pesan</th>
                  <th><center>
                  Hapus</center></th>
                </tr>
                </thead>
                <tbody>
                  <?php  
                  $connect=mysqli_connect('localhost','root','','db_smp_zaenuddin');
                  $check="SELECT * FROM outbox ";
                  $result=mysqli_query($connect,$check);
                  $number=1;
                  $credit=0;
                  if (mysqli_num_rows($result)>0) {
                    while ($tabs=mysqli_fetch_assoc($result)) {
                       ?>                    
                  <tr>
                     <td><?php echo $number++; ?></td>
                     <td><?php echo $tabs['no_tujuan'];?></td>
                     <td><?php echo $tabs['pesan'];?></td>
                     <td>
                     	<center>
                        <a href="<?php echo "./proses_kotak_keluar/hapus_pesan_keluar.php?kode=$tabs[no]"; ?>" title="Pesan <?php echo $tabs['no_tujuan']; ?>" class="btn btn-danger"  style="border-radius: 20px;" onclick="return confirm('Hapus Pesan ?')">
                          <i class="fa fa-trash"></i>
                        </a>
                    	</center>
                     </td>
                    </tr>
                  <?php
                    }
                  }else{?>
                  <tr>
                    <td>Kosong</td>
                    <td>Kosong</td>
                    <td>Kosong</td>
                    <td>
                    	<center>
                    		Kosong
                        </center>
                    </td>
                  </tr>

              <?php }    ?>  
                </tbody>
                <tfoot>
                	<tr>
                    	<th colspan="3">
                        	<center>Data Pesan Keluar</center>
                      	</th>
                      	<th>
                      		<center>
                      			<a href="./proses_kotak_keluar/kosongkan_keluar.php" title="Kosongkan Kotak Keluar?" class="btn btn-danger"  style="border-radius: 20px;" onclick="return confirm('Kosongkan Kotak Keluar?')">
                          		<i class="fa fa-warning"></i>
                        		</a>
                      		</center>
                      	</th>
                    </tr>
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
	</section>
  </div>
  <!-- /.content-wrapper -->

<?php require_once 'bottom_menu.php'; ?>