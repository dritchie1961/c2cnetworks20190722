<!DOCTYPE html>
<html>
<head>
<title>c2c Chat</title>

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

	<div id="toolbarobj"></div>
	<div id="itemform"></div>
	<div id="chatgrid"
		style="width: 600px; height: 200px; background-color: white;"></div>
	<div id="sellgrid"
		style="width: 600px; height: 200px; background-color: white;"></div>


	<script>
        var mytoolbar, mytabbar,chatgrid,chatdp,sellgrid,selldp,newId,rowId,pos,selId;
		var formdata,myform,listname,listtype;
//		listname = 'Region';
//		listtype = 'Region';
		listname = 'Type';
		listtype = 'Type';
    	
//		var lppassetid = localStorage.getItem('lppassetid');
		var peopleid = localStorage.getItem('peopleid');
        	   
		function doOnLoad() {	

			mytoolbar = new dhtmlXToolbarObject("toolbarobj");
			    mytoolbar.setIconsPath("../common/imgs/");
			    mytoolbar.addButton("me", 8, "Membership Profile", null, null);		
//			    mytoolbar.addSeparator("sep", 9);
			    mytoolbar.addButton("collection", 10, "Collection", null, null);		
		//	    mytoolbar.addText("sep", 11, ">>>");
				mytoolbar.addButton("mail", 12, " >>> C2C CHAT <<< ", null, null);	
		//	    mytoolbar.addText("sep", 13, "<<<");
				mytoolbar.addButton("best", 14, "BEST", null, null);	
//			    mytoolbar.addSeparator("sep", 15);
			    mytoolbar.addButton("logout", 16, "Logout", null, null);		

				mytoolbar.setSkin("dhx_terrace"); 

			    
				mytoolbar.attachEvent("onClick", function(id) {
				switch(id) {
    				case 'logout':
    							//           	setCookie("login", "LOGOUT");
    				      	localStorage.setItem('login', 'Logout');
//    					    document.location.href='../c2cnetworks/Index.php';
// 					       document.location.href='../c2cnetworks/home.html';

					        document.location.href= homelocation;

 					       
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

		formdata = [
					{type: "fieldset",  name: "query", label: "c2c Chat", width: "auto", list:[
     					{type: "block", name: "queryc4", blockOffset: 0, width: "auto", list:[
    						{type: "button", name: "inbox", width: 50, value: "Inbox"},
    						{type: "button", name: "sent", width: 50, value: "Sent"},
//    						{type: "newcolumn"},
    						{type: "button", name: "draft",  width: 50, value: "Draft"}, 	
  //  						{type: "newcolumn"},	
    						{type: "button", name: "archive",  width: 50, value: "Archive"}, 
    				//		{type: "button", name: "trash",  width: 50, value: "Trash"}, 					
						]},
						{type: "newcolumn"},
						{type: "block", name: "queryc8", blockOffset: 10, width: "auto", list:[
							{type: "container", name: "chatgrid",  inputWidth: 600, inputHeight: 200},
						]},		
					]},
				];

	//	var	   	mydp;		

		myform = new dhtmlXForm("itemform",formdata);

		   myform.setSkin("dhx_skyblue");
		   
//	  	myform.load("../c2cnetworks/acbestdefaults.php?id=a" + peopleid);
//	   	mydp = new dataProcessor("../c2cnetworks/acbestdefaults.php");

//	   	mydp.init(myform);	

		myform.attachEvent("onButtonClick", function(id){
			
		switch(id) {
		case 'inbox': 



			
	//		var x = peopleid + "&type=received";
			var x = peopleid;
	//		alert("x is " + x);
			
			chatgrid.clearAll();
	//		chatgrid.setHeader('Sender, Recipient, Date, Subject');

			chatgrid.detachHeader(0);
//			chatgrid.setHeader('x1, x1, x1, x1, x1, x1');
			chatgrid.attachHeader('chatid, Date, From, Subject');
							
	   		chatgrid.load("../c2cnetworks/acc2cchatinbox.php?id=" + x);   		
						
			break;
		case 'sent': 

		

		//	var x = peopleid + "&type=sent";
			var x = peopleid;
	//		alert("x is " + x);
			
			chatgrid.clearAll();
	//		chatgrid.setHeader('Recipient, Sender, Date, Subject');
			chatgrid.detachHeader(0);
			chatgrid.attachHeader('chatid, Date, To, Subject');
					
	   		chatgrid.load("../c2cnetworks/acc2cchatsent.php?id=" + x);   		
			
			break;		
		case 'draft': 
			alert("draft");
			break;		
		case 'archive': 
			alert("archive");
			break;		
		case 'trash': 
			alert("trash");
			break;		


	 default:
             break;    
         }
   	} // function

		); // event

				
			chatgrid = new dhtmlXGridObject(myform.getContainer("chatgrid"));


			chatgrid.setSkin("dhx_skyblue");

			
	//		chatgrid = new dhtmlXGridObject('chatgrid');
			
			chatgrid.setImagePath("../codebase/imgs/");

// toid", "fromid, lppassetid, subject, description, datetime
			
			chatgrid.setHeader('chatid, Date, From, Subject');
			chatgrid.setColumnIds('chatid, datetime, fromid, subject');
			chatgrid.setColTypes("ro,ro,ro,ro");
			chatgrid.setColumnsVisibility('false,false,false,false');
			chatgrid.setInitWidths("125,125,200,125");
			
			chatgrid.init();

	//		chatgrid.load("../c2cnetworks/acc2cchatreceived.php?id=1");


//			var x = peopleid + "&type=received";

	//		var x = peopleid + "&type=received";
		var x = peopleid;

	
	//		alert("x is " + x);
	  		chatgrid.load("../c2cnetworks/acc2cchatinbox.php?id=" + x);   		
	  			
	//   		chatgrid.load("../c2cnetworks/acc2cchat.php?id=" + x);   		
			
//			chatgrid.load("../c2cnetworks/acc2cchat.php?id=" + peopleid);
			chatdp = new dataProcessor("../c2cnetworks/acc2cchatinbox.php");
			chatdp.init(chatgrid);

/*
			var x;
			chatgrid.attachEvent("OnRowDblClicked", function(x,cellindex){
				var xxx = chatgrid.getRowData(x);
				localStorage.setItem('chatid', xxx['chatid']);
	//			localStorage.setItem('reversepic', selectedrow['reversepic']);
				window.open("../c2cnetworks/toolbarchatreply.php","mywindow", '_blank');
			});
	*/	

			
			var x;
			chatgrid.attachEvent("OnRowDblClicked", function(x,cellindex){

//alert('inside db click ');
				
				var xxx = chatgrid.getRowData(x);

//var z = xxx['datetime'];
var z = xxx['chatid'];
 //alert ("chat id is:" + z);
				
				localStorage.setItem('chatid', z );
		//		localStorage.setItem('reversepic', selectedrow['reversepic']);

	//			var a = myform.getItemValue("lppassetid", true);
	//			var b = myform.getItemValue("peopleid", true);
					
	       // 	var b = myform.getItemValue("reversepic", true);
//	        	var c = myform.getItemValue("status", true);
	//    		localStorage.setItem('lppassetid', a );
	//			localStorage.setItem('assetownerid', b);
	//			localStorage.setItem('status', c);
//				localStorage.setItem('abc', "abc");
				window.open("../c2cnetworks/toolbarchatreply.php","mywindow", '_blank');
				
			});
			
			
		}
	</script>


</body>
</html>
