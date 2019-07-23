<?php

// MySQLi version works


// today is great ...

//date_default_timezone_set("America/Toronto");

require ("../codebase/connector/grid_connector.php");
require ("../codebase/connector/db_mysqli.php");

require ("accommon.php");



$status = "search";
$type = $_GET['type'];

$region = $_GET['region'];
$country= $_GET['country'];
$federation = $_GET['federation'];
$series = $_GET['series'];
$subseries = $_GET['subseries'];

//$host = "localhost";
//$user = "dritchie1961";
//$pass = "N0drepus";
//$database = "c2cnetworks";
//$port = '3306';

//$link = mysqli_connect ( $host, $user, $pass , $database, $port) or die ( "unable to connect to MySQL" );
$conn = new GridConnector($link, "MySQLi");


//$SQLCode = "select lppassetid, type, series, subseries, agrade, bprice from c2cnetworks.lppasset where status = 'search'" ;
//$SQLCode = "select * from c2cnetworks.lppasset where status = '" . $status . "'" ;


$SQLCode = "select * from c2cnetworks.lppasset where status = '" . $status . "' and type = '" . $type . "'";


//$SQLCode = "select * from c2cnetworks.lppasset where type = '" . $type .  "' and status = '" . $status . "'";



//$SQLCode2 = "select lppassetid,  agrade, bprice from c2cnetworks.lppasset where status = '" + $status + "'";

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
