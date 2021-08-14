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

// Getting params from template
$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$this->language  = $doc->language;
$this->direction = $doc->direction;

JHtml::_('bootstrap.framework');
// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

JLoader::register('EasyGCalendarHelper', JPATH_ADMINISTRATOR . '/components/com_easygcalendar/helpers/utils.php');
JLoader::register('EasyGCalendarHtmlHelper', JPATH_ADMINISTRATOR . '/components/com_easygcalendar/helpers/htmlHelper.php');
JLoader::register('EasyGCalendarFormatHelper', JPATH_ADMINISTRATOR . '/components/com_easygcalendar/helpers/format.php');

// Add Stylesheets
$doc->addStyleSheet('templates/'.$app->getTemplate().'/css/template.css');
$doc->addStyleSheet('templates/'.$app->getTemplate().'/css/icons.css');
$doc->addStyleSheet($this->baseurl.'/media/jui/css/icomoon.css');
$doc->addStyleSheet(JURI::base().'components/'.EasyGCalendarHelperBase::$extensionName.'/views/event/tmpl/event.css');

$doc->addScript(JURI::base().'components/'.EasyGCalendarHelperBase::$extensionName.'/views/calendar/tmpl/calendar.js');

//Parameter Setup for this View
//Event
$paramEventDateFormat 								=  $this->params->get('event_date_format', 'm.d.Y');
$paramEventTimeFormat 								=  $this->params->get('event_time_format', 'g:i a');
$paramEventShowDate										= ($this->params->get('event_show_date', 1) ? true : false);
$paramEventShowLocation								= ($this->params->get('event_show_location', 1) ? true : false);
$paramEventShowCreator								= ($this->params->get('event_show_creator', 0) ? true : false);
$paramEventShowUrl										= ($this->params->get('event_show_url', 1) ? true : false);
$paramEventShowAttachments						= ($this->params->get('event_show_attachments', 1) ? true : false);
$paramEventShowDescription						= ($this->params->get('event_show_description', 1) ? true : false);
$paramEventShowMap										= ($this->params->get('event_show_map', 1) ? true : false);
$paramEventShowPrintButton						= ($this->params->get('event_show_print_button', 1) ? true : false);
$paramEventShowICalDownload						= ($this->params->get('event_show_ical_button', 1) ? true : false);
$paramEventShowGoogleCalendarButton 	= ($this->params->get('event_show_googlecalendar_button', 1) ? true : false);
//Frontend Framework
$paramFrontendFramework 			 = $this->params->get('frontend_framework', EasyGCalendarHelperBase::$frontendFrameworkBS2);
//Map
$paramEventMapZoom						 =  $this->params->get('map_zoom', 8);
$paramEventMapGoogleJsApiKey	 =  $this->params->get('map_google_js_api_key', '');

//Prepare additional settings
$startDate = EasyGCalendarFormatHelper::getDate($this->objEvent->start_date, $this->objEvent->all_day);
$endDate = EasyGCalendarFormatHelper::getDate($this->objEvent->end_date, $this->objEvent->all_day);
$strContainerClass =($paramFrontendFramework == EasyGCalendarHelperBase::$frontendFrameworkBS3) ? 'container' : '';
$strRowClass =($paramFrontendFramework == EasyGCalendarHelperBase::$frontendFrameworkBS2) ? 'row-fluid' : 'row';
print EasyGCalendarHtmlHelper::getVersionTag();
?>

<script type="text/javascript">
	window.globalTemplate = '<?php echo JURI::base().'templates/'.$app->getTemplate().'/css/template.css' ?>;';
</script>
<span id="section-to-print">

	<?php if(!$this->isModalWindow && !empty($this->objEvent->title)) { ?>
	<div class="page-header">
		<h2 itemprop="headline"> <?php echo $this->objEvent->title; ?> </h2>
	</div>
	<?php } ?>
	<div class="<?php echo $strContainerClass; ?>">
		<div class="<?php echo $strRowClass; ?>" itemscope itemtype="http://schema.org/Event">
			<!-- Hidden values for http://schema.org/Event definition -->
			<h2 class="event-details-title-print" itemprop="name"><?php echo $this->objEvent->title; ?></h2>
			<div class="span12 col-sm-12">
				<?php if($paramEventShowDate) { ?>
				<div class="<?php echo $strRowClass; ?>">
					<div class="span3 col-xs-2 event-details-label"><?php echo JText::_('COM_EASYGCALENDAR_EVENT_VIEW_DATE');?>: </div>
					<div class="span9 col-xs-8 event-details-content" itemprop="startDate" content="<?php echo $startDate->format('c');?>"><?php echo EasyGCalendarFormatHelper::getDateStringFromEvent($this->objEvent, $paramEventDateFormat, $paramEventTimeFormat);?></div>
				</div>
				<?php } ?>
				
				<?php if($paramEventShowLocation && !empty($this->objEvent->location)) { ?>
				<div class="<?php echo $strRowClass; ?>">
					<div class="span3 col-xs-2 event-details-label"><?php echo JText::_('COM_EASYGCALENDAR_EVENT_VIEW_LOCATION');?>:</div>
					<div class="span9 col-xs-8 event-details-content">
						<address>
							<div itemprop="location" itemscope itemtype="http://schema.org/Place">
								<!--<span itemprop="name"></span>-->
								<span itemprop="address"><?php echo $this->objEvent->location; ?></span>
							</div>
						</address>
					</div>
				</div>
				<?php } ?>
				
				<?php if($paramEventShowCreator && !empty($this->objEvent->creator)) { ?>
				<div class="<?php echo $strRowClass; ?>">
					<div class="span3 col-xs-2 event-details-label"><?php echo JText::_('COM_EASYGCALENDAR_EVENT_VIEW_CREATOR');?>:</div>
					<div class="span9 col-xs-8 event-details-content"><?php echo $this->objEvent->creator->displayName; ?></div>
				</div>
				<?php } ?>
				
				<?php if($paramEventShowUrl && !empty($this->objEvent->link)) { ?>
				<div class="<?php echo $strRowClass; ?>">
					<div class="span3 col-xs-2 event-details-label"><?php echo JText::_('COM_EASYGCALENDAR_EVENT_VIEW_URL');?>:</div>
					<div class="span9 col-xs-8 event-details-content">
						<a class="" href="<?php echo $this->objEvent->link; ?>" target="_blank" itemprop="url"><?php echo JText::_('COM_EASYGCALENDAR_EVENT_VIEW_URL_LINK_NAME');?></a> 
					</div>
				</div>
				<?php } ?>
			</div>
					
			<div class="span12 col-sm-12">
				<?php if($paramEventShowAttachments && !empty($this->objEvent->attachments)) { ?>
					<h3 class="event-details-header"><?php echo JText::_('COM_EASYGCALENDAR_EVENT_VIEW_ATTACHMENTS');?></h3>
					<div itemprop="attachments">
						<ul class="attachments">
							<?php foreach ($this->objEvent->attachments as $attachment) { echo "<li class=\"attachment-item\" data-filename=\"$attachment->title\"><a href=\"$attachment->fileUrl\" target=\"_blank\" title=\"$attachment->title\"><span>$attachment->title</span></a></li>"; } ?>
						</ul>
					</div>
				<?php } ?>
			</div>
			
			<div class="span12 col-sm-12">
				<?php if($paramEventShowDescription && !empty($this->objEvent->description)) { ?>
					<h3 class="event-details-header"><?php echo JText::_('COM_EASYGCALENDAR_EVENT_VIEW_DESCRIPTION');?></h3>
					<div itemprop="description"><?php echo $this->objEvent->description;?></div>
				<?php } ?>
			</div>
			
		</div> <!-- end event schema -->

	<?php if($paramEventShowMap && !empty($this->objEvent->location)) { ?>
			<!-- TODO: placeholder to be added -->
			<input type="hidden" id="event-details-map-address" name="event-details-map-address" value="<?php echo htmlentities($this->objEvent->location); ?>" />
			<div id="event-details-map" class=""></div>
		
			<script type="text/javascript">
				function initMap() {
					var map = new google.maps.Map(document.getElementById('event-details-map'), {
						zoom: <?php echo $paramEventMapZoom; ?>,
						center: {lat: 0, lng: 0}
					});
					var geocoder = new google.maps.Geocoder();
					geocodeAddress(geocoder, map);
				}
		
				function geocodeAddress(geocoder, resultsMap) {
					var address = document.getElementById('event-details-map-address').value;
					geocoder.geocode({'address': address}, function(results, status) {
						if (status === google.maps.GeocoderStatus.OK) {
							resultsMap.setCenter(results[0].geometry.location);
							var marker = new google.maps.Marker({
								map: resultsMap,
								position: results[0].geometry.location,
								title:"Hello World!"
							});
						} else {
							console.log('Geocode was not successful for the following reason: ' + status);
						}
					});
				}
			</script>
			<script src="https://maps.google.com/maps/api/js?key=<?php echo $paramEventMapGoogleJsApiKey; ?>&sensor=false&signed_in=true&callback=initMap" async defer></script>
	<?php } ?>
	</div>
</span>

<div class="<?php echo $strRowClass; ?>">
	<div class="span12 col-sm-12">&nbsp;</div>
	<div class="span12 col-sm-12">
		<?php if($paramEventShowPrintButton) { ?>
			<button title="<?php echo JText::_('COM_EASYGCALENDAR_EVENT_VIEW_PRINT_TITLE');?>" class="btn btn-default" onclick="EasyGCalendarManagement.printElement('section-to-print');"><span class="icon-print large-icon"> </span><?php echo JText::_('COM_EASYGCALENDAR_EVENT_VIEW_PRINT_BUTTON');?></button>
		<?php } ?>
		<?php if($paramEventShowGoogleCalendarButton && EasyGCalendarHelperBase::isProVersion('getCopyToGoogleCalendarLink')) { ?>
			<a title="<?php echo JText::_('COM_EASYGCALENDAR_EVENT_VIEW_COPYTOGOOGLECALENDAR_TITLE');?>" class="btn btn-default" href="<?php echo  EasyGCalendarHelperPro::getCopyToGoogleCalendarLink($this->objEvent); ?>" target="_blank"><span class="icon-copy large-icon"> </span><?php echo JText::_('COM_EASYGCALENDAR_EVENT_VIEW_COPYTOGOOGLECALENDAR_BUTTON');?></a>
		<?php } ?>
		<?php if($paramEventShowICalDownload && EasyGCalendarHelperBase::isProVersion('getICalDownload', false)) { ?>
			<button title="<?php echo JText::_('COM_EASYGCALENDAR_EVENT_VIEW_ICAL_TITLE');?>" class="btn btn-default" onclick="EasyGCalendarManagement.getICalDownload(this);" data-ical="/index.php?option=com_easygcalendar&view=event&calendarId=<?php echo $this->objEvent->calendarId; ?>&eventId=<?php echo $this->objEvent->id; ?>&format=raw" ><span class="icon-calendar large-icon"> </span><?php echo JText::_('COM_EASYGCALENDAR_EVENT_VIEW_ICAL_BUTTON');?></button>
		<?php } ?>
	</div>
</div>