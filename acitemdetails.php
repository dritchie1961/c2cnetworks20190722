<?php


session_start();


//date_default_timezone_set("America/Toronto");


/*
include 'c2cCommon.php';
$obj = new c2clppasset();
$obj->setc2cDBConnection();

//$lppassetid = @$_REQUEST['lppassetid'];
//$lppassetid = $_GET['ID'];


$lppassetid = '78';

$y = $obj->selectFNc2clppasset($lppassetid);

$_SESSION["ImageDefault"] = $y;

$obj->dropc2cDBConnection();  

//$_SESSION["ImageDefault"] = "male.png";

*/

require ("../codebase/connector/form_connector.php");
require ("../codebase/connector/db_mysqli.php");
require ("accommon.php");

//$lppassetid = sessionstorage.$_GET('lppassetid');

//$lppassetid = $_GET['lppassetid'];
//If ($lppassetid == "" or $lppassetid == null) {
 //   $lppassetid = $_COOKIE['lppassetid'];
//};

//$host = "localhost";
//$user = "dritchie1961";
//$pass = "N0drepus";
//$database = "c2cnetworks";
//$port = '3306';

//echo lppassetid;




//$link = mysqli_connect($host, $user, $pass, $database, $port) or die("unable to connect to MySQL");

$conn = new FormConnector($link, "MySQLi");

//$SQLCode = "select LPPasetID,region,country,federation,series,seriessubset,description from c2cnetworks.lppasset where lppassetid =" . $lppassetid;

//$SQLCode = "select * from c2cnetworks.lppasset where lppassetid =" . $lppassetid;
//$SQLCode = "select * from c2cnetworks.lppasset";



//$conn->render_sql($SQLCode, "lppassetid", "lppassetid, region,country,federation,series,seriessubset,description");
$conn->render_table("c2cnetworks.lppasset", "lppassetid", "lppassetid,peopleid,status,type,region,country,federation,series,subseries,denomination,assetyear,aname,agrade,description,bprice,reversepic,obversepic");



//$conn->render_sql($SQLCode, "lppassetid", "lppassetid");



?>