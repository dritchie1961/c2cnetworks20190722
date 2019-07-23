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
		//	var dnum = "1";
			var peopleid = "1";

			localStorage.setItem('peopleid', peopleid );
			
			formdata = [
			    	{type: "settings", position: "label-left", labelWidth: 150, inputWidth: 300},

		    		{type: "input", name: "peopleid", label: "peopleid"},
		    		{type: "input", name: "dcode", label: "dcode"},
		     		{type: "input", name: "type", label: "type"},
		      		{type: "input", name: "region", label: "region"},
		     		{type: "input", name: "country", label: "country"},
		     		{type: "input", name: "federation", label: "federation"},
		     		{type: "input", name: "series", label: "series"},
		     		{type: "input", name: "subseries", label: "subseries"},
			      		
					{type: "button", name: "111", value: "111"},  
					{type: "button", name: "222", value: "222"}  	
				];
			  
			    myform = new dhtmlXForm("peopleform",formdata);
//				myform.load("../c2cnetworks/acbestdefaults.php?id=" + peopleid + "&defaultnum=1");    				
				myform.load("../c2cnetworks/acbestdefaults.php?id=a" + peopleid);    				

			    mydp = new dataProcessor("../c2cnetworks/acbestdefaults.php");
			   	mydp.init(myform);		

			   	myform.attachEvent("onButtonClick", function(id){
			   	if (id == '111'){
//			   		collectordefaultsid = "1";
			//	   	peopleid = "1";
			//		localStorage.setItem('defaultnum', '1' );
			   //		var dnum = '1';
			   		myform.load("../c2cnetworks/acbestdefaults.php?id=a" + peopleid);  
			//   		myform.load("../c2cnetworks/acbestdefaults.php?id=" + peopleid  + "&defaultnum=1");   
					
			    	} // if
			   	else if (id == '222'){
//			   		collectordefaultsid = "2";
//			   					   	peopleid = "2";
		//	   		localStorage.setItem('defaultnum', '1' );
			   	//	var dnum = '2';
				//	 peopleid = '2';  
						
			   		myform.load("../c2cnetworks/acbestdefaults.php?id=b" + peopleid); 
			 //  		myform.load("../c2cnetworks/acbestdefaults.php?id=" + peopleid  + "&defaultnum=1");      
			   		
			   	};
			   	} // function
			   	); // event



			   	
		} // onload
		
	</script>

</html>