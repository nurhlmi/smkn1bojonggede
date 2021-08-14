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

/**
 * EasyGCalendar Component Controller
 */
class EasyGCalendarController extends JControllerLegacy
{
	/**
	* Method to display the view.
	* @return void
	**/
	public function display($cachable = false, $urlparams = false)
	{
		$view   = JRequest::setVar('view', JRequest::getCmd('view', 'cpanel'));
		$layout = $this->input->get('layout', 'default');

		// Load the submenu.
		JSubMenuHelper::addEntry(JText::_('COM_EASYGCALENDAR_SUBMENU_CPANEL'), 'index.php?option=com_easygcalendar&view=cpanel', $view == 'cpanel');
		JSubMenuHelper::addEntry(JText::_('COM_EASYGCALENDAR_SUBMENU_CALENDARS'), 'index.php?option=com_easygcalendar&view=calendars', $view == 'calendars');
		JSubMenuHelper::addEntry(JText::_('COM_EASYGCALENDAR_SUBMENU_SUPPORT'), 'index.php?option=com_easygcalendar&view=support', $view == 'support');
		parent::display();
	}
}
?>