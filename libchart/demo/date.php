<?php

$date = new DateTime($input_date);
$date->modify('+1 day');
echo $date->format('Y-m-d');
?>