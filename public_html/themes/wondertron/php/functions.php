<?php 
function menuWithClass($stags,$etags){
	global $c,$hostname;
	$mlist = explode('<br />',$c['menu']);
	for($i=0;$i<count($mlist);$i++){
		$page = getSlug($mlist[$i]);
		if(!$page) continue;
		echo $stags." class='menu-".$page."' href='".$hostname.$page."'>".str_replace('-',' ',$page)." ".$etags." \n";
	}
}

function menuItemSlug($itemNumber){
	global $c,$hostname;
	$i = $itemNumber;
	$mlist = explode('<br />',$c['menu']);
	$page = getSlug($mlist[$i]);
	echo $page;
}

function menuItem($itemNumber){
	global $c,$hostname;
	$i = $itemNumber;
	$mlist = explode('<br />',$c['menu']);
	$page = getSlug($mlist[$i]);
	echo ucwords( str_replace('-',' ',$page) );
}

function menuItemUrl($itemNumber){
	global $c,$hostname;
	$i = $itemNumber;
	$mlist = explode('<br />',$c['menu']);
	$page = getSlug($mlist[$i]);
	echo $hostname.$page;
}

function addSettings($c) {
	if ( is_loggedin() ) {
		$html = "<div class=\\\"change border\\\"><p><strong>Contact Email Address</strong></p><div id=\\\"settingsEmail\\\"></div></div>";
		$emailContentArea = content( "adminEmail", $c["adminEmail"]);
		//Render the editable region for Email -- a javascript function will later move it to the appropriate location in the DOM
		echo $emailContentArea;
		echo "<script>addSettings('".$html."');</script>";
	};
}