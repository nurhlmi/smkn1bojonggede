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
// Anti Spoofing check (https://docs.joomla.org/How_to_add_CSRF_anti-spoofing_to_forms)
//JSession::checkToken( 'get' ) or die( 'Invalid security token' );

/**
 * HTML View class for the GCalendar Component - Event
 *
 */
class EasyGCalendarViewEvent extends JViewLegacy
{
	protected $params;
	protected $isModalWindow;
	protected $objEvent;
	
	/**
	 * Method to display the view.
	 * @return void
	**/
	function display($tpl = null)
	{
		// Assign data to the view from Model
		$this->isModalWindow = (JRequest::getVar('isModal') == 1) ? true : false;
		$this->params 			 = $this->get('Params');
		$this->objEvent			 = $this->get('Event');
		if ($this->objEvent == null)
		{
			JError::raiseWarning(403, JText::_('COM_EASYGCALENDAR_EVENT_ERROR_EVENT_NOT_FOUND'));
			return false;
		}

		parent::display($tpl);
	}
}
?>
