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

require_once(JPATH_ADMINISTRATOR . '/components/com_easygcalendar/helpers/utilsBase.php');
#JLoader::register('EasyGCalendarDatabaseHelper', JPATH_ADMINISTRATOR . '/components/com_easygcalendar/helpers/database.php');

/**
 * EasyGCalendar component helper.
 */
class EasyGCalendarHelper extends EasyGCalendarHelperBase
{
	/**
	 * Method to get all calendars from database by id
	 * @return array with available calendars
	**/
	public static function getCalendarList($arrCalendarIDs)
	{
		$arrResults = array();
		$objCalendars = EasyGCalendarDatabaseHelper::getCalendars($arrCalendarIDs);
		if($objCalendars != null)
		{
			foreach($objCalendars as $calendar)
			{
				$arrResults[] = array('id' => $calendar->id, 'name' => htmlspecialchars($calendar->name), 'color' => $calendar->color);
			}
		}
		
		//DEBUG
		//print("<pre>".print_r($arrResults, true)."</pre>");
		return $arrResults;
	}
	
	/**
	 * Method to get a calendar filter select list
	 * @return string with html of the filter select list
	**/
	public static function getCalendarFilter($arrCalendarResults, $componentID)
	{
		$filterSelectListData[] = JHTML::_('select.option', '0', "- Select item -", 'value', 'text' );
		foreach($arrCalendarResults as $item)
		{
			$filterSelectListData[] = JHTML::_('select.option', $item['id'], $item['name'], 'value', 'text' );
		}
		return preg_replace( "/\r|\n/", "", JHTML::_( 'select.genericlist', $filterSelectListData, 'selectedFilterCalendarId', 'onchange="EasyGCalendarManagement.applyCalendarFilter(this);" data-calendar-component-id="'.$componentID.'"', 'value', 'text', '', '', true));
	}
	
	/**
	 * Method to get a valid calendar data url (absolute)
	 * @return string with a prepared calendar data url
	**/
	public static function getCalendarDataUrl($arrCalendarIDs, $strRefType = 'com', $intRefID = 0)
	{
		$arrParams = array();
		if(is_array($arrCalendarIDs))
		{
			$arrParams['ids'] = $arrCalendarIDs;
		}
		
		if (in_array(strtolower($strRefType), parent::$validRefTypes) && $intRefID > 0)
		{
			$arrParams['refType'] = $strRefType;
			$arrParams['refID'] = $intRefID;
		}
		//Protecting Against CSRF Attacks
		$arrParams[JSession::getFormToken()] = 1;
		$tmpUrl = html_entity_decode('index.php?option='. parent::$extensionName. '&view=events&format=raw&' . http_build_query($arrParams));
		return JUri::root() . $tmpUrl;
	}
	
	/**
	 * Method to get a valid calendar details url
	 * @return string with a prepared calendar details url
	**/
	public static function getCalendarDataDetailsUrl($calendarId, $eventIdentifier, $strRefType = 'com', $intRefID = 0)
	{
		$arrParams = array();
		if($calendarId > 0 && $eventIdentifier != '')
		{
			$arrParams['calendarId'] = $calendarId;
			$arrParams['eventId'] = $eventIdentifier;
		}
		
		if (in_array(strtolower($strRefType), parent::$validRefTypes) && $intRefID > 0)
		{
			$arrParams['refType'] = $strRefType;
			$arrParams['refID'] = $intRefID;
		}
		return html_entity_decode(JURI::base() . 'index.php?option='. parent::$extensionName. '&view=event&' . http_build_query($arrParams));
	}
	
	/**
	 * Method to get a valid security form token
	 * @return Url parameter with token to protecting against CSRF attacks
	**/
	public static function getCalendarDataUrlFormToken()
	{
		//Protecting against CSRF Attacks
		$arrParams = array(JSession::getFormToken() => 1);
		return '&'.http_build_query($arrParams );
	}
	
	/**
	 * Method to get all API data from the selected Calendar IDs
	 * @return array with calendar data
	**/
	public static function getCalendarData($arrCalendarIDs, $dtStartDate, $dtEndDate, $strRefType = 'com', $intRefID = 0, $isCachingEnabled = true, $cacheLifeTime=0)
	{
		$arrResults = array();
		foreach($arrCalendarIDs as $intCalendarID)
		{
			$arrCalendarResults = array();
			$objCalendar = EasyGCalendarDatabaseHelper::getCalendar($intCalendarID);
			if($objCalendar != null)
			{
				//Handle cached objects and cleanup
				if($isCachingEnabled)
				{
					$cacheKey = self::getCacheKey($intCalendarID, $strRefType, $intRefID, $dtStartDate->format('Y-m-d'));
					$arrCalendarResults = self::getCachedObject($strRefType, $cacheKey);
				}
				
				//Only load if cached object is null
				if(!$arrCalendarResults)
				{
					$id = $objCalendar->id;
					$strName = $objCalendar->name;
					$strAPIKey = $objCalendar->APIKey;
					$strIdentifier = $objCalendar->identifier;
					$strColor = $objCalendar->color;
					if(!empty($strAPIKey) && !empty($strIdentifier))
					{
						//Get Calendars from Google API
						EasyGCalendarGoogleAPIHelper::$googleAPIKey = $strAPIKey;
						EasyGCalendarGoogleAPIHelper::$googleCalendarId = $strIdentifier;
						//Date range limitation
						EasyGCalendarGoogleAPIHelper::$googleCalendarTimeMin = $dtStartDate->format('c');
						EasyGCalendarGoogleAPIHelper::$googleCalendarTimeMax = $dtEndDate->format('c');
						EasyGCalendarGoogleAPIHelper::$googleCalendarTimeZone = EasyGCalendarFormatHelper::getTimeZone()->getName();
						
						$objGoogleAPIItems = EasyGCalendarGoogleAPIHelper::getCalendarItems();
			
						$arrItems = array();
						if($objGoogleAPIItems)
						{
							/**
							array ('title' => 'value', 'start' => 'value', 'end' => 'value', 'description' => 'customvalue')
							**/
							foreach($objGoogleAPIItems as $item)
							{
								$isFreeBusyReader = (strcasecmp($item->calendarAccessRole, parent::$calendarAccessRoleFreeBusy) == 0);
								
								if((!is_null($item->title) || $isFreeBusyReader ) && !is_null($item->startDate) && !is_null($item->endDate))
								{
									//Localize event item data
									$item = self::getLocalizedEventItem($item, $isFreeBusyReader, $strRefType);
									$arrCalendarResults[] = array ( 'title' => (string)$item->title
																				, 'color' => $strColor
																				, 'isFreeBusyReader' => $isFreeBusyReader
																				, 'start' => $item->startDate
																				, 'end' => $item->endDate
																				, 'description' => $item->desc
																				, 'details_url' => self::getCalendarDataDetailsUrl($id, (string)$item->id, $strRefType, $intRefID));
								}
							}
						}
					}
					
					//set new cache object
					if($isCachingEnabled && is_array($arrCalendarResults) && count($arrCalendarResults) > 0)
					{
						self::setCachedObject($strRefType, $cacheKey, $cacheLifeTime, $arrCalendarResults);
					}
				}
				
				//Append protecting against CSRF attacks
				foreach ($arrCalendarResults as $key => $value)
				{
					$arrCalendarResults[$key]['details_url'] .= self::getCalendarDataUrlFormToken();
				}
				
				//Append results
				$arrResults = array_merge($arrResults, $arrCalendarResults);
			}
		}
		
		//DEBUG
		//print("<pre>".print_r($arrResults, true)."</pre>");
		return $arrResults;
	}
	
	/**
	 * Method to get all selected Calendars * Method to get all data for the selected calendar IDs
	 * @return array with prepared calendar entires
	**/
	public static function getFilteredCalendarItems($arrCalendarIDs, $dtStartDate='', $dtEndDate='', $sortOrder='asc', $isShowOngoing=true, $intMaxEvents=5, $strFilter='', $strRefType = 'com', $intRefID = 0, $isCachingEnabled = true, $cacheLifeTime = 0)
	{
		$arrResults = array();
		$strCacheKeyAddition = '';
		
		//Generate cache key if enabled and handle cached objects and cleanup
		if($isCachingEnabled)
		{
			if($dtStartDate instanceof DateTime)
			{
				$strCacheKeyAddition .= $dtStartDate->format('Y-m-d') . '-';
			}
			
			if($dtEndDate instanceof DateTime)
			{
				$strCacheKeyAddition .= $dtEndDate->format('Y-m-d') . '-';
			}
			
			$strCacheKeyAddition .= $isShowOngoing .'-'. $intMaxEvents .'-'. $strFilter;
			$cacheKey = self::getCacheKey(implode(',', $arrCalendarIDs), $strRefType, $intRefID, $strCacheKeyAddition);
			$arrResults = self::getCachedObject($strRefType, $cacheKey);
		}
			
		//Only load if cached object is null
		if(!$arrResults)
		{
			$objCalendars = EasyGCalendarDatabaseHelper::getCalendars($arrCalendarIDs);
			foreach($objCalendars as $calendar) 
			{
				$id = $calendar->id;
				$strName = $calendar->name;
				$strAPIKey = $calendar->APIKey;
				$strIdentifier = $calendar->identifier;
				$strColor = $calendar->color;
				
				if(!empty($strAPIKey) && !empty($strIdentifier))
				{
					//Get Calendars from Google API
					EasyGCalendarGoogleAPIHelper::$googleAPIKey = $strAPIKey;
					EasyGCalendarGoogleAPIHelper::$googleCalendarId = $strIdentifier;
					EasyGCalendarGoogleAPIHelper::$googleCalendarMaxResults = $intMaxEvents;
					EasyGCalendarGoogleAPIHelper::$googleCalendarTimeZone = EasyGCalendarFormatHelper::getTimeZone()->getName();
					
					if($dtStartDate)
					{
						EasyGCalendarGoogleAPIHelper::$googleCalendarTimeMin = $dtStartDate->format('c');
					}
					else
					{
						EasyGCalendarGoogleAPIHelper::$googleCalendarTimeMin = date(DateTime::ATOM); //Only get Events starting TODAY (default value)
					}
					
					if($dtEndDate)
					{
						EasyGCalendarGoogleAPIHelper::$googleCalendarTimeMax = $dtEndDate->format('c');
					}
					
					if(!empty($strFilter))	//Filter calendar results by string
					{
						EasyGCalendarGoogleAPIHelper::$googleCalendarSearchFilter = $strFilter;
					}
					
					$objGoogleAPIItems = EasyGCalendarGoogleAPIHelper::getCalendarItems();
					$arrItems = array();
					if($objGoogleAPIItems)
					{
						/**
						array ('title' => 'value', 'start' => 'value', 'end' => 'value', 'description' => 'customvalue')
						**/
						foreach($objGoogleAPIItems as $item)
						{
							$isFreeBusyReader = (strcasecmp($item->calendarAccessRole, self::$calendarAccessRoleFreeBusy) == 0);
					
							if((!is_null($item->title) || $isFreeBusyReader ) && !is_null($item->startDate) && !is_null($item->endDate))
							{
								//Localize event item data
								$item = self::getLocalizedEventItem($item, $isFreeBusyReader, $strRefType);
								
								$arrResults[] = (object)array (   'color' => $strColor
																								, 'title' => (string)$item->title
																								, 'isFreeBusyReader' => $isFreeBusyReader
																								, 'start_date' => $item->startDate
																								, 'end_date' => $item->endDate
																								, 'all_day' => $item->all_day
																								, 'description' => $item->desc
																								, 'details_url' => self::getCalendarDataDetailsUrl($id, (string)$item->id, $strRefType, $intRefID));
							}
						}
					}
				}
			}
		}
		
		//Additionals settings if results are available
		if(is_array($arrResults) && count($arrResults) > 0)
		{
			//Store object in cache
			if(is_array($arrResults) && $isCachingEnabled)
			{
				self::setCachedObject($strRefType, $cacheKey, $cacheLifeTime, $arrResults);
			}
			
			//Sorting (asc or desc)
			if($sortOrder == 'asc')
			{
				usort($arrResults, function($a, $b)
				{
					return strtotime($a->start_date) > strtotime($b->start_date);
				});
			}
			else
			{
				usort($arrResults, function($a, $b)
				{
					return strtotime($a->start_date) < strtotime($b->start_date);
				});
			}
			
			//Append protecting against CSRF Attacks
			foreach ($arrResults as $key => $value)
			{
				$value->details_url .= self::getCalendarDataUrlFormToken();
			}
			
			//Limitation
			array_splice($arrResults, $intMaxEvents);
		}
		
		//DEBUG
		//print("<br>DEBUG: <pre>".print_r($arrResults, true)."</pre>");
		return $arrResults;
	}
	
	/**
	 * Method to get all selected Calendars
	 * @return array with prepared calendars
	**/
	public static function getEventData($calendarID, $eventID, $isCachingEnabled = true, $cacheKey = '', $cacheLifeTime = 0)
	{
		$objResult = null;
		//Double-Check Calendar
		$objCalendar = EasyGCalendarDatabaseHelper::getCalendar($calendarID);
		if($objCalendar != null)
		{
			$id = $objCalendar->id;
			$strName = $objCalendar->name;
			$strAPIKey = $objCalendar->APIKey;
			$strIdentifier = $objCalendar->identifier;
			
			if(!empty($strAPIKey) && !empty($strIdentifier) && !empty($eventID))
			{
				//Get Calendars from Google API
				EasyGCalendarGoogleAPIHelper::$googleAPIKey = $strAPIKey;
				EasyGCalendarGoogleAPIHelper::$googleCalendarId = $strIdentifier;
				EasyGCalendarGoogleAPIHelper::$googleEventId = $eventID;
				
				//TODO caching
				$objApiItem = EasyGCalendarGoogleAPIHelper::getEvent();
				
				if($objApiItem != null)
				{
					$objResult = (object)array (  'id' => $objApiItem->id
																			, 'calendarId' => $objCalendar->id
																			, 'title' => (string)$objApiItem->title
																			, 'start_date' => $objApiItem->startDate
																			, 'end_date' => $objApiItem->endDate
																			, 'all_day' => $objApiItem->all_day
																			, 'description' => $objApiItem->desc
																			, 'location' => $objApiItem->location
																			, 'creator' => $objApiItem->creator
																			, 'link' => $objApiItem->link
																			, 'timeZone' => $objApiItem->timeZone
																			, 'iCalUID' => $objApiItem->iCalUID
																			, 'attachments' => $objApiItem->attachments);
				}
			}
		}
		//print("<br>DEBUG: <pre>".print_r($objResult, true)."</pre>");
		return $objResult;
	}
	
	/**
	 * Method to localize event item data
	 * @return object
	**/
	private static function getLocalizedEventItem($item, $isFreeBusyReader, $strRefType)
	{
		$item->title 		= ( $isFreeBusyReader && empty($item->title) ) ? JText::_( 'COM_EASYGCALENDAR_EVENT_AVAILABILITY_INFORMATION_BUSY' ) : $item->title;
		$item->desc 		= ( $isFreeBusyReader && empty($item->desc) ) ? JText::_( 'COM_EASYGCALENDAR_EVENT_AVAILABILITY_INFORMATION_DEFAULT_DESCRIPTION' ) : $item->desc;
		return $item;
	}
	
	/**
	 * Method to generate a unique cache key
	 * @return string with unique cache key
	**/
	private static function getCacheKey($intID, $strRefType, $intRefID, $strAddition = '')
	{
		$strKey = $intID .'-'. $strRefType .'-'. $intRefID .'-'. $strAddition;
		return md5($strKey);
	}
	
	/**
	 * Method to get a cached object from the Joomla Cache
	 * @return object
	**/
	private static function getCachedObject($strRefType, $cacheKey)
	{
		$cache = null;
		$cachedItem = '';
		switch(strtolower($strRefType))
		{
			case 'com':
				$cache = JFactory::getCache(self::$extensionName, '');
			break;
			case 'mod_upcomming':
				$cache = JFactory::getCache(self::$moduleUpcomingName, '');
				break;
			case 'mod':
			default:
				$cache = JFactory::getCache(self::$moduleName, '');
			break;
		}
		
		if($cache)
		{
			$cache->setCaching(true);
			$cachedItem = $cache->get($cacheKey);
			//echo "DEBUG: Cache[".$cacheKey."] object get value: [".$cachedItem."]";
			//print_r($cachedItem);
			if (!empty($cachedItem))
			{
				$cachedItem = json_decode($cachedItem);
			}
		}
		else
		{
			$cache->clean();
		}
		return $cachedItem;
	}
	
	/**
	 * Method to store a cached object into the Joomla Cache
	 * @return void
	**/
	private static function setCachedObject($strRefType, $cacheKey, $cacheLifeTime, $cacheData)
	{
		$cache = null;
		switch(strtolower($strRefType))
		{
			case 'com':
				$cache = JFactory::getCache(self::$extensionName, '');
			break;
			case 'mod_upcomming':
				$cache = JFactory::getCache(self::$moduleUpcomingName, '');
				break;
			case 'mod':
			default:
				$cache = JFactory::getCache(self::$moduleName, '');
			break;
		}
		
		if($cache && $cacheData)
		{
			//echo "DEBUG: Store CacheData [".json_encode($cacheData)."]";
			$cache->setCaching(true);
			$cache->setLifeTime($cacheLifeTime);
			$cache->store(json_encode($cacheData), $cacheKey);
		}
	}
	
}
?>