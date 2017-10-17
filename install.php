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
*	prevent this file from being accessed directly
*/
if(defined('WB_PATH') == false) die("Cannot access this file directly"); 

$table = TABLE_PREFIX ."mod_section_pick";
$database->query("DROP TABLE IF EXISTS `$table`");

$database->query("
	CREATE TABLE `$table` (
		`section_id` INT(11) NOT NULL DEFAULT '0',
		`page_id` INT(11) NOT NULL DEFAULT '0',
		`target_section_id` INT(11) NOT NULL DEFAULT '0',
		PRIMARY KEY (`section_id`)
	)
");

?>
