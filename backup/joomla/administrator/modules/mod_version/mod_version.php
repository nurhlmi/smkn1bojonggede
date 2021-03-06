<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  mod_version
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JLoader::register('ModVersionHelper', __DIR__ . '/helper.php');

$version = ModVersionHelper::getVersion($params);

require JModuleHelper::getLayoutPath('mod_version', $params->get('layout', 'default'));
