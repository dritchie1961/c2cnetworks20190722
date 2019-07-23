<!DOCTYPE HTML>
<html>
<head>
<title>User Requests</title>

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
<div id="my_tabbar" style="width: 1200px; height: 1000px;"></div>
      
<script type="text/javascript">



    function doOnLoad() {	


	
	var mydp, selId;

    var mytoolbar, mytabbar;    



	mytabbar = new dhtmlXTabBar("my_tabbar");			
	mytabbar.addTab("a1", "New Requests", null, null, true);
	mytabbar.addTab("a2", "Approved");
	mytabbar.addTab("a3", "Rejected");
	
    var loadedTabs = {};			
    mytabbar.tabs("a1").attachURL("../c2cnetworks/tabbaradminurequests1.php");	

    mytabbar.attachEvent("onTabClick", function(id)	{
    	switch(id) {
        		case 'a1':
 	      		mytabbar.tabs("a1").attachURL("../c2cnetworks/tabbaradminurequests1.php");	
            		break;
	           	case 'a2':
	          	   	mytabbar.tabs("a2").attachURL("../c2cnetworks/tabbaradminurequests2.php");	
	               break;
    		case 'a3':		 	           
	          	   	mytabbar.tabs("a3").attachURL("../c2cnetworks/tabbaradminurequests3.php");	
	               break;
	           default:
	               break;    
	           } 
   	});
	    
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
//        	document.location.href='../c2cnetworks/toolbaradmin.php'; 	
//    		window.open("../c2cnetworks/toolbaradmin.php","adminwindow", '_blank');			        	
    		
            break;
        default:			        
            break;
    } // switch
} // function 
); // event



			
    } // onload
	</script>	
	
</body>
</html>