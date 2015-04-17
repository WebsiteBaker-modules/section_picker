<?php
/**
*	Recursive function to build a list of pages and subpages
*
*	@version:	0.2.6
*	@date:		2010-09-01
*	@author:	RuudE / Sare
*	@package:	Websitebaker - Modules: selection-picker
*	@state:		@dev
*
*
*/

function build_pagelist($parent, $this_page) {
      global $database, $links;
      $iterated_parents = array(); // keep count of already iterated parents to prevent duplicates
 
      $table_pages = TABLE_PREFIX."pages";
      $table_sections = TABLE_PREFIX."sections";
 
      if ( $query_section_id = $database->query("
            SELECT s.section_id, s.module, p.link, p.page_title, p.page_id, p.level 
            FROM ".$table_sections." s 
            JOIN ".$table_pages." p ON (s.page_id = p.page_id) 
            WHERE p.parent = ".$parent." 
            ORDER BY p.level, p.position ASC")) {
            while($res = $query_section_id->fetchRow()) {
                  if ($res['page_id'] != $this_page) {
                        $links[$res['section_id']] = $res['section_id'].'|'.str_repeat("  -  ",$res['level']).$res['page_title'].'      -      section:'.$res['module'];
                  } else {
                        $links[$res['section_id']] = '|'.str_repeat("  -  ",$res['level']).$res['page_title'].'      -      section:'.$res['module'];
                  }
                  if (!in_array($res['page_id'], $iterated_parents)) {
                        build_pagelist($res['page_id'], $this_page);
                        $iterated_parents[] = $res['page_id'];
                  }
            }
      }
}
 

?>