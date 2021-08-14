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

class EasyGCalendarControllerCalendars extends JControllerAdmin
{
		/**
	 * Proxy for getModel.
	 *
	 * @param   string  $name    The model name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  The array of possible config values. Optional.
	 *
	 * @return  JModel
	 */
	public function getModel($name = 'Calendar', $prefix = 'EasyGCalendarModel') 
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}
?>