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
    


	<div id="toolbarobj"></div>

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

        
	mytoolbar = new dhtmlXToolbarObject("toolbarobj");
        mytoolbar.setIconsPath("../common/imgs/");
    	mytoolbar.addButton("prov", 8, "Provenance", null, null);		
        mytoolbar.addSeparator("sep", 9);
        mytoolbar.addButton("track", 10, "Tracker", null, null);		
        mytoolbar.addSeparator("sep", 11);
    	mytoolbar.addButton("datalist", 12, "Data Admin", null, null);	
        mytoolbar.addSeparator("sep", 13);
    	mytoolbar.addButton("requests", 14, "Requests", null, null);	
        mytoolbar.addSeparator("sep", 15);
        mytoolbar.addButton("collectors", 16, "Collectors", null, null);	
        mytoolbar.addSeparator("sep", 17);
        mytoolbar.addButton("exit", 18, "Exit", null, null);	

        mytoolbar.setSkin("dhx_skyblue");
        

	mytoolbar.attachEvent(
			"onClick", function(id) {
		   switch(id) {
    		case 'prov':
		        document.location.href='../c2cnetworks/toolbaradminprov.php';
	            break;
	        case 'track':
	            document.location.href='../c2cnetworks/toolbaradminutracker.php';
	            break;
        	case 'datalist':
		    	document.location.href='../c2cnetworks/toolbaradmindatalist.php'; 
	            break;
	        case 'requests':
	        	document.location.href='../c2cnetworks/toolbaradminurequests.php'; 				        	
	            break;
	        case 'collectors':
	        	document.location.href='../c2cnetworks/toolbaradmincollectors.php'; 				        	
	            break;
	        case 'exit':

	           	window.opener = self;
				window.close();						
	            break;
//	        	document.location.href='../c2cnetworks/toolbaradmin.php'; 	
//	    		window.open("../c2cnetworks/toolbaradmin.php","adminwindow", '_blank');			        	
	    		
	            break;
	        default:			        
	            break;
	    } // switch
	} // function 
	); // event


	
	 	formdata = [
     	{type: "settings", position: "label-left", labelWidth: 100, inputWidth: 200},
			{type: "fieldset", label: "Details", name: "formedit", inputWidth: "auto", list:[
		   	{type: "block", name: "b1", width: "auto" , list:[	

		   		{type: "input", name: "peopleid", label: "ID"},
		   		{type: "input", name: "peopleuserid", label: "Collector ID"},
		   		{type: "input", name: "peoplepassword", label: "Password"},
	    		{type: "input", name: "peoplefirstname", label: "First Name"},
	    		{type: "input", name: "peoplelastname", label: "Last Name"},
	      	  	{type: "select", name: "peoplestatus", label: "Status", options:[    		   
		            {value: "1", text: "Active"},
		    		{value: "2", text: "Not Active"}
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
				{type: "button", value: "Save", name: "save"},
				{type: "button", value: "Scramble PW", name: "pweggs"},
				{type: "button", value: "Reset PW", name: "pwreset"},
				
			 	
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

		   	mygrid.attachEvent("onDataReady",function(){
			    // your code here
			mygrid.selectRow(0);	
			});

			myform = new dhtmlXForm("defaultform",formdata);
			   myform.setSkin("dhx_skyblue");
			myform.bind(mygrid);

			/*
			myform.attachEvent("onBeforeChange", function (name, old_value, new_value){
				if (name == 'peoplepassword'){
					if(confirm('Confirm PW change')){
						myform.send("../c2cnetworks/c2cchangepasswords.php", "get", function(loader, response){
					//		alert("inside");
							alert(response);
			    			myform.save();
			    	//		alert("after");
							})
					} else {
						return false;
					}
				}
			return true;
			});
*/

		   	myform.attachEvent("onButtonClick", function(id){
			   	switch(id) {
				case 'save': 
	    			myform.save();
	    			alert('changes saved');	
		           	break;
			   	case 'pweggs': 
	  		    	var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
	    	        var string_length = 8;
	    	        var randomstring = '';
	    	        for (var i=0; i<string_length; i++) {
	    	            var rnum = Math.floor(Math.random() * chars.length);
	    	            randomstring += chars.substring(rnum,rnum+1);
	    	        }
		       		myform.setItemValue("peoplepassword", randomstring);
	  				myform.save();
	    			alert('pw updated & saved');
	         		break;
				case 'pwreset': 

	     	    	myform.send("../c2cnetworks/c2cchangepasswords.php", "get", function(loader, response){});
	      	   		myform.save(); // updates collector table
		      	  	alert('security updated & saved');
	           		break;
			 	default:
		           break;  
			   	}
		 
			   	} // function
		   	); // event


    } // onload
	</script>	
	
</body>
</html>