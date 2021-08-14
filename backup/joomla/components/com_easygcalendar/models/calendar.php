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

class EasyGCalendarModelCalendar extends JModelItem
{
	/** @var object parameters item */
	protected $params;
	
	/** Method to auto-populate the model state. 
	*   This method should only be called once per instantiation and is designed
	*   to be called on the first call to the getState() method unless the model
	*   configuration flag to ignore the request is set.
	*   Note. Calling getState in this method will result in recursion.
	*   @return void 
	*   @since	2.5 */
	protected function populateState()
	{
		// Load the parameters.
		$this->setState('params', JFactory::getApplication()->getParams());
		parent::populateState();
	}
		
	/** Get the parameters of the component (merged)
	 * @return object with the available parameters of the component.  */
	public function getParams()
	{
		if($this->params == null)
		{
			$this->params = $this->getState('params');
		}
		return $this->params;
	}
}

?>