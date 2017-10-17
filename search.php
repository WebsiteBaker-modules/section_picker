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

function section_picker_search($func_vars) {
	extract($func_vars, EXTR_PREFIX_ALL, 'func');

	$result = false;

	$table_mod = TABLE_PREFIX.'mod_section_pick';
	$query_page = $func_database->query("SELECT * FROM ".$table_mod." WHERE section_id =".$func_section_id);  
	$new_section = $query_page->fetchRow();
	$new_section_id = $new_section["target_section_id"];

	$query_sec = $func_database->query("SELECT module FROM ".TABLE_PREFIX."sections WHERE section_id = '$new_section_id' ");
	if($query_sec->numRows() > 0) { 
		$section = $query_sec->fetchRow(); 
		$file = WB_PATH.'/modules/'.$section['module'].'/search.php';
		if(!file_exists($file)) {
			$file = WB_PATH.'/modules/'.$section['module'].'_searchext/search.php';
			if(!file_exists($file)) {
				$file='';
			}
		}
		if($file!='') {
			include_once($file);
			if(function_exists($section['module']."_search")) {
				$func_vars['section_id'] = $new_section_id;
				$result = call_user_func($section['module']."_search", $func_vars);
			}
		}
	}
	return $result;
}
?>
