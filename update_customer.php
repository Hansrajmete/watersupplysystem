<?php
include 'adminheader.php'
?>
<!-- Main containt -->

<div class="container">
  <div class="main">

<?php

include_once("Config.php");

$res = $pro->findOne(array('Customer.U_name' => $_GET['username']));
	
//echo "<h1><p style='color:#000099; font-size=50px'> Hello ".$res['Customer']['F_name']." ".$res['Customer']['L_name']."</p></h1><br>";

?>




<form method="post">
  <table class="table" border="0">
    <tbody>
      <tr>
        <td>Firstname :</td>
        <td><input type="text" name="F_name" value="<?php echo $res['Customer']['F_name']; ?>"></td>
      </tr>
    
    
      <tr>
      <td>Lastname :</td>
       <td><input type="text" name="L_name" value="<?php echo $res['Customer']['L_name']; ?>"></td>
      </tr>
          
          <tr>
      <td>User Name :</td>
      <td><?php echo $res['Customer']['U_name']; ?></td>
       
      </tr>

      <tr>
        <td>Contact Number :</td>
        <td><input type="number" name="M_number"  maxlength="10" minlength="10" value="<?php echo $res['Customer']['M_number']; ?>"></td>
      </tr>

      <tr>
        <td>Email :</td>
        <td><input type="email" name="email" value="<?php echo $res['Customer']['email']; ?>"></td>
      </tr>

      <tr>
        <td>Address :</td>
        <td><textarea  minlength=20 name="address"><?php echo $res['Customer']['address']; ?> </textarea></td>
      </tr>
         

    <?php
      if($_GET['from']=='profile')
      {
      	?>
      	   <tr>
        <td>Pending Amount :</td>
        <td>
        <?php 
        if($res['Customer']['U_name']=="admin")
        {
          ?>
          <input type="text" name="P_amt" value=<?php echo $res['Customer']['P_amt']; ?>></td>
          <?php
        }
        else {
        
         echo $res['Customer']['P_amt']; 
        }
        ?>



        
      </tr>

      	<?php
      }
   
      else if($_GET['from']=='admin') {

      	?>
        <tr>
        <td>Pending Amount :</td>
        <td><input type="text" name="P_amt" value=<?php echo $res['Customer']['P_amt']; ?>></td>
      </tr>

      	<?php
      }
             
    ?>
      




    </tbody>
  </table>
     <center>
       <input class="btn btn-info btn-lg" type="submit" name="update" value="Save" >
       <?php
       if($_GET['from']=='admin')
       {
       	?>
              <a class="btn btn-info btn-lg" href="all_customers.php" > Cancel </a>  </center>
       <?php
       }
       else if($_GET['from']=='profile')
       {
       	?>

        <a class="btn btn-info btn-lg" href="Customer_Pro.php" > Cancel </a>  </center>
        <?php
       }

       ?>
       
  </form>
</div>

  
    
   </div>




<?php



if(isset($_POST["update"]))
  {

  $res = $pro->update(array('Customer.U_name' =>$_GET['username']),array('$set'=>array('Customer.F_name' => $_POST['F_name'], 'Customer.L_name' =>$_POST['L_name'],'Customer.M_number' => $_POST['M_number'],'Customer.email' => $_POST['email'],'Customer.address' => $_POST['address'])));
if($res)
  {
       if($_GET['from']=='profile')
       {
       	echo "<script type='text/javascript'>alert('Your details are updated !'); window.location.href='Customer_Pro.php';</script>";

       }
       else if($_GET['from']=='admin')
       {

    echo "<script type='text/javascript'>alert('Your details are updated !'); window.location.href='all_customers.php';</script>";  
    // header("Location: dashboard.php");
        
        }   
        }
    }

include 'footer.php';
?>
</div>