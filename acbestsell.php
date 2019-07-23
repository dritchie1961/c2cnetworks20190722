<?php

// MySQLi version works

//date_default_timezone_set("America/Toronto");

require ("../codebase/connector/grid_connector.php");
require ("../codebase/connector/db_mysqli.php");

require ("accommon.php");

//$CompanyID = $_COOKIE['CompanyID'];
//$Status = $_GET['Status'];


$a = "sell";
$b = $_GET['type'];
$c = $_GET['region'];
$d = $_GET['country'];
$e = $_GET['federation'];
$f = $_GET['series'];
$g = $_GET['subseries'];


//$host = "localhost";
//$user = "dritchie1961";
//$pass = "N0drepus";
//$database = "c2cnetworks";
//$port = '3306';

//$link = mysqli_connect ( $host, $user, $pass , $database, $port) or die ( "unable to connect to MySQL" );

$conn = new GridConnector($link, "MySQLi");

$x = 'sell';
$y = 'Coins';


$SQLCode = "select * from c2cnetworks.lppasset where status = '" . $a . "' and type = '" . $b;
$SQLCode = $SQLCode . "' and region = '" . $c . "' and country = '" . $d . "' and federation = '" . $e;
$SQLCode = $SQLCode . "' and series = '" . $f . "' and subseries = '" . $g . "'";


//$SQLCode = "select * from c2cnetworks.lppasset where status = '" . $status . "' and type = 'Coin'";
//$SQLCode = $SQLCode . "' and type = '" . $type . "'";
//$SQLCode = $SQLCode . "' and region = '" . $region; 
//$SQLCode = $SQLCode . "' and country = '" . $country . "'"; 
//$SQLCode = $SQLCode . "' and federation = '" . $federation . "'"; 
//$SQLCode = $SQLCode . "' and series = '" . $series . "'"; 
//$SQLCode = $SQLCode . "' and subseries = '" . $subseries . "'";


//$SQLCode = "select lppassetid, type, series, subseries, agrade, bprice from c2cnetworks.lppasset where status = 'sell'";
//$SQLCode = "select * from c2cnetworks.lppasset where type = '" . $type .  "' and status = '" . $status . "'";


//$SQLCode2 = "select lppassetid,  agrade, bprice from c2cnetworks.lppasset where status = '" + $status + "'";
//$SQLCode2 = "select * from c2cnetworks.lppasset where status = '" + $status + "'";

$conn->render_sql($SQLCode, "lppassetid", "lppassetid, type, series, subseries, agrade, bprice");


/*
if ($conn->is_select_mode()) {
    $conn->render_sql($SQLCode, "lppassetid", "lppassetid, type, series, subseries, agrade, bprice");
    //$conn->render_sql($SQLCode2, "lppassetid", "region, country, series, denomination, assetyear,aname, agrade");
    
} else {
    $conn->render_sql($SQLCode, "lppassetid", "lppassetid, type, series, subseries, agrade, bprice");
};
*/
?>
