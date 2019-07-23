<!DOCTYPE html>
<html>
<head>
<title>C2C Member Login</title>


<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<link rel="stylesheet" type="text/css" href="../codebase/fonts/font_roboto/roboto.css"/>
<link rel="stylesheet" type="text/css" href="../skins/skyblue/dhtmlx.css"/>
<link rel="stylesheet" type="text/css" href="../codebase/dhtmlx.css"/>
<script src="../codebase/dhtmlx.js"></script>
<script src="../c2cnetworks/c2cjscommon.js"></script>

</head>
<body onload="doOnLoad();">


	
<div id="toolbarObj"></div>

	<div id="myform"></div>
	
</body>

<script>

var mytoolbar;
	   var myform, formdata;
	   function doOnLoad() {

			mytoolbar = new dhtmlXToolbarObject("toolbarObj");
		    mytoolbar.setIconsPath("../common/imgs/");
		    mytoolbar.setSkin("dhx_skyblue"); // top, left, item


			    mytoolbar.addButton("home", 1, "Home", null, null);
			    mytoolbar.addSeparator("sep", 2);	
			    mytoolbar.addButton("trends", 3, "Trends", null, null);
			    mytoolbar.addSeparator("sep", 4);
			    mytoolbar.addButton("login", 5, "Member Login", null, null);
			    mytoolbar.addSeparator("sep", 6);	
			    mytoolbar.addButton("newuser", 7, "New User Request", null, null);
			//    mytoolbar.addSeparator("sep", 8);	
			//    mytoolbar.addButton("about", 9, "About C2C", null, null);


			mytoolbar.attachEvent("onClick", function(id) {
				   switch(id) {
			       case 'home':
					    document.location.href='../c2cnetworks/home.html';
						break;
			        case 'trends':
		     //   		document.location.href='../c2cnetworks/login.php';
		        		document.location.href='../c2cnetworks/tabbarhome1.php';
			            break;
			        case 'login':
		        		document.location.href='../c2cnetworks/tabbarhome2.php';
			            break;
			        case 'newuser':
			        	localStorage.setItem('login', 'logout');
		        		document.location.href='../c2cnetworks/tabbarhome3.php';
			            break;			            
			        case 'about':
		        		document.location.href='../c2cnetworks/tabbarhome4.php';
			            break;
			        default:
			            break;
			    }
			});


			listname = 'Region';
			listtype = 'Region';
						
			formdata = [
			    	{type: "settings", position: "label-left", labelWidth: 150, inputWidth: 300},

					{type: "fieldset", label: "New User Request", inputWidth: "auto", list:[

			    	
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

						]}



						];
			        

/*		   
			formdata = [
				{type: "settings", position: "label-left", labelWidth: 100, inputWidth: 100},
				{type: "fieldset", label: "New User RC2C Member login", inputWidth: "auto", list:[
					
					{type: "input", label: "User ID:", name: "peopleuserid", value: "ID"},
					{type: "password", label: "Password:", name: "peoplepassword", value: "PW"},
					{type: "button", value: "login", name: "login"}

					]}
			];

			*/
			myform = new dhtmlXForm("myform", formdata);
			myform.setSkin("dhx_skyblue"); // top, left, item
			

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



			
	
		}

 //  }

		
	</script>


</html>