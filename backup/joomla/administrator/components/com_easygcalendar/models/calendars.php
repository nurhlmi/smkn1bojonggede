<?php
/**
* @package EasyGCalendar
* @Copyright (C) 2011-2018 Daniel Blum. All rights reserved.
* @license Distributed under the terms of the GNU General Public License GNU/GPL v3 http://www.gnu.org/licenses/gpl-3.0.html
* @author Daniel Blum
* @website Visit http://codeninja.eu for updates and information.
**/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modellist');
require_once(JPATH_ADMINISTRATOR . '/components/com_easygcalendar/helpers/utilsBase.php');
JLoader::register('EasyGCalendarHelper', JPATH_ADMINISTRATOR . '/components/com_easygcalendar/helpers/utils.php');
JLoader::register('EasyGCalendarDatabaseHelper', JPATH_ADMINISTRATOR . '/components/com_easygcalendar/helpers/database.php');

/**
 * Methods supporting a list of records.
 */
class EasyGCalendarModelCalendars extends JModelList
{
	/**
	 * Build an SQL query to load the list data.
	 */
	protected function getListQuery()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);

		$query->select('*');

		$query->from(EasyGCalendarDatabaseHelper::$tablename);
		return $query;
	}
}
?>
