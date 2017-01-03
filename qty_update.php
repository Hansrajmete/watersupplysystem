<?php

session_start();

include_once("Config.php");
$res = $pro->findOne(array('Product.pro_id' => $_POST['pro_id']));
	if($_POST[$_POST['qtynum']]<1)
	{echo "<script type='text/javascript'>alert('Invalid!! '); history.back();</script>";}
	else if($_POST[$_POST['qtynum']]>$res['Product']['available'])
	{echo "<script type='text/javascript'>alert('Stock not much available!! '); history.back();</script>";}
	else
	{
		$_SESSION[$_POST['pro_id']]['2']=$_POST[$_POST['qtynum']];
		if($res)
			{echo "<script type='text/javascript'>alert('Updated!! '); history.back();</script>";}
	}
  

    ?>