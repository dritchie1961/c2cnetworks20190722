<!DOCTYPE HTML>
<html>
<head>


<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<link rel="stylesheet" type="text/css" href="../codebase/fonts/font_roboto/roboto.css"/>
<link rel="stylesheet" type="text/css" href="../skins/skyblue/dhtmlx.css"/>
<link rel="stylesheet" type="text/css" href="../codebase/dhtmlx.css"/>
<script src="../codebase/dhtmlx.js"></script>
<script src="../c2cnetworks/c2cjscommon.js"></script>

</head>

<body onload="doOnLoad();">

    <table>
		<tr>
			<td>					
				<div id="mygrid_container" style="width: 450px; height: 500px;"></div>	
			</td>
			<td>
				<div id="defaultform" style="width: 400px; height: 500px; background-color: white;"></div>
					
			</td>
		</tr>
	</table>
      
	<script type="text/javascript">

	function doOnLoad() {	

	
	var mygrid, mydp, selId;

	 	formdata = [
     	{type: "settings", position: "label-left", labelWidth: 100, inputWidth: 200},
			{type: "fieldset", label: "Details", name: "formedit", inputWidth: "auto", list:[
		   	{type: "block", name: "b1", width: "auto" , list:[	

		   		{type: "input", name: "peopleid", label: "ID"},
		   		{type: "input", name: "peopleuserid", label: "Collector ID"},
		   		{type: "input", name: "peoplepassword", label: "Password"},
	    		{type: "input", name: "peoplefirstname", label: "First Name"},
	    		{type: "input", name: "peoplelastname", label: "Last Name"},
	    		{type: "input", name: "peoplestatus", label: "Status"},
			    {type: "input", name: "peopleregion" , label: "Region"},
			    {type: "input", name: "peoplecountry", label: "Country"},
			    {type: "input", name: "peopleprovstate", label: "Province"},
			    {type: "input", name: "peoplecity", label: "City"},
	    	    {type: "input", name: "peopleaddress1", label: "address line 1"},
			    {type: "input", name: "peopleaddress2", label: "address line 2"},
			    {type: "input", name: "peoplepostalcodezip", label: "Postal Code"},
			    {type: "input", name: "peoplephonenumber1", label: "Phone #"},
			    {type: "input", name: "peopleemailaddress1", label: "Email"},
				{type: "button", value: "Save", name: "save"},
			 	
				]}
			]}];

	 	
		mygrid = new dhtmlXGridObject("mygrid_container");
		mygrid.setImagePath("../codebase/imgs/");
  		mygrid.setHeader("peopleid,peopleuserid,peoplepassword,peoplefirstname,peoplelastname,peoplestatus,peopleregion,peoplecountry,peopleprovstate,peoplecity,peopleaddress1,peopleaddress2,peoplepostalcodezip,peoplephonenumber1,peopleemailaddress1");
		mygrid.setColumnIds("peopleid,peopleuserid,peoplepassword,peoplefirstname,peoplelastname,peoplestatus,peopleregion,peoplecountry,peopleprovstate,peoplecity,peopleaddress1,peopleaddress2,peoplepostalcodezip,peoplephonenumber1,peopleemailaddress1");
		mygrid.setSkin("dhx_skyblue");
//			mygrid.setInitWidths("100,100");
//			mygrid.setColAlign("left,left");
//			mygrid.setColSorting("int,str,str,str");
//			mygrid.setColTypes("ro,ro");

			mygrid.init();
			mygrid.load("../c2cnetworks/accollectors.php");
			mydp = new dataProcessor("../c2cnetworks/accollectors.php");			
			mydp.init(mygrid);

			myform = new dhtmlXForm("defaultform",formdata);
			myform.setSkin("dhx_skyblue");
			myform.bind(mygrid);

		

			myform.attachEvent("onButtonClick", function(id){
				alert('111');

/*
				
	    		if (id == 'save'){
//	    			myform.save();
	    			alert('111');


	    			var i;
//	    			mygrid.attachEvent("OnRowDblClicked", function(i,cellindex){
	    				var selectedrow = mygrid.getRowData(i);
	    		//		alert("row id: " + selectedrow['lppassetid']);
	    //				localStorage.setItem('lppassetid', selectedrow['lppassetid']);
	    //				localStorage.setItem('reversepic', selectedrow['reversepic']);
	    	//			localStorage.setItem('status', selectedrow['status']);
//	    				localStorage.setItem('abc', "abc");
	//    				window.open("../c2cnetworks/toolbaritem.php","mywindow", '_blank');
	  //  			});
		    			alert('111');
		    		var npw = myform.getItemValue("peoplepassword");	
			   		var opw = selectedrow['peoplepassword'];
		   		
			   		alert("old pw " + opw + " new pw " + npw );

			   		if(peoplepassword !== npw){
                    	alert("old pw " + peoplepassword + " new pw " + npw );
                        setCookie("peoplepassword", npw); 
                    	localStorage.setItem('peoplepassword', npw ); // updates localstorage for JS
            	    	myform.send("../c2cnetworks/c2cchangepasswords.php", "get", function(loader, response){});
                    }
					myform.save(); // updates collector table
					alert('Your Profile has been updated');


	    			
//	    		    var rowId = mygrid.getSelectedRowId();
//	                var rowIndex = mygrid.getRowIndex(rowId);

	 //   	    	myform.send("../c2cnetworks/c2cnewusercreate.php", "get", function(loader, response){

	   // 				alert(' respons is : ' + response);


	//	    			});
	                   		
	            }; // if   */
			}); // function



		}
			
	</script>	
	
</body>
</html>