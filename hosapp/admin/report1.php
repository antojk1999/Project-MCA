
<?php

if(isset($_POST['sub']))
{
	header('Content-Type: application/pdf');
	header('Content-Disposition:attachment; filename="rep.pdf"');
session_start();
$hname=$_SESSION['admin'];
$d1=$_POST['da'];
$d=date('Y-m-d',strtotime($d1));	
$d2=date('d-m-Y',strtotime($d1));
	
include('dbcon.php');
//$con=mysqli_connect('localhost','root','','hospital1');

require_once __DIR__ .'/vendor/autoload.php';
$re1=mysqli_query($con,"SELECT sum(a.patients*d.cfee) as s,a.date,.a.doctid,a.patients,d.doctname,d.cfee FROM `audit` a,deptdoctors d WHERE a.doctid=d.doctid and date='$d'");
$re=mysqli_query($con,"SELECT a.date,.a.doctid,a.patients,d.doctname,d.cfee FROM `audit` a,deptdoctors d WHERE a.doctid=d.doctid and date='$d'");
$row1=mysqli_fetch_array($re1);

$pdf = new \Mpdf\Mpdf();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30, 5, $hname, 0, 0, 'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->Cell(40, 5, 'Date  :  '. $d2, 0, 0, 'C');
  $pdf->Ln();
  $pdf->Ln();
  $pdf->Ln();


$pdf->cell(40,12,'Doctor Name',1,0,'C');
$pdf->cell(40,12,'Consulting Fees',1,0,'C');
$pdf->cell(50,12,'Number Of Patients',1,0,'C');
$pdf->cell(40,12,'Total Amount',1,0,'C');
while($row=mysqli_fetch_array($re))
{
$pdf->Ln();

$pdf->cell(40,12,''. $row['doctname'],0,0,'C');
$pdf->cell(40,12,''. $row['cfee'],0,0,'C');
$pdf->cell(50,12,''. $row['patients'],0,0,'C');
$pdf->cell(40,12,''. $row['cfee']*$row['patients'],0,0,'C');
}
$pdf->Ln();
$pdf->Ln();
$pdf->cell(300,12,'Total :  '. $row1['s'],0,0,'C');
$pdf->Output();
#file_put_contents($pdf->Output(),file_get_contents('re.pdf'));
}
?>