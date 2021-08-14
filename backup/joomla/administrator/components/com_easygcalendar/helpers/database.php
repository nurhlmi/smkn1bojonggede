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

/**
 * EasyGCalendar component database helper.
 */
class EasyGCalendarDatabaseHelper
{
	//Database
	public static $tablename = '#__easygcalendar';
	
	/**
	 * Method to get all available Calendars
	 * @return objects
	**/
	public static function getAllCalendars() 
	{
		$db = JFactory::getDBO();
		$query = "SELECT id, name, identifier, APIKey, color FROM ".self::$tablename;
		$db->setQuery( $query );
		return $db->loadObjectList();
	}
	
	/**
	 * Method to get all available Calendars
	 * @return List of Calendar objects
	**/
	public static function getCalendars($arrCalendarIDs)
	{
		$condition = '';
		if(!empty($arrCalendarIDs))
		{
			if(is_array($arrCalendarIDs)) 
			{
				JArrayHelper::toInteger($arrCalendarIDs); //Secure arrays of integers
				$condition = 'id IN ( ' . rtrim(implode( ',', $arrCalendarIDs ), ',') . ')';
			}
			else
			{
				$condition = 'id = '.(int)rtrim($arrCalendarIDs, ',');
			}
			
			$db = JFactory::getDBO();
			$query = "SELECT id, name, identifier, APIKey, color FROM ".self::$tablename." WHERE ".$condition;
			//echo "<br>DEBUG SQL:". $query;
			$db->setQuery( $query );
			return $db->loadObjectList();
		}
		else
		{
			return self::getAllCalendars();
		}
	}
	
	/**
	 * Method to get a single available Calendar
	 * @return Calendar object
	**/
	public static function getCalendar($intCalendarID)
	{
		if(is_numeric($intCalendarID))
		{
			$condition = 'id = '. (int)$intCalendarID;
			
			$db = JFactory::getDBO();
			$query = "SELECT id, name, identifier, APIKey, color FROM ".self::$tablename." WHERE ".$condition;
			//echo "<br>DEBUG SQL:". $query;
			$db->setQuery( $query );
			return $db->loadObject();
		}
		return null;
	}
	
}

?>