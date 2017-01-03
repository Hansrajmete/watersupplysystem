<?php
session_start();



   include_once("Config.php");


   $_SESSION[$_POST['pro_id']]['0']=0;
   $_SESSION[$_POST['pro_id']]['2']=0;
   echo "<script type='text/javascript'>alert('Item Removed From Cart'); history.back()</script>";

?>