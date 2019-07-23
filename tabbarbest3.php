<!DOCTYPE html>
<html>
<head>
<title>BEST</title>

<link rel="stylesheet" type="text/css" href="../codebase/dhtmlx.css" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<link rel="stylesheet" type="text/css" href="../codebase/fonts/font_roboto/roboto.css"/>
<link rel="stylesheet" type="text/css" href="../skins/skyblue/dhtmlx.css"/>
<link rel="stylesheet" type="text/css" href="../codebase/dhtmlx.css"/>
<script src="../codebase/dhtmlx.js"></script>
<script src="../c2cnetworks/c2cjscommon.js"></script>


</head>

<body onload="doOnLoad();">

 		
			<div id="myform"></div>
		

	
<script>
        var mytoolbar, mytabbar,searchgrid,searchdp,sellgrid,selldp,newId,rowId,pos,selId;
		var formdata,myform,listname,listtype;
//		listname = 'Region';
//		listtype = 'Region';
		listname = 'Type';
		listtype = 'Type';
    	
//		var lppassetid = localStorage.getItem('lppassetid');
		var peopleid = localStorage.getItem('peopleid');
        	   
		function doOnLoad() {	
/*
			mytoolbar = new dhtmlXToolbarObject("toolbarobj");
			    mytoolbar.setIconsPath("../common/imgs/");
			    mytoolbar.addButton("me", 8, "Membership Profile", null, null);		
			    mytoolbar.addSeparator("sep", 9);
			    mytoolbar.addButton("collection", 10, "Collection", null, null);		
			    mytoolbar.addSeparator("sep", 11);
				mytoolbar.addButton("mail", 12, "c2c Chat", null, null);	
			    mytoolbar.addSeparator("sep", 13);
				mytoolbar.addButton("best", 14, "BEST", null, null);	
			    mytoolbar.addSeparator("sep", 15);
			    mytoolbar.addButton("logout", 16, "Logout", null, null);		

				   mytoolbar.setSkin("dhx_skyblue");

			    
				mytoolbar.attachEvent("onClick", function(id) {
				switch(id) {
    				case 'logout':
    							//           	setCookie("login", "LOGOUT");
    				      	localStorage.setItem('login', 'Logout');
//    					    document.location.href='../c2cnetworks/Index.php';
 					       document.location.href='../c2cnetworks/home.html';
    				        break;
    				case 'me':
    								    //    document.location.href='../pevm3/pevmnavigator.php'; 
    				        document.location.href='../c2cnetworks/toolbarme.php';
    				        break;
    				case 'collection':
    //							        	alert("000");
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
*/
				formdata = [

/*

					
					{type: "fieldset",  name: "query", label: "BEST Market Search", width: "auto", list:[
					   	{type: "block", name: "queryc1", width: "auto" , list:[	
							{type: "select", name: "type" , label: "Type", labelWidth: "100", inputWidth: "200", connector: '../c2cnetworks/acgetlist.php?listtype=' + listtype + '&listname=' + listname},
						
		//					{type: "input", name: "type", label: "type",  labelWidth: "100", inputWidth: "200"},
	           				     
        					{type: "input", name: "region", label: "Region",  labelWidth: "100", inputWidth: "200"},
           					{type: "input", name: "country", label: "Country",  labelWidth: "100", inputWidth: "200"},			 
						]},
    					{type: "newcolumn"},
					   	{type: "block", name: "queryc2", width: "auto" , list:[	
        					{type: "input", name: "federation", label: "Federation",  labelWidth: "100", inputWidth: "200"},
        					{type: "input", name: "series", label: "Series",  labelWidth: "100", inputWidth: "200"},
        					{type: "input", name: "subseries", label: "Sub-Series", labelWidth: "100", inputWidth: "200"},
						]},
    					{type: "newcolumn"},
     					{type: "block", name: "queryc3", width: "auto", list:[
        					{type: "input", name: "assetyear", label: "Year", labelWidth: "100", inputWidth: "200"},
    						{type: "input", name: "agrade", label: "Grade", labelWidth: "100", inputWidth: "200"},
						]},
	  					{type: "newcolumn"},
	  					
     					{type: "block", name: "queryc4", blockOffset: 30, width: "auto", list:[
     						{type: "block", name: "queryc4top", blockOffset: 30, width: "auto", list:[
     							{type: "button", name: "d1", width: 20, value: "D1"},
        						{type: "newcolumn"},
        						{type: "button", name: "d2", width: 20, value: "D2"},   
        						{type: "newcolumn"},
        						{type: "button", name: "d3", width: 20, value: "D3"},   
        						{type: "newcolumn"},
        						{type: "button", name: "d4", width: 20, value: "D4"},   
        						{type: "newcolumn"},
        						{type: "button", name: "d5", width: 20, value: "D5"},    	
					       	]},
     						{type: "block", name: "queryc4middle", blockOffset: 30, width: "auto", list:[
     							{type: "button", name: "search",  width: 124, value: "Search"},
   					       	]},
   	   					    {type: "block", name: "queryc4bottom", blockOffset: 30, width: "auto", list:[
   	   	   					  {type: "button", name: "reset",  width: 124, value: "Reset"}, 	
    						]},
						]},
		
					]},
*/

					// keep this ...
					
					{type: "fieldset",  name: "trend", label: "Market Trends", width: "auto", list:[	



// New Assets added
// Total Assets
// Total Transfers
// Orphaned Assets
// Total Indicative Asset Value
// Average Value of Transfer

// Most active 				
// Regional Trade Volumes
// NA, Europe, Asia, SA, Australia, Antartica, Africa


						
									
    					{type: "label", name: "trends", label: "Market Trend - TBD MEMBERS will get access to better analytics than PUBLIC Trends Page"},
    	//				{type: "input", name: "demandaverageprice", label: "Demand Average Price",  labelWidth: "300", inputWidth: "100"},
    	//				{type: "input", name: "demandtotal", label: "Demand Total",  labelWidth: "300", inputWidth: "100"},
    	//				{type: "input", name: "supplyaverageprice", label: "Supply Average Price",  labelWidth: "300", inputWidth: "100"},
    	//				{type: "input", name: "supplytotal", label: "Supply Total",  labelWidth: "300", inputWidth: "100"},
    	//				{type: "input", name: "sdtopaverage", label: "Supply & Demand Best Average",  labelWidth: "300", inputWidth: "100"},




       					// Average Value of Transfer

    					// Most active 				
    					// Regional Trade Volumes
    					// NA, Europe, Asia, SA, Australia, Antartica, Africa

    					{type: "input", name: "t3", label: "Average Price",  labelWidth: "150", inputWidth: "200", value: "$4,509.11"},
    					{type: "input", name: "t2", label: "Total Assets",  labelWidth: "150", inputWidth: "200", value: "1,340,543,321"},
    					{type: "input", name: "t1", label: "Assets Added today",  labelWidth: "150", inputWidth: "200", value: "2,209"},	
    					{type: "input", name: "t3", label: "Total Orphaned Assets",  labelWidth: "150", inputWidth: "200", value: "89,433"},

    					
    					{type: "input", name: "t4", label: "Most Active Servies",  labelWidth: "150", inputWidth: "200", value: "Canadian 5 Cent, George VI"},
    					{type: "input", name: "t5", label: "Total Assets for Sale",  labelWidth: "150", inputWidth: "200", value: "1,219,982"},
    					{type: "input", name: "t5", label: "Total Assets Requests",  labelWidth: "150", inputWidth: "200", value: "5,345,982"},	
    					
    					
    			//		{type: "input", name: "demandaverageprice", label: "Average Transfer Price",  labelWidth: "300", inputWidth: "100"},
    			//		{type: "input", name: "demandtotal", label: "Demand Total",  labelWidth: "300", inputWidth: "100"},
  //  					{type: "input", name: "supplyaverageprice", label: "Supply Average Price",  labelWidth: "300", inputWidth: "100"},
    //					{type: "input", name: "supplytotal", label: "Supply Total",  labelWidth: "300", inputWidth: "100"},
    	//				{type: "input", name: "sdtopaverage", label: "Supply & Demand Best Average",  labelWidth: "300", inputWidth: "100"},











						




        					
					]},

					/*
					{type: "fieldset",  name: "market", label: "BEST Market activity", width: "auto", list:[				
    					{type: "label", name: "search", label: "Search (Demand)"},
    					{type: "container", name: "searchgrid",  inputWidth: 600, inputHeight: 200},
    					{type: "newcolumn"},
    					{type: "label", name: "sell", label: "Sell (Supply)"},
    					{type: "container", name: "sellgrid",  inputWidth: 600, inputHeight: 200}
					]}
*/

					];

/*
				{type: "block", blockOffset: 0, list: [
				{type: "button", value: "Ok"},
				{type: "newcolumn"},
				{type: "button", value: "Cancel"}
			]}
				*/

				
		var	   	mydp;		
		myform = new dhtmlXForm("myform",formdata);

		myform.setSkin("dhx_skyblue");

	  	myform.load(             "../c2cnetworks/acTrendsMember.php?id=1");
//		myform.load(             "../c2cnetworks/acmemberdetails.php?id=" + peopleid);    				
	   	mydp = new dataProcessor("../c2cnetworks/acTrendsMember.php");

	   	mydp.init(myform);	
/*
   		myform.disableItem('type');
		myform.disableItem('region');
		myform.disableItem('country');
		myform.disableItem('federation');
		myform.disableItem('series');		
		myform.disableItem('subseries');	

	myform.attachEvent("onButtonClick", function(id){

	  	myform.disableItem('type');
		myform.disableItem('region');
		myform.disableItem('country');
		myform.disableItem('federation');
		myform.disableItem('series');		
		myform.disableItem('subseries');
	*/



		/*		
		switch(id) {
		case 'd1': 
	//		alert("defaults 1");
		  	myform.load(             "../c2cnetworks/acbestdefaults.php?id=a" + peopleid);
			break;
		case 'd2': 
//			alert("defaults 2");
		  	myform.load(             "../c2cnetworks/acbestdefaults.php?id=b" + peopleid);
			break;		
		case 'd3': 
	//		alert("defaults 3");
		  	myform.load(             "../c2cnetworks/acbestdefaults.php?id=c" + peopleid);
			break;		
		case 'd4': 
	//		alert("defaults 4");
		  	myform.load(             "../c2cnetworks/acbestdefaults.php?id=d" + peopleid);
			break;		
		case 'd5': 
//			alert("defaults 5");
		  	myform.load(             "../c2cnetworks/acbestdefaults.php?id=e" + peopleid);
			break;		

			case 'search': 
	//		alert ('search 111');
			var a = myform.getItemValue("type");
			
			var b = myform.getItemValue("region");
			var c = myform.getItemValue("country");
	//		alert ('search 444');
			var d = myform.getItemValue("federation");
			var e = myform.getItemValue("series");
			var f = myform.getItemValue("subseries");
	//		alert ('region ' + a );
			var x = "?type=" + a + "&region=" + b + "&country=" + c + "&federation=" + d + "&series=" + e + "&subseries=" + f;
//			alert ('333');
//			alert ('abcde = ' + x );

			sellgrid.clearAll();
			searchgrid.clearAll();

	   		sellgrid.load("../c2cnetworks/acbestsell.php" + x);   		
			searchgrid.load("../c2cnetworks/acbestsearch.php" + x);

	//  		sellgrid.load("../c2cnetworks/acbestsell.php");   		
	//		searchgrid.load("../c2cnetworks/acbestsearch.php");
	
	    	break;
		case 'reset': 
	
	   		myform.setItemValue('type','-');
	   		myform.enableItem('type');
    		myform.setItemValue('region',null);
    		myform.disableItem('region');
    		myform.setItemValue('country',null);
    		myform.disableItem('country');
	   		myform.setItemValue('federation',null);
    		myform.disableItem('federation');
    		myform.setItemValue('series',null);
    		myform.disableItem('series');		
    		myform.setItemValue('subseries',null);
    		myform.disableItem('subseries');	
		
	        break;
  		 default:
             break;    
         }
   	} // function

		); // event



*/



/*
	myform.attachEvent("OnChange", function(name, value){		
		switch(name) {
		case 'type': 
			myform.removeItem('region');
			listtype = "region";
			listname = "region";
			var x = {type: "select", name: "region" , label: "Region", labelWidth: "100", inputWidth: "200", connector: '../c2cnetworks/acgetlist.php?listtype=' + listtype + '&listname=' + listname};			
    		myform.addItem('queryc1', x, 1,0);	
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
    		myform.addItem('queryc1', x, 2,2);	
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
    		myform.addItem('queryc2', x, 0,0);	
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
    		myform.addItem('queryc2', x, 1,0);	
//    		myform.addItem(null, x, 3);		
    		myform.setItemValue('subseries','-');
	 		myform.disableItem('country');			
           	break;
    	case 'series': 
    		myform.removeItem('subseries');
    		listtype = "subseries";
    		listname = value;
      		var x = {type: "select", name: "subseries" , label: "Sub-Series", labelWidth: "100", inputWidth: "200", connector: '../c2cnetworks/acgetlist.php?listtype=' + listtype + '&listname=' + listname};			
    		myform.addItem('queryc2', x, 2,2);		
    //		myform.addItem(null, x, 4);		
	 		myform.disableItem('federation');			
           	break;

       	case 'subseries': 
  	 		myform.disableItem('series');			
           	break;

        default:
           break;    
       }});
*/
	/*			
			searchgrid = new dhtmlXGridObject(myform.getContainer("searchgrid"));

	//		searchgrid = new dhtmlXGridObject('searchgrid');
			
			searchgrid.setImagePath("../codebase/imgs/");

			searchgrid.setHeader('ID, Type, Series, Subseries, Grade, Price');
			searchgrid.setColumnIds('lppassetid, type, series, subseries, agrade,bprice');
			searchgrid.setColTypes("ro,ro,ro,ro,ro,ro");
			searchgrid.setColumnsVisibility('false,false,false,false,false,false');
			searchgrid.setInitWidths("125,125,125,125,125,125");


			   searchgrid.setSkin("dhx_skyblue");

			
			searchgrid.init();
	//		searchgrid.load("../c2cnetworks/acbestsearch.php");
			searchdp = new dataProcessor("../c2cnetworks/acbestsearch.php");
			searchdp.init(searchgrid);
*/
	/*		var x;
			searchgrid.attachEvent("OnRowDblClicked", function(x,cellindex){
				var selectedrow = searchgrid.getRowData(x);
				localStorage.setItem('lppassetid', selectedrow['lppassetid']);
				localStorage.setItem('reversepic', selectedrow['reversepic']);
				window.open("../c2cnetworks/toolbaritem.php","mywindow", '_blank');
			});
		*/
/*


			sellgrid = new dhtmlXGridObject(myform.getContainer("sellgrid"));				
//			sellgrid = new dhtmlXGridObject('sellgrid');
			sellgrid.setImagePath("../codebase/imgs/");
			
			sellgrid.setHeader('lppassetid, Type, Series, Subseries, Grade, Price');
			sellgrid.setColumnIds('lppassetid, type, series, subseries, agrade,bprice');
			sellgrid.setColTypes("ro,ro,ro,ro,ro,ro");
			sellgrid.setColumnsVisibility('false,false,false,false,false,false');
			sellgrid.setInitWidths("125,125,125,125,125,125");

			   sellgrid.setSkin("dhx_skyblue");


			
			sellgrid.init();
	//		sellgrid.load("../c2cnetworks/acbestsell.php");
			selldp = new dataProcessor("../c2cnetworks/acbestsell.php");
			selldp.init(sellgrid);

			var x;
			sellgrid.attachEvent("OnRowDblClicked", function(x,cellindex){
				var selectedrow = sellgrid.getRowData(x);
				localStorage.setItem('lppassetid', selectedrow['lppassetid']);
				localStorage.setItem('reversepic', selectedrow['reversepic']);
				window.open("../c2cnetworks/toolbaritem.php","mywindow", '_blank');
			});

*/




		}
	</script>


</body>
</html>
