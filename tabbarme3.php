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

<body>

	<table>
		<tr>
			<td>
				<div id="defaultgrid"
					style="width: 700px; height: 333px; background-color: white;"></div>
				<BR>
			
			</td>
			<td>
				<div id="defaultform"
					style="width: 400px; height: 400px; background-color: white;"></div>
			</td>
		</tr>

	</table>

	<script>	

	var peopleid = localStorage.getItem('peopleid');

//	alert("peopleid is " + peopleid);

	var mygrid,mydp,myform,newId,rowId,rowIndex, pos,selId; 
	var listname = 'Type';
	var listtype = 'Type';



//{type: "settings", position: "label-left", labelWidth: 150, inputWidth: 300},
	
	formdata = [
		{type: "fieldset",  name: "f1", label: "Edit Defaults", width: "auto", list:[

			{type: "block", name: "formedit", blockOffset: 0, width: "auto", list:[
				{type: "settings", position: "label-left", labelWidth: 100, inputWidth: 200},
			    //			{type: "input", name: "collectordefaultid", label: "collectordefaultid"},
	//	  		{type: "input", name: "did", label: "did"},
		  	
           		{type: "input", name: "peopleid", label: "Peopleid"},
           		{type: "input", name: "dcode", label: "Default Code"},
	//			{type: "input", name: "type", label: "type"},
 				{type: "select", name: "type" , label: "Type", connector: '../c2cnetworks/acgetlist.php?listtype=' + listtype + '&listname=' + listname},
  			   
				{type: "input", name: "region", label: "Region"},
				{type: "input", name: "country", label: "Country"},
				{type: "input", name: "federation", label: "Federation"},
				{type: "input", name: "series", label: "Series"},
				{type: "input", name: "subseries", label: "Sub-Series"},
			]},		
			{type: "block", name: "b2", blockOffset: 10, width: "auto", list:[
				{type: "button", value: "Save", name: "save"},
				{type: "newcolumn"},
				{type: "button", value: "Reset", name: "reset"}			
			]},		
		]},
	];
	
		mygrid = new dhtmlXGridObject('defaultgrid');
	   	mygrid.setImagePath("../codebase/imgs/");

		mygrid.setHeader("peopleid,dcode,Type,Region,Country,Federation,Series,Subseries");
	   	mygrid.setColumnIds('peopleid,dcode,type,region,country,federation,series,subseries');
	   	mygrid.setColTypes("ro,ro,ro,ro,ro,ro,ro,ro");
   		mygrid.setColumnsVisibility('true,true,false,false,false,false,false,false');   
	   	mygrid.setInitWidths("50,50,125,125,125,125,100,100");
	    mygrid.setSkin("dhx_skyblue");
	   	mygrid.init();
	   	
//	   	mygrid.load("../c2cnetworks/accollectiondefault.php?peopleid=" +  peopleid );
//	   	mydp = new dataProcessor("../c2cnetworks/accollectiondefault.php?peopleid=" +  peopleid );

	//    mygrid.load("../c2cnetworks/accollectordefault.php?id=" +  "1");
  	    mygrid.load("../c2cnetworks/accollectordefault.php?peopleid=" +  peopleid);
	 //   mygrid.load("../c2cnetworks/accollectordefault.php?id=1";
	//   	mydp = new dataProcessor("../c2cnetworks/accollectordefault.php?peopleid=" +  peopleid );
	   	mydp = new dataProcessor("../c2cnetworks/accollectordefault.php");
	
	   	mydp.init(mygrid);

	   	mygrid.attachEvent("onDataReady",function(){
			mygrid.selectRow(0);
		});
   	
	   	myform = new dhtmlXForm("defaultform",formdata);
	    myform.setSkin("dhx_skyblue");
	   	myform.bind(mygrid);

		myform.disableItem('peopleid');
	//	myform.disableItem('defaultnum');
		myform.disableItem('region');
		myform.disableItem('country');
		myform.disableItem('federation');
		myform.disableItem('series');		
		myform.disableItem('subseries');		

		myform.attachEvent("onButtonClick", function(id){
    		if (id == 'save'){
    	   		myform.save();
    	   		myform.disableItem('regions');	
    		} else if (id == 'reset') {
                myform.setItemValue('region', null);
                myform.setItemValue('country', null);
                myform.setItemValue('federation', null);
                myform.setItemValue('series', null);		
                myform.setItemValue('subseries', null);	
            };
		});
/*
		myform.attachEvent("onButtonClick", function(id){
			//	   	alert("id is: " + id);
				   myform.save();
			//	   	alert("saving 222");
				   myform.disableItem('regions');	
				   myform.disableItem('subseries');	
					   
			 	});
*/
		myform.attachEvent("OnChange", function(name, value){		
			switch(name) {
			case 'type': 
				myform.removeItem('region');
				listtype = "region";
				listname = "region";
				var x = {type: "select", name: "region" , label: "Region", labelWidth: "100", inputWidth: "200", connector: '../c2cnetworks/acgetlist.php?listtype=' + listtype + '&listname=' + listname};			
	    		myform.addItem('formedit', x, 3);	
	    		myform.setItemValue('federation',null);
	    		myform.disableItem('federation');
	    		myform.setItemValue('series',null);
	    		myform.disableItem('series');		
	    		myform.setItemValue('subseries',null);
	    		myform.disableItem('subseries');		
	           	break;
			case 'region': 
				myform.removeItem('country');
				listtype = "country";
				listname = value;
				var x = {type: "select", name: "country" , label: "Country", labelWidth: "100", inputWidth: "200", connector: '../c2cnetworks/acgetlist.php?listtype=' + listtype + '&listname=' + listname};			
		  		myform.addItem('formedit', x, 4);	
	    		myform.setItemValue('federation',null);
	    		myform.disableItem('federation');
	    		myform.setItemValue('series',null);
	    		myform.disableItem('series');		
	    		myform.setItemValue('subseries',null);
	    		myform.disableItem('subseries');		
	           	break;
	    	case 'country': 
	    		myform.removeItem('federation');
	    		listtype = "federation";
	    		listname = value;
	      		var x = {type: "select", name: "federation" , label: "Federation", labelWidth: "100", inputWidth: "200", connector: '../c2cnetworks/acgetlist.php?listtype=' + listtype + '&listname=' + listname};			
	      		myform.addItem('formedit', x, 5);	
	    //		myform.addItem(null, x, 2);		
	    		myform.setItemValue('series','-');
	   // 		myform.disableItem('country');
	    		myform.setItemValue('subseries','-');
	   // 		myform.disableItem('subseries');	
	           	break;
	    	case 'federation': 
	    		myform.removeItem('series');
	    		listtype = "series";
	    		listname = value;
	      		var x = {type: "select", name: "series" , label: "Series", labelWidth: "100", inputWidth: "200", connector: '../c2cnetworks/acgetlist.php?listtype=' + listtype + '&listname=' + listname};			
	      		myform.addItem('formedit', x, 6);	
//	    		myform.addItem(null, x, 3);		
	    		myform.setItemValue('subseries','-');
		 		myform.disableItem('country');			
	           	break;
	    	case 'series': 
	    		myform.removeItem('subseries');
	    		listtype = "subseries";
	    		listname = value;
	      		var x = {type: "select", name: "subseries" , label: "Sub-Series", labelWidth: "100", inputWidth: "200", connector: '../c2cnetworks/acgetlist.php?listtype=' + listtype + '&listname=' + listname};			
	      		myform.addItem('formedit', x, 7);			
	    //		myform.addItem(null, x, 4);		
		 		myform.disableItem('federation');			
	           	break;

	       	case 'subseries': 
	  	 		myform.disableItem('series');			
	           	break;

	        default:
	           break;    
	       }});

	   	
		function defaultadd() {
			newId = (new Date()).valueOf();
			rowId = mygrid.uid();                  
			pos = mygrid.getRowsNum();
			var x = peopleid + ",0,0,-,-,-,-,-";
			mygrid.addRow(rowId, x ,pos);
			mygrid.selectRowById(newId);
		};

		function defaultremove() {
            rowId = mygrid.getSelectedRowId();
            rowIndex = mygrid.getRowIndex(rowId);

            if(rowId!=null){
           	 mygrid.deleteRow(rowId);
                if(rowIndex!=(mygrid.getRowsNum()-1)){
               	 mygrid.selectRow(rowIndex+1,true);
                } else{
               	 mygrid.selectRow(rowIndex-1,true)
                }
            }
		};
	
	</script>

</body>
</html>
