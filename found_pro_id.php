<?php
include 'header.php'
?>

<div class="container">
  <div class="main">
  <h1 style="color:BLUE"><b></body><center>Our All Products</center></b></h1>
<?php

include_once("Config.php");

$res = $pro->findOne(array('Product.pro_id' => $_SESSION['S_pro_id']));
	$sr='1';
//echo "<h1><p style='color:#000099; font-size=50px'> Hello ".$res['Product']['F_name']." ".$res['Product']['L_name']."</p></h1><br>";

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
  
        <tr>
        <td><?php echo $sr; ?></td>
        <td><?php echo $res['Product']['pro_id'] ?></td>
        <td><?php echo $res['Product']['pro_name']; ?></td>
        <td><?php echo "Rs.".$res['Product']['price']; ?></td>
        <td><?php echo $res['Product']['available']; ?><a class="btn btn-info btn-lg"  href="add_available.php?product=<?php echo $res['Product']['pro_id'];  ?>" > add </a></td>
        <td><?php echo $res['Product']['details']; ?></td>
        <td><a class="btn btn-info btn-lg" href="update_product.php?product=<?php echo $res['Product']['pro_id'];  ?>" > Edit </a>
</td>

        </tr>
          
    </tbody>
    </thead>
  </table>
</div>