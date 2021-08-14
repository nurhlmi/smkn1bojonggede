<?php
/**
* @package EasyGCalendar
* @Copyright (C) 2011-2018 Daniel Blum. All rights reserved.
* @license Distributed under the terms of the GNU General Public License GNU/GPL v3 http://www.gnu.org/licenses/gpl-3.0.html
* @author Daniel Blum
* @website Visit http://codeninja.eu for updates and information.
**/

#namespace Joomla\com_easygcalendar\helpers;

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

JLoader::register('EasyGCalendarDatabaseHelper', JPATH_ADMINISTRATOR . '/components/com_easygcalendar/helpers/database.php');

/**
 * EasyGCalendar component helper base class
 */
class EasyGCalendarHelperBase
{
	//Component
	public static $extensionName = 'com_easygcalendar';
	public static $extension_prefix = 'EasyGCalendar';
	
	//Module(s)
	public static $moduleName = 'mod_easygcalendar';
	public static $moduleUpcomingName = 'mod_easygcalendar_upcoming';
	
	//Frontend Frameworks
	public static $frontendFrameworkBS2 = 'BS2';
	public static $frontendFrameworkBS3 = 'BS3';

	//Properties
	public static $calendarAccessRoleFreeBusy = 'freeBusyReader';
	public static $validRefTypes = array('com', 'mod', 'mod_upcomming');
	

	/**
	 * Method to get a component parameter
	 * @return object
	**/
	public static function getComponentParameter ($key, $defaultValue = null)
	{
		$params = JComponentHelper::getParams(self::$extensionName);
		return $params->get($key, $defaultValue);
	}
	
	/**
	 * Method to get the parameter set of a specific by ModuleID
	 * @return object
	**/
	public static function getModuleParameterByID ($moduleID)
	{
		//Get Module from Database
		$db = JFactory::getDbo();
		$query = $db->getQuery(true)
			->select('m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params, mm.menuid')
			->from('#__modules AS m')
			->join('LEFT', '#__modules_menu AS mm ON mm.moduleid = m.id')
			->where('m.published = 1')
			->join('LEFT', '#__extensions AS e ON e.element = m.module AND e.client_id = m.client_id')
			->where('e.enabled = 1')
			->where('m.id = '.$moduleID);
		
		// Set the query
		$db->setQuery($query);
		//echo "<br>DEBUG:SQL: ".$query;
		
		try
		{
			$module = $db->loadObject();
			if($module && $module->id == $moduleID)
			{
				// Get module parameters
				$params = new JRegistry;
				$params->loadString($module->params);
				return $params;
			}
		}
		catch (RuntimeException $e)
		{
			JLog::add(JText::sprintf('JLIB_APPLICATION_ERROR_MODULE_LOAD', $e->getMessage()), JLog::WARNING, 'jerror');
		}
		return null;
	}
	
	/**
	 * Method to check if the installed version includes PRO functionality
	 * @return boolean
	**/
	public static function isProVersion ($method="", $isPrintMessage=false)
	{
		if(file_exists(JPATH_ADMINISTRATOR . '/components/com_easygcalendar/helpers/utilsPro.php'))
		{
			require_once(JPATH_ADMINISTRATOR . '/components/com_easygcalendar/helpers/utilsPro.php');
			if(method_exists('EasyGCalendarHelperPro', $method))
			{
				return true;
			}
		}
	
		if($isPrintMessage)
		{
			print('Message: There is no EasyGCalendar PRO version installed!');
		}
		return false;
	}
	
}
?>