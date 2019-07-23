<?php

// MySQLi version works

//date_default_timezone_set("America/Toronto");

//require ("../codebase/connector/grid_connector.php");
require ("../codebase/connector/options_connector.php");
require ("../codebase/connector/db_mysqli.php");
require ("accommon.php");

$listtype = $_GET['listtype'];
$listname = $_GET['listname'];


//  Go Daddy Parameters  //
//  $host = "pEVM.db.11021264.hostedresource.com";
//  $user = "pEVM";
//  $pass = "N0drepus@";



//$host = "localhost";
//$host = "198.71.235.64";
//$host = "a2plcpnl0467.prod.iad2.secureserver.net"; 

//$host = "c2cnetworks";
//$user = "dritchie1961";
//$pass = "N0drepus";
//$database = "c2cnetworks";
//$port = '3306';

//$link = mysqli_connect ( $host, $user, $pass , $database, $port) or die ( "unable to connect to MySQL" );


//$conn = new GridConnector($link, "MySQLi");

$conn = new SelectOptionsConnector($link, "MySQLi");

//$listname = "Region";

//$SQLCode2 = "select listitem, listitem from c2cnetworks.ListData" ; // + $listname;


$SQLCode2 = "select listitem, listitem from c2cnetworks.listdata where listtype='" . $listtype . "' and listname='" . $listname . "'" . " order by listitem asc";

//$SQLCode2 = "select listitem, listitem from c2cnetworks.ListData";

$conn->render_sql($SQLCode2, "ListEntryID", "listitem, listitem");

// works  ----  $conn->render_table("c2cnetworks.ListData", "ListEntryID", "listitem, listitem");


?>
