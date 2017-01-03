<?php
include('adminheader.php');
include_once('Config.php');
$res=$pro->find();
date_default_timezone_set("Asia/Kolkata");
$from = new DateTime($_GET['from']);
$to = new DateTime($_GET['to']);
	

	include "libchart/libchart/classes/libchart.php";

	$chart = new VerticalBarChart();

	$dataSet = new XYDataSet();
	$temp=array('$group' => array('_id' => '$Order.date','total' => array('$sum' => '$Order.total_bill') ) );
		$out = $pro->aggregate($temp);
		
		
	if($from>$to)
	{
				echo "<script type='text/javascript'>alert('Invalid range of Date'); window.location.href='graph.php';</script>";

	}
	else if($from==$to){$total=0;
	foreach ($out as $key2 ) {
			foreach ($key2 as $key3 ) {

				if($from->format('d/m/Y')==$key3['_id'])
					{$total=$key3['total'];
				break;}
			}
			
		}

$dataSet->addPoint(new Point($from->format('d-M-y'), $total));
$from->modify('+1 day');
	}
	else{
	do{
		$total=0;



		foreach ($out as $key2 ) {
			foreach ($key2 as $key3 ) {

				if($from->format('d/m/Y')==$key3['_id'])
					{$total=$key3['total'];
				break;}
			}
			
		}

		
		

$dataSet->addPoint(new Point($from->format('d-M-y'), $total));
$from->modify('+1 day');
}while($from!=$to);

		$total=0;
		foreach ($out as $key2 ) {
			foreach ($key2 as $key3 ) {

				if($from->format('d/m/Y')==$key3['_id'])
					{$total=$key3['total'];
				break;}
			}
			
		}
$dataSet->addPoint(new Point($from->format('d-M-y'), $total));
}
	$chart->setDataSet($dataSet);

	$chart->setTitle("Usage for www.WaterCorps.com");
	$chart->render("demo1.png");
	?>

	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Libchart vertical bars demonstration</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>
	<center>
    <label style="color:red; size:45px;"><h2> Sales Graph </h2></label><img alt="Vertical bars chart" src="demo1.png" style="border: 1px solid gray;"/><br><br><br><a class="btn btn-info btn-lg"  href="admin.php">Back To Admin Panel</center>
</body>
</html>