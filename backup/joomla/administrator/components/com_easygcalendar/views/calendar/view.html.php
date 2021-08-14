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

class EasyGCalendarViewCalendar extends JViewLegacy
{
	protected $form;
	protected $item;
	protected $state;
	
	/**
	 * Execute and display a template script.
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 * @return  mixed  A string if successful, otherwise a Error object.
	*/
	function display($tpl = null)
	{
		$this->form		= $this->get('Form');
		$this->item		= $this->get('Item');
		$this->state	= $this->get('State');
		$this->canDo	= JHelperContent::getActions(EasyGCalendarHelperBase::$extensionName, 'calendar', $this->item->id);
		
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
		JFactory::getApplication()->input->set('hidemainmenu', true);
		$isNew		= ($this->item->id == 0);
		
		// Built the actions for new and existing records.
		$canDo		= $this->canDo;
		
		JToolBarHelper::title(JText::_('COM_EASYGCALENDAR_MANAGER_CALENDAR'), 'calendar');
		
		// For new records, check the create permission.
		if ($isNew && $canDo->get('core.create'))
		{
			JToolbarHelper::apply('calendar.apply');
			JToolbarHelper::save('calendar.save');
			JToolbarHelper::save2new('calendar.save2new');
			JToolbarHelper::cancel('calendar.cancel');
		}
		else
		{
			if ($canDo->get('core.edit'))
			{
				JToolbarHelper::apply('calendar.apply');
				JToolbarHelper::save('calendar.save');

				// We can save this record, but check the create permission to see if we can return to make a new one.
				if ($canDo->get('core.create'))
				{
					JToolbarHelper::save2new('calendar.save2new');
				}
			}
			
			// If checked out, we can still save
			if ($canDo->get('core.create'))
			{
				JToolbarHelper::save2copy('calendar.save2copy');
			}
			JToolbarHelper::cancel('calendar.cancel', 'JTOOLBAR_CLOSE');
		}
		
	}
}
?>