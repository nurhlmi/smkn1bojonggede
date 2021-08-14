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


require_once(JPATH_ADMINISTRATOR . '/components/com_easygcalendar/libraries/google-api-php-client/vendor/autoload.php');

/**
 * EasyGCalendar GoogleAPI helper.
 */
class EasyGCalendarGoogleAPIHelper
{
	public static $googleAPIKey = '';
	public static $googleCalendarId = '';
	public static $googleEventId = '';
	public static $googleCalendarTimeMin = '';
	public static $googleCalendarTimeMax = '';
	public static $googleCalendarMaxResults = 1000; //MAX: 2500 events allowed by API
	public static $googleCalendarTimeZone = '';
	public static $googleCalendarSearchFilter = '';
	
	/**
	 * Method to get a event list from Google API
	 * @return Array of objects with events data
	**/
	public static function getCalendarItems()
	{
		$client = new Google_Client();
		$client->setApplicationName("My Calendar");
		$client->setDeveloperKey(self::$googleAPIKey);
		$cal = new Google_Service_Calendar($client);
		
		//CALENDAR ID
		$calendarId = self::$googleCalendarId;

		//Prepare Settings (Basic)
		$params = array(
			'singleEvents' => true,
			'orderBy' => 'startTime',
			'maxResults' => self::$googleCalendarMaxResults, //MAX: 2500 events
			'timeZone' => self::$googleCalendarTimeZone //string timeZone Time zone used in the response. Optional. The default is the time zone of the calendar.
		);
		
		//Prepare Settings (Advanced)
		if(!empty(self::$googleCalendarTimeMin))
		{
			$params['timeMin'] = self::$googleCalendarTimeMin;
		}
		
		if(!empty(self::$googleCalendarTimeMax))
		{
			$params['timeMax'] = self::$googleCalendarTimeMax;
		}
		
		if(!empty(self::$googleCalendarSearchFilter))
		{
			$params['singleEvents'] = true; /**(true/false) Whether to expand recurring events into instances and only return single one-off events and instances of recurring events, 
																			but not the underlying recurring events themselves. Optional. The default is False. **/
			$params['q'] = rawurlencode(self::$googleCalendarSearchFilter);
		}
		
		//Returns events on the specified calendar. (events.listEvents)
		$events = $cal->events->listEvents($calendarId, $params);
		$calTimeZone = $events->timeZone; //GET THE TZ OF THE CALENDAR
		
		//SET THE DEFAULT TIMEZONE SO PHP DOESN'T COMPLAIN. SET TO YOUR LOCAL TIME ZONE.
		date_default_timezone_set($calTimeZone);
		
		$arrEventResults = array();
		
		//Check class instance
		if ($events instanceof Google_Service_Calendar_Events)
		{
			$calendarAccessRole = $events->getAccessRole(); //Calendar accessRole e.g. freeBusyReader
			//loop
			foreach ($events->getItems() as $event) 
			{
				//Check class instance
				if ($event instanceof Google_Service_Calendar_Event)
				{
					$start_timezone = $event->getStart()->timeZone;
					//Overwrite the calendar TZ if the event has a special TZ
					if (!empty($start_timezone)) 
					{
						$start_timezone = new DateTimeZone($start_timezone); //Get the event item TZ
					}
					else
					{
						//Set your default timezone in case your events don't have one
						$start_timezone = new DateTimeZone($calTimeZone);
					}

					$isAllDayEvent = false;
					//Check if this is an all day event
					if(is_null($event->start->getDateTime()))
					{
						$googleStartDate = $event->start->getDate();
						$googleEndDate = $event->end->getDate();
						$isAllDayEvent = true;
					}
					else
					{
						$googleStartDate = $event->start->getDateTime();
						$googleEndDate = $event->end->getDateTime();
					}
					
					$arrEventResults[] = (object)array( 
																		 'id' => $event->id,
																		 'calendarAccessRole' => $calendarAccessRole,
																		 'etag' => $event->etag,
																		 'status' => $event->status,
																		 'startDate' => $googleStartDate,
																		 'endDate' => $googleEndDate,
																		 'all_day' => $isAllDayEvent,
																		 'title' => $event->summary,
																		 'desc' => $event->description,
																		 'kind' => $event->kind,
																		 'location' => $event->location,
																		 'creator' => $event->creator,
																		 'link' => $event->htmlLink,
																		 'timeZone' => $start_timezone,
																		 'iCalUID' => $event->iCalUID,
																		 'sequence' => $event->sequence,
																		 'attachments' => $event->attachments);
					
				}
			}
		}
		
		//Debug output
		//echo "<br>Calendar AccessRole: ".$calendarAccessRole;
		//echo "<br>Start:".self::$googleCalendarTimeMin;
		//echo "<br>End:".self::$googleCalendarTimeMax;
		//echo "<br>NumResults:".count($arrEventResults);
		//echo "<br>Filter:".self::$googleCalendarSearchFilter;
		//print("<pre>".print_r($arrEventResults, true)."</pre>");
		return $arrEventResults;
	}
	
	/**
	 * Method to get a single event from Google API
	 * @return object with event data
	**/
	public static function getEvent()
	{
		$client = new Google_Client();
		$client->setApplicationName("My Calendar");
		$client->setDeveloperKey(self::$googleAPIKey);
		$cal = new Google_Service_Calendar($client);
		
		//CALENDAR ID
		$calendarId = self::$googleCalendarId;
		$eventId = self::$googleEventId;
		//Prepare Settings (Basic)
		$params = array();
		
		$objEventResult = null;
		
		if(!empty($calendarId) && !empty($eventId))
		{
			//Returns events on the specified calendar. (events.get)
			$event = $cal->events->get($calendarId, $eventId, $params);
			
			if($event instanceof Google_Service_Calendar_Event)
			{
				//Double-Check for all Day events
				$isAllDayEvent = true;
				$tmpStartDate = $event->start->getDate();
				$start_timezone = $event->getStart()->timeZone;
				
				$tmpEndDate = $event->end->getDate();
				if(empty($tmpStartDate) && empty($tmpEndDate))
				{
					$tmpStartDate = $event->start->getDateTime();
					$tmpEndDate = $event->end->getDateTime();
					$isAllDayEvent = false;
					
				}
				
				$objEventResult = (object)array( 
																 'id' => $event->id,
																 'etag' => $event->etag,
																 'status' => $event->status,
																 'startDate' => $tmpStartDate,
																 'endDate' => $tmpEndDate,
																 'all_day' => $isAllDayEvent,
																 'title' => $event->summary,
																 'desc' => $event->description,
																 'kind' => $event->kind,
																 'location' => $event->location,
																 'creator' => $event->creator,
																 'link' => $event->htmlLink,
																 'sequence' => $event->sequence,
																 'timeZone' => $start_timezone,
																 'iCalUID' => $event->iCalUID,
																 'attachments' => $event->attachments);
			}
		}
		
		return $objEventResult;
	}

}
?>