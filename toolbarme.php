<!DOCTYPE html>
<html>
<head>
<title>My Navigator</title>

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
<div id="my_tabbar" style="width: 1200px; height: 1000px;"></div>

</body>

<script>

        var mytoolbar, mytabbar;       
	   
		function doOnLoad() {	

			var peopleuserid = localStorage.getItem('peopleuserid');
			var peopleid = localStorage.getItem('peopleid');
			var peoplepassword = localStorage.getItem('peoplepassword');
						
				mytabbar = new dhtmlXTabBar("my_tabbar");			
				mytabbar.addTab("a1", "Profile", null, null, true);
				mytabbar.addTab("a2", "Account");
				mytabbar.addTab("a3", "Defaults");
				mytabbar.setSkin("dhx_skyblue"); 
	//			mytabbar.setSkin("dhx_terrace"); 
	//			   mytabbar.setSkin("dhx_skyblue");
				
			    var loadedTabs = {};			
			    mytabbar.tabs("a1").attachURL("../c2cnetworks/tabbarme1.php");

			    mytabbar.attachEvent("onTabClick", function(id)	{
		        	switch(id) {
	 	           		case 'a1':
			 	      		mytabbar.tabs("a1").attachURL("../c2cnetworks/tabbarme1.php");	
	 	               		break;
		 	           	case 'a2':
		 	          	   	mytabbar.tabs("a2").attachURL("../c2cnetworks/tabbarme2.php");	
		 	               break;
		        		case 'a3':		 	           
		 	          	   	mytabbar.tabs("a3").attachURL("../c2cnetworks/tabbarme3.php");	
		 	               break;
		 	           default:
		 	               break;    
		 	           } 
	   	    	});
				    
			mytoolbar = new dhtmlXToolbarObject("toolbarObj");
			mytoolbar.setSkin("dhx_terrace"); 
			    mytoolbar.setIconsPath("../common/imgs/");
		//	    mytoolbar.addText("sep", 7, ">>>");
		    	mytoolbar.addButton("me", 8, " >>> MEMBERSHIP PROFILE <<< ", null, null);		
		//	    mytoolbar.addText("sep", 9, "<<<");
			    mytoolbar.addButton("collection", 10, "Collection", null, null);		
	//		    mytoolbar.addSeparator("sep", 11);
				mytoolbar.addButton("mail", 12, "c2c Chat", null, null);	
	//		    mytoolbar.addSeparator("sep", 13);
				mytoolbar.addButton("best", 14, "BEST", null, null);	
	//		    mytoolbar.addSeparator("sep", 15);
			    mytoolbar.addButton("logout", 16, "Logout", null, null);	
	//		    mytoolbar.setSkin("dhx_skyblue");
	//			if (peopleid == '1') {
    	//		    mytoolbar.addSeparator("sep", 17);
    	//		    mytoolbar.addButton("admin1", 18, "Admin", null, null);	
			//	};
				
	//		    mytoolbar.addSeparator("sep", 19);
	//		    mytoolbar.addButton("admin2", 20, "Admin Old", null, null);	
			    	

				mytoolbar.attachEvent(
						"onClick", function(id) {
					   switch(id) {
		        		case 'logout':
				        	localStorage.setItem('login', 'Logout');
//					        document.location.href='../c2cNetworks/Index.php';
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
				        case 'admin1':
//				        	document.location.href='../c2cnetworks/toolbaradmin.php'; 	
				    		window.open("../c2cnetworks/toolbaradminprov.php","adminwindow", '_blank');			        	
				    		
				            break;
				        case 'admin2':
//				        	document.location.href='../c2cnetworks/toolbaradmin.php'; 	
				    		window.open("../c2cnetworks/toolbaradmin.php","adminwindow", '_blank');			        	
				    		
				            break;



				            
				        default:			        
				            break;
				    } // switch
				} // function 
				); // event

		} // onload
		
	</script>


</html>
