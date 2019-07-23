<!DOCTYPE html>
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

<TITLE>New User Request</TITLE>


<body onload="doOnLoad();">

<div id="newuser"></div>

</body>

<script>
   		var myform, mydp, listname, listtype;     	   
		function doOnLoad() {	

	//		var peopleuserid = localStorage.getItem('peopleuserid');
	//		var peopleid = localStorage.getItem('peopleid');

			listname = 'Region';
			listtype = 'Region';
						
			formdata = [
			    	{type: "settings", position: "label-left", labelWidth: 150, inputWidth: 300},
	//		    		{type: "input", name: "peopleid", label: "Member #"},
			//    		{type: "input", name: "peopleuserid", label: "Member ID"},
			//      		{type: "input", name: "peoplepassword", label: "PW"},
			    		{type: "input", name: "peoplefirstname", label: "First Name"},
			    		{type: "input", name: "peoplelastname", label: "Last Name"},
					//    {type: "input", name: "peopleregion" , label: "Region"},
					    {type: "select", name: "peopleregion" , label: "Region", connector: '../c2cnetworks/acgetlist.php?listtype=' + listtype + '&listname=' + listname},
					    {type: "input", name: "peoplecountry", label: "Country"},
					    {type: "input", name: "peopleprovstate", label: "Province"},
					    {type: "input", name: "peoplecity", label: "City"},
			    	    {type: "input", name: "peopleaddress1", label: "Address line 1"},
					    {type: "input", name: "peopleaddress2", label: "Address line 2"},
					    {type: "input", name: "peoplepostalcodezip", label: "Postal Code"},
					    {type: "input", name: "peoplephonenumber1", label: "Phone #"},
					    {type: "input", name: "peopleemailaddress1", label: "eMail"},

						{type: "button", name: "submit", value: "Submit Application"},  	
						{type: "button", name: "cancel", value: "Cancel"},  	
				];
			  
			    myform = new dhtmlXForm("newuser",formdata);
				myform.setSkin("dhx_skyblue"); 
	//			myform.load("../c2cnetworks/acmemberdetails.php?id=" + peopleid);    				
	//		   	mydp = new dataProcessor("../c2cnetworks/acmemberdetails.php");
		//	   	mydp.init(myform);		

			   	myform.attachEvent("onButtonClick", function(id){

				   	if (id == 'submit'){
	   		
						myform.send("../c2cnetworks/c2cnewuserrequest.php", "get", function(loader, response){
				//		alert(response);

				    	window.close();	
							
						}); // form send

					   	} // id login

			    //	window.close();	

				   	
			   	}); // function

		var x = 3;
				
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
						myform.addItem(null, peoplecountry, x);	           
			            break;
					case 'peoplecountry':
						listtype = 'Province';
						myform.setItemValue('peoplecity','-');
				   		myform.disableItem('peoplecity');
						myform.removeItem('peopleprovstate');
				   		var peopleprovstate = {type: "select", name: "peopleprovstate" , label: "Province", connector: '../c2cnetworks/acgetlist.php?listtype=' + listtype + '&listname=' + listname};			
						myform.addItem(null, peopleprovstate, x + 1 );
						break;
			    	case 'peopleprovstate':
						listtype = 'City';
						myform.removeItem('peoplecity');
						var peoplecity = {type: "select", name: "peoplecity" , label: "City", connector: '../c2cnetworks/acgetlist.php?listtype=' + listtype + '&listname=' + listname};			
						myform.addItem(null, peoplecity, x + 2);
			   	      	break;
			   		default:
			    	    break;    
			   		} // switch
			   		} // function
		   		); // event

		} // onload
		
	</script>

</html>


<?php 

/*

<h3 style="text-align: left;"><strong>Welcome to c2c Network - New User Request.</strong></h3>
<p>Please enter the following information to request a user ID.&nbsp; Once your application has been approved you can expect to receive an email with a link to the c2c member portal, your c2c ID and a temporary Password.&nbsp; If you do not receive an email with an ID and PW within 48 hours, please send an email directly to <a href="mailto:rcg.ltd@gmail.com">rcg.ltd@gmail.com</a>&nbsp;and I will investigate, and follow up with you.</p>
<p></p>
<p>Unless special approved is provided, only 1 c2c ID will be issued per residence.&nbsp; The purpose of this restriction is to prevent misuse of the c2c BEST market place.</p>
<p></p>
<p>The c2c Networks is currently considered a time limited 'expertiment' and is free for all participants that have been granted access to the website.&nbsp;&nbsp;</p>
<p></p>
<p>This is currently an experiment and by requesting access to and use of the c2c Networks, you agree to the following condictions:</p>
<ol>
<li>c2c, the inventor, RCG Ltd, and all other members of the c2c Networks cannot in any way be held liable for any issues arrising from membership or use of this system.</li>
<li>c2c has extremely high social network guiding principles and standards which include but are not limited to:</li>
</ol>
<ul>
<li>Respect for and courious of all other c2c members,</li>
<li>You will only engage in Numismatic activities.&nbsp; Policitical, economic, social, or personal views or interests will not be tollerated in the network</li>
<li>You agree to behave in the highest level of ethical behavior especially when using BEST</li>
<li>Etc.</li>
</ul>
<p>At the sole discretion of the inventor, for the duration of the experiment,</p>
<p></p>
<p></p>

*/ 

?>


