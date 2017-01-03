<?php
include 'adminheader.php'
?>


<div class="container">
  
<?php

include_once("Config.php");

        
$cursor = $pro->find(array());
	
//echo "<h1><p style='color:#000099; font-size=50px'> Hello ".$res['Customer']['F_name']." ".$res['Customer']['L_name']."</p></h1><br>";

?>
 <center>
    <label style="color:red; size:45px;"><h2>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Sales Graph </h2></label>
 <form action=stats.php method="get">
    <label>Enter Range of dates to display Graph : &nbsp &nbsp
  From&nbsp &nbsp <input type="date" name="from" placeholder="from">
  &nbsp &nbsp &nbsp &nbspTo &nbsp &nbsp<input type="date" name="to" placeholder="to">
 	<input class="btn btn-info btn-lg" type="submit" value="Search"></label>
 </form>
 </center>






 
   
   


        



