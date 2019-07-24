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
        $tanggal=$_POST['tgl1'];
        $bulan=date("M",strtotime($tanggal));
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
        $this->Cell(35,0,"LAPORAN TAGIHAN SISWA",0,0,'C');

        $this->SetFont('Times','B',10);
        $this->SetX(250);
        $this->Cell(35,0,"Tanggal: ".date("d",strtotime($tanggal))." ".$bulan." ".date("Y",strtotime($tanggal)),0,0,'C');

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
        $this->Ln(7);


    }
 
    //Page Content
    function Content()
    {


        $this->SetFont('Arial','B',10);
        $this->SetX(10);
        $this->Cell(30,5,"Kelas: ".$_POST['kelas1'],0,0,'L');
        $this->Ln();
        $this->SetX(10);
        $this->Cell(10,5,"No",1,0,'C');
        $this->Cell(20,5,"Tanggal",1,0,'C');
        $this->Cell(20,5,"NIS",1,0,'C');
        $this->Cell(40,5,"Nama Siswa",1,0,'C');
        $this->Cell(40,5,"Orang Tua",1,0,'C');
        $this->Cell(23,5,"Telepon",1,0,'C');
        $this->Cell(25,5,"Tahun Ajaran",1,0,'C');
        $this->Cell(25,5,"Total Tagihan",1,0,'C');
        $this->Cell(20,5,"Dibayar",1,0,'C');
        $this->Cell(20,5,"Sisa Bayar",1,0,'C');
        $this->Cell(33,5,"Status Tagihan",1,0,'C');
        $this->Ln();
        $this->SetFont('Times','',10);
        
        $no=1;
        $bayar=0;
        $link = mysqli_connect('localhost','root','','db_smp_zaenuddin');
        $tanggal=$_POST['tgl1'];
        $kelas=$_POST['kelas1'];
        $totalT=0;
        $totalB=0;
        $totalS=0;
        $query="SELECT * from tagihan WHERE tgl = '$tanggal' AND kelas = '$kelas'";
        $hasil=mysqli_query($link,$query);
        if (mysqli_num_rows($hasil) > 0) {
            while($lihat=mysqli_fetch_array($hasil)){
                $bayar = $lihat ['B1'] + $lihat ['B2'] + $lihat ['B3'] + $lihat ['B4'] + $lihat ['B5'] + $lihat ['B6'] + $lihat ['B7'] + $lihat ['B8'];
                $totalT+=$lihat ['B1'] + $lihat ['B2'] + $lihat ['B3'] + $lihat ['B4'] + $lihat ['B5'] + $lihat ['B6'] + $lihat ['B7'] + $lihat ['B8'];
                $totalB+=$lihat['bayar'];
                $totalS+=$lihat['sisa'];
            $this->Cell(10,5, $no , 1, 0, 'C');
            $this->Cell(20,5, date("d/m/Y",strtotime($lihat['tgl'])),1, 0, 'C');
            $this->Cell(20,5, $lihat['nis'],1, 0, 'C');
            $this->Cell(40,5, $lihat['siswa'], 1, 0,'L');
            $this->Cell(40,5, $lihat['wali'],1, 0, 'L');
            $this->Cell(23,5, $lihat['telp'],1, 0, 'C');
            $this->Cell(25,5, $lihat['ajaran'],1, 0, 'C');
            $this->Cell(25,5, number_format($bayar), 1, 0,'R');
            $this->Cell(20,5, number_format($lihat['bayar']),1, 0, 'R');
            $this->Cell(20,5, number_format($lihat['sisa']), 1, 0,'R');
            $this->Cell(33,5, $lihat['status'],1, 0, 'C');
            $this->ln();
            $no++;
                }
            $this->Cell(178,5,"Total= ", 1, 0, 'C');
            $this->Cell(25,5,number_format($totalT), 1, 0, 'R');
            $this->Cell(20,5,number_format($totalB), 1, 0, 'R');
            $this->Cell(20,5,number_format($totalS), 1, 0, 'R');
            $this->Cell(33,5,'', 1, 0, 'R');
            
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
$pdf->SetTitle('Laporan Tagihan Per Tgl & Kelas');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content();
$pdf->Output();
?>
