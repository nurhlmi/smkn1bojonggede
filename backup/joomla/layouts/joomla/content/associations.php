<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

$items = $displayData;

if (!empty($items)) : ?>
	<ul class="item-associations">
		<?php foreach ($items as $id => $item) : ?>
			<li>
				<?php echo is_array($item) ? $item['link'] : $item->link; ?>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>
