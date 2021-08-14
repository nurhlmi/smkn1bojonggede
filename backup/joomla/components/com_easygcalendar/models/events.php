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
JLoader::register('EasyGCalendarFormatHelper', JPATH_ADMINISTRATOR . '/components/com_easygcalendar/helpers/format.php');

class EasyGCalendarModelEvents extends JModelItem
{
	/** @var object parameters item */
	protected $params;
	/** @var int[] of calendar IDs */
	protected $calendarIDs;
	/** @var object calendar items */
	protected $items;
	/** @var string reference type (com | mod ) */
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
				
				case 'mod': //Modules
					$moduleParams = EasyGCalendarHelper::getModuleParameterByID($this->refID);
					if($moduleParams)
					{
						// Merge global params with item params
						$tmpParams = clone $moduleParams;
						$params->merge($tmpParams);
					}
				break;
			}
			//echo "<br>DEBUG:Merged Params[event_show_url]->[".$params->get('event_show_url')."]";
		}
		
		$this->setState('params', $params);
		parent::populateState();
	}
	
	/** Get the parameters of the component (merged)
	 * @return object with the available parameters of the component.  */
	public function getParams()
	{
		$this->calendarIDs 	= JRequest::getVar('ids');
		$this->refType 			= JRequest::getVar('refType');
		$this->refID 				= JRequest::getVar('refID');
		
		if($this->params == null)
		{
			$this->params = $this->getState('params');
		}
		return $this->params;
	}
		
	/** Get a list of calendar items
	 * @return object  */
	public function getItems()
	{
		if($this->items == null)
		{
			//validate required params
			if(($this->refType != 'com' || $this->refType != 'mod') && $this->refID <= 0)
			{
				return;
			}
			
			// Load the Event-Data.
			$startDate 	= EasyGCalendarFormatHelper::getDate(JRequest::getVar('start'), false);
			$endDate 		= EasyGCalendarFormatHelper::getDate(JRequest::getVar('end'), false);
			//echo "<br/>DUBUG: StartDate->".$startDate." EndDate->".$endDate;
			
			if($this->params == null)
			{	
				$this->getParams();
			}
			
			//Fallback use all selected calendar ids as default
			if($this->calendarIDs == null)
			{
				$this->calendarIDs =  $this->params->get('calendarids');
			}
			
			//Caching
			$paramCacheType 						=  $this->params->get('cache_type', 0);
			$paramCacheTimeInMinutes		= ((int) $this->params->get( 'cache_time', JFactory::getApplication()->get( 'cachetime' )) * 60); //The cachetime in minutes
			$isCachingEnabled = (($paramCacheType == 1 && JFactory::getApplication()->get( 'caching' )) || $paramCacheType == 2);
			$this->items = EasyGCalendarHelper::getCalendarData($this->calendarIDs, $startDate, $endDate, $this->refType, $this->refID, $isCachingEnabled, $paramCacheTimeInMinutes);
			
			$this->setState('items', $this->items );
		}
		
		return $this->items;
	}
}
?>