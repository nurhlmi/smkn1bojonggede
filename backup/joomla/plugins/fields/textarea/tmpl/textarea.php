<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Fields.Textarea
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

$value = $field->value;

if ($value == '')
{
	return;
}

echo JHtml::_('content.prepare', $value);
