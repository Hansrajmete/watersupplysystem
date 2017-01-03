<?php

//require_once("dbcontroller.php");
//$db_handle = new DBController();
if(!empty($_POST['e_id'])) {
                     include_once("Config.php");  //connect to data base to take F_name and L_name

                     $res = $pro->findOne(array('Employee.e_id' =>$_POST['e_id']));

//$result = mysql_query("SELECT count(*) FROM users WHERE userName='" . $_POST["username"] . "'");
//$row = mysql_fetch_row($result);
//$user_count = $row[0];

if($res)
{

 echo "<span class='status-not-available'><h3 style='color:#ff0000'> ID Not Available.</h3></span>";
      
}
else echo "<span class='status-available'> <h3>Emp ID Available.</h3></span>";
}
?>
