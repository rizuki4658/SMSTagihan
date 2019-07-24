<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "db_smp_zaenuddin";


$conn = mysqli_connect("$dbhost","$dbuser","$dbpass","$dbname");
   $tgl=$_POST['id'];
    $sel_prov="SELECT * FROM tagihan WHERE tgl='$tgl' AND sisa!=0 AND status='Belum Dibayar'";
    $q=mysqli_query($conn,$sel_prov);
    
    ?>
    <option value="0">Pilih Kode</option>
    <?php while($data_kode=mysqli_fetch_array($q)){
   
    ?>
        <option value="<?php echo $data_kode['kode'] ?>"><?php echo $data_kode['kode'] ?></option><br>
            
    <?php
   
    }
?>