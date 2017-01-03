<?php
include 'adminheader.php'
?>
<!-- Main containt -->

<div class="container">
  <div class="main">

<?php

include_once("Config.php");

$res = $pro->findOne(array('Employee.e_id' => $_GET['e_id']));//echo "<h1><p style='color:#000099; font-size=50px'> Hello ".$res['Customer']['F_name']." ".$res['Customer']['L_name']."</p></h1><br>";

?>




<form method="post">
  <table class="table" border="0">
    <tbody>
    <tr>
        <td>EmployeeID :</td>
        <td><?php echo $res['Employee']['e_id']; ?></td>
      </tr>
      <tr>
        <td>Firstname :</td>
        <td><input type="text" name="F_name" value="<?php echo $res['Employee']['F_name']; ?>"></td>
      </tr>
    
    
      <tr>
      <td>Lastname :</td>
       <td><input type="text" name="L_name" value="<?php echo $res['Employee']['L_name']; ?>"></td>
      </tr>
          

      <tr>
        <td>Contact Number :</td>
        <td><input type="number" name="M_number" maxlength="10" minlength="10" value="<?php echo $res['Employee']['M_number']; ?>"></td>
      </tr>

      <tr>
        <td>Email :</td>
        <td><input type="email" name="email" value="<?php echo $res['Employee']['email']; ?>"></td>
      </tr>

      <tr>
        <td>Address :</td>
        <td><input type="textarea" minlength=10 name="address" value="<?php echo $res['Employee']['address']; ?> "></td>
      </tr>
      

      <tr>
        <td>Salary :</td>
        <td><input name="salary" value="<?php echo $res['Employee']['salary']; ?>"></td>
      </tr>
      

      <tr>
        <td>Designation :</td>
        <td><input name="designation"  minlength=5 value="<?php echo $res['Employee']['designation']; ?>"></td>
      </tr>
      

      <tr>
        <td>Department :</td>
        <td><input name="department" value="<?php echo $res['Employee']['department']; ?>"></td>
      </tr>
      
      
  

    </tbody>
  </table>
     <center>
       <input class="btn btn-info btn-lg" type="submit" name="update" value="Save" >
       <?php
       if($_GET['from']=='admin')
       {
       	?>
              <a class="btn btn-info btn-lg" href="all_employees.php" > Cancel </a>  </center>
        <?php
      }
        ?>
       
  </form>
</div>

  
</div>




<?php



if(isset($_POST["update"]))
  {

  $res = $pro->update(array('Employee.e_id' => $_GET['e_id']),array('$set'=>array('Employee.F_name' => $_POST['F_name'], 'Employee.L_name' =>$_POST['L_name'],'Employee.M_number' => $_POST['M_number'],'Employee.email' => $_POST['email'],'Employee.address' => $_POST['address'],'Employee.salary' => $_POST['salary'],'Employee.designation' => $_POST['designation'],'Employee.department' => $_POST['department'])));
if($res)
  {
       if($_GET['from']=='admin')
       {

    echo "<script type='text/javascript'>alert('Your details are updated !'); window.location.href='all_employees.php';</script>";  
    // header("Location: dashboard.php");
        
        }   
    }
  }

include 'footer.php';
?>
</div>