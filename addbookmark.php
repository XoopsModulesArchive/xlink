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

//please adapt - bitte bearbeiten
global $linktitle, $link_url, $topic_id, $story_id, $article_id, $xlinkcategory_id, $xlinkforum_id, $xlinkcat_id, $xlinkalbum_id, $page_id, $dc_id, $dl_id, $home_url;
//adaptation end - bearbeitung ende

  //////////////////////////////////////////////////
 // Park Selected bookmark in da Users Block
//
$xoopsModule =& XoopsModule::getByDirname("xlink");
if ( !$xoopsUser->isAdmin($xoopsModule->mid()) ) {
	redirect_header(XOOPS_URL."/",3,_NOPERM);
	exit();
} else {
//please adapt - bitte bearbeiten
   $linktitle = !empty($linktitle) ? rawurldecode($linktitle) : "";
    $link_url = !empty($link_url)  ? rawurldecode($link_url)  : "";
	$topic_id = !empty($topic_id)  ? intval($topic_id)        : 0;
	$story_id = !empty($story_id)  ? intval($story_id)        : 0;
	$article_id = !empty($article_id)  ? intval($article_id)        : 0;
	$xlinkcategory_id = !empty($xlinkcategory_id)  ? intval($xlinkcategory_id)        : 0;
	$xlinkforum_id = !empty($xlinkforum_id)  ? intval($xlinkforum_id)        : 0;
	$xlinkcat_id = !empty($xlinkcat_id)  ? intval($xlinkcat_id)        : 0;
	$xlinkalbum_id = !empty($xlinkalbum_id)  ? intval($xlinkalbum_id)        : 0;
  	 $page_id = !empty($page_id)   ? intval($page_id)         : 0;
	   $dc_id = !empty($dc_id)     ? intval($dc_id)           : 0;
	   $dl_id = !empty($dl_id)     ? intval($dl_id)           : 0;
    $home_url = !empty($home_url)  ? rawurldecode($home_url)  : "";//$HTTP_REFERER;
//adaptation end - bearbeitung ende
				
	     $sql = "INSERT INTO ".$xoopsDB->prefix("xlink_uri")." VALUES (NULL, '$link_title', '$link_url','$home_url')";
	 $xoopsDB -> queryF($sql);
	$new_urid = $xoopsDB->getInsertId();
	//please adapt - bitte bearbeiten
	     $sql = "INSERT INTO ".$xoopsDB->prefix("xlink")." VALUES (NULL, $new_urid, $module_id, $topic_id, $story_id, $article_id, $xlinkcategory_id, $xlinkforum_id, $xlinkcat_id, $xlinkalbum_id, $page_id, $dc_id, $dl_id, '')";
//adaptation end - bearbeitung ende						
	if($xoopsDB->queryF($sql)){
		$fin_txt = _MD_XLINK_PASTESUCCESS;
	} else {
		$fin_txt = _MD_XLINK_FAILURE;
	}
	redirect_header($home_url,1,$fin_txt);
exit();
}
?>