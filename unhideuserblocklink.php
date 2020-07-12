<?php
//  -------------------------------------------------------------------------- //
//  [CONTENT RELATIONS MGR FOR XOOPS-R2]
//  Author: Toms Veilands [tomsys@tomsys.net] [www.tomsys.net] [AKA tomsys]
//  Credits: Xoops Team [www.xoops.org]
//  Version: 1.0
//  ReleaseDate: May 03, 2003
//  License: GPL - [http://www.gnu.org/licenses/gpl.html]
//  -------------------------------------------------------------------------- //

include '../../mainfile.php';
$sql = "UPDATE ".$xoopsDB->prefix('xlink')." SET visible = 0 WHERE urid = ".$_GET['link_id']."";
if($xoopsDB->queryF($sql)){
		$fintxt = _MD_XLINK_LINKAVAIL;
	} else {
		$fintxt = _MD_XLINK_FAILURE;
	}
		redirect_header($HTTP_SERVER_VARS['HTTP_REFERER'],1,$fintxt);	
exit();
?>