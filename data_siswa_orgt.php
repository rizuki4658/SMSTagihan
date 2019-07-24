
<?php require_once 'top_menu.php' ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Siswa
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
              <h3 class="box-title">Tabel Siswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kelas</th>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>L/P</th>
                  <th><center>Input Edit Hapus</center></th>
                </tr>
                </thead>
                <tbody>
                        <?php
                        $link=mysqli_connect('localhost','root','','db_smp_zaenuddin');
                         $query="SELECT * FROM siswa WHERE status='AKTIF'";
                         $tampil=mysqli_query($link,$query);
                         $no=1;
                         if (mysqli_num_rows($tampil)>0) {
                            while ($data = mysqli_fetch_assoc($tampil)) {
                            ?>
                            
                              <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['kelas']; ?></td>
                                <td><?php echo $data['id']; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['jenis']; ?></td>
                                <td><center>
                                    <a title="Tambah Data Siswa" class="btn btn-success" style="border-radius: 20px;" href="tambah_data_siswa.php">
                                      <i class="fa fa-plus"></i>
                                    </a>  
                                    <a title="Lihat Data <?php echo $data['nama'] ?>" class="btn btn-warning" style="border-radius: 20px;" href="<?php echo "edit_data_siswa.php?nis=$data[id]"; ?>">
                                      <i class="fa fa-eye text-black"></i>
                                    </a> 
                                    <a title="Hapus Data <?php echo $data['nama']." ?" ?>" class="btn btn-danger"  style="border-radius: 20px;" onclick="return confirm('Hapus data siswa?')" href="<?php echo "./proses_siswa/hapus_siswa.php?nis=$data[id]"; ?>">
                                      <i class="fa fa-trash-o"></i>
                                    </a> 
                                </center></td>
                            </tr>
                         <?php
                        }?>
                         
                    </tbody>
                    <tfoot>
                        <th colspan="6">
                            <center>Jumlah <?php echo mysqli_num_rows($tampil)." Orang Siswa"; ?></center>
                        </th>
                    </tfoot>
                    <?php   }else{ ?>

                            <tr>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td><center>
                                    <a title="Tambah Data Siswa" class="btn btn-success" style="border-radius: 20px;" href="tambah_data_siswa.php">
                                      <i class="fa fa-plus"></i>
                                    </a>
                                </center></td>
                            </tr>
                    </tbody>
                    <tfoot>
                        <th colspan="6">
                            <center>Jumlah 0 </center>
                        </th>
                    </tfoot>
                    <?php
                       }
                        ?>
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

    <section class="content-header">
      <h1>
        Data Orang Tua
        <small>.</small>
      </h1>
      <ol class="breadcrumb">
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Orang Tua</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>NIS</th>
                  <th>Orang Tua</th>
                  <th>Telp.</th>
                  <th>Pekerjaan</th>
                  <th>Penghasilan</th>
                  <th><center>Input</center></th>
                </tr>
                </thead>
                <tbody>
                <?php
                        $link2=mysqli_connect('localhost','root','','db_smp_zaenuddin');
                         $query2="SELECT * FROM wali WHERE status='AKTIF'";
                         $tampil2=mysqli_query($link2,$query2);
                         $no2=1;
                         $total2=0;
                         if (mysqli_num_rows($tampil2)>0) {
                                $baris=mysqli_num_rows($tampil2);
                            while ($data2 = mysqli_fetch_assoc($tampil2)) {
                            ?>
                            
                              <tr>
                                <td><?php echo $no2++; ?></center></td>
                                <td><?php echo $data2['id']; ?></center></td>
                                <td><?php echo $data2['nama']; ?></td>
                                <td><?php echo $data2['telp']; ?></center></td>
                                <td><?php echo $data2['pekerjaan']; ?></center></td>
                                <td style="text-align: right;"><?php echo $data2['penghasilan']; ?></td>
                                <td><center>
                                    <a title="Tambah Data Orang Tua" class="btn btn-success" style="border-radius: 20px;"  href="tambah_data_orgt.php">
                                      <i class="fa fa-plus"></i>
                                    </a>  
                                    <a title="Lihat Data <?php echo $data2['nama'] ?>" class="btn btn-warning" style="border-radius: 20px;" href="<?php echo "edit_data_orgt.php?nis=$data2[id]"; ?>">
                                      <i class="fa fa-eye text-black"></i>
                                    </a> 
                                    <a title="Hapus Data <?php echo $data2['nama']." ?" ?>" class="btn btn-danger"  style="border-radius: 20px;" onclick="return confirm('Hapus data orang tua ?')" href="<?php echo "./proses_orgt/hapus_orgt.php?nis=$data2[id]"; ?>">
                                      <i class="fa fa-trash-o"></i>
                                    </a> 
                                </center></td>
                            </tr>
                         <?php
                        }?>
                </tbody>
                <tfoot>
                        <tr>
                            <th colspan="7"><center>Jumlah <?php echo $baris; ?> Orang Tua</center></th>
                        </tr>
                    </tfoot>
                    <?php   }else{ ?>

                    <tr>
                                <td>-</center></td>
                                <td>-</center></td>
                                <td>-</td>
                                <td>-</center></td>
                                <td>-</center></td>
                                <td>-</td>
                                <td><center>
                                    <a title="Tambah Data Orang Tua" class="btn btn-success" style="border-radius: 20px;"  href="tambah_data_orgt.php">
                                      <i class="fa fa-plus"></i>
                                    </a>
                                </center></td>
                            </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                            <th colspan="7"><center>Jumlah 0 </center></th>
                        </tr>
                      </tfoot>
                    <?php
                          }
                        ?>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once 'bottom_menu.php' ?>
