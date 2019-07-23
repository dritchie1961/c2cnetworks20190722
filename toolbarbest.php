<!DOCTYPE html>
<html>
<head>
<title>BEST</title>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<link rel="stylesheet" type="text/css" href="../../../codebase/fonts/font_roboto/roboto.css"/>
<link rel="stylesheet" type="text/css" href="../../../skins/web/dhtmlx.css"/>
<link rel="stylesheet" type="text/css" href="../../../skins/terrace/dhtmlx.css"/>
<link rel="stylesheet" type="text/css" href="../../../skins/skyblue/dhtmlx.css"/>
<link rel="stylesheet" type="text/css" href="../../../codebase/dhtmlx.css"/>
<script src="../codebase/dhtmlx.js"></script>
<script src="../c2cnetworks/c2cjscommon.js"></script>

</head>

<body onload="doOnLoad();">

<div id="toolbarObj"></div> 
<div id="my_tabbar" style="height: 1000px;"></div>

<script>


        var mytoolbar, mytabbar;
            
        setCookie("peopleid", peopleid);
		   
		function doOnLoad() {					
			mytabbar = new dhtmlXTabBar("my_tabbar");			
			mytabbar.addTab("a1", "Search", null, null, true);
			mytabbar.addTab("a2", "Activity");
			mytabbar.addTab("a3", "Trends");
			   mytabbar.setSkin("dhx_skyblue");
		    var loadedTabs = {};			
		    mytabbar.tabs("a1").attachURL("../c2cnetworks/tabbarbest1.php");

		    mytabbar.attachEvent("onTabClick", function(id)	{
	        	switch(id) {
 	           		case 'a1':
		 	      		mytabbar.tabs("a1").attachURL("../c2cnetworks/tabbarbest1.php");	
 	               		break;
	 	           	case 'a2':
	 	          	   	mytabbar.tabs("a2").attachURL("../c2cnetworks/tabbarbest2.php");	
	 	               break;
	        		case 'a3':		 	           
	 	          	   	mytabbar.tabs("a3").attachURL("../c2cnetworks/tabbarbest3.php");	
	 	               break;
	 	           default:
	 	               break;    
	 	           } 
   	    	});

			mytoolbar = new dhtmlXToolbarObject("toolbarObj");
			    mytoolbar.setIconsPath("../common/imgs/");
			    mytoolbar.addButton("me", 8, "Membership Profile", null, null);		
		//	    mytoolbar.addSeparator("sep", 9);
			    mytoolbar.addButton("collection", 10, "Collection", null, null);		
	//		    mytoolbar.addSeparator("sep", 11);
				mytoolbar.addButton("mail", 12, "c2c Chat", null, null);	
		//	    mytoolbar.addText("sep", 13, ">>>");
				mytoolbar.addButton("best", 14, " >>> BEST <<< ", null, null);	
		//	    mytoolbar.addText("sep", 15, "<<<");
			    mytoolbar.addButton("logout", 16, "Logout", null, null);		
				mytoolbar.setSkin("dhx_terrace"); 
				mytoolbar.attachEvent("onClick", function(id) {
					   switch(id) {
				        case 'logout':
				        	localStorage.setItem('login', 'logout');
//					        document.location.href='../c2cnetworks/home.html';
					        document.location.href= homelocation;
				            break;
				        case 'me':
				            document.location.href='../c2cnetworks/toolbarme.php';
				            break;
			        	case 'collection':
					    	document.location.href='../c2cnetworks/toolbarcollection.php'; 
				            break;
				        case 'mail':
				        	document.location.href='../c2cnetworks/toolbarmail.php'; 				        	
				            break;
				        case 'best':
				        	document.location.href='../c2cnetworks/toolbarbest.php'; 				        	
				            break;
				        default:			        
				            break;
				    }
				});
			}// do onload


	</script>



</body>
</html>

