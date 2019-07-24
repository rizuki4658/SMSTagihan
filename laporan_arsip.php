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
        $tanggal1=$_POST['dari'];
        $bulan1=date("M",strtotime($tanggal1));
        $tanggal2=$_POST['sampai'];
        $bulan2=date("M",strtotime($tanggal2));
        if ($bulan1=='Jan') {
            $bulan1="Januari";
        }elseif ($bulan1=='Feb') {
            $bulan1="Februari";
        }elseif ($bulan1=='Mar') {
            $bulan1="Maret";
        }elseif ($bulan1=='Apr') {
            $bulan1="April;";
        }elseif ($bulan1=='May') {
            $bulan1="Mei";
        }elseif ($bulan1=='Jun') {
            $bulan1="Juni";
        }elseif ($bulan1=='Jul') {
            $bulan1="Juli";
        }elseif ($bulan1=='Aug') {
            $bulan1="Agustus";
        }elseif ($bulan1=='Sep') {
            $bulan1="September";
        }elseif ($bulan1=='Oct') {
            $bulan1="Oktober";
        }elseif ($bulan1=='Nov') {
            $bulan1="November";
        }elseif ($bulan1=='Dec') {
            $bulan1="Desember";
        }
        if ($bulan2=='Jan') {
            $bulan2="Januari";
        }elseif ($bulan2=='Feb') {
            $bulan2="Februari";
        }elseif ($bulan2=='Mar') {
            $bulan2="Maret";
        }elseif ($bulan2=='Apr') {
            $bulan2="April;";
        }elseif ($bulan2=='May') {
            $bulan2="Mei";
        }elseif ($bulan2=='Jun') {
            $bulan2="Juni";
        }elseif ($bulan2=='Jul') {
            $bulan2="Juli";
        }elseif ($bulan2=='Aug') {
            $bulan2="Agustus";
        }elseif ($bulan2=='Sep') {
            $bulan2="September";
        }elseif ($bulan2=='Oct') {
            $bulan2="Oktober";
        }elseif ($bulan2=='Nov') {
            $bulan2="November";
        }elseif ($bulan2=='Dec') {
            $bulan2="Desember";
        }
        $this->Image('logo.jpg',10,5,20,15);
        $this->SetFont('Times','B',15);
        $this->SetX(130);
        $this->Cell(35,0,"LAPORAN ARSIP TAGIHAN SISWA",0,0,'C');

        $this->Ln(5);
        $this->SetFont('Times','B',10);
        $this->SetX(130);
        $this->Cell(35,0,date("d",strtotime($tanggal1))." ".$bulan1." ".date("Y",strtotime($tanggal1))." s/d ".date("d",strtotime($tanggal2))." ".$bulan2." ".date("Y",strtotime($tanggal2)),0,0,'C');

        $this->Ln(8);
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
        
        $this->Line(10,35,285,35);
        
        $this->SetFont('Arial','B',15);
        
        //pindah baris
        $this->Ln(5);

    }
 
    //Page Content
    function Content()
    {


        $this->SetFont('Arial','B',10);
        $this->SetX(10);
        $this->Cell(10,5,"No",1,0,'C');
        $this->Cell(20,5,"Tanggal",1,0,'C');
        $this->Cell(20,5,"Kelas",1,0,'C');
        $this->Cell(20,5,"NIS",1,0,'C');
        $this->Cell(35,5,"Nama Siswa",1,0,'C');
        $this->Cell(35,5,"Orang Tua",1,0,'C');
        $this->Cell(25,5,"Telepon",1,0,'C');
        $this->Cell(25,5,"Tahun Ajaran",1,0,'C');
        $this->Cell(30,5,"Total Tagihan",1,0,'C');
        $this->Cell(25,5,"Dibayar",1,0,'C');
        $this->Cell(25,5,"Sisa Bayar",1,0,'C');
        $this->Ln();
        $this->SetFont('Times','',10);
        
        $no=1;
        $bayar=0;
        $link = mysqli_connect('localhost','root','','db_smp_zaenuddin');
        $tgl1=$_POST['dari'];
        $tgl2=$_POST['sampai'];
        $totalT=0;
        $totalB=0;
        $totalS=0;
        $query="SELECT * from tagihan WHERE tgl >= '$tgl1' AND tgl <= '$tgl2' AND status = 'Lunas/Tidak Tertagih'";
        $hasil=mysqli_query($link,$query);
        if (mysqli_num_rows($hasil) > 0) {
            while($lihat=mysqli_fetch_array($hasil)){
                $bayar = $lihat ['B1'] + $lihat ['B2'] + $lihat ['B3'] + $lihat ['B4'] + $lihat ['B5'] + $lihat ['B6'] + $lihat ['B7'] + $lihat ['B8'];
                $totalT+=$lihat ['B1'] + $lihat ['B2'] + $lihat ['B3'] + $lihat ['B4'] + $lihat ['B5'] + $lihat ['B6'] + $lihat ['B7'] + $lihat ['B8'];
                $totalB+=$lihat['bayar'];
                $totalS+=$lihat['sisa'];
            $this->Cell(10,5, $no , 1, 0, 'C');
            $this->Cell(20,5, $lihat['tgl'],1, 0, 'C');
            $this->Cell(20,5, $lihat['kelas'], 1, 0,'C');
            $this->Cell(20,5, $lihat['nis'],1, 0, 'C');
            $this->Cell(35,5, $lihat['siswa'], 1, 0,'L');
            $this->Cell(35,5, $lihat['wali'],1, 0, 'L');
            $this->Cell(25,5, $lihat['telp'],1, 0, 'C');
            $this->Cell(25,5, $lihat['ajaran'],1, 0, 'C');
            $this->Cell(30,5, $bayar, 1, 0,'R');
            $this->Cell(25,5, $lihat['bayar'],1, 0, 'R');
            $this->Cell(25,5, $lihat['sisa'], 1, 0,'R');
            $this->ln();
            $no++;
                }
            $this->Cell(190,5,"Total= ", 1, 0, 'C');
            $this->Cell(30,5,number_format($totalT), 1, 0, 'R');
            $this->Cell(25,5,number_format($totalB), 1, 0, 'R');
            $this->Cell(25,5,number_format($totalS), 1, 0, 'R');
            
        }else{

        }
    }
 
    //Page footer
    function Footer()
    {
        $bulan3=date("M");
         if ($bulan3=='01' || $bulan3=="Jan") {
            $bulan3="Januari";
        }elseif ($bulan3=='02' || $bulan3=="Feb") {
            $bulan3="Februari";
        }elseif ($bulan3=='03' || $bulan3=="Mar") {
            $bulan3="Maret";
        }elseif ($bulan3=='04' || $bulan3=="Apr") {
            $bulan3="April;";
        }elseif ($bulan3=='05' || $bulan3=="May") {
            $bulan3="Mei";
        }elseif ($bulan3=='06' || $bulan3=="Jun") {
            $bulan3="Juni";
        }elseif ($bulan3=='07' || $bulan3=="Jul") {
            $bulan3="Juli";
        }elseif ($bulan3=='08' || $bulan3=="Aug") {
            $bulan3="Agustus";
        }elseif ($bulan3=='09' || $bulan3=="Sep") {
            $bulan3="September";
        }elseif ($bulan3=='10' || $bulan3=="Oct") {
            $bulan3="Oktober";
        }elseif ($bulan3=='11' || $bulan3=="Nov") {
            $bulan3="November";
        }elseif ($bulan3=='12' || $bulan3=="Dec") {
            $bulan3="Desember";
        }
        $this->Ln(20);
        $this->SetFont('Times','',10);
    
        $this->SetX(250);
        $this->Cell(1,10,"............................, ".date("d")." ".$bulan3." ".date("Y"),0,0,'C');
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
$pdf->SetTitle('Laporan Arsip');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content();
$pdf->Output();
?>
