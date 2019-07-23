<?php

require ("../codebase/connector/grid_connector.php");
require ("../codebase/connector/db_mysqli.php");

require ("accommon.php");


//date_default_timezone_set("America/Toronto");

//$host = "localhost";
//$user = "dritchie1961";
//$pass = "N0drepus";

//$database = "c2cnetworks";
//$port = '3306';

//$link = mysqli_connect ( $host, $user, $pass , $database, $port) or die ( "unable to connect to MySQL" );
$conn = new GridConnector($link, "MySQLi");

$conn->render_table("c2cnetworks.collector", "peopleid" ,"peopleid,peopleuserid,peoplepassword,peoplefirstname,peoplelastname,peoplestatus,peopleregion,peoplecountry,peopleprovstate,peoplecity,peopleaddress1,peopleaddress2,peoplepostalcodezip,peoplephonenumber1,peopleemailaddress1");
//$conn->render_table("c2cnetworks.userrequests", "peopleid" ,"peoplefirstname,peoplelastname");


?>