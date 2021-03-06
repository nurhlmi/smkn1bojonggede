<?php
/**
 * Joomla! Content Management System
 *
 * @copyright  Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\CMS\Cache\Exception;

defined('JPATH_PLATFORM') or die;

/**
 * Exception class defining an error connecting to the cache storage engine
 *
 * @since  3.6.3
 */
class CacheConnectingException extends \RuntimeException implements CacheExceptionInterface
{
}
