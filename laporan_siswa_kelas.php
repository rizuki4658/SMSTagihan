<?php
session_start();
if(!isset($_SESSION['ses_user']) || !isset($_SESSION['ses_pass'])){ //cek apakah user sudah login
        header("location:login.php");
    }else {

    $link=mysqli_connect("localhost","root","","db_smp_zaenuddin");
    $user=$_SESSION['ses_user'];
    $login=mysqli_query($link,"SELECT * FROM user_db WHERE username = '$user'");
    $t=mysqli_fetch_array($login);
}
require('./phpfpdf/fpdf.php');

class PDF extends FPDF
{
    //Page header
    function Header()
    {
       $bulan=date("M");
        if ($bulan=='01' || $bulan=="Jan") {
            $bulan="Januari";
        }elseif ($bulan=='02' || $bulan=="Feb") {
            $bulan="Februari";
        }elseif ($bulan=='03' || $bulan=="Mar") {
            $bulan="Maret";
        }elseif ($bulan=='04' || $bulan=="Apr") {
            $bulan="April;";
        }elseif ($bulan=='05' || $bulan=="May") {
            $bulan="Mei";
        }elseif ($bulan=='06' || $bulan=="Jun") {
            $bulan="Juni";
        }elseif ($bulan=='07' || $bulan=="Jul") {
            $bulan="Juli";
        }elseif ($bulan=='08' || $bulan=="Aug") {
            $bulan="Agustus";
        }elseif ($bulan=='09' || $bulan=="Sep") {
            $bulan="September";
        }elseif ($bulan=='10' || $bulan=="Oct") {
            $bulan="Oktober";
        }elseif ($bulan=='11' || $bulan=="Nov") {
            $bulan="November";
        }elseif ($bulan=='12' || $bulan=="Dec") {
            $bulan="Desember";
        }
        $this->Image('logo.jpg',10,5,20,15);
        $this->SetFont('Times','B',15);
        $this->SetX(130);
        $this->Cell(35,0,"LAPORAN DATA SISWA",0,0,'C');

        $this->SetFont('Times','B',10);
        $this->SetX(250);
        $this->Cell(35,0,"Tanggal: ".date("d")." ".$bulan." ".date("Y"),0,0,'C');

        $this->Ln(10);
        $this->SetFont('Times','B',15);
        $this->SetX(130);
        $this->Cell(35,0,"SMP AL-QURAN ZAENUDDIN",0,0,'C');
        $this->Ln(5);
        $this->SetFont('Times','',10);
        $this->SetX(130);
        $this->Cell(35,0,"Jalan Raya Pantura Km. 09 Tegal-Pemalang, Desa Maribaya-Kramat-Tegal(52181)",0,0,'C');
        $this->Ln(5);
        $this->SetFont('Times','',10);
        $this->SetX(130);
        $this->Cell(35,0,"website:www.ponpeszaenuddin.com e-mail:admin@ponpeszaenuddin.com HP:085659814293.",0,0,'C');
        $this->SetX(80);
        
        $this->Line(10,32,285,32);
        
        $this->SetFont('Arial','B',15);
        
        //pindah baris
        $this->Ln(5);

    }
 
    //Page Content
    function Content()
    {
        $nama_kelas="";
        if ($_POST['kelas']==1) {
            $nama_kelas="VII A";
        }elseif ($_POST['kelas']==2) {
            $nama_kelas="VII B";
        }elseif ($_POST['kelas']==3) {
            $nama_kelas="VII C";
        }elseif ($_POST['kelas']==4) {
            $nama_kelas="VII D";
        }elseif ($_POST['kelas']==5) {
           $nama_kelas="VII E";
        }elseif ($_POST['kelas']==6) {
            $nama_kelas="VIII A";
        }elseif ($_POST['kelas']==7) {
            $nama_kelas="VIII B";
        }elseif ($_POST['kelas']==8) {
            $nama_kelas="VIII C";
        }elseif ($_POST['kelas']==9) {
           $nama_kelas="VIII D";
        }elseif ($_POST['kelas']==10) {
           $nama_kelas="VIII E";
        }elseif ($_POST['kelas']==11) {
           $nama_kelas="IX A";
        }elseif ($_POST['kelas']==12) {
            $nama_kelas="IX B";
        }elseif ($_POST['kelas']==13) {
            $nama_kelas="IX C";
        }elseif ($_POST['kelas']==14) {
            $nama_kelas="IX D";
        }elseif ($_POST['kelas']==15) {
            $nama_kelas="IX E";
        }
        $this->SetFont('Arial','B',10);
        $this->SetX(10);
        $this->Cell(30,5,"Kelas: ".$nama_kelas,0,0,'L');
        $this->Ln();
        $this->Cell(10,5,"No",1,0,'C');
        $this->Cell(50,5,"Nama Siswa",1,0,'C');
        $this->Cell(30,5,"Tanggal Lahir",1,0,'C');
        $this->Cell(30,5,"Jenis Kelamin",1,0,'C');
        $this->Cell(125,5,"Alamat",1,0,'C');
        $this->Cell(30,5,"Angkatan",1,0,'C');
        $this->Ln();
        $this->SetFont('Times','',10);
        
        $no=1;
        $link = mysqli_connect('localhost','root','','db_smp_zaenuddin');
        $kelas=$_POST['kelas'];

        $query="SELECT * from siswa WHERE no_kelas = '$kelas' AND status='AKTIF' ORDER BY nama ASC";
        $hasil=mysqli_query($link,$query);
        if (mysqli_num_rows($hasil) > 0) {
            while($lihat=mysqli_fetch_array($hasil)){
                $bulan=date("M",strtotime($lihat['angkatan']));
            if ($bulan=='01' || $bulan=="Jan") {
                $bulan="Januari";
            }elseif ($bulan=='02' || $bulan=="Feb") {
                $bulan="Februari";
            }elseif ($bulan=='03' || $bulan=="Mar") {
                $bulan="Maret";
            }elseif ($bulan=='04' || $bulan=="Apr") {
                $bulan="April;";
            }elseif ($bulan=='05' || $bulan=="May") {
                $bulan="Mei";
            }elseif ($bulan=='06' || $bulan=="Jun") {
                $bulan="Juni";
            }elseif ($bulan=='07' || $bulan=="Jul") {
                $bulan="Juli";
            }elseif ($bulan=='08' || $bulan=="Aug") {
                $bulan="Agustus";
            }elseif ($bulan=='09' || $bulan=="Sep") {
                $bulan="September";
            }elseif ($bulan=='10' || $bulan=="Oct") {
                $bulan="Oktober";
            }elseif ($bulan=='11' || $bulan=="Nov") {
                $bulan="November";
            }elseif ($bulan=='12' || $bulan=="Dec") {
                $bulan="Desember";
            }
            $this->Cell(10,5, $no , 1, 0, 'C');
            $this->Cell(50,5, $lihat['nama'],1, 0, 'L');
            $this->Cell(30,5, date("d-m-Y",strtotime($lihat['tgl_l'])), 1, 0,'C');
            $this->Cell(30,5, $lihat['jenis'], 1, 0,'C');
            $this->Cell(125,5, $lihat['alamat'],1, 0, 'L');
            $this->Cell(30,5, date("d",strtotime($lihat['angkatan']))." ".$bulan." ".date("Y",strtotime($lihat['angkatan'])),1, 0, 'C');
            $this->ln();
            $no++;
                }
            
        }else{

        }
    }
 
    //Page footer
    function Footer()
    {
        $bulan2=date("M");
         if ($bulan2=='01' || $bulan2=="Jan") {
            $bulan2="Januari";
        }elseif ($bulan2=='02' || $bulan2=="Feb") {
            $bulan2="Februari";
        }elseif ($bulan2=='03' || $bulan2=="Mar") {
            $bulan2="Maret";
        }elseif ($bulan2=='04' || $bulan2=="Apr") {
            $bulan2="April;";
        }elseif ($bulan2=='05' || $bulan2=="May") {
            $bulan2="Mei";
        }elseif ($bulan2=='06' || $bulan2=="Jun") {
            $bulan2="Juni";
        }elseif ($bulan2=='07' || $bulan2=="Jul") {
            $bulan2="Juli";
        }elseif ($bulan2=='08' || $bulan2=="Aug") {
            $bulan2="Agustus";
        }elseif ($bulan2=='09' || $bulan2=="Sep") {
            $bulan2="September";
        }elseif ($bulan2=='10' || $bulan2=="Oct") {
            $bulan2="Oktober";
        }elseif ($bulan2=='11' || $bulan2=="Nov") {
            $bulan2="November";
        }elseif ($bulan2=='12' || $bulan2=="Dec") {
            $bulan2="Desember";
        }
        $this->Ln(20);
        $this->SetFont('Times','',10);
    
        $this->SetX(250);
        $this->Cell(1,10,"............................, ".date("d")." ".$bulan2." ".date("Y"),0,0,'C');
        $this->Ln(20);
        $this->SetX(10);
        $this->Ln(15);
        $this->SetX(220);
        $this->Cell(1,10,"(...................................................................)",0,0,'L');
        $this->Ln(5);
        //$this->SetX(220);
        //$this->Cell(1,10,"NIP.",0,0,'L');
        //atur posisi 1.5 cm dari bawah
        $this->SetY(-15);
        //buat garis horizontal
        $this->Line(10,$this->GetY(),285,$this->GetY());
        //Arial italic 9
        $this->SetFont('Times','',9);
        //nomor halaman
        $this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
    }
}
 
//contoh pemanggilan class
$pdf = new PDF('L','mm','A4');
$pdf->SetTitle('Laporan Siswa Per Kelas');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content();
$pdf->Output();
?>
