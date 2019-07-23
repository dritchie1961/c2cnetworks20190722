<?php
/*

Notes:


Add current asset owner
If not currently owned by c2c member, then set owner to c2corphan

Add transfer capabilities
Add provenance grid


Asset specific identifier (like a bank note serial number)
Create asset owners - assets that are not owned by c2c member are designated as c2corphan (c2corphans require a unique identifier from an assessment company like ICCS, PCGS, NGC, CCCS, etc.) that has slabbed the coin.  If the coin is not slabbed, and is transfer out of c2c membership, then the coins cannot be validated and is removed from the database. 
Add observe picture selection
Add provenance capabilities - transfer/orphan, asset assessment
Grid with provenance information


*/
?>


<!DOCTYPE html>
<html>
<head>
<title>Numismatic Item</title>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<link rel="stylesheet" type="text/css" href="../codebase/fonts/font_roboto/roboto.css"/>
<link rel="stylesheet" type="text/css" href="../skins/skyblue/dhtmlx.css"/>
<link rel="stylesheet" type="text/css" href="../codebase/dhtmlx.css"/>
<link rel="stylesheet" type="text/css" href="../codebase/dhtmlxvault.css">


<script src="../../../codebase/dhtmlxvault.js"></script>
<script src="../codebase/dhtmlx.js"></script>
<script src="../c2cnetworks/c2cjscommon.js"></script>






<style>
</style>

</head>
<body>

	<div id="toolbarobj" style="height: 40px"></div>
	<div id="itemform"></div>

	<script>

		var mytoolbar, mytabbar;	      
		var formData, logObj; // required for file process
    	var myform, mydp, listname,listtype;
//		listname = 'Region';
//		listtype = 'Region';

		listname = 'Type';
		listtype = 'Type';
		
		
		var lppassetid = localStorage.getItem('lppassetid');
		var status= localStorage.getItem('status');
		var x = localStorage.getItem('reversepic');
		var pid = localStorage.getItem('peopleid');

			mytoolbar = new dhtmlXToolbarObject("toolbarobj");
			   mytoolbar.setSkin("dhx_skyblue");
			    mytoolbar.setIconsPath("../common/imgs/");

				mytoolbar.addButton("exit", 1, "Exit", null, null);	
			    mytoolbar.addSeparator("sep", 2);	

	          	if(status == 'sell'){
				    mytoolbar.addButton("cancelsell", 3, "Cancel Sell", null, null);	
				    
	            };
	            if(status == 'collection'){
				    mytoolbar.addButton("collectionsave", 3, "Save", null, null);	
				    mytoolbar.addSeparator("sep", 4);	
				    mytoolbar.addButton("sell", 5, "Sell", null, null);		
				    mytoolbar.addSeparator("sep", 6);	
		//		    mytoolbar.addButton("transfer", 7, "Transfer", null, null);		
			//	    mytoolbar.addSeparator("sep", 8);	
				    mytoolbar.addButton("confirmtransfer", 9, "Transfer Ownership", null, null);		
				    
		   		};
	            if(status == 'search'){
				    mytoolbar.addButton("searchsave", 3, "Save", null, null);	
		   		};

			    mytoolbar.addButton("c2cchat", 15, "Ask Question", null, null);	
			   	



		   		
			    
				mytoolbar.attachEvent("onClick", function(id) {


//alert("clicked on? " + id);


					
					   switch(id) {
				        case 'exit':
				           	window.opener = self;
							window.close();						
				            break;
				        case 'collectionsave':




				//        	alert('bbb asdfasd');   
				         	myform.save();
				  /*       
							var a = myform.getItemValue("bprice", true);
							var b = myform.getItemValue("lppassetid", true);
						//	var c = myform.getItemValue("userid",true);
							var c = "don";
							var d = "search";
							var abcd = "?bprice=" + a + "&lppassetid=" + b + "&userid=" + c + "&besttype=" + d ;
				//			alert ('abcd = ' + abcd );
							myform.send("../c2cnetworks/cpitemsell.php" + abcd);							    		
				  //  		alert("after search");
*/



//var ccc = myform.getItemValue("type", true);
//alert(ccc);
				         	
//if (ccc == "-")
//{			        	

							var nid = myform.getItemValue("peopleid", true);
							var type = "Add";
							var abcd = "?pid=" + nid + "&nid=" + nid + "&lppassetid=" + lppassetid + "&type=" + type;
						//			alert ('abcd = ' + abcd );
							myform.send("../c2cnetworks/cptransfer.php" + abcd);	

				//			alert('Asset transfer has been registered in C2CBC');
//							alert('aaa asdfasd');
							

//};
					        
			//	         	myform.save();
				         	window.close();	
					  		break;
				        case 'searchsave':  

				        	myform.save();

		         	window.close();	
					  		break;					  		
					    case 'sell':   // disableitems is not required if window is closed 
					    	myform.disableItem('region');
					        myform.disableItem('country');
					        myform.disableItem('federation');
					        myform.disableItem('series');
					        myform.disableItem('subseries');
					//        myform.disableItem('denomination');
					        myform.disableItem('assetyear');
					        myform.disableItem('aname');
					        myform.disableItem('assetyear');
					        myform.disableItem('agrade');
					        myform.disableItem('description');
					        myform.setItemValue("status","sell");
				         	myform.save();
				        	alert("Asset will ben moved to Sell and will be available in BEST");

				        /*  not currently used.... decided to change itemform to include sell price and changed status.
					        	
							var a = myform.getItemValue("bprice", true);
					//		alert("testing price " + a);
							var b = myform.getItemValue("lppassetid", true);
						//	var c = myform.getItemValue("userid",true);
							var c = "don";
							var d = "sell";
							var abcd = "?price=" + a + "&lppassetid=" + b + "&userid=" + c + "&besttype=" + d ;
				//			alert ('abcd = ' + abcd );
							myform.send("../c2cnetworks/cpitemsell.php" + abcd);	
			    		*/
				  //  		alert("after sell");
					    	window.close();	
					        break;
				    	case'cancelsell' :
					   //     myform.enableItem('region');
				        	myform.setItemValue("status","collection");
				        	myform.save();
				        	alert("Asset is returned to Collection worksheet and has been removed from BEST");
				           	window.close();	
					   //     myform.removeItem("status","America");
					  //      mytoolbar.showItem('cancelsell');
					   //     mytoolbar.hideItem('sell');
					        break;
				    	case'confirmsell' :
	
			//				alert("before confirmation");

				    		
					        break;
				        case 'transfer' :
					        myform.enableItem('peopleid');
				      //     	alert('you can can asset owner now');
				           	break;
				        case 'confirmtransfer' :

				        	// alert('confirmtransfer');
				        	myform.save();
				        	
							var nid = myform.getItemValue("peopleid", true);
	//						var pid = pid;
							var type = "Transfer";
							var abcd = "?pid=" + pid + "&nid=" + nid + "&lppassetid=" + lppassetid + "&type=" + type;
						//			alert ('abcd = ' + abcd );
							myform.send("../c2cnetworks/cptransfer.php" + abcd);	

							alert('Asset transfer has been registered in C2CBC');
						   	window.close();	
				           	break;
				           	
				        case 'assessment':
			//	           	alert('assessment');

//				        	document.location.href='../c2cnetworks/toolbarprovenance.php'; 
					        break;


				        case 'c2cchat':
				//           	alert('c2cchat');

							//myform.setItemValue('federation','-');
							var a = myform.getItemValue("lppassetid", true);
							var b = myform.getItemValue("peopleid", true);
								
				       // 	var b = myform.getItemValue("reversepic", true);
				        	var c = myform.getItemValue("status", true);

//alert (a + b + c);

				        	
				    		localStorage.setItem('lppassetid', a );
							localStorage.setItem('assetownerid', b);
							localStorage.setItem('status', c);
//							localStorage.setItem('abc', "abc");
							window.open("../c2cnetworks/toolbarchatnew.php","mywindow", '_blank');

			           	
//				        	document.location.href='../c2cnetworks/toolbarprovenance.php'; 
					        break;
				        
				        default:			        
				            break;
				    }
				});			

            if(status == 'search'){
    			formData = [
    				{type: "settings", position: "label-left", labelWidth: 150, inputWidth: 300},
    		    	{type: "input", name: "lppassetid", label: "lppassetid"},
    		    	{type: "input", name: "peopleid", label: "peopleid"},
    	    		    	
    		    	{type: "input", name: "status", label: "Status"},
    				{type: "select", name: "type" , label: "Type", connector: '../c2cnetworks/acgetlist.php?listtype=' + listtype + '&listname=' + listname},
     		    	{type: "input", name: "region", label: "Region"},      		       
    		    	{type: "input", name: "country", label: "Country"},
    		    	{type: "input", name: "federation", label: "Federation"},
    		    	{type: "input", name: "series", label: "Series"},
    		    	{type: "input", name: "subseries", label: "Sub-Series"},
    		//    	{type: "input", name: "denomination", label: "Denomination"},
    		    	{type: "input", name: "assetyear", label: "Year"},
    		    	{type: "input", name: "agrade", label: "Minimum Grade"},	
    		  		{type: "input", name: "bprice", label: "Price"} 		
    		 		];
	   		} else {
				formData = [
					{type: "settings", position: "label-left", labelWidth: 150, inputWidth: 300},
			    	{type: "input", name: "lppassetid", label: "Asset ID"},
    		    	{type: "input", name: "peopleid", label: "Collector ID"},
			    	
			    	{type: "input", name: "status", label: "Status"},
    				{type: "select", name: "type" , label: "Type", connector: '../c2cnetworks/acgetlist.php?listtype=' + listtype + '&listname=' + listname},
     		    	{type: "input", name: "region", label: "Region"},      		       
 			    	{type: "input", name: "country", label: "Country"},
			    	{type: "input", name: "federation", label: "Federation"},
			    	{type: "input", name: "series", label: "Series"},
			    	{type: "input", name: "subseries", label: "Sub-Series"},
			//    	{type: "input", name: "denomination", label: "Denomination"},
			    	{type: "input", name: "assetyear", label: "Year"},
			    	{type: "select", name: "aname" , label: "Assessor", connector: '../c2cnetworks/acgetlist.php?listtype=assessor&listname=assessor'},
			    	{type: "input", name: "agrade", label: "Grade"},	
			  		{type: "input", name: "description", label: "Description"},
			  		{type: "input", name: "bprice", label: "Price"},
				    {type: "input", name: "reversepic", label: "File Name"},
			  		{type: "image", name: "reverseimage", label: "Image (click to change)", imageWidth: 126, imageHeight: 126, value: x, url: "2.php"} // file works		  		
			 	];
		   	};

			myform = new dhtmlXForm("itemform",formData);
			   myform.setSkin("dhx_skyblue");
			
			myform.load("../c2cnetworks/acitemdetails.php?id="+ lppassetid);
		   	mydp = new dataProcessor("../c2cnetworks/acitemdetails.php");
		   	mydp.init(myform);	   	
	   	
			myform.disableItem('lppassetid');
	//		myform.disableItem('peopleid');
			myform.disableItem('status');  // status can only be changed through button
			myform.disableItem('reversepic');  

			myform.attachEvent("onImageUploadSuccess", function(name, value, extra){
				myform.setItemValue('reversepic', extra);
			});
			
            if(status == 'sell'){
    			myform.disableItem('type');
    			myform.disableItem('region');
    			myform.disableItem('country');
    			myform.disableItem('federation');
    			myform.disableItem('series');
    			myform.disableItem('subseries');
  //  			myform.disableItem('denomination');
    			myform.disableItem('assetyear');
    			myform.disableItem('aname');

    			myform.disableItem('agrade');
            };

  /*          if(status == 'Search'){


//            	myform.setItemLabel(name, "New Text");
//    			myform.disableItem('sellprice');//
            	myform.removeItem('reversepic');
            	myform.removeItem('reverseimage');

//          	    			myform.disableItem('reversepic');
 //   			myform.disableItem('reverseimage');
     //       	alert('status is Sell');
            };

*/
            
		
			myform.attachEvent("OnChange", function(name, value){		
			   	switch(name) {
				case 'type': 
					myform.removeItem('region');
					listtype = "region";
					listname = "region";
			  		var xx = {type: "select", name: "region" , label: "Region", connector: '../c2cnetworks/acgetlist.php?listtype=' + listtype + '&listname=' + listname};			
					myform.addItem(null, xx, 4);	
					myform.setItemValue('federation','-');
					myform.disableItem('federation');
					myform.setItemValue('series','-');
					myform.disableItem('series');		
					myform.setItemValue('subseries','-');
					myform.disableItem('subseries');		
		           	break;
			   	case 'region': 
					myform.removeItem('country');
					listtype = "country";
					listname = value;
			  		var xx = {type: "select", name: "country" , label: "Country", connector: '../c2cnetworks/acgetlist.php?listtype=' + listtype + '&listname=' + listname};			
					myform.addItem(null, xx, 5);	
					myform.setItemValue('federation','-');
					myform.disableItem('federation');
					myform.setItemValue('series','-');
					myform.disableItem('series');		
					myform.setItemValue('subseries','-');
					myform.disableItem('subseries');		
		           	break;
				case 'country': 
					myform.removeItem('federation');
					listtype = "federation";
					listname = value;
			  		var xx = {type: "select", name: "federation" , label: "Federation", connector: '../c2cnetworks/acgetlist.php?listtype=' + listtype + '&listname=' + listname};			
					myform.addItem(null, xx, 6);		
					myform.setItemValue('series','-');
					myform.disableItem('series');
					myform.setItemValue('subseries','-');
					myform.disableItem('subseries');	
		           	break;
				case 'federation': 
					myform.removeItem('series');
					listtype = "series";
					listname = value;
			  		var xx = {type: "select", name: "series" , label: "Series", connector: '../c2cnetworks/acgetlist.php?listtype=' + listtype + '&listname=' + listname};			
					myform.addItem(null, xx, 7);		
					myform.setItemValue('subseries','-');
					myform.disableItem('subseries');			
		           	break;
				case 'series': 
					myform.removeItem('subseries');
					listtype = "subseries";
					listname = value;
			  		var xx = {type: "select", name: "subseries" , label: "Sub-Series", connector: '../c2cnetworks/acgetlist.php?listtype=' + listtype + '&listname=' + listname};			
					myform.addItem(null, xx, 8);				
		           	break;
				case 'peopleid': 
		//			alert('you have successfully changed the asset owner to a valid c2c member.  The change will take effect only after you save the form');
	        	default:
		           break;    
		       }});

</script>
</body>

</html>

