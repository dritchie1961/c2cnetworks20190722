<?php 

//  <button onclick="additem()">Add</button>
 //   <button onclick="removeitem()">Remove</button>
  //  <button onclick="copyitem()">Copy</button>
  ?>


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
	
  
      
    <table>
		<tr>
			<td>					
				<div id="mygrid_container" style="width: 450px; height: 500px;"></div>	
			</td>
			<td>
				<div id="defaultform" style="width: 400px; height: 500px; background-color: white;"></div>
					
			</td>
		</tr>

	</table>
      
	<script type="text/javascript">

	
    function doOnLoad() {	
    	

	var mygrid,mydp,myform,newId,rowId,rowIndex, pos,selId; 	


    var mytoolbar, mytabbar;    

	var lname = 'Type';
	var ltype = 'Type';

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

alert('clicked' + id);


			
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

	
	   formdata = [
           {type: "settings", position: "label-left", labelWidth: 100, inputWidth: 200},
			{type: "fieldset", label: "Details", name: "formedit", inputWidth: "auto", list:[
		   	{type: "block", name: "b1", width: "auto" , list:[	
	
				{type: "input", name: "listentryid", label: "listentryid"},
				{type: "input", name: "listtype", label: "listtype"},
				{type: "input", name: "listname", label: "listname"},
				{type: "input", name: "listitem", label: "listitem"},
				{type: "button", value: "Save", name: "save"},
				{type: "button", value: "Add", name: "add"},	
				{type: "button", value: "Delete", name: "delete"},
				{type: "button", value: "Copy", name: "copy"},
				]}
			]}];
	
			mygrid = new dhtmlXGridObject("mygrid_container");
			mygrid.setImagePath("../codebase/imgs/");
			mygrid.setHeader("listentryid,listtype,listname,listitem");
			mygrid.setColumnIds('listentryid,listtype,listname,listitem');

			mygrid.setInitWidths("100,100,100,100");
			mygrid.setColAlign("left,left,left,left");
//			mygrid.setColSorting("int,str,str,str");
			mygrid.setColTypes("ro,ro,ro,ro");

			mygrid.setColSorting("int,str,str,str"); 

	//		mygrid.setColumnColor("#f0e68c,#00ffff,#add8e6,#00ffff");

			mygrid.init();
			mygrid.load("../c2cnetworks/acdatalistmanager.php");
			mydp = new dataProcessor("../c2cnetworks/acdatalistmanager.php");			
			mydp.init(mygrid);

		   	mygrid.attachEvent("onDataReady",function(){
			    // your code here
			mygrid.selectRow(0);	
			});

			myform = new dhtmlXForm("defaultform",formdata);
			myform.bind(mygrid);
		
			myform.attachEvent("onButtonClick", function(id){
			switch(id) {
			case 'save':
    	   		myform.save();
     	   	   	break; 
			case 'add':				
				newId = (new Date()).valueOf();
				rowId = mygrid.uid();                  
				pos = mygrid.getRowsNum();
				var x = "0,-,-,-";
				mygrid.addRow(rowId, x ,pos);
				mygrid.selectRowById(newId);
				break; 			
			case 'delete' :
		    	var rowId = mygrid.getSelectedRowId();
            	var rowIndex = mygrid.getRowIndex(rowId);
            	if(rowId!=null){
           	 	mygrid.deleteRow(rowId);
                	if(rowIndex!=(mygrid.getRowsNum()-1)){
               	 	mygrid.selectRow(rowIndex+1,true);
                    } else{
                   	 mygrid.selectRow(rowIndex-1,true)
                    }
                };
                break;    		
			case 'copy':
				var a = mygrid.getSelectedRowId();
    			var selectedrow = mygrid.getRowData(a);
    			var r1 = '0';
    			var r2 = selectedrow['listtype'];
    			var r3 = selectedrow['listname'];
    			var r4 = selectedrow['listitem'];
    			var newId = (new Date()).valueOf();
    			var rowId = mygrid.uid();
    			var pos = mygrid.getRowsNum();
    			var y = r1 +"," + r2 + "," + r3 + "," + r4;
    			mygrid.addRow(rowId,y, pos);
    			mygrid.selectRowById(newId);
 			   	break; 
	        default:
		           break;        	   		
    		}});

		} // onload

	
	</script>	
	
</body>
</html>