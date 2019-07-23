<?php


//echo 'inside';


require ("../codebase/connector/form_connector.php");
require ("../codebase/connector/db_mysqli.php");
require ("accommon.php");

//date_default_timezone_set("America/Toronto");


//$host = "localhost";
//$user = "dritchie1961";
//$pass = "N0drepus";
//$database = "c2cnetworks";
//$port = '3306';


//$link = mysqli_connect($host, $user, $pass, $database, $port) or die("unable to connect to MySQL");

$conn = new FormConnector($link, "MySQLi");

$conn->render_table("c2cnetworks.lppasset", "lppassetid", "lppassetid, region,country,federation,series,seriessubset,description");


?>