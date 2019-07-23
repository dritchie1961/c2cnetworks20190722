<?php

// MySQLi version works

//date_default_timezone_set("America/Toronto");

require ("../codebase/connector/grid_connector.php");
require ("../codebase/connector/db_mysqli.php");
require ("accommon.php");
//$CompanyID = $_COOKIE['CompanyID'];
//$Status = $_GET['Status'];

$peopleid = $_GET['peopleid'];

//$host = "localhost";
//$user = "dritchie1961";
//$pass = "N0drepus";
//$database = "c2cnetworks";
//$port = '3306';

//$link = mysqli_connect ( $host, $user, $pass , $database, $port) or die ( "unable to connect to MySQL" );
$conn = new GridConnector($link, "MySQLi");




$SQLCode2 = "select * from c2cnetworks.lppasset where status = 'search' and peopleid = '" . $peopleid . "'";


if ($conn->is_select_mode()) {
    $conn->render_sql($SQLCode2, "lppassetid", "peopleid,type, region, country, federation, series, subseries, denomination, assetyear,aname, agrade,status,bprice,lppassetid,obversepic,reversepic");
    //$conn->render_sql($SQLCode2, "lppassetid", "region, country, series, denomination, assetyear,aname, agrade");
    
} else {
 //   $conn->render_sql($SQLCode2,                "lppassetid", "peopleid, type, region, country, federation, series, subseries,denomination, assetyear,aname, agrade,status,bprice,obversepic,reversepic");
    
    $conn->render_table("c2cnetworks.lppasset", "lppassetid", "peopleid, type, region, country, federation, series, subseries,denomination, assetyear,aname, agrade,status,bprice,obversepic,reversepic");
    
    
};

/* code from collection form... works.

if ($conn->is_select_mode()) {
    $conn->render_sql($SQLCode2, "lppassetid", "peopleid,type, region, country, federation, series, subseries, denomination, assetyear,aname, agrade,status,bprice,lppassetid,obversepic,reversepic");
    //   $conn->render_sql($SQLCode2, "lppassetid", "region, country, federation, series, subseries,denomination, assetyear,aname, agrade,status,obversepic,reversepic");
    //$conn->render_sql($SQLCode2, "lppassetid", "region, country, series, denomination, assetyear,aname, agrade");
    
} else {
    // this works too ---    $conn->render_sql($SQLCode2, "lppassetid", "region, country, federation, series, subseries,denomination, assetyear,aname, agrade,status,obversepic,reversepic");
    $conn->render_table("c2cnetworks.lppasset", "lppassetid", "peopleid, type, region, country, federation, series, subseries,denomination, assetyear,aname, agrade,status,bprice,obversepic,reversepic");
    
};

*/













?>
