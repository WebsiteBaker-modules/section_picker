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

function build_sectionlist($parent, $this_page) {
      global $database, $sections;
      $iterated_parents = array(); // keep count of already iterated parents to prevent duplicates
 
      $table_pages = TABLE_PREFIX."pages";
      $table_sections = TABLE_PREFIX."sections";
	  
      if ( $query_section_id = $database->query("
            SELECT s.*, p.link, p.page_title, p.page_id, p.level 
            FROM ".$table_sections." s 
            JOIN ".$table_pages." p ON (s.page_id = p.page_id) 
            WHERE p.parent = ".$parent." 
            ORDER BY p.level, p.position ASC")) {
            while($res = $query_section_id->fetchRow()) {
				$mname = $res['module'];
				if(isset($res['title'])) $mname .= ' ('.$res['title'].')';
				if ($res['page_id'] != $this_page) {
					$sections[$res['section_id']] = $res['section_id'].'|'.str_repeat("  -  ",$res['level']).$res['page_title'].'      -      section:'.$mname;
				} else {
					$sections[$res['section_id']] = '|'.str_repeat("  -  ",$res['level']).$res['page_title'].'      -      section:'.$mname;
				}
				if (!in_array($res['page_id'], $iterated_parents)) {
					build_sectionlist($res['page_id'], $this_page);
					$iterated_parents[] = $res['page_id'];
				}
            }
      }
}
 

?>