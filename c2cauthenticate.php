<?php

date_default_timezone_set("America/Toronto");

$peopleuserid = $_GET["peopleuserid"];
$peoplepassword = $_GET["peoplepassword"];

include 'c2ccommon.php';
$obj = new c2cpeople();
$obj->setc2cdbconnection();


$trackingrequest["peopleuserid"] = $peopleuserid;
$trackingrequest["logindate"] = date("Y-m-d H:i:s");

$validateid = $obj->validateidc2cperson($peopleuserid);


if ($validateid == 'id0')
{

    $trackingrequest["status"] = 'login failed - invalid ID';
    $obj->trackingpeopleuserid($trackingrequest);
    $obj->dropc2cdbconnection();
    
    echo("id0");
    exit;    
};

$validatepw = $obj->validatec2cpw($peopleuserid,$peoplepassword);

if ($validatepw == 'pw0')
{

    $trackingrequest["status"] = 'login failed - invalida PW';
    $obj->trackingpeopleuserid($trackingrequest);
    $obj->dropc2cdbconnection();
    
    echo("pw0");
    exit;   
};

$trackingrequest["status"] = 'login successfull';  
$obj->trackingpeopleuserid($trackingrequest);

$peopleid = $obj->selectidc2cperson($peopleuserid);

setcookie("peopleid", $peopleid, time() + (86400 * 1), "/"); // 86400 = 1 day
setcookie("peopleuserid", $peopleuserid, time() + (86400 * 1), "/"); // 86400 = 1 day
setcookie("peoplepassword", $peoplepassword, time() + (86400 * 1), "/"); // 86400 = 1 day

$obj->dropc2cdbconnection();


echo($peopleid);

?>