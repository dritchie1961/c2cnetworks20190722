<?php 



//echo "<script>alert('entering data into best');</script>";



// Baseline the project

date_default_timezone_set("America/Toronto");
//session_start();

//1 lppassetid
//2 status
//3 price
//4 datelisted
//5 dateclosed
//6 region
//7 country
//8 federation
//9 series
//10 seriessubset
//11 assetdate
//12 denomination
//13 reversepic
//14 obversepic
//15 comments
//16 a1name
//17 a1grade
//18 description
//19 sellcomments


echo('inside');

$lppassetid = $_GET['lppassetid'];
$status = $_GET['BESTType'];
$bprice = $_GET['bprice'];
$userid = $_GET['userid'];

//echo "<script>alert('entering data into best');</script>";

$Item[1] = $lppassetid;
$Item[2] = $status;
$Item[3] = $bprice;
$Item[4] = '2018-11-22';
$Item[5] = '2018-11-22';
$Item[6] = '1';
$Item[7] = '1';
$Item[8] = '1';
$Item[9] = '1';
$Item[10] = '1';
$Item[11] = '2018-10-10';
$Item[12] = '1';
$Item[13] = '1';
$Item[14] = '1';
$Item[15] = '1';
$Item[16] = '1';
$Item[17] = '1';
$Item[18] = '1';
$Item[19] = '1';


/*
include 'cpEVMPerformance.php';
$obj = new cpEVM();
$obj->setpEVMDBConnection();
$res = $obj->searchpEVM($ProjectID, $pEVMType);
*/

echo ' 111 ';

echo ' <br>';

include 'c2ccommon.php';
//$obj = new c2cDB();
$obj = new c2cBESTSell();
echo ' 222 ';
echo ' <br>';

//setc2cDBConnection

$obj->setc2cDBConnection();
echo ' 333 ';
echo ' <br>';


$res = $obj->createc2cBESTSell($Item);


echo ' <br>';
echo ' 444 ';


$obj->dropc2cDBConnection();

echo ' 555 ';


?>

