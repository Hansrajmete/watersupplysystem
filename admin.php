<?php
include ("adminheader.php");

$res = $pro->findOne(array('Customer.U_name' => $_SESSION['U_name']));
if($res['Customer']['U_name']!="admin")
{
	echo "<script type='text/javascript'>alert('Forbidden '); history.back();</script>";
}
?>

<!--DashBoard start-->
<div  class="container">
  <div class="main">
  <br>
  <h1 style="font-color:BLUE ; font-size:30px"><center><b>DASHBOARD</b></center></h1>
   <br>
     <hr>
   
<center>
<a  href="take_order.php"><img src="images/icon/order.jpg" height="200px" width="250px" ></a>&nbsp &nbsp &nbsp
<a  href="all_products.php"><img src="images/icon/allproducts.jpg" height="200px" width="250px" ></a>&nbsp &nbsp &nbsp
<a  href="all_customers.php"><img src="images/icon/customers.jpg" height="200px" width="250px" ></a>&nbsp &nbsp &nbsp
<a  href="all_employees.php"><img src="images/icon/Employees.jpg" height="200px" width="250px" ></a>

</center>
<br>
<center>
 <a style="font-size:20px" href="take_order.php" >Take Order</a>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<a style="font-size:20px" href="all_products.php" >All Products</a>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<a style="font-size:20px" href="all_customers.php" >All Customers</a>
&nbsp &nbsp &nbsp   &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp<a style="font-size:20px" href="all_employees.php" >All Employees</a>
</center>
  </div>
</div>
<br>
<div  class="container">
  <div class="main">
  
   
  &nbsp &nbsp  <a  href="total_order_history.php"><img src="images/online.png" height="200px" width="250px" ></a>&nbsp &nbsp &nbsp
 &nbsp &nbsp  &nbsp &nbsp<a style="font-size:20px" href="graph.php" ><img src="images/stats.jpg" height="180px" width="250px" ></a>

<br>
  &nbsp &nbsp  &nbsp &nbsp  &nbsp    &nbsp &nbsp<a style="font-size:20px" href="total_order_history.php" >All Orders</a>
  &nbsp &nbsp  &nbsp    &nbsp &nbsp &nbsp  &nbsp    &nbsp &nbsp &nbsp  &nbsp     &nbsp &nbsp &nbsp  &nbsp    &nbsp &nbsp &nbsp &nbsp  &nbsp    &nbsp &nbsp <a style="font-size:20px" href="graph.php" >Graphical Stats</a>
  </div>
</div>


<br>
<br>
<br>
<br>






<!--div class="container">



<button class="btn btn-info btn-lg" style="width:350px; height:100px" onclick="location.href='take_order.php'">
     Take Order</button>
<button class="btn btn-info btn-lg" style="width:350px; height:100px" onclick="location.href='all_products.php'">
     all Products</button>
     <button class="btn btn-info btn-lg" style="width:350px; height:100px" onclick="location.href='all_customers.php'">
     all Customers</button>
      
	
	


</div-->


