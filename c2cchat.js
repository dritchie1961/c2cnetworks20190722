var myLayout;
var leftToolbar;
var rightToolbar;
var leftMenu;
var layout1;
var layout2;
var grid;

function initapp() {
	
	// main layout
	myLayout = new dhtmlXLayoutObject({
		parent: document.body,
		pattern: "2U"
	});
	myLayout.cells("a").fixSize(true, true);
	
	// left cell
	layout1 = myLayout.cells("a").attachLayout("1C");
	layout1.cells("a").hideHeader();
	leftToolbar = layout1.attachToolbar({
		icons_path: "icons/",
		icons_size: 48,
		items: [
			{type: "button", img: "mail-receive.png", title: "Receive Mail", id: "receive"},
			{type: "separator"},
			{type: "button", img: "printer.png", title: "Print", id: "print"},
			{type: "button", img: "applications-system.png", title: "Settings", id: "settings"}
		]
	});
	
	leftMenu = layout1.cells("a").attachDataView({
		type: {
			template: "<div class='menu_item #id#'>"+
					"<div class='menu_item_text'>#text#</div>"+
				"</div>",
			margin: 0,
			padding: 0,
			height: 60
		},
		drag: false,
		select: true
	});
	
	leftMenu.parse([
		{id: "inbox", text: "Inbox"},
		{id: "fav", text: "Favorites"},
		{id: "drafts", text: "Drafts"},
		{id: "outbox", text: "Outbox"},
		{id: "sent", text: "Sent"},
		{id: "trash", text: "Trash"},
		{id: "contacts", text: "Contacts"}
	], "json");
	
	leftMenu.attachEvent("onSelectChange", function(id) {
		if (grid == null) { // first init
			grid = layout2.cells("a").attachGrid();
			grid.attachEvent("onRowCreated", function(id) {
				var t = this.cells(id, 0).getValue();
				t = t.replace(/([a-z_]*\@[a-z\._]*)/gi,"<span class='email_addr'>&lt;$1&gt;</span>");
				this.cells(id, 0).setValue(t);
			});
		} else {
			grid.clearall(true);
		}		
		grid.loadXML("xml/"+id+".xml", function(){
			grid.selectRow(0);
		});
	});
	
	// right cell
	layout2 = myLayout.cells("b").attachLayout("1C");
	layout2.cells("a").hideHeader();
	
	rightToolbar = layout2.attachToolbar({
		icons_path: "icons/",
		icons_size: 48,
		items: [
			{type: "button", img: "internet-mail.png", title: "New Mail", id: "new_mail"},
			{type: "separator"},
			{type: "button", img: "mail-reply-sender.png", title: "Reply", id: "reply"},
			{type: "button", img: "mail-back.png", title: "Back", id: "back"},
			{type: "button", img: "mail-mark-important.png", title: "Mark Important", id: "important"},
			{type: "separator"},
			{type: "button", img: "mail-encrypted-full.png", title: "Encrypted Full", id: "encrypted"},
			{type: "button", img: "mail-signed-verified.png", title: "Signed Verified", id: "sign_verif"},
			{type: "separator"},
			{type: "spacer", id: "spacer1"},
			{type: "button", img: "contact-new.png", title: "New Contact", id: "contact"},
			{type: "button", img: "dialog-information.png", title: "Dialog Information", id: "dialog_inf"},
			{type: "button", img: "help-browser.png", title: "Help", id: "help"}
		]
	});
	
	function getLeftColumnWidth() {
		if ( navigator.platform.match(/(Mac|iPhone|iPod|iPad)/i) ) {
			return Math.round(document.body.offsetWidth*0.25);
		} else {
			return Math.max(document.body.offsetWidth*0.12, 250);
		}
	}
	
	function hide_show_toolbar_items() {
		if (window.orientation == 0 || window.orientation == 180) {	//"portrait"
			leftToolbar.hideItem("print");
			leftToolbar.hideItem("settings");
			rightToolbar.hideItem("dialog_inf");
			rightToolbar.hideItem("contact");
			rightToolbar.hideItem("help");
		} else {	//"landscape"
			leftToolbar.showItem("print");
			leftToolbar.showItem("settings");
			rightToolbar.showItem("dialog_inf");
			rightToolbar.showItem("contact");
			rightToolbar.showItem("help");
		}
	}
		
	function change_leftMenu_width_by_orientation() {
		myLayout.cells("a").setWidth(getLeftColumnWidth());		
		leftMenu.define("type",{
				width:(myLayout.cells("a").getWidth() - 5) // ( getLeftColumnWidth() - 5 )
		});
		hide_show_toolbar_items();
	}
		
	if (typeof(window.addEventListener) == "function") {
		window.addEventListener("orientationchange", function(e){
			change_leftMenu_width_by_orientation();
		});
		
		window.addEventListener("resize", function(e){
			change_leftMenu_width_by_orientation();
		});
	} else {
		window.attachEvent("onorientationchange", function(e){
			change_leftMenu_width_by_orientation();
		});
		
		window.attachEvent("onresize", function(e){
			change_leftMenu_width_by_orientation();
		});
	}
		
	change_leftMenu_width_by_orientation();	
	leftMenu.select("inbox");	
}
