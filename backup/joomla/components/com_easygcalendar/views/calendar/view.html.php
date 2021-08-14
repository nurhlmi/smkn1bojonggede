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
 * HTML View class for the GCalendar Component - Calendar
 *
 */
class EasyGCalendarViewCalendar extends JViewLegacy
{
	protected $params;
	
	/**
	 * Method to display the view.
	 * @return void
	**/
	function display($tpl = null)
	{
		// Assign data to the view from Model
		$this->params = $this->get('Params');
		return parent::display($tpl);
	}
}
?>
