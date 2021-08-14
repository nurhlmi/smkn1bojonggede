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
?>

<div id="j-main-container" class="span10">
	<h2><?php echo JText::_('COM_EASYGCALENDAR_VIEW_CPANEL_WELCOME'); ?></h2>
	<p><?php echo JText::_('COM_EASYGCALENDAR_VIEW_CPANEL_INTRO'); ?></p>
	<br>

	<div id="cpanel" style="float:left">
			<div>
				<div>
				    <a href="index.php?option=com_easygcalendar&view=calendars" >
				    <img src="<?php echo JURI::base(true);?>/../media/com_easygcalendar/images/admin/crossroads-icon48.png">
				    <span><?php echo JText::_('COM_EASYGCALENDAR_VIEW_CPANEL_CALENDARS'); ?></span>
				    </a>
				</div>
				 <br/>
				<div>
				    <a href="index.php?option=com_easygcalendar&view=calendar&layout=edit" >
				    <img src="<?php echo JURI::base(true);?>/../media/com_easygcalendar/images/admin/magic-wand-icon48.png">
				    <span><?php echo JText::_('COM_EASYGCALENDAR_VIEW_CPANEL_ADD'); ?></span>
				    </a>
				</div>
				 <br/>
				<div>
				    <a href="index.php?option=com_easygcalendar&view=support" >
				    <img src="<?php echo JURI::base(true);?>/../media/com_easygcalendar/images/admin/support-icon48.png">
				    <span><?php echo JText::_('COM_EASYGCALENDAR_SUBMENU_SUPPORT'); ?></span>
				    </a>
				</div>
			</div>
	</div>
</div>

<div align="center" style="clear: both">
	<br><?php echo sprintf(JText::_('COM_EASYGCALENDAR_FOOTER'), JRequest::getVar('COM_EASYGCALENDAR_VERSION'));?>
</div>