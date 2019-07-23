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

	<div id="mygrid_container" style="width: 700px; height: 500px;"></div>
	<br>
      <button onclick="deletelogin()">Delete</button>
		
	<script type="text/javascript">

	   function doOnLoad() {	
	
    var mytoolbar, mytabbar;    
	var  mydp, selId;

/*
	mytabbar = new dhtmlXTabBar("my_tabbar");			
	mytabbar.addTab("a1", "Profile", null, null, true);
	mytabbar.addTab("a2", "Defaults");
	mytabbar.addTab("a3", "Account");
	
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

*/
    
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



			mygrid = new dhtmlXGridObject("mygrid_container");
			mygrid.setImagePath("../codebase/imgs/");
			mygrid.setHeader("ID,User ID,Login Date,Status");
			mygrid.setColumnIds('loginid,peopleuserid,logindate,status');
			
			mygrid.setInitWidths("75,100,150,200");
			mygrid.setColAlign("left,left,left,left");
			mygrid.setColSorting("int,str,str,str");
			mygrid.setColTypes("ro,ro,ro,ro");

//			mygrid.setColumnColor("#f0e68c,#00ffff,#add8e6,#00ffff");

			mygrid.init();
			mygrid.load("../c2cnetworks/acusertracking.php");
			mydp = new dataProcessor("../c2cnetworks/acusertracking.php");			
			mydp.init(mygrid);


		   	mygrid.attachEvent("onDataReady",function(){
			    // your code here
			mygrid.selectRow(0);	
			});



			
		function deletelogin() {
		    var rowId = mygrid.getSelectedRowId();
            var rowIndex = mygrid.getRowIndex(rowId);

            if(rowId!=null){
           	 mygrid.deleteRow(rowId);
                if(rowIndex!=(mygrid.getRowsNum()-1)){
               	 mygrid.selectRow(rowIndex+1,true);
                } else{
               	 mygrid.selectRow(rowIndex-1,true)
                }
            }    
		}



	   } // onload 
	   
	</script>	
	
</body>
</html>