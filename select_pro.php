<?php
include ("adminheader.php");
include_once("Config.php");

$cursor = $pro->find(array());
?>

<div class="container">
<div class="main" style="font-family:Times New Roman ;font-size:20px">

   <?php
   //session_start();
               echo "<h1>Take Order for Customer ".$_SESSION['customer_type']."</h1>";

          ?>
            
             <form method="POST" action="bill.php">

                <table class="table" border="0px">
                <tr>
                 <td><label>Products:</label></td>
                 <td><select style="font-size:25px"  name="selected_products">
                 <option  value="" disabled selected>select products</option>
            <?php
               foreach ($cursor as $res)
                          { 
                            if($res['Product']){                            
            ?>
             <option value="<?php echo $res['Product']['pro_name'];  ?>"><?php echo $res['Product']['pro_name'];  ?></option>
            <?php                 
               }}
          ?> </select></td>
                   </tr>

                   <tr>
                   <td><label>Enter Selected Product Quantity:</label></td>
                    <td><input type='button' name='subtract' onclick='javascript: document.getElementById("qty").value--;if (document.getElementById("qty").value<1) {document.getElementById("qty").value=1}' value='-'/>
      <input type='text' name='qty' id="qty" value="1" style="width: 15%"/>
      <input type='button' name='add' onclick='javascript: document.getElementById("qty").value++;' value='+'/></td>


                   </tr>

                  <tr>
                    <td></td>
                  <td><input class="btn btn-info btn-lg" type="submit" name="add_to_bill" value="Add To Bill"></td>
                  <td><input class="btn btn-info btn-lg" type="submit" name="showbill" value="Show Bill"></td>
                  </tr>
              </form>
               </table>
 
 </div>
</div>