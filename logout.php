<?php
session_start();
session_destroy();
session_start();

$_SESSION['logged']='0';
$_SESSION['U_name']='';
   include_once("Config.php");
$cursor=$pro->find();
foreach ($cursor as $temp) {
  if($temp['Product'])
  {
    
    $_SESSION[$temp['Product']['pro_id']]=array(0,$temp['Product']['price'],0);    //0=notadded,price,quantity
}
}

 echo "<script type='text/javascript'> window.location.href='index.php'</script>";

?>

