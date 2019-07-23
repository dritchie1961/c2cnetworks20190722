<?php

// MySQLi version works

//date_default_timezone_set("America/Toronto");

require ("../codebase/connector/form_connector.php");
require ("../codebase/connector/db_mysqli.php");
require ("accommon.php");
//$CompanyID = $_COOKIE['CompanyID'];
//$Status = $_GET['Status'];

$id = $_GET['id'];

//$host = "localhost";
//$user = "dritchie1961";
//$pass = "N0drepus";
//$database = "c2cnetworks";
//$port = '3306';

//$link = mysqli_connect ( $host, $user, $pass , $database, $port) or die ( "unable to connect to MySQL" );
//$conn = new GridConnector($link, "MySQLi");

$conn = new FormConnector($link, "MySQLi");


$SQLCode = "select * from c2cnetworks.c2cchat where chatid = '" . $id . "'";

$conn->render_sql($SQLCode, "chatid", "chatid,fromid,toid, lppassetid, subject, datetime,description");

//$conn->render_sql($SQLCode, "chatid", "chatid");



//$conn->render_sql($SQLCode, "lppassetid", "lppassetid, region,country,federation,series,seriessubset,description");
//$conn->render_table("c2cnetworks.lppasset", "lppassetid", "lppassetid,peopleid,status,type,region,country,federation,series,subseries,denomination,assetyear,aname,agrade,description,bprice,reversepic,obversepic");






?>
