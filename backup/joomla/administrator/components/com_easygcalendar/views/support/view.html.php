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


class EasyGCalendarViewSupport extends JViewLegacy
{
	/**
	 * Method to display the view.
	 * @return void
	 **/
	function display($tpl = null)
	{
		JToolBarHelper::title(JText::_('COM_EASYGCALENDAR_MANAGER_CALENDAR'), 'calendar');

		parent::display($tpl);
	}
}
?>