<?php
include ("adminheader.php");
include_once("Config.php");

if(isset($_POST["add_to_bill"]))
{

         $res2 = $pro->findOne(array('TempAdminBill.pro_name' => $_POST['selected_products']));

       if(!$_POST['selected_products'])
       {
         echo "<script type='text/javascript'>alert('Please Select Item'); window.location.href='select_pro.php';</script>"; 

       }
       else if($res2)
       {
        echo "bfjkbkfdj";
                $add_qty=$res2['TempAdminBill']['quantity'] + $_POST['qty'];
            $pro->update(array('TempAdminBill.pro_name' => $_POST['selected_products']),array('$set'=>array('TempAdminBill.quantity' => $add_qty)));
            echo "<script type='text/javascript'>alert('Item already exists hence Quantity Updated'); window.location.href='select_pro.php';</script>";

       }
       else
       {

        $res = $pro->findOne(array('Product.pro_name' => $_POST['selected_products']));
          if($_POST['qty']<1)
           {
            echo "<script type='text/javascript'>alert('Invalid!! '); history.back();</script>";}
         else if($_POST['qty']>$res['Product']['available'])
           {
            echo "<script type='text/javascript'>alert('Stock not much available!! '); history.back();</script>";
          }
        else{
          $res1 = $pro->findOne(array('Product.pro_name' =>$_POST['selected_products']));

              if($res1)
           {
     //echo $_POST['qty'];
            $res=$pro->insert(array('ab'=>'1','TempAdminBill'=>array('customer'=>$_SESSION['customer_type'],'pro_id'=> $res1['Product']['pro_id'],'pro_name' => $_POST['selected_products'],'quantity' => $_POST['qty'],'price' => $res1['Product']['price'])));

                 if($res):
                      echo "<script type='text/javascript'>alert('Item Added to Bill'); window.location.href='select_pro.php';</script>";  
        
               endif;
   }
 }

 }

}


	$total_bill='0';

	include_once("Config.php");

$cursor = $pro->find(array());
	$sr='1';
   ?>
   
   
<table>
<tr>

  <td>  <h3>Name :</td></h3> 
  <td><h3><?php echo $_SESSION['customer_type']; ?></h3> </td>
  </tr>

  <br>

  <tr>
  <td><h3>Date : </td></h3> 
  <td><h3><?php echo date("d-m-Y"); ?></h3></td>
  
  
  </tr>
  </table>

  

<br>

  <table class="table" border="3px">
    <thead>
    <tr style="color:GREEN">
        <th>Sr. No.</th>
        <th>Item Name</th>
        <th>Price per product</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Remove</th>
        
    </tr>
       <tbody>
         <?php
         foreach ($cursor as $res)
                          {
                   
                     if($res['TempAdminBill'])
                     {


          ?>
        <tr>
        <td><?php echo $sr; ?></td>
        <td><?php echo $res['TempAdminBill']['pro_name'] ?></td>
        <td><?php echo "Rs.".$res['TempAdminBill']['price']; ?></td>
        <td><?php echo $res['TempAdminBill']['quantity']; ?></td>
        
          <?php $total=$res['TempAdminBill']['price'] * $res['TempAdminBill']['quantity'] ?>
        <td><?php echo "Rs.".$total; ?></td>
        <td><a class="btn btn-info btn-lg" href="adremove.php?Rpro_id=<?php echo $res['TempAdminBill']['pro_id'];  ?>&from=admin" > delete </a></td>
        </tr>
      <?php
        $total_bill=$total_bill + $total;
       $sr++;
       }    
      }
       ?>
     
    </tbody>
    </thead>
  </table>
  
  <center>
          
          <br>
          <form method="GET" action="select_pro.php"><input type="submit"  name="more" id="more" value="Add More item" style="font-size:15pt;color:white;background-color:#00ccff;" ></form>

          <br>

 <h2 style="background-color:#ffffff;">
   <?php
      echo "Total Bill Rs. ".$total_bill." only";

      ?>
      </h2>
      </center>
      <?php
      $till_bill=0; 
        if($_SESSION['Customer_Type']=='Daily')
        {

          $p_res=$pro->findOne(array('Customer.U_name'=> $_SESSION['customer_type']));
           
           $till_bill=$p_res['Customer']['P_amt'] + $total_bill;
          ?>
           <br>
        <p style="color:GREEN; font-size:20px;background-color:#ffffff;">You have Pending Amount =Rs. <?php echo $p_res['Customer']['P_amt']; ?></p>
        <br>

        <p style="color:GREEN; font-size:20px;background-color:#ffffff;">Hence You Have To Pay Amount = Rs. <?php echo $till_bill; ?></p>
 

          <?php
            //echo "You Have Pending Amount = ".$p_res['Customer']['P_amt'];
        }


        
    



if($_SESSION['Customer_Type']=='Daily')
{

?>
</h1>
<br>

<form methed="GET">
<label style="font-size:25px">
 Enter Amount Payed By Customer :<input type="number" name="pay" value="0">
 <input type="hidden" name="till_bill" value="<?php echo $till_bill; ?>">
  <input type="submit" name="payed" value="Taken">
</form>  
</label>
<br>
<br>
<?php
  }

  if($_SESSION['Customer_Type']=='General')
  {
    ?>

     <center><form method="GET">
     <input type="submit" name="payed" value="Payed" style="font-size:15pt;color:white;background-color:#00ccff;">
     </form>
     </center>
    
     <?php
  }






    if($_GET['payed'] == 'Payed')
   {
        
      
         echo "<script type='text/javascript'>alert('Please Collect your Items');window.location.href='adminbill.php';</script>";  
       
   } 



  if( $_GET['payed']=='Taken' )
  {
   
   /* if($_GET['till_bill']==$_GET['pay'])
       {
         
         $p_res=$mc->findOne(array('Customer.U_name'=> $_SESSION['customer_type']));
        echo "hellllllllll";
           echo "<script type='text/javascript'>alert('Please Collect your Items');window.location.href='admin.php';</script>";

       }*/
  
     // echo "in bill updatee";
       


       if($_GET['pay']<= $_GET['till_bill'] )
       {
              $remaning=$_GET['till_bill'] - $_GET['pay'];
             
               $p_res=$pro->findOne(array('Customer.U_name'=> $_SESSION['customer_type']));

$update_res=$pro->update(array('Customer.U_name' => $_SESSION['customer_type']),array('$set'=>array('Customer.P_amt'=> $remaning))); 
              
               if($update_res)
               {
                 echo "<center><h2 >Now You Have Pending Amount =Rs. ".$remaning."Updated in Account</h2></center>";
                   
               echo "<script type='text/javascript'>alert('remaning Amount Updated in Respective Account');window.location.href='adminbill.php';</script>";
             }

         }
         else
         { 
          echo "<script type='text/javascript'>alert('Paying amount should be Equal or less than total amount pay');window.location.href='select_pro.php';</script>";

         }    
  }
?>