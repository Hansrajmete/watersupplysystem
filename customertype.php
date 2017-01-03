<?php

include ("adminheader.php");
include_once('Config.php');
$temp=$pro->find();
?>

<br>
<br>
<center>
<?php
if(isset($_POST["select_cus"]))
{
	//echo "hello";

  if(!$_POST['cus_type'])
  {

     echo "<script type='text/javascript'>alert('Please Select Item'); window.location.href='take_order.php';</script>"; 

  }

    if($_POST['cus_type']=="Daily")
    {
    	echo "<h1>Take Order for  ".$_POST['cus_type']." Customer</h1>";
    	?>
    <br>
   <form action="setcustomer.php" method="POST">
   <label>Select Your unique User Name of Customer :
   <select name="user_type" name="pro_type"  >

       <?php   foreach ($temp as $res) {
            if($res['Customer'])
            {
                if($res['Customer']['U_name']=="admin")
                {
                  continue;
                }
              ?>
              <option ><?php echo $res['Customer']['U_name']?></option>
              <?php
            }
          }?>
        </select>
   <input type="hidden" name="User_Type" value="Daily">
   <input type="submit" name="select"  value="Take Order">
   </label>
   </form>
   
    	<?php
          
    }
    if($_POST['cus_type']=="General")
    {
    	echo "<h1>Take Order for  ".$_POST['cus_type']." Customer</h1>";
    	
      ?>
   <br>
   <form action="setcustomer.php" method="POST">
   <label>Enter Customer Name :
   <input type="text" name="user_type" value="">
   <input type="hidden" name="User_Type" value="General">
   <input type="submit" name="select" value="Take Order" >
   </label>
   </form>
   </center>

   <?php
    }

   ?>
   
   <?php
}

?>