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

<body>

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

	var mygrid, mydp, selId;

	 	formdata = [
     	{type: "settings", position: "label-left", labelWidth: 100, inputWidth: 200},
			{type: "fieldset", label: "Details", name: "formedit", inputWidth: "auto", list:[
		   	{type: "block", name: "b1", width: "auto" , list:[	
	
	    		{type: "input", name: "peoplefirstname", label: "First Name"},
	    		{type: "input", name: "peoplelastname", label: "Last Name"},
	    //		{type: "input", name: "peoplestatus", label: "Status"},
	  //  		{type: "select", name: "peoplestatus", label: "Status"}, options:[
	  //    		{type: "select", name: "peoplestatus", label: "Status"}, options:[
	      	  	{type: "select", label: "Status", options:[    		   
	            {value: "0", text: "New Request"},
	            {value: "1", text: "Approved"},
	    		{value: "2", text: "Not Approved"}
	    	    ]},	    		
			    {type: "input", name: "peopleregion" , label: "Region"},
			    {type: "input", name: "peoplecountry", label: "Country"},
			    {type: "input", name: "peopleprovstate", label: "Province"},
			    {type: "input", name: "peoplecity", label: "City"},
	    	    {type: "input", name: "peopleaddress1", label: "address line 1"},
			    {type: "input", name: "peopleaddress2", label: "address line 2"},
			    {type: "input", name: "peoplepostalcodezip", label: "Postal Code"},
			    {type: "input", name: "peoplephonenumber1", label: "Phone #"},
			    {type: "input", name: "peopleemailaddress1", label: "Email"},
				{type: "button", value: "Process Request", name: "process"},
			 	
				]}
			]}];

		mygrid = new dhtmlXGridObject("mygrid_container");
		mygrid.setImagePath("../codebase/imgs/");
  		mygrid.setHeader("peoplefirstname,peoplelastname,peoplestatus,peopleregion,peoplecountry,peopleprovstate,peoplecity,peopleaddress1,peopleaddress2,peoplepostalcodezip,peoplephonenumber1,peopleemailaddress1");
		mygrid.setColumnIds("peoplefirstname,peoplelastname,peoplestatus,peopleregion,peoplecountry,peopleprovstate,peoplecity,peopleaddress1,peopleaddress2,peoplepostalcodezip,peoplephonenumber1,peopleemailaddress1");

//			mygrid.setInitWidths("100,100");
//			mygrid.setColAlign("left,left");
//			mygrid.setColSorting("int,str,str,str");
//			mygrid.setColTypes("ro,ro");

		mygrid.setSkin("dhx_skyblue");
		
			mygrid.init();
			mygrid.load("../c2cnetworks/acnewuserrequests.php");
			mydp = new dataProcessor("../c2cnetworks/acnewuserrequests.php");			
			mydp.init(mygrid);

			myform = new dhtmlXForm("defaultform",formdata);
			myform.setSkin("dhx_skyblue");
			
			myform.bind(mygrid);



			myform.attachEvent("onButtonClick", function(id){
	    		if (id == 'process'){

	    			alert('approved');

//	    		    var rowId = mygrid.getSelectedRowId();
//	                var rowIndex = mygrid.getRowIndex(rowId);

	    	    	myform.send("../c2cnetworks/c2cnewusercreate.php", "get", function(loader, response){

	    		//		alert(' respons is : ' + response);


		    			});
	                   		
	            }; // if
			}); // functin
		
	</script>	
	
</body>
</html>