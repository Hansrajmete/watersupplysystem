<?php

//require_once("dbcontroller.php");
//$db_handle = new DBController();
if(!empty($_POST['U_name'])) {
                     include_once("Config.php");  //connect to data base to take F_name and L_name

                     $res = $pro->findOne(array('Customer.U_name' =>$_POST['U_name']));

//$result = mysql_query("SELECT count(*) FROM users WHERE userName='" . $_POST["username"] . "'");
//$row = mysql_fetch_row($result);
//$user_count = $row[0];

if($res)
{

 echo "<span class='status-not-available'><h3 style='color:#ff0000'> Username Not Available.</h3></span>";
      
}
else echo "<span class='status-available'> <h3>Username Available.</h3></span>";
}
?>
