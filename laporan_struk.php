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
    //Page Content
    function Content()
    {
        
        
        $no1=1;
        $no2=1;
        $bayar=0;
        $B1 = "Infaq Sarana Prasarana";
        $B2 = "Infaq Pendidikan";
        $B3 = "Infaq Pengembangan Siswa";
        $B4 = "Biaya Kesehatan";
        $B5 = "Biaya Syahriyyah";
        $B6 = "Ekskull & Life Skill";
        $B7 = "UTS/UAS";
        $B8 = "Biaya Lain-lain";
        $link = mysqli_connect('localhost','root','','db_smp_zaenuddin');
        $tanggal=$_POST['tgl2'];
        $kelas2=$_POST['kelas2'];

        $query="SELECT * from tagihan WHERE tgl = '$tanggal' AND kelas = '$kelas2'";
        $hasil=mysqli_query($link,$query);
        if (mysqli_num_rows($hasil) > 0) {
            
            while($lihat=mysqli_fetch_array($hasil)){
                $bayar = $lihat ['B1'] + $lihat ['B2'] + $lihat ['B3'] + $lihat ['B4'] + $lihat ['B5'] + $lihat ['B6'] + $lihat ['B7'] + $lihat ['B8'];

                $this->SetFont('Arial','B',10);
        $this->SetX(35);
        $this->Cell(35,0,"RINCIAN TAGIHAN SISWA",0,0,'C');
        $this->Ln(5);
        $this->SetX(35);
        $this->Cell(35,0,"SMP Al-Qur'an Zaenuddin",0,0,'C');
        $this->Ln(2);
        $this->SetX(10);
        
        //$this->Line(30,12,75,12);
        
        $this->SetFont('Arial','B',15);
        
        //pindah baris
        $this->Ln(1);

        $this->SetFont('Times','',10);
        $this->SetX(8);
            $this->Cell(15,5,"NIS",0,0,'L');$this->Cell(20,5, $lihat['nis'],0, 0, 'L');
            $this->Ln(5);
        $this->SetX(8);
            $this->Cell(15,5,"Kelas",0,0,'L');$this->Cell(20,5, $lihat['kelas'],0, 0, 'L');
            $this->Ln(5);
        $this->SetX(8);
            $this->Cell(15,5,"Nama",0,0,'L');$this->Cell(20,5, $lihat['siswa'], 0, 0,'L');
            $this->Ln(5);
        $bulan=date("M",strtotime($lihat['tgl']));
        if ($bulan=='Jan') {
            $bulan='Januari';
        }elseif ($bulan=='Feb') {
             $bulan='Februari';
        }elseif ($bulan=='Mar') {
            $bulan='Maret';
        }elseif ($bulan=='Apr') {
             $bulan='April';
        }elseif ($bulan=='May') {
             $bulan='Mei';
        }elseif ($bulan=='Jun') {
            $bulan='Juni';
        }elseif ($bulan=='Jul') {
             $bulan='Juli';
        }elseif ($bulan=='Aug') {
             $bulan='Agustus';
        }elseif ($bulan=='Sep') {
             $bulan='September';
        }elseif ($bulan=='Oct') {
             $bulan='Oktober';
        }elseif ($bulan=='Nov') {
             $bulan='November';
        }elseif ($bulan=='Dec') {
             $bulan='Desember';
        }
        $this->SetX(8);
            $this->Cell(15,5,"Tanggal",0,0,'L');$this->Cell(20,5, date("d",strtotime($lihat['tgl']))." ".$bulan." ".date("Y",strtotime($lihat['tgl'])),0, 0, 'L');
            $this->Ln(8);

        $this->SetFont('Times','',10);

            $this->SetFont('Arial','B',9);
            $this->SetX(8);
        $this->Cell(10,5,"No",1,0,'C');
        $this->Cell(50,5,"Nama Tagihan",1,0,'C');
        $this->Cell(30,5,"Biaya Tagihan",1,0,'C');
        $this->Ln();
        $this->SetFont('Times','',10);

        $this->SetX(8);
            $this->Cell(10,5, $no1++ , 1, 0, 'C');
            $this->Cell(50,5, $B1,1, 0, 'L');
            $this->Cell(30,5, "Rp. ".number_format($lihat['B1']), 1, 0,'R');
            $this->ln(5);
        $this->SetX(8);
            $this->Cell(10,5, $no1++ , 1, 0, 'C');
            $this->Cell(50,5, $B2,1, 0, 'L');
            $this->Cell(30,5, "Rp. ".number_format($lihat['B2']), 1, 0,'R');
            $this->ln(5);
        $this->SetX(8);
            $this->Cell(10,5, $no1++ , 1, 0, 'C');
            $this->Cell(50,5, $B3,1, 0, 'L');
            $this->Cell(30,5, "Rp. ".number_format($lihat['B3']), 1, 0,'R');
            $this->ln(5);
        $this->SetX(8);
            $this->Cell(10,5, $no1++ , 1, 0, 'C');
            $this->Cell(50,5, $B4,1, 0, 'L');
            $this->Cell(30,5, "Rp. ".number_format($lihat['B4']), 1, 0,'R');
            $this->ln(5);
        $this->SetX(8);
            $this->Cell(10,5, $no1++ , 1, 0, 'C');
            $this->Cell(50,5, $B5,1, 0, 'L');
            $this->Cell(30,5, "Rp. ".number_format($lihat['B5']), 1, 0,'R');
            $this->ln(5);
        $this->SetX(8);
            $this->Cell(10,5, $no1++ , 1, 0, 'C');
            $this->Cell(50,5, $B6,1, 0, 'L');
            $this->Cell(30,5, "Rp. ".number_format($lihat['B6']), 1, 0,'R');
            $this->ln(5);
        $this->SetX(8);
            $this->Cell(10,5, $no1++ , 1, 0, 'C');
            $this->Cell(50,5, $B7,1, 0, 'L');
            $this->Cell(30,5, "Rp. ".number_format($lihat['B7']), 1, 0,'R');
            $this->ln(5);
        $this->SetX(8);
            $this->Cell(10,5, $no1++ , 1, 0, 'C');
            $this->Cell(50,5, $B8,1, 0, 'L');
            $this->Cell(30,5, "Rp. ".number_format($lihat['B8']), 1, 0,'R');
            $this->ln(5);
            $this->SetX(8);
            $this->Cell(60,5, "Total Tagihan",1, 0, 'C');
            $this->Cell(30,5, "Rp. ".number_format($bayar), 1, 0,'R');
            $this->ln(1);
        $this->SetX(8);
        $this->Cell(1,10,"........................................................................................................",0,0,'L');
        $this->ln(12);

            $no1=1;
                }
            
        }else{

        }
    }
 
    //Page footer
    function Footer()
    {
        //atur posisi 1.5 cm dari bawah
        $this->SetY(-15);
        //buat garis horizontal
        //$this->Line(10,$this->GetY(),200,$this->GetY());
        //Arial italic 9
        //$this->SetFont('Times','',9);
        //nomor halaman
        //$this->Cell(0,10,'Page '.$this->PageNo().' of {nb}',0,0,'R');-->
    }
}
 
//contoh pemanggilan class
$pdf = new PDF('P','mm','A4');
$pdf->SetTitle('Rincian Tagihan Siswa');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content();
$pdf->Output();
?>
