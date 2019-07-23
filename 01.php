<!DOCTYPE html>
<html>
<head>
<title>My Navigator</title>

<link rel="stylesheet" type="text/css" href="../codebase/dhtmlx.css" />
<script src="../codebase/dhtmlx.js"></script>
<script src="../c2cnetworks/c2cjscommon.js"></script>

</head>
<body onload="doOnLoad();">

<div id="peopleform"></div>

</body>

<script>
   		var myform, mydp, listname, listtype;     	   
		function doOnLoad() {	

			var peopleuserid = localStorage.getItem('peopleuserid');
			var peopleid = "1";


			listname = 'Region';
			listtype = 'Region';
						
			formdata = [
			    	{type: "settings", position: "label-left", labelWidth: 150, inputWidth: 300},
			    		{type: "input", name: "peopleid", label: "Member #"},
			    		{type: "input", name: "peopleuserid", label: "Member ID"},
			      		{type: "input", name: "peoplepassword", label: "PW"},
			    		{type: "input", name: "peoplefirstname", label: "First Name"},
			    		{type: "input", name: "peoplelastname", label: "Last Name"},
					    {type: "select", name: "peopleregion" , label: "Region", connector: '../c2cnetworks/acgetlist.php?listtype=' + listtype + '&listname=' + listname},
					    {type: "input", name: "peoplecountry", label: "Country"},
					    {type: "input", name: "peopleprovstate", label: "Province"},
					    {type: "input", name: "peoplecity", label: "City"},
			    	    {type: "input", name: "peopleaddress1", label: "address line 1"},
					    {type: "input", name: "peopleaddress2", label: "address line 2"},
					    {type: "input", name: "peoplepostalcodezip", label: "Postal Code"},
					    {type: "input", name: "peoplephonenumber1", label: "Phone #"},
					    {type: "input", name: "peopleemailaddress1", label: "Email"},

						{type: "button", name: "111", value: "111"},  
						{type: "button", name: "222", value: "222"}  	
				];
			  
			    myform = new dhtmlXForm("peopleform",formdata);
//				myform.load("../c2cnetworks/acmemberdetails.php?id=" + peopleid);    				
		   		myform.load("../c2cnetworks/acmemberdetails.php?id='1'");   
				
			   	mydp = new dataProcessor("../c2cnetworks/acmemberdetails.php");
			   	mydp.init(myform);		

			   	myform.attachEvent("onButtonClick", function(id){
			   	if (id == '111'){
				   	peopleid = "1";
	//		   		myform.load("../c2cnetworks/acmemberdetails.php?id=" + peopleid);  
			   		myform.load("../c2cnetworks/acmemberdetails.php?id='1'");   
			    	} // if
			   	else if (id == '222'){
				   	peopleid = "2";
//			   		myform.load("../c2cnetworks/acmemberdetails.php?id=" + peopleid);    
			   		myform.load("../c2cnetworks/acmemberdetails.php?id='2'");   
			   		
			   	};
			   	} // function
			   	); // event



			   	
		} // onload
		
	</script>

</html>
