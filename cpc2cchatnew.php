<?php

date_default_timezone_set("America/Toronto");

$toid = $_GET['toid'];
$fromid = $_GET['fromid'];
$lppassetid = $_GET['lppassetid'];
$subject = $_GET['subject'];
$description = $_GET['description'];

$item[1] = $toid;
$item[2] = $fromid;
$item[3] = $lppassetid;
$item[4] = $subject;
$item[5] = $description;
$item[6] = date("Y-m-d H:i:s");

include 'c2ccommon.php';

$obj = new c2cchat();

$obj->setc2cdbconnection();

$res = $obj->createc2cchatnew($item);

$obj->dropc2cdbconnection();


?>

