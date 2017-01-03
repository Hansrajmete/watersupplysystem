<?php

include_once('Config.php')
// construct map and reduce functions
$map =new MongoCode("function() { emit($pro->TempAdminBill(array('customer')),$pro->AdminOrder(array('price')); }");

$reduce = new MongoCode("function(k, vals) { ".
    "var sum = 0;".
    "for (var i in vals) {".
        "sum += vals[i];". 
    "}".
    "return sum; }");





db.order.mapReduce(mapFunction1, reduceFunction1, {query: {status: "A" },
      out:  "order_totals"});








$sales = $pro->command(array(
    , 
    "map" => $map,
    "reduce" => $reduce,
    "query" => array("" => "sale"),
    "out" => array("merge" => "eventCounts")));





$users = $db->selectCollection($sales['result'])->find();

foreach ($users as $user) {
    echo "{$user['_id']} had {$user['value']} sale(s).\n";
}

?>