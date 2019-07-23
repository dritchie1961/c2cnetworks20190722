
<!DOCTYPE html>
<html>
<head>
<title>c2c Chat NEW</title>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<link rel="stylesheet" type="text/css" href="../codebase/fonts/font_roboto/roboto.css"/>
<link rel="stylesheet" type="text/css" href="../skins/skyblue/dhtmlx.css"/>
<link rel="stylesheet" type="text/css" href="../codebase/dhtmlx.css"/>
<link rel="stylesheet" type="text/css" href="../codebase/dhtmlxvault.css">


<script src="../../../codebase/dhtmlxvault.js"></script>
<script src="../codebase/dhtmlx.js"></script>
<script src="../c2cnetworks/c2cjscommon.js"></script>


<style>
</style>

</head>
<body>

	<div id="toolbarobj" style="height: 40px"></div>
	<div id="itemform"></div>

	<script>

		var mytoolbar, mytabbar;	      
		var formData, logObj; // required for file process
    	var myform, mydp, listname,listtype;
		var lppassetid = localStorage.getItem('lppassetid');
		var status= localStorage.getItem('status');
		var x = localStorage.getItem('reversepic');
		var fromid = localStorage.getItem('peopleid');
		var toid = localStorage.getItem('assetownerid');
		
		mytoolbar = new dhtmlXToolbarObject("toolbarobj");
    		mytoolbar.setSkin("dhx_skyblue");
    		mytoolbar.setIconsPath("../common/imgs/");
    		mytoolbar.addButton("send", 1, "Send", null, null);	
    		mytoolbar.addButton("exit", 5, "Exit", null, null);	
		    
    		mytoolbar.attachEvent("onClick", function(id) {
    		   switch(id) {
    		   case 'exit':
    		        	window.opener = self;
    		            break;
    		        case 'send':     
    		         	myform.save();	
    					var subject = myform.getItemValue("subject", true);
    					var description = myform.getItemValue("description", true);
    					var abcde = "?toid=" + toid + "&fromid=" + fromid + "&lppassetid=" + lppassetid + "&subject=" + subject + "&description=" + description ;
    					myform.send("../c2cnetworks/cpc2cchatnew.php" + abcde);	
    		         	break;					  		
    		        default:			        
    		            break;
    			    }
    					window.close();						
    				});			
    
    				formData = [
    					{type: "settings", position: "label-left", labelWidth: 150, inputWidth: 300},
    			    	{type: "input", name: "lppassetid", label: "Asset ID"},
    			    	{type: "input", name: "toid", label: "To"},
    			    	{type: "input", name: "fromid", label: "From"},
    				    {type: "input", name: "subject", label: "Subject"},
    			  		{type: "input", name: "description", label: "Description"}
    		];

			myform = new dhtmlXForm("itemform",formData);
			myform.setSkin("dhx_skyblue");
			
	   		myform.setItemValue('lppassetid',lppassetid );
		   	myform.setItemValue('toid', toid);
		   	myform.setItemValue('fromid', fromid);
		   	
			myform.disableItem('lppassetid');
			myform.disableItem('toid');
			myform.disableItem('fromid');
	
		

</script>
</body>

</html>

