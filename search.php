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
				//echo "<br/>DEBUG: Calling: ".$section['module']."_search - OrgSectionId:".$func_section_id." - NewSectionId:".$new_section_id;
				$func_vars['section_id'] = $new_section_id;
				$result = call_user_func($section['module']."_search", $func_vars);
			}
		}
	}
	return $result;
}
?>
