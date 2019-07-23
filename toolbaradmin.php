<!DOCTYPE html>
<html>
<head>
<title>c2c Administrator</title>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<link rel="stylesheet" type="text/css" href="../codebase/fonts/font_roboto/roboto.css"/>
<link rel="stylesheet" type="text/css" href="../skins/skyblue/dhtmlx.css"/>
<link rel="stylesheet" type="text/css" href="../codebase/dhtmlx.css"/>
<script src="../codebase/dhtmlx.js"></script>
<script src="../c2cnetworks/c2cjscommon.js"></script>

</head>
<body onload="doOnLoad();">

	
	<div id="my_tabbar" style="width: 1200px; height: 600px;"></div>



<script>


var mytabbar;

   
function doOnLoad() {					
	mytabbar = new dhtmlXTabBar("my_tabbar");			

	mytabbar.addTab("a1", "Provenance", null, null, true);
	mytabbar.addTab("a2", "Tracker");
	mytabbar.addTab("a3", "Data Admin");
	mytabbar.addTab("a4", "User Requests");
	mytabbar.addTab("a5", "Collectors");
	mytabbar.addTab("a6", "Exit");
	
	mytabbar.setSkin("dhx_skyblue");
	
    var loadedTabs = {};			
    mytabbar.tabs("a1").attachURL("../c2cnetworks/tabbaradmin1.php");

    mytabbar.attachEvent("onTabClick", function(id)	{
    	switch(id) {
        	case 'a1':
 	      		mytabbar.tabs("a1").attachURL("../c2cnetworks/tabbaradmin1.php");	
            	break;
	        case 'a2':
	          	mytabbar.tabs("a2").attachURL("../c2cnetworks/tabbaradmin2.php");	
	            break;
    		case 'a3':		 	           
	          	mytabbar.tabs("a3").attachURL("../c2cnetworks/tabbaradmin3.php");	
	            break;
       		case 'a4':		 	           
          	   	mytabbar.tabs("a4").attachURL("../c2cnetworks/tabbaradmin4.php");	
               	break;
     		case 'a5':		 	           
          	   	mytabbar.tabs("a5").attachURL("../c2cnetworks/tabbaradmin5.php");	
               	break;

               	
	        case 'a6':
	           	window.opener = self;
				window.close();						
	            break;
           default:
               break;    
           } 
   	});

	}
	</script>


</body>
</html>
