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

    <style>
            /*these styles allow dhtmlxLayout to work in fullscreen mode in different browsers correctly*/
        html, body {
            width: 100%;
            height: 100%;
            margin: 0px;
            overflow: hidden;
            background-color:white;
        }
    </style>

</head>
<body>
	<BR>

  
	<div id="itemgrid" style="width: 1025px; height: 333px; background-color: white;"></div>


	<script>
	var mygrid,mydp,myForm,newId,rowId,pos,selId;


	var pid = localStorage.getItem('peopleid');
	
	mygrid = new dhtmlXGridObject('itemgrid');
	   	mygrid.setImagePath("../codebase/imgs/");
//	   mygrid.setNoHeader(true);
	//   	mygrid.setHeader('CompanyID,PortfolioID,Name,Start Date,End Date,Budget,Link');
	   	mygrid.setHeader('Type, Region,Country,Federation,Series,Subseries,Denom,Year,Assessor,Grade,Status,Price, lppassetid,obversepic,reversepic');
	   	mygrid.setColumnIds('type, region,country,federation,series,subseries,denomination,assetyear,aname,agrade,status,bprice,lppassetid,obversepic,reversepic');
	   	mygrid.setColTypes("ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro");
//	   	mygrid.setColumnsVisibility('false,false,false,false,false,false,false,false');
	   	mygrid.setColumnsVisibility('false, false,false,false,false,false,true,false,false,false,true,false,true,true,true');

//		mygrid.setColumnColor("#00ffff,#add8e6,#00ffff,#add8e6");
		mygrid.setInitWidths("125,125,125,125,125,100,75,75,75,75,75,75,75,75,75");

		   mygrid.setSkin("dhx_skyblue");

		
		var x;
		mygrid.attachEvent("OnRowDblClicked", function(x,cellindex){
			var selectedrow = mygrid.getRowData(x);
			localStorage.setItem('lppassetid', selectedrow['lppassetid']);
			localStorage.setItem('reversepic', selectedrow['reversepic']);
			localStorage.setItem('status', selectedrow['status']);
			
			window.open("../c2cnetworks/toolbaritem.php","mywindow", '_blank');
		});

	   mygrid.init();
	   mygrid.load("../c2cnetworks/accollectionsell.php?peopleid=" + pid);
	   mydp = new dataProcessor("../c2cnetworks/acaccollectionsell.php");

	   mydp.init(mygrid);

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



		// from 'BODY' section above...
	//	   <button onclick="cancelsell()">Cancel Sell</button>
	//	    <button onclick="viewitem()">View</button>
		 

		
		function add() {
			var newId = (new Date()).valueOf();
			var rowId = mygrid.uid();
			var pos = mygrid.getRowsNum();
			var x = mygrid.getSelectedRowId();
			mygrid.addRow(rowId,"-,-,-,dbl,clk,to,edt,-,-,-,sell,", pos);
		
			mygrid.selectRowById(newId);
			mygrid.setrowdata(newId, {'status' : "sell"});
		};

		function viewitem() {
			var rowId = mygrid.getSelectedRowId();
			var selectedrow = mygrid.getRowData(rowId);
	        if(rowId!=null){
				localStorage.setItem('lppassetid', selectedrow['lppassetid']);
				localStorage.setItem('reversepic', selectedrow['reversepic']);
				window.open("../c2cnetworks/toolbaritem.php","mywindow", '_blank');
	        }
		};

	
		function copy() {
			var a = mygrid.getSelectedRowId();
			var selectedrow = mygrid.getRowData(a);
			var t1 = selectedrow['type'];

			var r1 = selectedrow['region'];
			var r2 = selectedrow['country'];
			var r3 = selectedrow['federation'];
			var r4 = selectedrow['series'];
			var r5 = selectedrow['subseries'];
			var r6 = selectedrow['denomination'];

			var newId = (new Date()).valueOf();
			var rowId = mygrid.uid();
			var pos = mygrid.getRowsNum();
			var y = t1 +"," + r1 +"," + r2 + "," + r3 + "," + r4 + "," + r5 + "," + r6 + ",-,-,-,sell,";
			mygrid.addRow(rowId,y, pos);
			mygrid.selectRowById(newId);
		};

	</script>

</body>
</html>
