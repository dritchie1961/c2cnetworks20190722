<?php

date_default_timezone_set("America/Toronto");


$x[0] =	$_GET["peopleid"];
$x[1] =	$_GET["peoplepassword"];

include 'c2ccommon.php';
$obj = new c2cpeople();
$obj->setc2cdbconnection();

$b = $obj->changepeoplepassword($x);

$obj->dropc2cdbconnection();

echo($b);

exit;

?>