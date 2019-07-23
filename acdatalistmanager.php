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


$conn->sort("listtype", "ASC");
$conn->sort("listname", "ASC");
$conn->sort("listitem", "ASC");


$conn->render_table("c2cnetworks.listdata", "listentryid", "listentryid,listtype,listname,listitem");

//$conn->render_table("c2cnetworks.listdata", "listentryid", "listentryid,listid,listtype,listname,listitem,status");

//$conn->render_table("c2cnetworks.listdata", "listentryid", "listentryid,listid,listtype,listname,listitem,status,datecreated,dateclosed");

/*
$SQLCode2 = "select * from c2cnetworks.listdata";

//$SQLCode2 = "select * from c2cnetworks.lppasset where status = 'collection'";

if ($conn->is_select_mode()) {
    $conn->render_sql($SQLCode2, "listentryid", "listentryid,listid,listtype,listname,listitem,status");
} else {
    $conn->render_table("c2cnetworks.lppasset", "listentryid", "listentryid,listid,listtype,listname,listitem,status");
};


*/
/*

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
