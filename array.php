<!DOCTYPE html>
<html>
<body>

<?php
$age = array("Peter"=>array("35"=>"21"), "Ben"=>array("35"=>"21"), "Joe"=>array("35"=>"21"));

foreach($age as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value['1'];
    echo "<br>";
}
?>

</body>
</html>