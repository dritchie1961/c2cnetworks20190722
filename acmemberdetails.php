<?php

require ("../codebase/connector/form_connector.php");
require ("../codebase/connector/db_mysqli.php");

require ("accommon.php");


//date_default_timezone_set("America/Toronto");

//$peopleid = $_GET['id'];

//If ($peopleid == "" or $peopleid == null) {
 //  $peopleid = 1;    
//};

//$host = "localhost";


//$user = "dritchie1961";
//$pass = "N0drepus";

//$user = "don";
//$pass = "don";


//$database = "c2cnetworks";
//$port = '3306';

//$link = mysqli_connect($host, $user, $pass, $database, $port) or die("unable to connect to MySQL");

$conn = new FormConnector($link, "MySQLi");

//$SQLCode = "select peopleid,peopleuserid,peoplepassword,peoplefirstname,peoplelastname,peopleregion,peoplecountry,peopleprovstate,peoplecity,peopleaddress1,peopleaddress2,peoplepostalcodezip,peoplephonenumber1,peopleemailaddress1 from c2cnetworks.collector where peopleid ='{$peopleid}'";
//$SQLCode = "select * from c2cnetworks.collector where peopleid ='{$peopleid}'";
//$SQLCode = "select * from c2cnetworks.collector where peopleid ={$peopleid}";
//$SQLCode = "select peoplefirstname,peoplelastname,peopleregion,peoplecountry from c2cnetworks.collector where peopleid ='{$peopleid}'";


//$SQLCode = "select peopleid,peoplefirstname,peoplelastname from c2cnetworks.collector where peopleuserid ='{$peopleuserid}'";

//$conn->render_table("c2cnetworks.collector", "peopleid" ,"peopleid,peopleuserid,peoplepassword,peoplefirstname,peoplelastname,peopleregion,peoplecountry,peopleprovstate,peoplecity,peopleaddress1,peopleaddress2,peoplepostalcodezip,peoplephonenumber1,peopleemailaddress1");
//$conn->render_sql($SQLCode,"peopleid", "peopleid,peopleuserid,peoplepassword,peoplefirstname,peoplelastname,peopleregion,peoplecountry,peopleprovstate,peoplecity,peopleaddress1,peopleaddress2,peoplepostalcodezip,peoplephonenumber1,peopleemailaddress1");


//$conn->render_sql($SQLCode, "peopleid", "peopleid,peoplefirstname,peoplelastname");
//$conn->render_sql($SQLCode, "peopleuserid", "peopleid,peoplefirstname,peoplelastname,peopleuserid,peoplepassword,peopleregion,peoplecountry,peopleprovstate,peoplecity,peopleaddress1,peopleaddress2,peoplepostalcodezip,peoplephonenumber1,peopleemailaddress1");
//$conn->render_sql($SQLCode, "PeopleID", "PeopleID,PeopleFirstName,PeopleLastName,PeopleUserID,PeoplePassword,PeopleAddress1,PeopleAddress2,PeopleRegion,PeopleCountry,PeopleProvState,PeopleCity,PeoplePostalCodeZip,PeoplePhoneNumber1,PeopleEmailAddress1");


$conn->render_table("c2cnetworks.collector", "peopleid" ,"peopleid,peopleuserid,peoplepassword,peoplefirstname,peoplelastname,peopleregion,peoplecountry,peopleprovstate,peoplecity,peopleaddress1,peopleaddress2,peoplepostalcodezip,peoplephonenumber1,peopleemailaddress1");

// test partial load... test works fine...
//$conn->render_table("c2cnetworks.collector", "peopleid" ,"peoplecity,peopleaddress1,peopleaddress2,peoplepostalcodezip,peoplephonenumber1,peopleemailaddress1");



?>