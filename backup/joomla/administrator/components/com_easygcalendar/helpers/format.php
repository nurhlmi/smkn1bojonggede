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
 * EasyGCalendar component format helper.
*/
class EasyGCalendarFormatHelper
{
	/**
	 * Method to convert a Date String into a DateTime object
	 * @return Date Object
	**/
	public static function getDate ($date = null, $isAllDay = null, $tz = null)
	{
		$dateObj = JFactory::getDate($date, $tz); //returns a DateTime object
		if (! $isAllDay)
		{
			$timeZone = self::getTimeZone();
			$dateObj->setTimezone($timeZone);
		}
		return $dateObj;
	}
	
	/**
	 * Method to format an Event Date
	 * @return Formated String from Event
	**/
	public static function getDateStringFromEvent ($event, $dateFormat, $timeFormat, $dateSeparator = '-')
	{
		// Prepare DateTime  objects
		$dtStartDate = self::getDate($event->start_date, $event->all_day);
		$dtEndDate = self::getDate($event->end_date, $event->all_day);
		
		if ($event->all_day)
		{
			//If we have a all day event it would be necessary to subtract 59 seconds from the original date to ensure that it will be one day before (use only for manual display).
			$dtEndDate->sub(new DateInterval('PT59S'));
		}
		
		// These are the dates we'll display
		$startDate = $dtStartDate->format($dateFormat, true);
		$startTime = $dtStartDate->format($timeFormat, true);
		$endDate = $dtEndDate->format($dateFormat, true);
		$endTime = $dtEndDate->format($timeFormat, true);
		
		//Fallback pattern
		$timeString = $startTime . ' ' . $startDate . ' ' . $dateSeparator . ' ' . $endTime . ' ' . $endDate;
		
		if ($event->all_day)
		{
			if ($startDate == $endDate)
			{
				$timeString = $startDate;
				$dateSeparator = '';
				$endDate = '';
			}
			else
			{
				$timeString = $startDate . ' ' . $dateSeparator . ' ' . $endDate;
			}
			$startTime = '';
			$endTime = '';
		}
		else
		{
			if ($startDate == $endDate)
			{
				$timeString = $startDate . ' ' . $startTime . ' ' . $dateSeparator . ' ' . $endTime;
				$endDate = '';
			}
		}
		return $timeString;
	}
	
	/**
		* Returns the userTime zone if the user has set one, or the global config one
		* @return mixed
     */
     
	/**
	 * Method to get the userTime zone if the user has set one, or the global config one
	 * @return DateTimeZone object
	**/
	public static function getTimeZone()
	{
		$timeZone = JFactory::getApplication()->getCfg('offset');
		//$timeZone = JFactory::getConfig()->getValue('offset');
		$user = JFactory::getUser();
		if ($user->get('id'))
		{
			$userTimeZone = $user->getParam('timezone');
			if (! empty($userTimeZone))
			{
				$timeZone = $userTimeZone;
			}
		}
		
		return new DateTimeZone($timeZone);
	}
	
	/**
	 * Method to Month Names
	 * @return array with prepared and translated month names
	**/
	public static function getMonthNames($isAbbreviated=false)
	{
		$arrValues = array();
		for ($i=1; $i <= 12; $i++) 
		{
			$arrValues [] = JFactory::getDate()->monthToString($i, $isAbbreviated);
		}
		return $arrValues;
	}
	
	/**
	 * Method to Day Names
	 * @return array with prepared and translated day names
	**/
	public static function getDayNames($isAbbreviated=false)
	{
		$arrValues = array();
		for ($i=0; $i < 7; $i++) 
		{
			$arrValues[] = JFactory::getDate()->dayToString($i, $isAbbreviated);
		}
		return $arrValues;
	}
	
	/**
	 * Method to convert php datetime patterns into the momentjs format
	 * @return string
	**/
	public static function convertToFullcalendarFormat($format)
	{
		// php date to fullcalendar date conversion to (http://momentjs.com/docs/#/parsing/string-format/)
		$dateFormat = array(
			'd' => 'DD',
			'D' => 'ddd',
			'j' => 'd',
			'l' => 'dddd',
			'N' => '',
			'w' => '',
			'z' => '',
			'W' => '',
			'S' => 'S',
			'F' => 'MMMM',
			'm' => 'MM',
			'M' => 'MMM',
			'n' => 'M',
			't' => '',
			'L' => '',
			'o' => 'YYYY',
			'Y' => 'YYYY',
			'y' => 'YY', 
			'a' => 'a',
			'A' => 'A',
			'B' => '',
			'g' => 'h',
			'G' => 'H',
			'h' => 'hh',
			'H' => 'HH',
			'i' => 'mm',
			's' => 'ss',
			'u' => '',
			'e' => '',
			'I' => '',
			'O' => '',
			'P' => '',
			'T' => '',
			'Z' => '',
			'c' => 'u',
			'r' => '',
			'U' => '');

		$newFormat = "";
		$isText = false;
		$i = 0;
		while ($i < strlen($format)) 
		{
			$chr = $format[$i];
			if ($chr == '"' || $chr == "'") {
				$isText = ! $isText;
			}
			$replaced = false;
			if ($isText == false) 
			{
				foreach ($dateFormat as $zl => $jql) 
				{
					if (substr($format, $i, strlen($zl)) == $zl) 
					{
						$chr = $jql;
						$i += strlen($zl);
						$replaced = true;
					}
				}
			}
			
			if ($replaced == false) 
			{
				$i ++;
			}
			$newFormat .= $chr;
		}

		return $newFormat;
	}
}