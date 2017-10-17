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
 
 version 0.29 
   - Use section titles in section list when available

 version 0.28
   - Solved a conflict with other modules pages list
 
 version 0.27
  - Respect display date settings of the included section
 
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
$module_version = '0.29';
$module_platform = '2.8.x';
$module_author = 'Ruud Eisinga / Dev4me';
$module_license = 'GNU General Public License';
$module_description = 'This module allows you to insert a section from another page.';

?>
