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

<?php foreach($this->items as $i => $item){?>
	<tr class="row<?php echo $i % 2; ?>">
		<td><?php echo $item->id; ?></td>
		<td><?php echo JHtml::_('grid.id', $i, $item->id); ?></td>
		<td>
			<a class="hasTooltip" href="<?php echo JRoute::_('index.php?option=com_easygcalendar&task=calendar.edit&id=' . $item->id); ?>" title="<?php echo JText::_('JACTION_EDIT'); ?>">
				<?php echo $this->escape($item->name); ?>
			</a>
		</td>
		<td width="10px"><div style="background-color: <?php echo $item->color;?>;width: 10px;height: 10px;"></div></td>
		<td><?php echo $item->identifier; ?></td>
		<td><?php echo $item->APIKey; ?></td>
	</tr>
<?php } ?>