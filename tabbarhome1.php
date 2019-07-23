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

	     var mytoolbar, mytabbar,searchgrid,searchdp,sellgrid,selldp,newId,rowId,pos,selId;
			var formdata,myform,listname,listtype;
			listname = 'Type';
			listtype = 'Type';
	    	
			var peopleid = localStorage.getItem('peopleid');


	   
	   function doOnLoad() {

			mytoolbar = new dhtmlXToolbarObject("toolbarObj");
		    mytoolbar.setIconsPath("../common/imgs/");
		    mytoolbar.setSkin("dhx_skyblue"); // top, left, item


			    mytoolbar.addButton("home", 1, "Home", null, null);
			    mytoolbar.addSeparator("sep", 2);	
			    mytoolbar.addButton("trends", 3, "Trends", null, null);
			    mytoolbar.addSeparator("sep", 4);
			    mytoolbar.addButton("login", 5, "Member Login", null, null);
			    mytoolbar.addSeparator("sep", 6);	
			    mytoolbar.addButton("newuser", 7, "New User Request", null, null);
		//	    mytoolbar.addSeparator("sep", 8);	
			//    mytoolbar.addButton("about", 9, "About C2C", null, null);


			mytoolbar.attachEvent("onClick", function(id) {
				   switch(id) {
			       case 'home':
					    document.location.href='../c2cnetworks/home.html';
						break;
			        case 'trends':
		     //   		document.location.href='../c2cnetworks/login.php';
		        		document.location.href='../c2cnetworks/tabbarhome1.php';
			            break;
			        case 'login':
		        		document.location.href='../c2cnetworks/tabbarhome2.php';
			            break;
			        case 'newuser':
			        	localStorage.setItem('login', 'logout');
		        		document.location.href='../c2cnetworks/tabbarhome3.php';
			            break;			            
			        case 'about':
		        		document.location.href='../c2cnetworks/tabbarhome4.php';
			            break;
			        default:
			            break;
			    }
			});



	        	   
						formdata = [

							
							{type: "fieldset",  name: "trend", label: "Market Trends - SAMPLE, ADDITIONAL ANALYTIC INFORMATION TBD", width: "auto", list:[	



		// New Assets added
		// Total Assets
		// Total Transfers
		// Orphaned Assets
		// Total Indicative Asset Value
		// Average Value of Transfer

		// Most active 				
		// Regional Trade Volumes
		// NA, Europe, Asia, SA, Australia, Antartica, Africa


											
		    				//	{type: "label", name: "trends", label: "Market Trend For Search"},

		    					{type: "input", name: "currentdate", label: "Reporting Date",  labelWidth: "150", inputWidth: "200", value: "5/2/2019"},


		    				
		    					// Orphaned Assets
		    					// Total Indicative Asset Value
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

							];

							
				var	   	mydp;		
				myform = new dhtmlXForm("myform",formdata);

				myform.setSkin("dhx_skyblue");

	//		  	myform.load(             "../c2cnetworks/acTrendsMember.php?id=1");
	//		   	mydp = new dataProcessor("../c2cnetworks/acTrendsMember.php");

			   	mydp.init(myform);	



   }

		
	</script>



</html>
