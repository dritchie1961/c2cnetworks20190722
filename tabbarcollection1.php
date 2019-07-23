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
 
 	<button onclick="s0()">All Assets</button>
 	<button onclick="s1()">S1</button>	
 	<button onclick="s2()">S2</button>
 	<button onclick="s3()">S3</button>
 	<button onclick="s4()">S4</button>
 	<button onclick="s5()">S5</button>
	<BR>
 <BR>
 
	<div id="itemgrid" style="width: 1000px; height: 333px; background-color: white;"></div>
<br>
	<button onclick="add()">Add</button>
    <button onclick="removeitem()">Remove</button>
    <button onclick="edit()">Edit</button>
    <button onclick="copy()">Copy</button>
   


	<script>


	
	var mygrid,mydp,myForm,newId,rowId,pos,selId;

	var pid = localStorage.getItem('peopleid');
	
    mygrid = new dhtmlXGridObject('itemgrid');
    mygrid.setImagePath("../codebase/imgs/");
    mygrid.setHeader('PeopleID,Type,Region,Country,Federation,Series,Subseries,Denom,Year,Assessor,Grade,Status,Price,lppassetid,obversepic,reversepic');
    mygrid.setColumnIds('peopleid,type,region,country,federation,series,subseries,denomination,assetyear,aname,agrade,status,bprice,lppassetid,obversepic,reversepic');
    mygrid.setColTypes("ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro");
    mygrid.setColumnsVisibility('true,false,false,false,false,false,false,true,false,false,false,true,false,true,true,true');
    mygrid.setInitWidths("75,100,125,125,125,125,100,75,75,75,75,75,75,75,75,75");
    
    //   	mygrid.setColumnsVisibility('false,false,false,false,false,false,false,false,false,false,false,false,false,false');

    mygrid.setSkin("dhx_skyblue");

    
	   mygrid.init();
	   mygrid.load("../c2cnetworks/accollectioncollection.php?peopleid=" + pid);
	   mydp = new dataProcessor("../c2cnetworks/accollectioncollection.php");  
	   mydp.init(mygrid);

		var i;
		mygrid.attachEvent("OnRowDblClicked", function(i,cellindex){
			var selectedrow = mygrid.getRowData(i);
	//		alert("row id: " + selectedrow['lppassetid']);
			localStorage.setItem('lppassetid', selectedrow['lppassetid']);
			localStorage.setItem('reversepic', selectedrow['reversepic']);
			localStorage.setItem('status', selectedrow['status']);
//			localStorage.setItem('abc', "abc");
			window.open("../c2cnetworks/toolbaritem.php","mywindow", '_blank');
		});
	   
		function add() {
			var newId = (new Date()).valueOf();
			var rowId = mygrid.uid();
			var pos = mygrid.getRowsNum();
	//		var x = mygrid.getSelectedRowId();
		//	var i = "1";
	
			mygrid.addRow(rowId,pid + ",-,-,-,-,-,-,-,-,-,-,collection,0,,,", pos);
		
			mygrid.selectRowById(newId);
			mygrid.setrowdata(newId, {'status' : "collection"});
};

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
		
		function edit() {
			alert("edit");
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
			var p1 = selectedrow['peopleid'];
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
			var y = p1  + "," +  t1  +"," + r1 +"," + r2 + "," + r3 + "," + r4 + "," + r5 + "," + r6 + ",-,-,-,collection,0,,";
			mygrid.addRow(rowId,y, pos);
			mygrid.selectRowById(newId);
		};
		
	</script>

</body>
</html>
