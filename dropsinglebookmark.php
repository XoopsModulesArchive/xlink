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

foreach ($_POST as $k => $v){
    ${$k} = $v;
}

foreach ($_GET as $k => $v){
    ${$k} = $v;
}


$xoopsModule =& XoopsModule::getByDirname("xlink");
if ( !$xoopsUser->isAdmin($xoopsModule->mid()) ) {
	redirect_header(XOOPS_URL."/",3,_NOPERM);
	exit();
} else {
			$sql = "DELETE FROM ".$xoopsDB->prefix('xlink_tmpuri')." WHERE recid = ".$link_id."";
			$success1 = $xoopsDB->queryF($sql) ? 1 : 0; 

			$sql = "DELETE FROM ".$xoopsDB->prefix('xlink')." WHERE recid = ".$link_id."";
			$success = $xoopsDB->queryF($sql) ? 1 : 0;

			$sql = "DELETE FROM ".$xoopsDB->prefix('xlink_uri')." WHERE urid = ".$link_id."";

			if($xoopsDB->queryF($sql) && $success && $success1){
				$fintxt = _MD_XLINK_SUCC;
			} else {
				$fintxt = _MD_XLINK_FAILURE;
			}
      
		redirect_header($HTTP_SERVER_VARS['HTTP_REFERER'],1,$fintxt);

exit();
}
?>


		
