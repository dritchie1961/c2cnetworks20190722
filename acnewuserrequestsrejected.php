<?php

require ("../codebase/connector/grid_connector.php");
require ("../codebase/connector/db_mysqli.php");
require ("accommon.php");


$conn = new GridConnector($link, "MySQLi");


// this worked ... $conn->render_table("c2cnetworks.userrequests", "peopleid" ,"peoplefirstname,peoplelastname,peoplestatus,peopleregion,peoplecountry,peopleprovstate,peoplecity,peopleaddress1,peopleaddress2,peoplepostalcodezip,peoplephonenumber1,peopleemailaddress1");


$SQLCode = "select * from c2cnetworks.userrequests where peoplestatus = '2'";

if ($conn->is_select_mode()) {
    $conn->render_sql($SQLCode, "peopleid" ,"peoplefirstname,peoplelastname,peoplestatus,peopleregion,peoplecountry,peopleprovstate,peoplecity,peopleaddress1,peopleaddress2,peoplepostalcodezip,peoplephonenumber1,peopleemailaddress1");
} else {
    $conn->render_table("c2cnetworks.userrequests", "peopleid" ,"peoplefirstname,peoplelastname,peoplestatus,peopleregion,peoplecountry,peopleprovstate,peoplecity,peopleaddress1,peopleaddress2,peoplepostalcodezip,peoplephonenumber1,peopleemailaddress1");
};


?>