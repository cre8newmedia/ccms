<?php 
use_helper('Javascript'); 
use_javascript('/cre8SwfObjectPlugin/js/swfobject.js');

$flashVars = isset($flashVars) ? $flashVars : array();
$flashVarsArray = array();
foreach($flashVars as $key => $val) {
  $flashVarsArray[] = $key . ": '" . $val . "'";
}
$flashVarsTxt = implode(', ', $flashVarsArray);

echo javascript_tag('

document.observe("dom:loaded", function () {

	var flashvars = { ' . $flashVarsTxt . ' };
	var params = {
			menu: "false",
			wmode: "transparent"
	};
	var attributes = {
			id: "' . $id . '",
			name: "' . $id . '"
	};
	swfobject.embedSWF("' . $filepath . '", "' . $id . '", "' . $width . '", "' . $height . '", "8.0.0","/cre8SwfObjectPlugin/js/expressInstall.swf", flashvars, params, attributes); 
});

'); ?>

<div id="<?php echo $id; ?>"></div>
