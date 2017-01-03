<?php


session_start();


// connect to mongodb
   $m = new MongoClient();
  $db=$m->Water_System;

  $pro=$db->MainWater;
  $img=$db->images; 

  

?>