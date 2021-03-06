<?php
/**
 * Joomla! Content Management System
 *
 * @copyright  Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\CMS\Cache\Storage;

defined('JPATH_PLATFORM') or die;

use Joomla\CMS\Cache\CacheStorage;

/**
 * XCache cache storage handler
 *
 * @link        https://xcache.lighttpd.net/
 * @since       1.7.0
 * @deprecated  4.0  The XCache PHP extension is not compatible with PHP 7
 */
class XcacheStorage extends CacheStorage
{
	/**
	 * Check if the cache contains data stored by ID and group
	 *
	 * @param   string  $id     The cache data ID
	 * @param   string  $group  The cache data group
	 *
	 * @return  boolean
	 *
	 * @since   3.7.0
	 */
	public function contains($id, $group)
	{
		return xcache_isset($this->_getCacheId($id, $group));
	}

	/**
	 * Get cached data by ID and group
	 *
	 * @param   string   $id         The cache data ID
	 * @param   string   $group      The cache data group
	 * @param   boolean  $checkTime  True to verify cache time expiration threshold
	 *
	 * @return  mixed  Boolean false on failure or a cached data object
	 *
	 * @since   1.7.0
	 */
	public function get($id, $group, $checkTime = true)
	{
		// Make sure XCache is configured properly
		if (static::isSupported() == false)
		{
			return false;
		}

		$cache_id = $this->_getCacheId($id, $group);
		$cache_content = xcache_get($cache_id);

		if ($cache_content === null)
		{
			return false;
		}

		return $cache_content;
	}

	/**
	 * Get all cached data
	 *
	 * @return  mixed  Boolean false on failure or a cached data object
	 *
	 * @since   1.7.0
	 * @note    This requires the php.ini setting xcache.admin.enable_auth = Off.
	 */
	public function getAll()
	{
		// Make sure XCache is configured properly
		if (static::isSupported() == false)
		{
			return array();
		}

		$allinfo = xcache_list(XC_TYPE_VAR, 0);
		$keys    = $allinfo['cache_list'];
		$secret  = $this->_hash;

		$data = array();

		foreach ($keys as $key)
		{
			$namearr = explode('-', $key['name']);

			if ($namearr !== false && $namearr[0] == $secret && $namearr[1] == 'cache')
			{
				$group = $namearr[2];

				if (!isset($data[$group]))
				{
					$item = new CacheStorageHelper($group);
				}
				else
				{
					$item = $data[$group];
				}

				$item->updateSize($key['size']);

				$data[$group] = $item;
			}
		}

		return $data;
	}

	/**
	 * Store the data to cache by ID and group
	 *
	 * @param   string  $id     The cache data ID
	 * @param   string  $group  The cache data group
	 * @param   string  $data   The data to store in cache
	 *
	 * @return  boolean
	 *
	 * @since   1.7.0
	 */
	public function store($id, $group, $data)
	{
		// Make sure XCache is configured properly
		if (static::isSupported() == false)
		{
			return false;
		}

		return xcache_set($this->_getCacheId($id, $group), $data, $this->_lifetime);
	}

	/**
	 * Remove a cached data entry by ID and group
	 *
	 * @param   string  $id     The cache data ID
	 * @param   string  $group  The cache data group
	 *
	 * @return  boolean
	 *
	 * @since   1.7.0
	 */
	public function remove($id, $group)
	{
		// Make sure XCache is configured properly
		if (static::isSupported() == false)
		{
			return false;
		}

		$cache_id = $this->_getCacheId($id, $group);

		if (!xcache_isset($cache_id))
		{
			return true;
		}

		return xcache_unset($cache_id);
	}

	/**
	 * Clean cache for a group given a mode.
	 *
	 * group mode    : cleans all cache in the group
	 * notgroup mode : cleans all cache not in the group
	 *
	 * @param   string  $group  The cache data group
	 * @param   string  $mode   The mode for cleaning cache [group|notgroup]
	 *
	 * @return  boolean
	 *
	 * @since   1.7.0
	 */
	public function clean($group, $mode = null)
	{
		// Make sure XCache is configured properly
		if (static::isSupported() == false)
		{
			return true;
		}

		$allinfo = xcache_list(XC_TYPE_VAR, 0);
		$keys    = $allinfo['cache_list'];
		$secret  = $this->_hash;

		foreach ($keys as $key)
		{
			if (strpos($key['name'], $secret . '-cache-' . $group . '-') === 0 xor $mode != 'group')
			{
				xcache_unset($key['name']);
			}
		}

		return true;
	}

	/**
	 * Test to see if the storage handler is available.
	 *
	 * @return  boolean
	 *
	 * @since   3.0.0
	 */
	public static function isSupported()
	{
		if (extension_loaded('xcache'))
		{
			// XCache Admin must be disabled for Joomla to use XCache
			$xcache_admin_enable_auth = ini_get('xcache.admin.enable_auth');

			// Some extensions ini variables are reported as strings
			if ($xcache_admin_enable_auth == 'Off')
			{
				return true;
			}

			// We require a string with contents 0, not a null value because it is not set since that then defaults to On/True
			if ($xcache_admin_enable_auth === '0')
			{
				return true;
			}

			// In some enviorments empty is equivalent to Off; See JC: #34044 && Github: #4083
			if ($xcache_admin_enable_auth === '')
			{
				return true;
			}
		}

		// If the settings are not correct, give up
		return false;
	}
}
