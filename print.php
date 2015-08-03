<?php

session_start(); 
 
	// store the date in this format here and then or also we have here 
	$time=time(); 
	
	$mysqli=new mysqli('localhost','root','','a9748231_user');  
	
	$sql1='insert into cart_offline(bill,cdate,empName) values('.$_SESSION['totalPrice'].',"'.date('Y-m-d H:i:s',$time).'","'.$_SESSION['name'].'")';
	
	if(!($mysqli->query($sql1))){
		echo $sql1; 
		die ('not executed');  
	}
	
	$sql3='select * from cart_offline'; 

	$res=$mysqli->query($sql3);
	$i=$res->num_rows; 
	
	//$i+=1; 
	 
	 //die($i);
	  	
	foreach($_SESSION['cart'] as $id=>$value){
		
		// try to get the values for each row id here
		// get the value for the last id of cart_offline table 
	
	$sql2='insert into product_offline(cid,id,quantity) values('.$i.','.$id.','.$_SESSION['cart'][$id]['quantity'].')';

		$mysqli->query($sql2) ; 
	//	echo $sql2; 
		
	}
	
$sql="select * from products1 where id in (";

	foreach($_SESSION['cart'] as $id=>$val){
		// take all the values here
		$sql.=$id.","; 
	}
	
	$sql=substr($sql,0,-1).") order by id asc";
	
	// after getting the query , write the query for the mysql 
	
	
	
	$result=$mysqli->query($sql);
	 
$company = "JUJU Cafe";
$address = "Cos Thapar University";
$email = "nmngarg174@gmail.com";
$telephone = "8437928163";
//$number = $_POST["number"];
$item = $_SESSION["totalPrice"];
$price = $_SESSION["totalPrice"];
$vat= "12%";
//$bank = $_POST["bank"];
//$iban = $_POST["iban"];
//$paypal = $_POST["paypal"];
//$com = $_POST["com"];
//$pay = 'Payment information';
$price = str_replace(",",".",$price);
$vat = str_replace(",",".",$vat);
$p = explode(" ",$price);
$v = explode(" ",$vat);
$re = ($p[0] * $v[0])/100;
$re+=$p[0];
function r($r)
{
$r = str_replace("$","",$r);
$r = str_replace(" ","",$r);
$r = $r." $";
return $r;
}
$price = r($price);
//$vat = r($vat);
require('fpdf.php');

class PDF extends FPDF
{
function Header()
{
if(!empty($_FILES["file"]))
  {
$uploaddir = "images/juju.jpg";
$nm = $_FILES["file"]["name"];
$random = rand(1,99);
move_uploaded_file($_FILES["file"]["tmp_name"], $uploaddir.$random.$nm);
$this->Image($uploaddir.$random.$nm,10,10,20);
unlink($uploaddir.$random.$nm);
}
$this->SetFont('Arial','B',12);
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
$this->SetFont('Arial','',12);
$this->SetFillColor(200,220,255);
$this->Cell(0,6,"$num $label",0,1,'L',true);
$this->Ln(0);
}
function ChapterTitle2($num, $label)
{
$this->SetFont('Arial','',12);
$this->SetFillColor(249,249,249);
$this->Cell(0,6,"$num $label",0,1,'L',true);
$this->Ln(0);
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->SetTextColor(32);
$pdf->Cell(0,5,$company,0,1,'R');
$pdf->Cell(0,5,$address,0,1,'R');
$pdf->Cell(0,5,$email,0,1,'R');
$pdf->Cell(0,5,'Tel: '.$telephone,0,1,'R');
$pdf->Cell(0,30,'',0,1,'R');
$pdf->SetFillColor(200,220,255);
//$pdf->ChapterTitle('Invoice Number ',$number);
$pdf->ChapterTitle('Invoice Date ',date('d-m-Y'));
$pdf->Cell(0,20,'',0,1,'R');
$pdf->SetFillColor(224,235,255);
$pdf->SetDrawColor(192,192,192);
$pdf->Cell(170,7,'Item',1,0,'L');
$pdf->Cell(20,7,'Price',1,1,'C');

	while($row=$result->fetch_array()){
		$pdf->Cell(20,7,$row[0],1,0,'L',0);
		$pdf->Cell(150,7,$row[1],1,0,'L',0);
		$pdf->Cell(20,7,$row[3].'Rs',1,1,'C',0);
		
	}
	
	
$pdf->Cell(0,0,'',0,1,'R');
$pdf->Cell(170,7,'VAT',1,0,'R',0);
$pdf->Cell(20,7,$vat,1,1,'C',0);
$pdf->Cell(170,7,'Total',1,0,'R',0);
$pdf->Cell(20,7,$re.'Rs',1,0,'C',0);
$pdf->Cell(0,20,'',0,1,'R');
//$pdf->Cell(0,5,$pay,0,1,'L');
//$pdf->Cell(0,5,$bank,0,1,'L');
//$pdf->Cell(0,5,$iban,0,1,'L');
$pdf->Cell(0,20,'',0,1,'R');
$pdf->Cell(0,5,'PayPal:',0,1,'L');
//$pdf->Cell(0,5,$paypal,0,1,'L');
//$pdf->Cell(190,40,$com,0,0,'C');
$filename="invoice.pdf";
//$pdf->Output($filename,'F');
$pdf->Output();
//}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Create a PDF invoice with PHP</title>
<style>
body{background-image:url(img/bg.jpg);
}
a{
color:#999999;
text-decoration:none;
}
a:hover{
color:#999999;
text-decoration:underline;
}
#content{
width:800px;
height:600px;
background-color:#FEFEFE;
border: 10px solid rgb(255, 255, 255);
border: 10px solid rgba(255, 255, 255, .5);
-webkit-background-clip: padding-box;
background-clip: padding-box;
border-radius: 10px;
opacity:0.90;
filter:alpha(opacity=90);
margin:auto;
}
#footer{
width:800px;
height:30px;
padding-top:15px;
color:#666666;
margin:auto;
}
#title{
width:770px;
margin:15px;
color:#999999;
font-size:18px;
font-family:Verdana, Arial, Helvetica, sans-serif;
}
#body{
width:770px;
height:360px;
margin:15px;
color:#999999;
font-size:16px;
font-family:Verdana, Arial, Helvetica, sans-serif;
}
#body_l{
width:385px;
height:360px;
float:left;
}
#body_r{
width:385px;
height:360px;
float:right;
}
#name{
width:width:385px;
height:40px;
margin-top:15px;
}
input{
margin-top:10px;
width:345px;
height:32px;
-moz-border-radius: 5px;
border-radius: 5px;
border:1px solid #ccc;
background-image:url(img/paper_fibers.png);
color:#999;
margin-left:15px;
padding:5px;
}
#up{
width:770px;
height:40px;
margin:auto;
margin-top:10px;
}
</style>
</head>

<body>
<div id="content">
<div id="title" align="center">Create a PDF invoice with PHP</div>
<div id="body">
<form action="" method="post" enctype="multipart/form-data">
<div id="body_l">
<div id="name"><input name="company" placeholder="Insert here your Company Name" type="text" /></div>
<div id="name"><input name="address" placeholder="Insert here your Company Address" type="text" /></div>
<div id="name"><input name="email" placeholder="Insert here your Email" type="text" /></div>
<div id="name"><input name="telephone" placeholder="Insert here your telephone number" type="text" /></div>
<div id="name"><input name="number" placeholder="Invoice number" type="text" /></div>
<div id="name"><input name="item" placeholder="Item" type="text" /></div>
</div>
<div id="body_r">
<div id="name"><input name="price" placeholder="Insert here price" type="text" /></div>
<div id="name"><input name="vat" placeholder="Insert here your VAT" type="text" /></div>
<div id="name"><input name="bank" placeholder="Insert the name of your Bank" type="text" /></div>
<div id="name"><input name="iban" placeholder="Insert here your IBAN number" type="text" /></div>
<div id="name"><input name="paypal" placeholder="Insert here your PayPal address" type="text" /></div>
<div id="name"><input name="com" placeholder="Add a comment" type="text" /></div>
</div>
<div id="up" align="center"><input name="file" disabled="disabled" type="file" /></div>
<div id="up" align="center"><input name="submit" style="margin-top:60px;" value="Create your Invoice" type="submit" /><br /><br />

<?php 
if(isset($_POST["submit"]))
{
echo'<a href="invoice.pdf">Download your Invoice</a>';
}
?>
</div>
</form>
</div>
</div>
<div id="footer" align="center">Created by <a href="http://skymbu.info/" target="_blank">Skymbu</a></div>
</body>
</html>
