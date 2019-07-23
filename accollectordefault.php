<?php

// MySQLi version works

//date_default_timezone_set("America/Toronto");

require ("../codebase/connector/grid_connector.php");
require ("../codebase/connector/db_mysqli.php");
require ("accommon.php");
//$CompanyID = $_COOKIE['CompanyID'];

$peopleid = $_GET['peopleid'];

//$id = $_GET['id'];

//$host = "localhost";
//$user = "dritchie1961";
//$pass = "N0drepus";
//$database = "c2cnetworks";
//$port = '3306';

//$link = mysqli_connect ( $host, $user, $pass , $database, $port) or die ( "unable to connect to MySQL" );
$conn = new GridConnector($link, "MySQLi");

//$SQLCode2 = "select * from c2cnetworks.collectordefaults where peopleid = '" . $peopleid . "'";

//$conn->render_table("c2cnetworks.collectordefaults", "collectordefaultid", "collectordefaultid,peopleid,defaultnum,type,region,country,federation,series,subseries");
//$conn->render_table("c2cnetworks.collectordefaults", "collectordefaultid", "peopleid,defaultnum,type,region,country,federation,series,subseries");

//$conn->render_table("c2cnetworks.collectordefaults", "collectordefaultid", "federation");


// works for some reason ... $conn->render_table("c2cnetworks.collectordefaults", "dcode", "did,dcode,peopleid,type,region,country,federation,series,subseries");

if ($conn->is_select_mode()) {
    $SQLCode = "select * from c2cnetworks.collectordefaults where peopleid = " . $peopleid;
    $conn->render_sql($SQLCode, "did", "peopleid,dcode,type,region,country,federation,series,subseries");
} else {
    $conn->render_table("c2cnetworks.collectordefaults", "did", "peopleid,dcode,type,region,country,federation,series,subseries");
};

?>
