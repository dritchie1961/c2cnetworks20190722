<?php

date_default_timezone_set("America/Toronto");

$user = $_COOKIE['peopleuserid'] ;
$pass = $_COOKIE['peoplepassword'] ;

$host = "localhost";
//$user = "dritchie1961";
//$pass = "N0drepus";
$database = "c2cnetworks";
$port = '3306';

$link = mysqli_connect ( $host, $user, $pass , $database, $port) or die ( "unable to connect to MySQL" );

?>
