
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


	<BR>

	<button onclick="s1()">Buy 50 C2CTokens</button>
	<button onclick="s2()">Buy 100 C2CTokens</button>
	<button onclick="s3()">Buy 500 C2CTokens</button>
	
<BR>
<BR>


	<table>
		<tr>
			<td>
				<div id="defaultform"
					style="width: 700px; height: 125px; background-color: white;"></div>
			</td>
		</tr>

		<tr>
			<td>
				<div id="defaultgrid"
					style="width: 700px; height: 333px; background-color: white;"></div>
				<BR>
			
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
		{type: "fieldset",  name: "f1", label: "Account Balance", width: "auto", list:[

			{type: "block", name: "formedit", blockOffset: 0, width: "auto", list:[
				{type: "settings", position: "label-left", labelWidth: 200, inputWidth: 100},

				{type: "input", name: "hardcoded_id", label: "C2C Account (ID)", value: "1"},
				{type: "input", name: "hardcoded_C2CTokenBalance", label: "C2CToken Remaining Balance", value: "200"},
		]},		

		]},
	];




	mygrid = new dhtmlXGridObject('defaultgrid');
	mygrid.setImagePath("../codebase/imgs/");
	mygrid.setHeader("Date,provenanceid,Previous Owner,New Owner,Asset ID, Change Type");
	mygrid.setColumnIds('changedate,provenanceid,prvpeopleid,newpeopleid,lppassetid,type');
	
	mygrid.setInitWidths("175,100,100,100,100,175");
	mygrid.setColAlign("left,left,left,left,left,left");
	mygrid.setColTypes("ro,ro,ro,ro,ro,ro");
	mygrid.setColumnsVisibility('false,true,false,false,false,false');

	mygrid.init();
	mygrid.load("../c2cnetworks/acmetransactions.php?id=" + peopleid);
	mydp = new dataProcessor("../c2cnetworks/acmetransactions.php");			
	mydp.init(mygrid);

	mygrid.setSkin("dhx_skyblue");


		   	
	   	myform = new dhtmlXForm("defaultform",formdata);
	    myform.setSkin("dhx_skyblue");


		myform.disableItem('hardcoded_id');		
		myform.disableItem('hardcoded_C2CTokenBalance');		

		
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

		   	
	
	</script>

</body>
</html>