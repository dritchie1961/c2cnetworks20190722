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
    
	<div id="mygrid_container" style="width: 700px; height: 500px;"></div>

     <button onclick="deletelogin()">Delete</button>
 
		
	<script type="text/javascript">

	var mygrid, mydp, selId;


	
	
			mygrid = new dhtmlXGridObject("mygrid_container");
			mygrid.setImagePath("../codebase/imgs/");
			mygrid.setHeader("provenanceid,prvpeopleid,newpeopleid,lppassetid,type,changedate");
			mygrid.setColumnIds('provenanceid,prvpeopleid,newpeopleid,lppassetid,type,changedate');
			

			mygrid.setInitWidths("100,100,100,100,100,100");
			mygrid.setColAlign("left,left,left,left,left,left");
//			mygrid.setColSorting("int,str,str,str");
			mygrid.setColTypes("ro,ro,ro,ro,ro,ro");

			mygrid.setSkin("dhx_skyblue");

	//		mygrid.setColumnColor("#f0e68c,#00ffff,#add8e6,#00ffff");

			mygrid.init();
			mygrid.load("../c2cnetworks/acprovenance.php");
			mydp = new dataProcessor("../c2cnetworks/acprovenance.php");			
			mydp.init(mygrid);
			
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

		
	</script>	
	
</body>
</html>