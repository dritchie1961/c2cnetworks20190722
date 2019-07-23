<!DOCTYPE html>
<html>
<head>
<title>My Navigator</title>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<link rel="stylesheet" type="text/css" href="../codebase/fonts/font_roboto/roboto.css"/>
<link rel="stylesheet" type="text/css" href="../skins/skyblue/dhtmlx.css"/>
<link rel="stylesheet" type="text/css" href="../codebase/dhtmlx.css"/>
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
			var peopleid = localStorage.getItem('peopleid');
			var peoplepassword = localStorage.getItem('peoplepassword');

//alert('peopleid ' + peopleid );
//alert('peopleuserid ' + peopleuserid );
//alert('peoplepassword ' + peoplepassword );

			
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
			    	    {type: "input", name: "peopleaddress1", label: "Address line 1"},
					    {type: "input", name: "peopleaddress2", label: "Address line 2"},
					    {type: "input", name: "peoplepostalcodezip", label: "Postal Code"},
					    {type: "input", name: "peoplephonenumber1", label: "Phone #"},
					    {type: "input", name: "peopleemailaddress1", label: "Email"},

						{type: "button", name: "save", value: "Save"},  	
				];
			  
			    myform = new dhtmlXForm("peopleform",formdata);

			    myform.setSkin("dhx_skyblue");
			    
				myform.load("../c2cnetworks/acmemberdetails.php?id=" + peopleid);			
			   	mydp = new dataProcessor("../c2cnetworks/acmemberdetails.php");
			   	mydp.init(myform);		

				myform.disableItem('peopleid');
				
				myform.attachEvent("OnChange", function(name, value){		
					listname = value;
			       	switch(name) {
			    	case 'peopleregion':
						listtype = 'Country';	 
			    		myform.setItemValue('peopleprovstate','-');
			    		myform.setItemValue('peoplecity','-');
			    		myform.disableItem('peopleprovstate');
			    		myform.disableItem('peoplecity');
			       		myform.removeItem('peoplecountry');
			    		var peoplecountry = {type: "select", name: "peoplecountry" , label: "Country", connector: '../c2cnetworks/acgetlist.php?listtype=' + listtype + '&listname=' + listname};			
						myform.addItem(null, peoplecountry, 6);	           
			            break;
					case 'peoplecountry':
						listtype = 'Province';
						myform.setItemValue('peoplecity','-');
				   		myform.disableItem('peoplecity');
						myform.removeItem('peopleprovstate');
				   		var peopleprovstate = {type: "select", name: "peopleprovstate" , label: "Province", connector: '../c2cnetworks/acgetlist.php?listtype=' + listtype + '&listname=' + listname};			
						myform.addItem(null, peopleprovstate, 7);
						break;
			    	case 'peopleprovstate':
						listtype = 'City';
						myform.removeItem('peoplecity');
						var peoplecity = {type: "select", name: "peoplecity" , label: "City", connector: '../c2cnetworks/acgetlist.php?listtype=' + listtype + '&listname=' + listname};			
						myform.addItem(null, peoplecity, 8);
			   	      	break;
			   		default:
			    	    break;    
			   		} // switch
			   		} // function
		   		); // event

			   	myform.attachEvent("onButtonClick", function(id){
				   	
    			   	if (id == 'save'){
    			   		var npw = myform.getItemValue("peoplepassword");
                        if(peoplepassword !== npw){
                        	alert("old pw " + peoplepassword + " new pw " + npw );
                            setCookie("peoplepassword", npw); 
                        	localStorage.setItem('peoplepassword', npw ); // updates localstorage for JS
                	    	myform.send("../c2cnetworks/c2cchangepasswords.php", "get", function(loader, response){});
                        }
						myform.save(); // updates collector table
    					alert('Your Profile has been updated');
    				 } // if
  			   	} // function
			   	); // event
		} // onload
		
	</script>

</html>
