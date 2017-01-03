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
 <form action=search_U_name.php method="post">
    <label>Enter User Name of Customer :
 	<input type="text" name="search" >
 	<input class="btn btn-info btn-lg" type="submit" value="Search"></label>
 	<label>(To Display all Customer search by 'all')</label>
 </form>
 <form action="register.php">
    <label style="color:red; size:45px;">Click here to Add New Customer Account <b>:-></b>
 	<input class="btn btn-info btn-lg"  type="submit" name="add_customer" value="Add new Daily Customer"></label>
 </form>
 </center>






 
   
   <div class="main">
  <h1 style="color:BLUE"><center>Our Daily Customers</center></h1>   

  <table class="table" border="3px">
    <thead>
    <tr  style="color:GREEN">
        <th>Name</th>
        <th>User Name</th>
        <th>Mobile Number</th>
        <th>Email</th>
        <th>Address</th>
        <th>Pending Amount</th>
        <th>Update Customer Details </th>
        <th> To Delete Customer</th>
    </tr>
    </thead>
       <tbody>
         <?php
         foreach ($cursor as $res)
                          { 

          if($res['Customer']){
                          	

         ?>
        <tr >
        <form >
        <td><?php echo $res['Customer']['F_name']." ".$res['Customer']['L_name'] ?></td>
        <td><?php echo $res['Customer']['U_name']; ?></td>
        <td><?php echo $res['Customer']['M_number']; ?></td>
        <td><?php echo $res['Customer']['email']; ?></td>
        <td><?php echo $res['Customer']['address']; ?></td>
        <td><?php echo "Rs.: ".$res['Customer']['P_amt']; ?></td>
        <td>
        <a class="btn btn-info btn-lg" href="update_customer.php?username=<?php echo $res['Customer']['U_name'];  ?>&from=admin" > update </a>
         </td>
         <td>
        <a class="btn btn-info btn-lg" onclick="return confirm('Are you sure you want to delete this item?');" href="delete_customer.php?username=<?php echo $res['Customer']['U_name'];  ?>&from=admin" > delete </a>
         </td>
           
      
        </tr>
      <?php
       }}
       ?>
     
    </tbody>
    
  </table>
</div>
</div>


        



