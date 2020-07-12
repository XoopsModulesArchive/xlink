<?php
//  -------------------------------------------------------------------------- //
//  [CONTENT RELATIONS MGR FOR XOOPS-R2]
//  Author: Toms Veilands [tomsys@tomsys.net] [www.tomsys.net] [AKA tomsys]
//  Credits: Xoops Team [www.xoops.org]
//  Version: 1.0
//  ReleaseDate: May 03, 2003
//  License: GPL - [http://www.gnu.org/licenses/gpl.html]
//  -------------------------------------------------------------------------- //
global $xoopsConfig;

$adminmenu[1]['title'] = _MI_XLINK_ADMENU1;
$adminmenu[1]['link'] = "admin/index.php";
$adminmenu[2]['title'] = _MI_XLINK_ADMENU2;
if ( file_exists("../../modules/xlink/language/".$xoopsConfig['language']."/readme.php") ) {
$adminmenu[2]['link'] = "../../modules/xlink/language/".$xoopsConfig['language']."/readme.php";
} else {
$adminmenu[2]['link'] = "../../modules/xlink/language/english/readme.php";
}
?>