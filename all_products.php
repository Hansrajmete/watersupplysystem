<?php
include 'adminheader.php'
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
 <form action="addpro.php">
    <label style="color:red; size:45px">Click here to Add New Product <b>:-></b>
  <input class="btn btn-info btn-lg" type="submit" name="add_customer" value="Add new Product"></label>
 </form>
 </center>
 


<br>
<br>
  <table class="table" border="3px">
    <thead>
    <tr style="color:GREEN">
        <th >Sr. No.</th>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Price per product</th>
        <th style="width:100px">available</th>
        <th>Details</th>
        <th> Edit </th>
        <th> Delete Product</th> 
    </tr>
       <tbody>


         <?php
         foreach ($cursor as $res)
                          {
          if($res['Product']){
                          
         ?>
        <tr>
        <td><?php echo $sr; ?></td>
        <td><?php echo $res['Product']['pro_id'] ?></td>
        <td><?php echo $res['Product']['pro_name']; ?></td>
        <td><?php echo "Rs.".$res['Product']['price']; ?></td>
        <td style="width:100px"><?php echo $res['Product']['available']." "; ?><a class="btn btn-info btn-lg"  href="add_available.php?product=<?php echo $res['Product']['pro_id'];  ?>" > add </a></td>
        <td><?php echo $res['Product']['details']; ?></td>
        <td>
        <a class="btn btn-info btn-lg" href="update_product.php?product=<?php echo $res['Product']['pro_id'];  ?>" > Edit </a>

         </td>
         <td>
                    <a class="btn btn-info btn-lg" onclick="return confirm('Are you sure you want to delete this item?');" href="deletepro.php?pro_id=<?php echo $res['Product']['pro_id']; ?>&from=admin" > Delete </a>

         </td>

        </tr>
      <?php
       $sr++;
     }
       }
       
       ?>
     
    </tbody>
    </thead>
  </table>
</div>




</body>
</html>
