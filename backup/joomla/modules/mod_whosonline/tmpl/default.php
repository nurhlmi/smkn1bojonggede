<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_whosonline
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<?php if ($showmode == 0 || $showmode == 2) : ?>
	<?php $guest = JText::plural('MOD_WHOSONLINE_GUESTS', $count['guest']); ?>
	<?php $member = JText::plural('MOD_WHOSONLINE_MEMBERS', $count['user']); ?>
	<p><?php echo JText::sprintf('MOD_WHOSONLINE_WE_HAVE', $guest, $member); ?></p>
<?php endif; ?>

<?php if (($showmode > 0) && count($names)) : ?>
	<?php if ($params->get('filter_groups', 0)) : ?>
		<p><?php echo JText::_('MOD_WHOSONLINE_SAME_GROUP_MESSAGE'); ?></p>
	<?php endif; ?>
	<ul class="whosonline<?php echo $moduleclass_sfx; ?>">
	<?php foreach ($names as $name) : ?>
		<li>
			<?php echo $name->username; ?>
		</li>
	<?php endforeach; ?>
	</ul>
<?php endif;
