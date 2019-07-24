<?php
   	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "db_smp_zaenuddin";


$conn = mysqli_connect("$dbhost","$dbuser","$dbpass","$dbname");
   
    $sel_prov="select * from siswa where no_kelas='".$_POST["id"]."' AND status='AKTIF'";
    $q=mysqli_query($conn,$sel_prov);
    
    ?>
    <option value="0">Pilih NIS</option>
    <?php while($data_nis=mysqli_fetch_array($q)){
   
    ?>
        <option value="<?php echo $data_nis['id'] ?>"><?php echo $data_nis['id'] ?></option><br>
            
    <?php
   
    }
?>