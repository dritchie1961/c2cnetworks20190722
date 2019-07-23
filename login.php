<!DOCTYPE html>
<html>
<head>
<title>c2c login</title>


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



/*
			
			if (loginstatus == 'passed'){
			    mytoolbar.addButton("logout", 1, "Logout", null, null);
			    mytoolbar.addSeparator("sep", 2);
				mytoolbar.addButton("return", 3, "Return to your collection", null, null);
		    	mytoolbar.addSeparator("sep", 4);
		    	mytoolbar.addText("c2c", 5, "c2c Networks");
*/

	//			}else{
			    mytoolbar.addButton("home", 1, "Home", null, null);
			    mytoolbar.addSeparator("sep", 2);	
			    mytoolbar.addButton("trends", 3, "Market Trends", null, null);
			    mytoolbar.addSeparator("sep", 4);
			    mytoolbar.addButton("login", 5, "C2C Member Login", null, null);
			    mytoolbar.addSeparator("sep", 6);	
			    mytoolbar.addButton("newuser", 7, "New User Request", null, null);
			    mytoolbar.addSeparator("sep", 8);	
			    mytoolbar.addButton("about", 9, "About C2C", null, null);
//			    mytoolbar.addSeparator("sep", 10);	

	//		 	mytoolbar.addText("c2c", 11, "c2c Networks");
		//	};

			mytoolbar.attachEvent("onClick", function(id) {
				   switch(id) {
			        case 'login':
		     //   		document.location.href='../c2cnetworks/login.php';
		        		document.location.href='../c2cnetworks/login.php';
			            break;
			        case 'newuser':
		        		document.location.href='../c2cnetworks/newuserrequest.php';
			            break;
			        case 'logout':
			        	localStorage.setItem('login', 'logout');
				        document.location.href='../c2cnetworks/home.html';
			            break;			            
			        case 'return':
				        document.location.href='../c2cnetworks/toolbarme.php';				        
			            break;
			        default:
			            break;
			    }
			});



		   
			formdata = [
				{type: "settings", position: "label-left", labelWidth: 100, inputWidth: 100},
				{type: "fieldset", label: "C2C Member login", inputWidth: "auto", list:[
					{type: "input", label: "User ID:", name: "peopleuserid", value: "ID"},
					{type: "password", label: "Password:", name: "peoplepassword", value: "PW"},
					{type: "button", value: "login", name: "login"}
				]}
			];
			myform = new dhtmlXForm("myform", formdata);
			myform.setSkin("dhx_skyblue"); // top, left, item
			
			
			myform.attachEvent("onButtonClick", function(id){

				if (id == "login") {
					
						myform.send("../c2cnetworks/c2cauthenticate.php", "get", function(loader, response){
							
						// authentic will store user id/pw in cookies for PHP use
						 
						if (response == 'id0'){													
							alert('ID was not found, please try again?  ');
						} else if (response == 'pw0'){													
							alert('PW was not found, please try again?  ');
						} else {
							localStorage.setItem('login', "passed");
							var id = myform.getItemValue("peopleuserid");
							var pw = myform.getItemValue("peoplepassword");

							// login will store user id/pw in local store for JS use
							
							localStorage.setItem('peopleuserid', id );
							localStorage.setItem('peopleid', response );
							localStorage.setItem('peoplepassword', pw );
							
							document.location.href="../c2cnetworks/toolbarme.php";
						}
					}); // form send
						
				} // id login
				
			}); // attachevent
		}

 //  }

		
	</script>


</html>
