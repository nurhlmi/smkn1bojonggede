<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

$id      = empty($displayData['id']) ? '' : (' id="' . $displayData['id'] . '"');
$target  = empty($displayData['target']) ? '' : (' target="' . $displayData['target'] . '"');
$onclick = empty($displayData['onclick']) ? '' : (' onclick="' . $displayData['onclick'] . '"');
$title   = empty($displayData['title']) ? '' : (' title="' . $this->escape($displayData['title']) . '"');
$text    = empty($displayData['text']) ? '' : ('<span>' . $displayData['text'] . '</span>')

?>
<div class="row-fluid"<?php echo $id; ?>>
	<div class="span12">
		<a href="<?php echo $displayData['link']; ?>"<?php echo $target . $onclick . $title; ?>>
			<span class="icon-<?php echo $displayData['image']; ?>" aria-hidden="true"></span> <?php echo $text; ?>
		</a>
	</div>
</div>
