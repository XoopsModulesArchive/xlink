<?php
//  -------------------------------------------------------------------------- //
//  [CONTENT RELATIONS MGR FOR XOOPS-R2]
//  Author: Toms Veilands [tomsys@tomsys.net] [www.tomsys.net] [AKA tomsys]
//  Credits: Xoops Team [www.xoops.org]
//  Version: 1.0
//  ReleaseDate: May 03, 2003
//  License: GPL - [http://www.gnu.org/licenses/gpl.html]
//  -------------------------------------------------------------------------- //
include '../../../../mainfile.php';
include '../../../../include/cp_header.php';

if ( !is_object($xoopsUser) || !is_object($xoopsModule) || !$xoopsUser->isAdmin($xoopsModule->getVar('mid')) ) {
	exit(_NOPERM);
} else {	
	xoops_cp_header();
echo "<h4 style='border-bottom:2px red solid;padding:3px;'>xLink-Manager - How to use it</h4>	
		
This is a simple but powerful tool with which Webmasters can organize their websites and gives the user a plus of information with the <strong>Linked...</strong>-Block. This block can contain links to various sources within your xoops installation.
<br />
<br />			
After a successful installation you have two new blocks:
<br />
			<ul>
				<li>User-Block - <strong>Linked...</strong></li>
				<li>Admin-Block - <strong>xLink-Manager</strong></li>
			</ul>
			and a small administration page (menu item Organize).
<br />
<br />
After installation make the blocks visible with the block administration. The <strong>xLink-Manager</strong>-Block should be a center middle block and visible on all pages. The <strong>Linked</strong> can be put to any position but should also be visible on all pages. After theses steps you should give access rights for the different groups to the <strong>Linked</strong>-Block. This ends the installation.
<br />
<br />
The linking of the variaous pages, articles, categories etc. is done by the following (a article-forum-link as example):
<ol>
<li>You want to link from a forum post to an article. First you have to go to the article of your choice.</li>
<li>Click on the button ADD TARGET.</li>
<li>Now you see an input field with the entry --> New Link <--. Mark this entry and give it a proper name and click on the UPDATE button.</li>
<li>Now move to the forum post of your choice and click on the button with the arrow downwards. If you want to change the link name afterwards you have to do this in the module administration.</li>
<li>Now the linking was successful and you should see a link in the <strong>Linked</strong> block. This link is only visible on the page where the linking occured. <strong>VERY IMPORTANT:</strong> I strongly advise you that after adding a target you must directly go to the source of the bookmark. If you do not it might be possible that the database entries get messed up and have to be changed in the database itself.</li>
</ol>
<strong>Administrative things</strong>
<ul>
<li>The button <strong>Remove all</strong> in the xLink-Manager block will erase ALL bookmark from the database. What else?</li>
<li>The button with the blue <strong>L</strong> in the xLink-Manager block will lead you to the source page of the bookmark.</li>
<li>The button with the red <strong>X</strong> in the <strong>xLink-Manager</strong> block will erase the specified bookmark entry from the database.</li>
<li>The button with the red <strong>X</strong> in the <strong>Linked</strong> block will erase the specified bookmark entry from the database.</li>
<li>The button with the dimmed <strong>H</strong> in the <strong>Linked</strong> block will hide the bookmark entry from the user. When the <strong>H</strong> is not dimmed, the link can be made visible to the user.</li>
<li>The organisation of the bookmark entris can also be made from the administration part of the module. Availabe links will be shown. You can also filter the links. The modules you can choose from the pulldown are always the sources of the links!
</ul>
<strong>How do I adapt xLink?</strong>
<br /><br />
I have modified the module so far that it should work with most of the modules, but since there are a bunch of different ids for categories, articles etc. I might have missed some important modules. The adaptation is indeed very easy.
<ol>
<li>Some things you have to do beforehand: First you have to write down the ids of categories or other parts that are missing. If you move your mouse over a link (e.g. a category) you will see the name of the id in the status bar (e.g. cat).</li>
<li>You have to open the files sql/mysql.sql, addbookmark.php, xlink_admin_blocks.php and xlink_user_blocks.php in an editor. Except the file mysql.sql all parts you have to adapt are marked with <strong>//please adapt - bitte bearbeiten</strong>. There you have to fill in the desired ids. You also have to change the mysql file reflecting the changes before. These changes only have to be made in table xlink.</li>
<li>Special case xcgallery. Derya made a damn good job on this one, but I spent some time on making it work with xLink. You only have to open the file xlink/include/init.inc.php in an editor and delete the if query regarding HTTP_POST_VARS.</li>
</ol>
			";
	xoops_cp_footer();
}
?>