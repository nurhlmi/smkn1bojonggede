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

class EasyGCalendarViewCPanel extends JViewLegacy
{
	protected $state;
	
	/**
	 * Method to display the view.
	 * @return void
	 **/
	function display($tpl = null)
	{
		$this->state         = $this->get('State');
		$this->canDo	= JHelperContent::getActions(EasyGCalendarHelperBase::$extensionName, 'calendar');

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
		
		JToolBarHelper::title(JText::_('COM_EASYGCALENDAR'), 'calendar');
		
		if ($canDo->get('core.admin'))
		{
			JToolBarHelper::preferences(EasyGCalendarHelperBase::$extensionName, 550);
			JToolBarHelper::divider();
		}
	}
}
?>