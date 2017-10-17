<?php
/**
 *
 * @category        modules
 * @package         minicarousel
 * @author          Ruud Eisinga / Dev4me
 * @link			https://dev4me.com
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker >= 2.8.3 SP7
 * @requirements    PHP 5.6 and higher
 * @version         0.29
 * @lastmodified    May 29, 2017
 *
*/

/**
*	Must include code to stop this file being access directly
*/
if(defined('WB_PATH') == false) die("Cannot access this file directly");

// Use this define in your template to include frontend.css and frontend.js from remote section
// define('SPINCLFE',true);

$table_mod = TABLE_PREFIX.'mod_section_pick';
$query_page = $database->query("SELECT * FROM ".$table_mod." WHERE section_id =".$section_id);
$new_section = $query_page->fetchRow();
$new_section_id = $new_section["target_section_id"];

$query_sec = $database->query("SELECT section_id,module,publ_start,publ_end FROM ".TABLE_PREFIX."sections WHERE section_id = '$new_section_id' ");
if($query_sec->numRows() > 0) { 
	$section = $query_sec->fetchRow(); 
	$now = time();
	if( !(($now<=$section['publ_end'] || $section['publ_end']==0) && ($now>=$section['publ_start'] || $section['publ_start']==0)) ) {
		return;
	}
	$section_id = $section['section_id']; 
	$module = $section['module']; 
	
	if (defined('SPINCLFE') && SPINCLFE == true) {
		if (file_exists(WB_PATH.'/modules/'.$module.'/frontend.css')) {
			echo '<link href="'.WB_URL.'/modules/'.$module.'/frontend.css" rel="stylesheet" type="text/css" media="screen" />'."\n";
		}
		if (file_exists(WB_PATH.'/modules/'.$module.'/frontend.js')) {
			echo '<script src="'.WB_URL.'/modules/'.$module.'/frontend.js" type="text/javascript"></script>'."\n";
		}
		if (file_exists(WB_PATH.'/modules/'.$module.'/frontend_body.js')) {
			echo '<script src="'.WB_URL.'/modules/'.$module.'/frontend_body.js" type="text/javascript"></script>'."\n";
		}
	}
	
	require(WB_PATH.'/modules/'.$module.'/view.php'); 

} 
?>
