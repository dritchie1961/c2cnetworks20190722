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




$id = $_GET['id'];

//$link = mysqli_connect ( $host, $user, $pass , $database, $port) or die ( "unable to connect to MySQL" );

$conn = new GridConnector($link, "MySQLi");

//$conn->render_table("c2cnetworks.c2cprovenance", "provenanceid", "provenanceid,prvpeopleid,newpeopleid,lppassetid,type,changedate");

//$conn->render_table("c2cnetworks.c2cprovenance", "provenanceid", "changedate,provenanceid,prvpeopleid,newpeopleid,lppassetid,type");


$SQLCode = "select * from c2cnetworks.c2cprovenance where prvpeopleid = '" . $id . "' or newpeopleid = '" . $id . "'";

$conn->render_sql($SQLCode, "provenanceid", "changedate,provenanceid,prvpeopleid,newpeopleid,lppassetid,type");













?>
