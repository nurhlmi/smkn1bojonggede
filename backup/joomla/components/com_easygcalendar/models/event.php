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

require_once(JPATH_ADMINISTRATOR . '/components/com_easygcalendar/helpers/utilsBase.php');
JLoader::register('EasyGCalendarHelper', JPATH_ADMINISTRATOR . '/components/com_easygcalendar/helpers/utils.php');
JLoader::register('EasyGCalendarGoogleAPIHelper', JPATH_ADMINISTRATOR . '/components/com_easygcalendar/helpers/googleAPI.php');

class EasyGCalendarModelEvent extends JModelItem
{
	/** @var object parameters item */
	protected $params;
	/** @var object event item */
	protected $event;
	/** @var string reference type (com | mod | mod_upcomming) */
	protected $refType;
	/** @var int reference ID */
	protected $refID;
	
	/** Method to auto-populate the model state. 
	*   This method should only be called once per instantiation and is designed
	*   to be called on the first call to the getState() method unless the model
	*   configuration flag to ignore the request is set.
	*   Note. Calling getState in this method will result in recursion.
	*   @return void 
	*   @since	2.5 */
	protected function populateState()
	{
		// Load the parameters.
		$params = JFactory::getApplication()->getParams();
		
		//Check for Menu Item parameters (component only)
		if(is_numeric($this->refID) && $this->refID > 0)
		{
			switch(strtolower($this->refType))
			{
				case 'com': //Component
					$tmpMenuItem = JFactory::getApplication()->getMenu()->getItem($this->refID);
					if($tmpMenuItem)
					{
						// Merge global params with item params
						$tmpParams = clone $tmpMenuItem->params;
						$params->merge($tmpParams);
					}
				break;
				
				//for modules
				case 'mod_upcomming':
				case 'mod':
					$moduleParams = EasyGCalendarHelper::getModuleParameterByID($this->refID);
					if($moduleParams)
					{
						// Merge global params with item params
						$tmpParams = clone $moduleParams;
						$params->merge($tmpParams);
					}
				break;
			}
		}
		
		$this->setState('params', $params);
		parent::populateState();
	}
	
	/** Get the parameters of the component (merged)
	 * @return object with the available parameters of the component.  */
	public function getParams()
	{
		$this->refType 			= JRequest::getVar('refType');
		$this->refID 				= JRequest::getVar('refID');
		
		if($this->params == null)
		{
			$this->params = $this->getState('params');
		}
		return $this->params;
	}
		
	/** Get the selected event
	 * @return object  */
	public function getEvent()
	{
		if($this->event == null)
		{
			// Load the Event-Data.
			$calendarID = JRequest::getVar('calendarId');
			$eventID = JRequest::getVar('eventId');
			//echo "<br/>DUBUG: Calendar->".$calendarID." Event->".$eventID;
			
			$this->event = EasyGCalendarHelper::getEventData($calendarID, $eventID);
			if($this->event == null) 
			{
				JError::raiseWarning(403, JText::_('COM_EASYGCALENDAR_EVENT_ERROR_EVENT_NOT_FOUND'));
				return null;
				
			}
			
			$this->setState('event', $this->event );
		}
		
		return $this->event;
	}
}
?>