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

if (!JFactory::getUser()->authorise('core.manage', 'com_easygcalendar'))
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

JLoader::register('EasyGCalendarHelper', JPATH_ADMINISTRATOR . '/components/com_easygcalendar/helpers/utils.php');

$path = JPATH_ADMINISTRATOR . '/components/com_easygcalendar/easygcalendar.xml';
if(file_exists($path))
{
	$manifest = simplexml_load_file($path);
	JRequest::setVar('COM_EASYGCALENDAR_VERSION', $manifest->version);
}

//PHP Version check
if (version_compare(PHP_VERSION, '5.3.0') < 0)
{
	JError::raiseWarning(0, 'You have PHP version ' . PHP_VERSION . ' installed. Please upgrade your PHP version to at least 5.3.x+. EasyGCalendar can not run with this version.');
	return;
}

// Get an instance of the controller prefixed by EasyGCalendar
$controller = JControllerLegacy::getInstance('EasyGCalendar');
$controller->execute(JFactory::getApplication()->input->get('task'));
// Redirect if set by the controller
$controller->redirect();
?>