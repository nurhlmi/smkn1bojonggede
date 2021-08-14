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

JHtml::_('behavior.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');

?>
<form action="<?php echo JRoute::_('index.php?option='.EasyGCalendarHelperBase::$extensionName); ?>" method="POST" id="adminForm" name="adminForm">
	<table class="table table-striped" id="calendarList">
		<thead>
			<tr>
				<th width="5"><?php echo JText::_( 'COM_EASYGCALENDAR_FIELD_NAME_ID_LABEL' ); ?></th>
				<th width="20"><input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->items ); ?>);" /></th>
				<th><?php echo JText::_( 'COM_EASYGCALENDAR_FIELD_NAME_LABEL' ); ?></th>
				<th><?php echo JText::_( 'COM_EASYGCALENDAR_FIELD_COLOR_LABEL' ); ?></th>
				<th><?php echo JText::_( 'COM_EASYGCALENDAR_FIELD_CALENDAR_ID_LABEL' ); ?></th>
				<th><?php echo JText::_( 'COM_EASYGCALENDAR_FIELD_APIKEY_LABEL' ); ?></th>
			</tr>
		</thead>
		<tbody><?php echo $this->loadTemplate('body');?></tbody>
		<tfoot>
			<tr>
				<td colspan="6">
					<?php echo $this->pagination->getListFooter(); ?>
					<br/><br/>
					<div align="center" style="clear: both">
						<?php echo sprintf(JText::_('COM_EASYGCALENDAR_FOOTER'), JRequest::getVar('COM_EASYGCALENDAR_VERSION'));?>
					</div>
				</td>
			</tr>
		</tfoot>
	</table>
	<div>
		<input type="hidden" name="option" value="com_easygcalendar" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
	