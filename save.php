<?php
/*

 Website Baker Project <http://www.websitebaker.org/>
 Copyright (C) 2004-2008, Ryan Djurovich

 Website Baker is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 Website Baker is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with Website Baker; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

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