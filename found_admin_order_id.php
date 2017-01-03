<?php
error_reporting(0);
session_start();
include('header.php');
include('Config.php');
$res = $mab->findOne(array('Order.order_no' => (int)$_SESSION['order_no']));
$i=1;
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Coustomer Order Found</title>
        
<style>

.cards_wrapper {
  font-family: "Roboto", sans-serif;
}

.card {
  width: 80%;
  margin: 0 auto 5px;
  cursor: pointer;
}
.card .card_description {
  border-radius: 5px;
  height: 60px;
  display: flex;
  justify-content: flex-start;
  align-items: center;
  transition: border-radius 0.6s ease-in-out;
  box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.2);
}
.card .card_description .date,
.card .card_description .title {
  color: rgba(255, 255, 255, 0.8);
  font-size: 20px;
}
.card .card_description .date {
  margin: 0 40px 0 20px;
}
.card.today .card_description {
  background-color:#8080ff;
}
.card.tomorrow .card_description {
  background-color: #EF6C00;
}

.card.unfolded .top {
  animation: unfold_top 0.6s ease-in-out;
}
.card.unfolded .bottom {
  animation: unfold_bottom 0.6s ease-in-out;
}
.card.unfolded .card_description {
  border-radius: 5px 5px 0 0;
}

.card.folded .top {
  animation: fold_top 0.6s forwards ease-in-out;
}
.card.folded .bottom {
  animation: fold_bottom 0.6s forwards ease-in-out;
}

.top,
.bottom {
  position: relative;
  overflow: hidden;
  height: 50px;
  background-color: #fff;
  box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.2);
}

.bottom {
  border-radius: 0 0 5px 5px;
}

.alarm_item {
  display: flex;
  align-items: center;
}
.alarm_item .time_block {
  margin-left: 20px;
}
.alarm_item .day_part {
  font-size: 10px;
  margin: 0 25px 0 5px;
  color: #798384;
}
.alarm_item .time {
  padding: 10px;
  border-radius: 3px;
  color: #fff;
  background-color: #03a9f4;
}
.alarm_item .alarm_item_description {
  color: #798384;
}

@keyframes fold_top {
  100% {
    transform-origin: top;
    transform: perspective(100px) rotateX(-10deg);
    height: 0;
  }
}
@keyframes fold_bottom {
  100% {
    transform-origin: bottom;
    transform: perspective(100px) rotateX(10deg);
    height: 0;
  }
}
@keyframes unfold_top {
  0% {
    transform-origin: top;
    height: 0;
    transform: perspective(100px) rotateX(-10deg);
  }
  100% {
    transform: perspective(100px) rotateX(0deg);
    height: 40px;
  }
}
@keyframes unfold_bottom {
  0% {
    transform-origin: bottom;
    height: 0;
    transform: perspective(100px) rotateX(10deg);
  }
  100% {
    transform: perspective(100px) rotateX(0deg);
    height: 40px;
  }
}

</style>

    
   
    
  </head>

  <body translate="no" >


    <div class="special">
        <div class="container">
            <h3>Order Found</h3>
        </div>
    </div>
</div>
<center>
<table class="table" style="width:80%; ">
<tr >
<th >SR.NO</th>
<th >Order ID</th>
<th >Date</th>
<th >Amount</th>
<th >Status</th>
<th >Print Bill</th>
</tr>
</table>
</center>

<?php
if($_SESSION['U_name']=='admin')
{ 
  $j=1;
?>


<div class="cards_wrapper">
  <div class="card folded today">
    <div class="card_description">
      <div class="date" ><?php echo $i++?></div>
      <div class="title" style="padding:0px 0px 0px 75px;"><?php echo $res['Order']['order_no'] ?></div>
      <div class="title" style="padding:0px 0px 0px 75px;"><?php echo $res['Order']['date'] ?></div>
      <div class="title" style="padding:0px 70px;">₹ <?php echo $res['Order']['total_bill'] ?></div>
      <div class="title" style="padding:0px 40px;"><?php echo $res['Order']['status'] ?></div>
      <?php if($key['Order']['status']=="unpaid")
      { ?>

      <div class="title" style="padding:0px 40px;  " ><a href="invoice.php?oid=<?php echo $res['Order']['order_no']?>">Unavailabe</a></div>
      <?php
      }
      else
      {
        ?>
      <div class="title" style="padding:0px 40px;  " ><a href="invoice.php?oid=<?php echo $res['Order']['order_no']?>">Generate Invoice</a></div>
        <?php
      }
      ?>

    </div>
    <?php
    $prod=$res['Order']['products'];
    foreach ($prod as $temp) {
     ?>
    <div class="alarm_item bottom">
      <div class="time_block">
        <div class="time"><?php echo $j++ ?></div>
      </div>
      <div class="alarm_item_description" style="padding:0px 0px 0px 55px; "><?php echo $temp['pro_name'] ?></div>
      <div class="alarm_item_description" style="padding:0px 0px 0px 55px; ">Price each ₹ <?php echo $temp['price'] ?></div>
      <div class="alarm_item_description" style="padding:0px 0px 0px 55px; ">Qty : <?php echo $temp['quantity'] ?></div>
    </div>
    <?php
  }
  ?>
  </div> 
</div>
    
    
    <?php
  }
    ?>


        <script>
      'use strict';

$('.card').on('click', function (e) {
  $(this).toggleClass('folded unfolded');
});
      //# sourceURL=pen.js
    </script>

    <br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br>
    
    <?php
include ('footer.php');
?>
  </body>
</html>
 

