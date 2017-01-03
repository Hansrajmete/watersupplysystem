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
 <form action=search_emp_id.php method="post">
    <label>Enter Employee ID of Employee :
 	<input type="text" name="search" >
 	<input class="btn btn-info btn-lg" type="submit" value="Search"></label>
 	<label>(To Display all Employee search by 'all')</label>
 </form>
 <form action="register_employee.php">
    <label style="color:red; size:45px;">Click here to Add New Employee <b>:-></b>
 	<input class="btn btn-info btn-lg"  type="submit" name="add_employee" value="Add a new Employee"></label>
 </form>
 </center>






 
   
   <div class="main">
  <h1 style="color:BLUE"><center>Our Employees</center></h1>   

  <table class="table" border="3px">
    <thead>
    <tr  style="color:GREEN">
        <th>Emp_ID</th>
        <th>Name</th>
        <th>Mobile Number</th>
        <th>Email</th>
        <th>Address</th>
        <th>Salary</th>
        <th>Designation</th>
        <th>Department</th>
        <th>Update Empoyee Details</th>
        <th>Delete</th>
    </tr>
    </thead>




       <tbody>
         <?php
         foreach ($cursor as $res)
                          { 
                          	if($res['Employee']){

         ?>
        <tr >
        <form >
        <td><?php echo $res['Employee']['e_id']?></td>
        <td><?php echo $res['Employee']['F_name']." ".$res['Employee']['L_name'] ?></td>
        <td><?php echo $res['Employee']['M_number']; ?></td>
        <td><?php echo $res['Employee']['email']; ?></td>
        <td><?php echo $res['Employee']['address']; ?></td>
        <td><?php echo $res['Employee']['salary']; ?></td>
        <td><?php echo $res['Employee']['designation']; ?></td>
        <td><?php echo $res['Employee']['department']; ?></td>
        <td>
        <a class="btn btn-info btn-lg" href="update_employee.php?e_id=<?php echo $res['Employee']['e_id']; ?>&from=admin" > update </a>
         </td>
         <td>
        <a class="btn btn-info btn-lg" onclick="return confirm('Are you sure you want to delete this item?');" href="delete_emp.php?e_id=<?php echo $res['Employee']['e_id']; ?>&from=admin" > Delete </a>
         </td>
        </tr>
      <?php
       }}
       ?>
     
    </tbody>
    
  </table>
</div>
</div>
