<?php
include 'header.php'
?>
<!-- Main containt -->

<div class="container">
  <div class="main">

<?php

include_once("Config.php");

$res = $pro->findOne(array('Customer.U_name' => $_SESSION['U_name']));
	
echo "<h1><p style='color:#000099; font-size=50px'> Hello ".$res['Customer']['F_name']." ".$res['Customer']['L_name']."</p></h1><br>";

?>





  <table class="table" border="0">
    <tbody>
      <tr>
        <td>Firstname :</td>
        <td><?php echo $res['Customer']['F_name'] ?></td>
      </tr>
    
    
      <tr>
      <td>Lastname :</td>
       <td><?php echo $res['Customer']['L_name'] ?></td>
      </tr>

      <tr>
        <td>Contact Number :</td>
        <td><?php echo $res['Customer']['M_number']?></td>
      </tr>

      <tr>
        <td>Email :</td>
        <td><?php echo $res['Customer']['email'] ?></td>
      </tr>

      <tr>
        <td>Address :</td>
        <td><?php echo $res['Customer']['address'] ?></td>
      </tr>

      <tr>
        <td>Pending Amount :</td>
        <td><?php echo "Rs. ".$res['Customer']['P_amt'] ?></td>
      </tr>
    </tbody>
  </table>
</div>
    <center>
        <a class="btn btn-info btn-lg" href="update_customer.php?username=<?php echo $res['Customer']['U_name'];  ?>&from=profile" > update </a>
  
        <a class="btn btn-info btn-lg"onclick="return confirm('Are you sure you want to delete Your Account?');" href="delete_customer.php?username=<?php echo $res['Customer']['U_name'];  ?>&from=profile" > delete </a>
        <a class="btn btn-info btn-lg" href="order_history.php" > Order History </a>
       </center>

  <?php
	/*echo "<p style='font-size:30px'>Full Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ".$res['Customer']['F_name']." ".$res['Customer']['L_name']."<br>";
	echo "Contact Number : &nbsp;".$res['Customer']['M_number']."<br>";

	echo "Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ".$res['Customer']['email']."<br>";
	echo "Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ".$res['Customer']['address']."<br>";
	echo "Pending Ammount: ".$res['Customer']['P_amt']."</p><br>";*/
    

      
   // $cursor=$mc->find(array('Customer.U_name' => $_POST['U_name']));    
    


?>
    
   </div>
</div>


<!-- start of footer -->

<?php
include 'footer.php'
?>
</body>
</html>
