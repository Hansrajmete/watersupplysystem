<?php
error_reporting(0);
$orderid=(int)$_GET['oid'];
include('Config.php');
date_default_timezone_set("Asia/Kolkata");
$res = $pro->findOne(array('Order.order_no' => $orderid));

$prod=$res['Order']['products'];

$pay = 'Payment information';

require('u/fpdf.php');

class PDF extends FPDF
{
function Header()
{
if(!empty($_FILES["file"]))
  {
$uploaddir = "logo/";
$nm = $_FILES["file"]["name"];
$random = rand(1,99);
move_uploaded_file($_FILES["file"]["tmp_name"], $uploaddir.$random.$nm);
$this->Image($uploaddir.$random.$nm,10,10,20);
unlink($uploaddir.$random.$nm);
}
$this->SetFont('Arial','B',10);
$this->Ln(1);
}
function Footer()
{
$this->SetY(-15);
$this->SetFont('Arial','I',8);
$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
function ChapterTitle($num, $label)
{
$this->SetFont('Arial','',10);
$this->SetFillColor(200,220,255);
$this->Cell(0,6,"$num $label",0,1,'L',true);
$this->Ln(0);
}
function ChapterTitle2($num, $label)
{
$this->SetFont('Arial','',10);
$this->SetFillColor(249,249,249);
$this->Cell(0,6,"$num $label",0,1,'L',true);
$this->Ln(0);
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',10);
$pdf->SetTextColor(32);
$pdf->Image('images/logo.png',10,10,60,25);
$pdf->Cell(0,5,"Water Corp",0,1,'R');
$pdf->Cell(0,5,"PICT College,Dhankawadi",0,1,'R');
$pdf->Cell(0,5,"admin@watercorps.com",0,1,'R');
$pdf->Cell(0,5,'Mob: +91 8381-097-399',0,1,'R');
$pdf->Cell(0,30,'',0,1,'R');
$pdf->SetFillColor(200,239,255);
$temp = $pro->findOne(array('Customer.U_name' => $res['Order']['U_name']));
if(!$temp){
$temp = $pro->findOne(array('Customer.U_name' => $res['Order']['customer']));

}
if($temp){

$pdf->ChapterTitle('Customer User Name :'.$temp['Customer']['F_name'].' '.$temp['Customer']['L_name'] );
}
else{
$pdf->ChapterTitle('Customer Name :',$res['Order']['customer']);}
$pdf->ChapterTitle('Invoice Number ',$res['Order']['order_no']);
$pdf->ChapterTitle('Invoice Date ',date('d-m-Y'));
$pdf->ChapterTitle('Order Date ',$res['Order']['date']);
$pdf->Cell(0,20,'',0,1,'R');
$pdf->SetFillColor(224,235,255);
$pdf->SetDrawColor(192,192,192);
$pdf->Cell(15,7,'Sr.no',1,0,'L');
$pdf->Cell(115,7,'Item',1,0,'L');
$pdf->Cell(20,7,'Price each',1,0,'C');
$pdf->Cell(20,7,'Qty',1,0,'C');
$pdf->Cell(20,7,'Total',1,1,'C');
$i=1;
foreach($prod as $temp) 
{
$pdf->Cell(15,7,$i++,1,0,'L');
$pdf->Cell(115,7,$temp['pro_name'],1,0,'L');
$pdf->Cell(20,7,"Rs.".$temp['price'],1,0,'L');
$pdf->Cell(20,7,$temp['quantity'],1,0,'C');
$pdf->Cell(20,7,'Rs.'.$temp['price'] * $temp['quantity'],1,1,'L');
}
$pdf->Cell(0,0,'',0,1,'R');
$pdf->Cell(170,7,'Grand Total',1,0,'R',0);
$pdf->Cell(20,7,"Rs.".$res['Order']['total_bill'],1,0,'L',0);
$pdf->Cell(0,20,'',0,1,'R');
$pdf->Cell(0,5,'Payment information-',0,1,'L');
$pdf->Cell(0,5,$res['Order']['p_type'],0,1,'L');
$pdf->Cell(0,5,"Paid",0,1,'L');
$pdf->Cell(0,20,'',0,1,'R');
$pdf->Cell(0,5,'Delivery Address:',0,1,'L');
$pdf->Cell(0,5,$res['Order']['d_addr'],0,1,'L');
$pdf->Cell(190,40,"Water is Life! Use it wisely!",0,0,'C');
$filename="invoicee.pdf";
$pdf->Output($filename,'F');

   echo "<script type='text/javascript'> window.location.href='invoicee.pdf';</script>";

?>

