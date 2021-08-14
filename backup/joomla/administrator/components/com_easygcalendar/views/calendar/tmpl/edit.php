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

JHtml::_('behavior.formvalidator');
JHtml::_('behavior.keepalive');

$app = JFactory::getApplication();
$input = $app->input;

?>
<form action="<?php echo JRoute::_('index.php?option='.EasyGCalendarHelperBase::$extensionName.'&layout=edit&id='.(int) $this->item->id); ?>" method="POST" name="adminForm" id="adminForm" class="form-validate">
	
	<div class="form-horizontal">
		<?php echo $this->form->renderFieldset('details'); ?>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="return" value="<?php echo $input->getCmd('return'); ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>

<div align="center" style="clear: both">
	<?php echo sprintf(JText::_('COM_EASYGCALENDAR_FOOTER'), JRequest::getVar('COM_EASYGCALENDAR_VERSION'));?>
</div>