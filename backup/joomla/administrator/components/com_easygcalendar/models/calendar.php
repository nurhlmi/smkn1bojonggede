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

/**
 * Item Model for an Calendar.
 */
class EasyGCalendarModelCalendar extends JModelAdmin
{
	/**
	 * Returns a Table object, always creating it.
	 *
	 * @param   string  $type    The table type to instantiate
	 * @param   string  $prefix  A prefix for the table class name. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  JTable    A database object
	 */
	public function getTable($type = 'Calendar', $prefix = 'EasyGCalendarTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	
	/**
	* Method to get the record form.
	*
	* @param   array    $data      Data for the form.
	* @param   boolean  $loadData  True if the form is to load its own data (default case), false if not.
	*
	* @return  mixed  A JForm object on success, false on failure
	*/
	public function getForm($data = array(), $loadData = true) 
	{
		// Get the form.
		$form = $this->loadForm(EasyGCalendarHelperBase::$extensionName.'.calendar', 'calendar', array('control' => 'jform', 'load_data' => $loadData));

		if (empty($form)) 
		{
			return false;
		}
		return $form;
	}
	
	/**
	* Method to get the data that should be injected in the form.
	*
	* @return  mixed  The data for the form.
	*/
	protected function loadFormData() 
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState(EasyGCalendarHelperBase::$extensionName.'.edit.calendar.data', array());
		
		if (empty($data)) 
		{
			$data = $this->getItem();
		}
		return $data;
	}
}
?>
