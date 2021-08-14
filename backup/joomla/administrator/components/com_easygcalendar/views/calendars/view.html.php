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

JLoader::register('EasyGCalendarHelper', JPATH_ADMINISTRATOR . '/components/com_easygcalendar/helpers/utils.php');

class EasyGCalendarViewCalendars extends JViewLegacy
{
	protected $items;
	protected $pagination;
	protected $state;
	
	/**
	 * Method to display the view.
	 * @return void
	 **/
	function display($tpl = null)
	{
		$this->items         = $this->get('Items');
		$this->pagination    = $this->get('Pagination');
		$this->state         = $this->get('State');
		$this->canDo	= JHelperContent::getActions(EasyGCalendarHelperBase::$extensionName, 'calendar', $this->state->get('filter.id'));
		
		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}
		
		$this->addToolbar();
		parent::display($tpl);
	}
	
	/**
	 * Add the page title and toolbar.
	 *
	 * @return  void
	*/
	protected function addToolbar()
	{
		// Built the actions for new and existing records.
		$canDo		= $this->canDo;
		
		JToolBarHelper::title(JText::_('COM_EASYGCALENDAR_MANAGER_CALENDAR'), 'calendar');
		
		if ($canDo->get('core.create'))
		{
			JToolBarHelper::addNew('calendar.add', 'JTOOLBAR_NEW');
		}
		if ($canDo->get('core.edit'))
		{
			JToolBarHelper::editList('calendar.edit');
		}
		if ($canDo->get('core.delete'))
		{
			JToolBarHelper::deleteList('', 'calendars.delete', 'JTOOLBAR_DELETE');
		}
		if ($canDo->get('core.admin'))
		{
			JToolBarHelper::preferences(EasyGCalendarHelperBase::$extensionName, 550);
			JToolBarHelper::divider();
		}
	}
}
?>