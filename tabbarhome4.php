<!DOCTYPE HTML>
<HTML>
<head>
<TITLE>c2c networks</TITLE>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<link rel="stylesheet" type="text/css" href="../codebase/fonts/font_roboto/roboto.css"/>
<link rel="stylesheet" type="text/css" href="../skins/terrace/dhtmlx.css"/>
<link rel="stylesheet" type="text/css" href="../skins/skyblue/dhtmlx.css"/>
<link rel="stylesheet" type="text/css" href="../codebase/dhtmlx.css"/>
<script src="../codebase/dhtmlx.js"></script>
<script src="../c2cnetworks/c2cjscommon.js"></script>



</head>

<body onload="doOnLoad();">

<div id="toolbarObj"></div>


<p></p>
<p><strong>About the Inventor</strong></p>
<p><strong></strong></p>
<p>Yup, I'm a collector like you.&nbsp; I worked my @#$ trying to make this hobby as cost effective as possible but it's not easy.&nbsp; See the case studies below - margin between the collectors that sell and buy is crazy.&nbsp; I finally got tired of buying &amp; selling assets through auction and dealers and came up with the idea that Collector needs a solution to&nbsp;buy, exchange, sell and trade (BEST) directly with other Collector.&nbsp; But how?&nbsp;</p>
<p><b></b><b></b>Auction Case Study:</p>
<p>Let's say the auction hammer prices is a cool $1,000.&nbsp; Ironically, this is just the starting point to determine what the seller (consignor) gets and what the winner (buyer) will pay no one actually get or pays $1,000.&nbsp; Here's the real math:</p>
<p>Seller gets $900.00&nbsp; The Seller pays a consignor fee, let's say it 10% which is not uncommon.&nbsp; So the Seller only gets $900 from the deal</p>
<p>Buyer pays $1,320.00&nbsp; The Buyer also pays a fee, typically called the buyer premium.&nbsp; The rate is established by the auction but 20% is good enough for the case study.&nbsp; That means the buyer pays $200 buyer premium.&nbsp; Depending on where you live you may be required to pay a VAT.&nbsp; For this study let's use %10, or $120.</p>
<p>The difference between what the seller and the buyer is $420 ($1,320 - $900).&nbsp; That's an pretty big middle man gap.</p>
<p></p>
<p></p>
<p>And This ecosystem was developed to help Collectors with their love of the numismatic hobby.</p>
<p>C2C Provide collectors showcase, sell and event notify other collectors of numismatic materials you are looking for.</p>
<p></p>
<p>The goal of C2C is to bring collectors together, reduce middle-man involved, reduce fraudulent activities, create a market place where value id defined by the collector.</p>


</body>

<script>

var mytoolbar;
var mycarousel,q,id, loginstatus;

		var x = localStorage.getItem("login");
		if (x == 'passed'){
				loginstatus = "passed";
			}
			else 
			{
				loginstatus = "failed";	
			};

			localStorage.setItem('login', loginstatus);
	//		alert (loginstatus);
			
		function doOnLoad() {

			mytoolbar = new dhtmlXToolbarObject("toolbarObj");
		    mytoolbar.setIconsPath("../common/imgs/");
		    mytoolbar.setSkin("dhx_skyblue"); // top, left, item
			
			if (loginstatus == 'passed'){
			    mytoolbar.addButton("logout", 1, "Logout", null, null);
			    mytoolbar.addSeparator("sep", 2);
				mytoolbar.addButton("return", 3, "Return to your collection", null, null);
		    	mytoolbar.addSeparator("sep", 4);
		    	mytoolbar.addText("c2c", 5, "c2c Networks");
			}else{
			    mytoolbar.addButton("home", 1, "Home", null, null);
			    mytoolbar.addSeparator("sep", 2);	
			    mytoolbar.addButton("trends", 3, "Market Trends", null, null);
			    mytoolbar.addSeparator("sep", 4);
			    mytoolbar.addButton("login", 5, "C2C Member Login", null, null);
			    mytoolbar.addSeparator("sep", 6);	
			    mytoolbar.addButton("newuser", 7, "New User Request", null, null);
			    mytoolbar.addSeparator("sep", 8);	
			    mytoolbar.addButton("about", 9, "About C2C", null, null);
//			    mytoolbar.addSeparator("sep", 10);	

	//		 	mytoolbar.addText("c2c", 11, "c2c Networks");
			};

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

			
			
			


			} // end of function

		</script>


</html>