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

/**
*	Must include code to stop this file being accessed directly
*/
if(defined('WB_PATH') == false) exit("Cannot access this file directly");

require_once ('select pages.php');

$table = TABLE_PREFIX.'mod_section_pick';
$sql_result = $database->query("SELECT * FROM $table WHERE section_id = '$section_id'");
$sql_row = $sql_result->fetchRow();
$target_section_id = $sql_row['target_section_id'];
$sel = ' selected';

if (!isset($links)) {
	$links = array();
	build_pagelist(0,$page_id);
}

?>
<form name="select_section<?php echo $section_id; ?>" action="<?php echo WB_URL ?>/modules/section_picker/save.php" method="post">
<input type="hidden" name="page_id" value="<?php echo $page_id ?>" />
<input type="hidden" name="section_id" value="<?php echo $section_id ?>" />
<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
		<td><?php echo $TEXT['SECTION'].':' ?></td>
		<td>
			<select name="target_section_id_<?php echo $section_id; ?>" style="font-family:monospace; width:500px;" />
				<option value="0"<?php echo $target_section_id=='0' ? $sel : '' ?>><?php echo $TEXT['PLEASE_SELECT']; ?></option>
			<?php foreach($links AS $li) {
					$option_link = explode('|',$li);
					$disabled = $option_link[0] ? '':' disabled';
					echo "<option $disabled value=\"".$option_link[0]."\" ".($target_section_id==$option_link[0] ? $sel : '').">$option_link[1]</option>\n";
				} ?>
			</select>
		</td>
	</tr>
</table>
<p></p>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
		<td align="left"><input type="submit" value="<?php echo $TEXT['SAVE'] ?>" style="width: 100px; margin-top: 5px;" /></td>
		<td align="right"><input type="button" value="<?php echo $TEXT['CANCEL'] ?>" onclick="javascript: window.location='index.php';" style="width: 100px; margin-top: 5px;" /></td>
	</tr>
</table>
</form>
<p></p>