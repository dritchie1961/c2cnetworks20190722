<?php

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

<body>

    <button onclick="additem()">Add</button>
    <button onclick="removeitem()">Remove</button>
    <button onclick="copyitem()">Copy</button>
      
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


	var mygrid,mydp,myform,newId,rowId,rowIndex, pos,selId; 	

	var lname = 'Type';
	var ltype = 'Type';


	
	   formdata = [
           {type: "settings", position: "label-left", labelWidth: 100, inputWidth: 200},
			{type: "fieldset", label: "Details", name: "formedit", inputWidth: "auto", list:[
		   	{type: "block", name: "b1", width: "auto" , list:[	
	
				{type: "input", name: "listentryid", label: "listentryid"},
				{type: "input", name: "listtype", label: "listtype"},
				{type: "input", name: "listname", label: "listname"},
				{type: "input", name: "listitem", label: "listitem"},
				{type: "button", value: "Save", name: "save"},
 				{type: "select", name: "type" , label: "Type", connector: '../c2cnetworks/acgetlist.php?listtype=' + ltype + '&listname=' + lname}, 			   
				{type: "input", name: "region", label: "Region"},
				{type: "input", name: "country", label: "Country"},
				{type: "input", name: "federation", label: "Federation"},
				{type: "input", name: "series", label: "Series"},
				{type: "input", name: "subseries", label: "Sub-Series"},
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

			mygrid.setSkin("dhx_skyblue");

	//		mygrid.setColumnColor("#f0e68c,#00ffff,#add8e6,#00ffff");

			mygrid.init();
			mygrid.load("../c2cnetworks/acdatalistmanager.php");
			mydp = new dataProcessor("../c2cnetworks/acdatalistmanager.php");			
			mydp.init(mygrid);

			myform = new dhtmlXForm("defaultform",formdata);

			myform.setSkin("dhx_skyblue");
			
			myform.bind(mygrid);


			
			myform.attachEvent("onButtonClick", function(id){
    		if (id == 'save'){
    	   		myform.save();
    		}});

			myform.attachEvent("OnChange", function(name, value){		
				switch(name) {
				case 'type': 
					myform.removeItem('region');
					listtype = "region";
					listname = "region";
					var x = {type: "select", name: "region" , label: "Region", labelWidth: "100", inputWidth: "200", connector: '../c2cnetworks/acgetlist.php?listtype=' + listtype + '&listname=' + listname};			
		//    		myform.addItem('b1', x, 1,0);	
		    		myform.addItem('b1', x, 6);	
		//    		myform.setItemValue('federation',null);
		 //   		myform.disableItem('federation');
		  //  		myform.setItemValue('series',null);
		   // 		myform.disableItem('series');		
		   // 		myform.setItemValue('subseries',null);
		   // 		myform.disableItem('subseries');		
		           	break;
				case 'region': 
					myform.removeItem('country');
					listtype = "country";
					listname = value;
					var x = {type: "select", name: "country" , label: "Country", labelWidth: "100", inputWidth: "200", connector: '../c2cnetworks/acgetlist.php?listtype=' + listtype + '&listname=' + listname};			
		    		myform.addItem('b1', x, 7);	
	//	    		myform.setItemValue('federation',null);
	//	    		myform.disableItem('federation');
	//	    		myform.setItemValue('series',null);
	//	    		myform.disableItem('series');		
	//	    		myform.setItemValue('subseries',null);
	//	    		myform.disableItem('subseries');		
		           	break;
		    	case 'country': 
		    		myform.removeItem('federation');
		    		listtype = "federation";
		    		listname = value;
		      		var x = {type: "select", name: "federation" , label: "Federation", labelWidth: "100", inputWidth: "200", connector: '../c2cnetworks/acgetlist.php?listtype=' + listtype + '&listname=' + listname};			
		    		myform.addItem('b1', x, 8);	
		    //		myform.addItem(null, x, 2);		
	//	    		myform.setItemValue('series','-');
		   // 		myform.disableItem('country');
	//	    		myform.setItemValue('subseries','-');
		   // 		myform.disableItem('subseries');	
		           	break;
		    	case 'federation': 
		    		myform.removeItem('series');
		    		listtype = "series";
		    		listname = value;
		      		var x = {type: "select", name: "series" , label: "Series", labelWidth: "100", inputWidth: "200", connector: '../c2cnetworks/acgetlist.php?listtype=' + listtype + '&listname=' + listname};			
		    		myform.addItem('b1', x, 9);	
//		    		myform.addItem(null, x, 3);		
		//    		myform.setItemValue('subseries','-');
		//	 		myform.disableItem('country');			
		           	break;
		    	case 'series': 
		    		myform.removeItem('subseries');
		    		listtype = "subseries";
		    		listname = value;
		      		var x = {type: "select", name: "subseries" , label: "Sub-Series", labelWidth: "100", inputWidth: "200", connector: '../c2cnetworks/acgetlist.php?listtype=' + listtype + '&listname=' + listname};			
		    		myform.addItem('b1', x, 10);		
		    //		myform.addItem(null, x, 4);		
			// 		myform.disableItem('federation');			
		           	break;

		       	case 'subseries': 
		  	 		myform.disableItem('series');			
		           	break;

		        default:
		           break;    
		       }});


			function additem() {
				newId = (new Date()).valueOf();
				rowId = mygrid.uid();                  
				pos = mygrid.getRowsNum();
				var x = "0,-,-,-";
				mygrid.addRow(rowId, x ,pos);
				mygrid.selectRowById(newId);
			};
	/*		
			
			function additem() {
				var newId = (new Date()).valueOf();
				var rowId = mygrid.uid();
				var pos = mygrid.getRowsNum();
				mygrid.addRow(rowId,",-,-,-", pos);		
				mygrid.selectRowById(newId);
	//			mygrid.setrowdata(newId, {'status' : "collection"});
			};
*/
			function removeitem() {
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
    		};


       		function copyitem() {
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
    		};

		
	</script>	
	
</body>
</html>