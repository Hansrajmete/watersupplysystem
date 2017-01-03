<?php
include_once ('adminheader.php');
?>
<!-- Main containt -->

<div class="container">
  <div class="main">

<?php

include_once("Config.php");

$res = $pro->findOne(array('Product.pro_id' => $_GET['product']));
	
//echo "<h1><p style='color:#000099; font-size=50px'> Hello ".$res['Product']['F_name']." ".$res['Product']['L_name']."</p></h1><br>";

?>




<form method="post">
  <table class="table" border="0">
    <tbody>
      <tr>
        <td>Product ID:</td>
        <td><input readonly type="text" name="pro_id" value="<?php echo $res['Product']['pro_id']; ?>"></td>
      </tr>
    
    
      <tr>
      <td>Product Name :</td>
       <td><input type="text" name="pro_name" value="<?php echo $res['Product']['pro_name']; ?>"></td>
      </tr>
          


          <tr>
        <td>Product Type :</td>
        <td><select name="pro_type" value="<?php echo $res['Product']['pro_type']; ?>">
              <option disabled selected>select product type</option>
              <option name="jarandcan" id="jarandcan">Jar And Cans</option>
              <option name="bottle" id="bottle">Bottles</option>
              <option name="pouch" id="pouch">Pouch</option>
              <option name="tanker" id="Tanker">Tanker</option>
              <option name="purifier" id="purifier">Purifier</option>
              <option name="distiller" id="distiller">Distiller</option>
        </select> </td>
      </tr>


       <tr>
      <td>Price per Product(Rs.) :</td>
      <td><input type="text" name="price" value="<?php echo $res['Product']['price']; ?>"></td> 
      </tr>

       <tr>
      <td>Available Products :</td>
       <td><input type="text" name="available" value="<?php echo $res['Product']['available']; ?>"> only</td>
      </tr>


      <tr>
        <td>Details :</td>
        <td><textarea name="details"><?php echo $res['Product']['details']; ?></textarea>   </td>
      </tr>



    </tbody>
  </table>
     <center>
       <input class="btn btn-info btn-lg" type="submit" name="update" value="Save" >
       <a class="btn btn-info btn-lg" href="all_products.php" > Cancel </a>  </center>
       
       
  </form>
</div>

  
    
   </div>




<?php



if(isset($_POST["update"])){

if(isset($_POST["pro_type"]))
  {

  $res = $pro->update(array('Product.pro_id' =>$_GET['product']),array('$set'=>array('Product.pro_id' => $_POST['pro_id'],'Product.pro_type' => $_POST['pro_type'], 'Product.pro_name' =>$_POST['pro_name'],'Product.price' => $_POST['price'],'Product.details' => $_POST['details'],'Product.available' => $_POST['available'])));
if($res)
  {
        
        echo "<script type='text/javascript'>alert('Your details are updated !'); window.location.href='all_products.php';</script>";
    }
  }
  else{
            echo "<script type='text/javascript'>alert('Select Product Type');</script>";

  }
}
include 'footer.php';
?>
