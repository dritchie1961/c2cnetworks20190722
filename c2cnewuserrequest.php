<?php

date_default_timezone_set("America/Toronto");

$x[0] =	$_GET["peoplefirstname"];
$x[1] =	$_GET["peoplelastname"];
$x[2] =	$_GET["peopleregion"];
$x[3] =	$_GET["peoplecountry"];
$x[4] =	$_GET["peopleprovstate"];
$x[5] =	$_GET["peoplecity"];
$x[6] =	$_GET["peopleaddress1"];
$x[7] =	$_GET["peopleaddress2"];
$x[8] =	$_GET["peoplepostalcodezip"];
$x[9] =	$_GET["peoplephonenumber1"];
$x[10] = $_GET["peopleemailaddress1"];

include 'c2ccommon.php';
$obj = new c2cuserrequest();
$obj->setc2cdbconnection();

$obj->createuserrequest($x);

$obj->dropc2cdbconnection();
    
echo("done");

exit;
    

?>