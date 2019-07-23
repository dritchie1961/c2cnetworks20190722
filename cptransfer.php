<?php

date_default_timezone_set("America/Toronto");

$lppassetid = $_GET['lppassetid'];
$nid = $_GET['nid'];
$pid = $_GET['pid'];
$type = $_GET['type'];


$item[1] = $lppassetid;
$item[2] = $nid;
$item[3] = $pid;
$item[4] = $type;
$item[5] = date("Y-m-d H:i:s");



include 'c2ccommon.php';
//$obj = new c2cDB();

$obj = new c2cprovenance();


$obj->setc2cdbconnection();


$res = $obj->createc2cprovenancenew($item);

$obj->dropc2cdbconnection();


?>

