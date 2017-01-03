<?php
include 'header.php'
?>

<div class="container">
  <div class="main">
  <h1 style="color:BLUE"><b></body><center>Our All Products</center></b></h1>
<?php

include_once("Config.php");

$cursor = $pro->find(array());
	$sr='1';

?>
<center>
 <form action=search_pro_id.php method="post">
    <label>Enter Product ID of Product :
  <input type="text" name="search" >
  <input class="btn btn-info btn-lg" type="submit" value="Search"></label>
  <label>(To Display all Products search by 'all')</label>
 </form>
 <!--<form action="register.php">
    <label style="color:red; size:45px">Click here to Add New Product <b>:-></b>
  <input class="btn btn-info btn-lg" type="submit" name="add_customer" value="Add new Product"></label>
 </form>-->
 </center>



  <table class="table" border="3px">
    <thead>
    <tr style="color:GREEN">
        <th>Sr. No.</th>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Price per product</th>
        <th>available</th>
        <th>Details</th>
        <th> Edit </th>
        
    </tr>
       <tbody>
         <?php
         foreach ($cursor as $res)
                          {

                          
         ?>
        <tr>
        <td><?php echo $sr; ?></td>
        <td><?php echo $res['Product']['pro_id'] ?></td>
        <td><?php echo $res['Product']['pro_name']; ?></td>
        <td><?php echo "Rs.".$res['Product']['price']; ?></td>
        <td><?php echo $res['Product']['available']." "; ?><a class="btn btn-info btn-lg"  href="add_available.php?product=<?php echo $res['Product']['pro_id'];  ?>" > add </a></td>
        <td><?php echo $res['Product']['details']; ?></td>
        <td>
        <a class="btn btn-info btn-lg" href="update_product.php?product=<?php echo $res['Product']['pro_id'];  ?>" > Edit </a>
         </td>

        </tr>
      <?php
       $sr++;
       }
       
       ?>
     
    </tbody>
    </thead>
  </table>
</div>





<div class="modal fade" id="myModal" role="dialog">
  
    <div class="modal-dialog" position=absolute>
    
      <!-- Modal content-->
      <div class="modal-content">
      <div class="bg-1">
       
        <div class="modal-header">
          <?php
          include_once("Config.php");
            $res = $pro->findOne(array('Product.pro_id' => $_GET['product']));
          ?>
          
          <center><h1 class="modal-title fHead">Update Quantity Availabile for <?php echo $res['Product']['pro_name']; ?> </h1></center>
        </div>
        <div class="modal-body">
        

      <?php
              echo "currently available ".$res['Product']['pro_name']." = ".$res['Product']['available'];

              echo ".To increase Availability Enter Quantity (if want to decrease Quantity enter in negative e.g.if 12 product want to reduce -12) ";
              ?>
              <form method="post">
              <input type="number" name="inc" value="0">
              <input type="submit" name="update" value="Update">
              </form>   
            
              <?php
         if(isset($_POST["update"]))
              {
                //echo "Updatsdvds dfbz".$_POST['inc'];
                $add = $res['Product']['available'] + $_POST['inc'];
                if($add<0)
                {
                echo "<script type='text/javascript'>alert('items should be greater than zero' ); window.location.href='all_products.php';</script>";      
                }
                else
                {

                echo "Updated".$add;
               $updated = $pro->update(array('Product.pro_id' =>$_GET['product']),array('$set'=>array('Product.available' => $add)));

 }
            if($updated)
            {
                echo "<script type='text/javascript'>alert('Quantity of available Product updated !'); window.location.href='all_products.php';</script>";      
            }
             
               
               
               
              }     
      ?>
      
       </div>
        <div class="modal-footer">
           
          <button type="button" href="all_products.php" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

        </div>

        </div>
        </div>
        </div>

        </body>
</html>