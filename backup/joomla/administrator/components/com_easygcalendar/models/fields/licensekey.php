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

jimport('joomla.form.formfield');
#jimport('joomla.form.helper');
JFormHelper::loadFieldClass('text');

// The class name must always be the same as the filename (in camel case)
class JFormFieldLicensekey extends JFormFieldText 
{
		//The field class must know its own type through the variable $type.
		protected $type = 'Licensekey';

		public function getInput()
		{
			if ($this->value)
			{
					$extra_query = "'{$this->element['key']}={$this->value}'";
					$db = JFactory::getDbo();
					$query = $db->getQuery(true)->update('#__update_sites')->set('extra_query = ' . $extra_query)->where('name = "'.$this->element['extension'].'"');
					$db->setQuery($query);
					$db->execute();
			}
			// code that returns HTML that will be shown as the form field
			return parent::getInput();
		}
}

?>