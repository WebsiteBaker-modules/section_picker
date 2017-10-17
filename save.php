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

require_once('../../config.php');

/**
*	Include WB admin wrapper script
*	Tells script to update when this page was last updated
*/
$update_when_modified = true;

require(WB_PATH.'/modules/admin.php');

/**
*	Update id, anchor and target
*/
if(isset($_POST['target_section_id_'.$section_id])) {
	$target_section_id = $admin->add_slashes($_POST['target_section_id_'.$section_id]);
	$table_mod = TABLE_PREFIX.'mod_section_pick';
	$database->query("UPDATE ".$table_mod." SET target_section_id = ".$target_section_id." WHERE section_id =".$section_id);
}

/**
*	Check if there is a database error, otherwise say successful
*/
if($database->is_error()) {
	$admin->print_error($database->get_error(), $js_back);
} else {
	$admin->print_success($MESSAGE['PAGES']['SAVED'], ADMIN_URL.'/pages/modify.php?page_id='.$page_id);
}

/**
*	Print admin footer
*/
$admin->print_footer();

?>