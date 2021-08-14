<?php
/**
* @package EasyGCalendar
* @Copyright (C) 2011-2018 Daniel Blum. All rights reserved.
* @license Distributed under the terms of the GNU General Public License GNU/GPL v3 http://www.gnu.org/licenses/gpl-3.0.html
* @author Daniel Blum
* @website Visit http://codeninja.eu for updates and information.
**/

#namespace Joomla\com_easygcalendar\helpers;

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * EasyGCalendar Html helper class.
 */
class EasyGCalendarHtmlHelper
{
	/**
	 * Method to get the Modal Html & style basesd on the selected frontend framework.
	 * @return html string
	**/
	public static function getModalContent($strUniqueID, $strFrontendFramework, $modalWidth, $modalHeight, $modalBodyHeight)
	{
		$strFrontendFramework = strtoupper($strFrontendFramework);
		
		$strContent = '<style>
				@media screen and (min-width: 768px) {
					#event-details-view-'. $strUniqueID .' .modal-dialog { '. $modalWidth . $modalHeight .' }
				}';
		
		if($strFrontendFramework == EasyGCalendarHelperBase::$frontendFrameworkBS2)
		{
			$strContent .= '
			@media screen and (min-width: 768px) {
					#event-details-view-'. $strUniqueID .' { '. $modalWidth . $modalHeight .' }
			}
			div.modal-hidden { display:none; }';
		}
		
		if($strFrontendFramework == EasyGCalendarHelperBase::$frontendFrameworkBS3)
		{
			$strContent .= '
				div.modal { margin: 0 auto; text-align: center; padding: 0!important; }
				div.modal:before { content: \'\'; display: inline-block; height: 100%; vertical-align: middle; margin-right: -4px; }
				div.modal-dialog { display: inline-block; text-align: left; vertical-align: middle; }';
		}
		$strContent .= '</style>';
		
		$strContent .= '<div id="event-details-view-'. $strUniqueID .'" class="modal fade modal-hidden" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-'. $strUniqueID .'">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h2 class="modal-title" id="myModalLabel-'. $strUniqueID .'">Modal title</h2>
					</div>
					<div class="modal-body" style="'.$modalBodyHeight.'">
						<iframe style="width:99.6%;height:95%;border:none;"></iframe>
					</div>
				</div>
			</div>
		</div>';
		
		return $strContent;
	}
	
	/**
	 * Method to get the installed Version as string
	 * @return html string
	**/
	public static function getVersionTag()
	{
		$name = '';
		$version = '';
		$file = JPATH_ADMINISTRATOR . '/components/com_easygcalendar/easygcalendar.xml';
		if(file_exists($file))
		{
			$xml = simplexml_load_file($file);
			$v = $xml->xpath('//extension');
			if(count($v) > 0)
			{
				$name = $v[0]->name;
				$version = $v[0]->version;
			}
		}
		return '<!-- '.$name.' v' . $version . ' -->';
	}
}

?>