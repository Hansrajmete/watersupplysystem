<?php
include_once ('adminheader.php');
?>
<!-- Main containt -->

<div class="container">
  <div class="main">

<?php

//include_once("Config.php");

//$res = $mp->findOne(array('Product.pro_id' => $_GET['product']));
	
//echo "<h1><p style='color:#000099; font-size=50px'> Hello ".$res['Product']['F_name']." ".$res['Product']['L_name']."</p></h1><br>";

?>




<form method="POST" enctype="multipart/form-data">
  <table class="table" border="0">
    <tbody>
      <tr>
        <td>Product ID:</td>
        <td><input type="text" name="pro_id" value="" required></td>
      </tr>
    
    
      <tr>
      <td>Product Name :</td>
       <td><input type="text" name="pro_name" value="" required></td>
      </tr>
          
       <tr>
      <td>Product type :</td>

        <td><select name="pro_type"  required>
              <option disabled selected>select product type</option>

              <option name="jarandcan" id="jarandcan">Jar And Cans</option>
              <option name="bottle" id="bottle">Bottles</option>
              <option name="pouch" id="pouch">Pouch</option>
              <option name="tanker" id="Tanker">Tanker</option>
              <option name="purifier" id="purifier">Purifier</option>
              <option name="distiller" id="distiller">Distiller</option>
        </select></td>    

       
      </tr>
  

        <tr>
      <td>Upload Product Image :</td>
       <td><input type="file" name="pic" id="pic" required></td>
      </tr>

       <tr>
      <td>Price per Product(Rs.) :</td>
      <td><input type="number" min="0" name="price" value="" required></td> 
      </tr>

       <tr>
      <td>Available Products :</td>
       <td><input type="text" min="0" name="available" value="" required> only</td>
      </tr>


      <tr>
        <td>Details :</td>
        <td><textarea name="details" required></textarea>   </td>
      </tr>


    </tbody>
  </table>
     <center>
       <input class="btn btn-info btn-lg" type="submit" name="add" value="add" >
       
       <a class="btn btn-info btn-lg" href="all_products.php" > Cancel </a>  </center>
       
       
  </form>
</div>

  
    
   </div>




<?php




if(isset($_POST["add"]))
  {
    if(isset($_POST["pro_type"]))
  
{

  $m = new MongoClient();
//$gridfs = $m->selectDB('Water_System')->getGridFS();

//$res2=$gridfs->storeUpload('pic', array('pro_id' => $_POST['pro_id']));
  $db=$m->Water_System;
  
  $MW=$db->createCollection("MainWater");
  //$img=$db->createCollection("images");


$res = $MW->insert(array('Product'=>array('pro_id' => $_POST['pro_id'], 'pro_name' =>$_POST['pro_name'],'pro_type' => $_POST['pro_type'],'price' => $_POST['price'],'details' => $_POST['details'],'available' => $_POST['available'])));




    $i=$db->images;
    $im=file_get_contents($_FILES['pic']['tmp_name']);
       
	$res2=$i->insert(array("pro_id"=>$_POST['pro_id'] ,"image"=>base64_encode($im)));
   
   if($res2 && $res)
   {
	echo "<script type='text/javascript'>alert('Product Successfully added.!'); window.location.href='all_products.php';</script>";
    }
 else
    {
  echo "<script type='text/javascript'>alert('Unable to add,Something went wrong.!'); </script>";
    }


  
}

 else
{            echo "<script type='text/javascript'>alert('Select Product Type');</script>";

}
  //$grid=$img->getGridFS();

//$res2=$grid->storeUpload($_POST['pro_img'], array('pro_id' => $_POST['pro_id']));

//$res2=$grid->storeFile($_POST['pro_img']);
    

}
  

include 'footer.php';
?>
