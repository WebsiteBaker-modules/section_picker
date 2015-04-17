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
 
 version 0.26
  - Improved loading of larger websites (many sections to pick) - Thnx sare
  - Improved loading of multiple section_pickers on a single page
 
 version 0.25
  - Fixed unselectable childpages.
		thanks to gottfried for reporting

 version 0.24
  - bugfix a backend javascript error in IE6 
		thanks to mviens for reporting

 version 0.23
  - bugfixed the use of short_open_tags in modify.php
 
 version 0.22
 - same bugfix as v0.21. That one didn't make it to the install file :-(

 version 0.21
 - bugfix in select_pages.php

 version 0.2
 - added search.php - 
   This allows linked sections to be searched. The sections must support the improved search of WB2.7
   WB 2.6 installation wil work, but without search.
 
 version 0.1
 - initial version
 
*/


$module_directory = 'section_picker';
$module_name = 'Section Picker';
$module_function = 'page';
$module_version = '0.26';
$module_platform = '2.6.x';
$module_author = 'Ruud Eisinga';
$module_license = 'GNU General Public License';
$module_description = 'This module allows you to insert a section from another page.';

?>
