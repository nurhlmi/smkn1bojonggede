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
 * Raw View class for the GCalendar Component - Event - iCal Download
 */
class EasyGCalendarViewEvent extends JViewLegacy
{
	protected $params;
	protected $objEvent;
	
	/**
	 * Method to display the view.
	 * @return void
	**/
	function display($tpl = null)
	{
		// Assign data to the view from Model
		$this->params 			 = $this->get('Params');
		$this->objEvent			 = $this->get('Event');
		
		if ($this->objEvent != null && EasyGCalendarHelperBase::isProVersion('getICalDownload', true))
		{
			$fileName = $this->objEvent->title .'_'. $this->objEvent->start_date;
			$content = EasyGCalendarHelperPro::getICalDownload($this->objEvent);
			header('Content-Type: text/calendar; charset=utf-8');
			header('Content-Disposition: attachment; filename="' . $fileName . '.ics"');
			echo $content;
		}
	}
}
?>
