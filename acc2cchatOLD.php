<?php

// MySQLi version works

//date_default_timezone_set("America/Toronto");

require ("../codebase/connector/grid_connector.php");
require ("../codebase/connector/db_mysqli.php");

require ("accommon.php");

//$CompanyID = $_COOKIE['CompanyID'];
//$Status = $_GET['Status'];
$id = $_GET['id'];
$type = $_GET['type'];


//$host = "localhost";
//$user = "dritchie1961";
//$pass = "N0drepus";
//$database = "c2cnetworks";
//$port = '3306';

//$link = mysqli_connect ( $host, $user, $pass , $database, $port) or die ( "unable to connect to MySQL" );
$conn = new GridConnector($link, "MySQLi");

// inbox ... received is default
//$SQLCode = "select * from c2cnetworks.c2cchat where toid = '" . $id . "'";

if($type == 'sent')
{
    $SQLCode = "select * from c2cnetworks.c2cchat where fromid = '" . $id . "'";
    $conn->render_sql($SQLCode, "chatid", "datetime, toid, subject, chatid, lppassetid, description, ");
    
};

if($type == 'received')
{
    $SQLCode = "select * from c2cnetworks.c2cchat where toid = '" . $id . "'";
    $conn->render_sql($SQLCode, "chatid", "datetime, fromid, subject, chatid, lppassetid, description, ");
    
};

?>
