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

JHtmlBootstrap::framework();
#require_once(JPATH_ADMINISTRATOR . '/components/com_easygcalendar/helpers/utilsBase.php');
JLoader::register('EasyGCalendarHelperBase', JPATH_ADMINISTRATOR . '/components/com_easygcalendar/helpers/utilsBase.php');
JLoader::register('EasyGCalendarHelper', JPATH_ADMINISTRATOR . '/components/com_easygcalendar/helpers/utils.php');
JLoader::register('EasyGCalendarHtmlHelper', JPATH_ADMINISTRATOR . '/components/com_easygcalendar/helpers/htmlHelper.php');
JLoader::register('EasyGCalendarFormatHelper', JPATH_ADMINISTRATOR . '/components/com_easygcalendar/helpers/format.php');
JLoader::register('EasyGCalendarGoogleAPIHelper', JPATH_ADMINISTRATOR . '/components/com_easygcalendar/helpers/googleAPI.php');
JHtml::_('behavior.caption');

$doc = JFactory::getDocument();
$doc->addStyleSheet(JURI::base().'components/'.EasyGCalendarHelperBase::$extensionName.'/libraries/fullcalendar/fullcalendar.min.css');
$doc->addStyleSheet(JURI::base().'components/'.EasyGCalendarHelperBase::$extensionName.'/views/calendar/tmpl/calendar.css');
$doc->addStyleSheet(JURI::base().'components/'.EasyGCalendarHelperBase::$extensionName.'/libraries/jquery/jquery.qtip.min.css');
$doc->addScript(JURI::base(). 'components/'.EasyGCalendarHelperBase::$extensionName.'/libraries/fullcalendar/lib/moment.min.js' );
$doc->addScript(JURI::base(). 'components/'.EasyGCalendarHelperBase::$extensionName.'/libraries/fullcalendar/fullcalendar.min.js' );
//$doc->addScript(JURI::base(). 'components/'.EasyGCalendarHelperBase::$extensionName.'/libraries/fullcalendar/locale-all.js' );
$doc->addScript(JURI::base(). 'components/'.EasyGCalendarHelperBase::$extensionName.'/libraries/jquery/jquery.qtip.min.js' );
$doc->addScript(JURI::base().'components/'.EasyGCalendarHelperBase::$extensionName.'/views/calendar/tmpl/calendar.js');

//Parameter Setup for this View
//Calendar
$paramCalendarIDs 									 =  $this->params->get('calendarids');
$paramCalendarDefaultView 					 =  $this->params->get('defaultView', 'month');
$paramCalendarShowFilters						 = ($this->params->get('display_calendar_filters', 0) ? true : false);
$paramCalendarWeekStart							 = intval($this->params->get('weekstart', 1));
$paramCalendarShowWeekNumbers				 = ($this->params->get('weeknumbers', 1) ? true : false);
$paramCalendarShowWeekend						 = ($this->params->get('weekend', 1) ? true : false);
//Calendar Column Formats
$paramCalendarColumnFormatMonth			 = $this->params->get('columnformat_month'); //D
$paramCalendarColumnFormatWeek			 = $this->params->get('columnformat_week'); //D n/j
$paramCalendarColumnFormatDay				 = $this->params->get('columnformat_day'); //l
$paramCalendarColumnFormatList			 = $this->params->get('columnformat_list'); //D
//Calendar View Formats
//Month Formats
$paramCalendarTitleFormatMonth			 = $this->params->get('titleformat_month', 'F Y'); //MMMM YYYY
$paramCalendarTimeFormatMonth				 = $this->params->get('timeformat_month', 'g:i a');
//Week Formats
$paramCalendarTitleFormatWeek				 = $this->params->get('titleformat_week', 'F d, Y'); //MMMM DD, YYYYD
$paramCalendarTimeFormatWeek				 = $this->params->get('timeformat_week', 'g:i a');
//Day Formats
$paramCalendarTitleFormatDay				 = $this->params->get('titleformat_day', 'F Y, d'); //MMMM DD, YYYY
$paramCalendarTimeFormatDay					 = $this->params->get('timeformat_day', 'g:i a');
$paramCalendarAxisFormat						 = $this->params->get('slotlabelformat', 'H'); //HH 24 hour time
//Time
$paramCalendarMinTime								 = $this->params->get('min_time', '00:00:00');
$paramCalendarMaxTime								 = $this->params->get('max_time', '24:00:00');
//Popup
$paramCalendarShowEventInPopup			 = ($this->params->get('open_event_in_popup', 1) == 1 ? true : false);
$paramCalendarEventPopupWidth				 = $this->params->get('popup_width', 700);
$paramCalendarEventPopupHeigth			 = $this->params->get('popup_height', 500);
//Tooltip
$paramCalendarShowTooltip						 = ($this->params->get('display_tooltip_info', 1) ? true : false);
$paramCalendarTooltipDateFormat			 = $this->params->get('tooltip_date_format', 'm.d.Y');
$paramCalendarTooltipTimeFormat			 = $this->params->get('tooltip_time_format', 'g:i a');
$paramCalendarTooltipDescriptionLen	 = $this->params->get('tooltip_description_length', 0);
//Content
$paramCalendarContentHeight					 = $this->params->get( 'calendar_height', null);
$paramCalendarTextBefore						 = $this->params->get( 'textbefore' );
$paramCalendarTextAfter							 = $this->params->get( 'textafter' );
//Themes & Style
$paramCalendarQtipTheme							= $this->params->get('qtip_theme', 'qtip-light');
//Caching
$paramCacheType 										=  $this->params->get('cache_type', 0);
$paramCacheTimeInMinutes						= ((int) $this->params->get( 'cache_time', JFactory::getApplication()->get( 'cachetime' )) * 60); //The cachetime in minutes
//Frontend Framework
$paramModuleClass_sfx 							 = htmlspecialchars($this->params->get('moduleclass_sfx'));
$paramFrontendFramework 						 = $this->params->get('frontend_framework', EasyGCalendarHelperBase::$frontendFrameworkBS2);


//Prepare Modal
$modalWidth = is_numeric($paramCalendarEventPopupWidth) ? 'width:' . $paramCalendarEventPopupWidth . 'px;' : '';
$modalHeight = is_numeric($paramCalendarEventPopupHeigth) ? 'height:' . $paramCalendarEventPopupHeigth . 'px;' : '';
$modalBodyHeight = is_numeric($paramCalendarEventPopupHeigth) ? 'height:' . ((int)$paramCalendarEventPopupHeigth - 50) . 'px;' : '';

//Prepare calendars
$arrCalendarIDs = array();
if(is_array($paramCalendarIDs))
{
	$arrCalendarIDs = $paramCalendarIDs;
}
else if (!empty($paramCalendarIDs))
{
	$arrCalendarIDs = $paramCalendarIDs;
}

//Define default view of calendar
$defaultView = 'month';
if($paramCalendarDefaultView == 'week')
{
	$defaultView = 'agendaWeek';
}
else if($paramCalendarDefaultView == 'day')
{
	$defaultView = 'agendaDay';
}

//Prepare Month Names
$arrMonthNamesLong = EasyGCalendarFormatHelper::getMonthNames();
$arrMonthNamesShort = EasyGCalendarFormatHelper::getMonthNames(true);

//Prepare Day Names
$arrDayNamesLong = EasyGCalendarFormatHelper::getDayNames();
$arrDayNamesShort= EasyGCalendarFormatHelper::getDayNames(true);

//Prepare Calendar config
$arrCalendarConfig = array();

//General Display
$arrCalendarConfig['header'] = array('left' => 'prev,next today', 'center' => 'title', 'right' => 'month,agendaWeek,agendaDay');
//$arrCalendarConfig['defaultDate'] = ''; //set current Date from client-side (this is automatcally done if the param is not set)
//$arrCalendarConfig['locale'] = 'de'; //TODO add this as fallback with current active language (site)
$arrCalendarConfig['defaultView'] = $defaultView;
$arrCalendarConfig['editable'] = false;
//Set contentHeight if required
if(!empty($paramCalendarContentHeight))
{
	$arrCalendarConfig['contentHeight'] =  $paramCalendarContentHeight;
}
$arrCalendarConfig['weekends'] = $paramCalendarShowWeekend;
$arrCalendarConfig['eventLimit'] = true;  // allow "more" link when too many events
$arrCalendarConfig['firstDay'] = $paramCalendarWeekStart; //Sunday=0, Monday=1, Tuesday=2, etc.
$arrCalendarConfig['weekNumbers'] = $paramCalendarShowWeekNumbers;

//Text & Time Customization
$arrCalendarConfig['monthNames'] = $arrMonthNamesLong;
$arrCalendarConfig['monthNamesShort'] = $arrMonthNamesShort;
$arrCalendarConfig['dayNames'] = $arrDayNamesLong;
$arrCalendarConfig['dayNamesShort'] = $arrDayNamesShort;
$arrCalendarConfig['weekNumberTitle'] = JText::_( 'COM_EASYGCALENDAR_CALENDAR_VIEW_WEEK_NUMBER_TITLE' );
$arrCalendarConfig['buttonText'] = array( 'today' => JText::_( 'COM_EASYGCALENDAR_CALENDAR_VIEW_TOOLBAR_TODAY' ),
									  											'month' => JText::_( 'COM_EASYGCALENDAR_CALENDAR_VIEW_VIEW_MONTH' ), 
									  											'week' => JText::_( 'COM_EASYGCALENDAR_CALENDAR_VIEW_VIEW_WEEK' ),
									  											'day' => JText::_( 'COM_EASYGCALENDAR_CALENDAR_VIEW_VIEW_DAY' )
									  										);
$arrCalendarConfig['eventLimitText'] = JText::_( 'COM_EASYGCALENDAR_CALENDAR_VIEW_EVENT_LIMIT_TEXT' );

//Emphasizes certain time slots on the calendar. By default, Monday-Friday, 9am-5pm.
//$arrCalendarConfig['businessHours'] = array('start' => '10:00', 'end' => '18:00');

//Configuration of Columns & Views
$arrCalendarConfig['views']['month'] = array ('columnFormat' => EasyGCalendarFormatHelper::convertToFullcalendarFormat($paramCalendarColumnFormatMonth), // Mon, Wed, etc
																							'titleFormat' => EasyGCalendarFormatHelper::convertToFullcalendarFormat($paramCalendarTitleFormatMonth), //MMMM YYYY
																							'timeFormat' =>  EasyGCalendarFormatHelper::convertToFullcalendarFormat($paramCalendarTimeFormatMonth)); 
																							
$arrCalendarConfig['views']['agenda'] = array ('columnFormat' => EasyGCalendarFormatHelper::convertToFullcalendarFormat($paramCalendarColumnFormatList), //  Mon, Wed, etc
																							 //Agenda view options
																							 'minTime' => $paramCalendarMinTime, //00:00:00
																							 'maxTime' => $paramCalendarMaxTime, //24:00:00
																							 // 'slotDuration' => '',
																							 'slotLabelFormat' => $paramCalendarAxisFormat,
																							 // 'allDaySlot' => true, //Default is true
																							 'allDayText' => JText::_( 'COM_EASYGCALENDAR_CALENDAR_VIEW_ALL_DAY' ));

$arrCalendarConfig['views']['agendaWeek'] = array ('columnFormat' => EasyGCalendarFormatHelper::convertToFullcalendarFormat($paramCalendarColumnFormatWeek), // Mon 9/7
																									 'titleFormat' => EasyGCalendarFormatHelper::convertToFullcalendarFormat($paramCalendarTitleFormatWeek),
																									 'timeFormat' =>  EasyGCalendarFormatHelper::convertToFullcalendarFormat($paramCalendarTimeFormatWeek));

$arrCalendarConfig['views']['agendaDay'] = array ('columnFormat' => EasyGCalendarFormatHelper::convertToFullcalendarFormat($paramCalendarColumnFormatDay), // Monday
																									'titleFormat' => EasyGCalendarFormatHelper::convertToFullcalendarFormat($paramCalendarTitleFormatDay), //MMMM DD, YYYY
																									'timeFormat' =>  EasyGCalendarFormatHelper::convertToFullcalendarFormat($paramCalendarTimeFormatDay));

//Prepare IDs
$intRefID = JFactory::getApplication()->getMenu()->getActive()->id; //for more possible options of manipulation check https://docs.joomla.org/Supporting_SEF_URLs_in_your_component
if($intRefID <= 0) {
	JFactory::getApplication()->enqueueMessage('Component ID is missing this will lead to an invalid calendar view!', 'error');
}
$strUniqueID = $intRefID;
$strEasygCalendarIdentifier = "easygcalendar_component-" . $strUniqueID;

//Prepare calendar settings
$arrCalendarResults = EasyGCalendarHelper::getCalendarList($arrCalendarIDs);
print EasyGCalendarHtmlHelper::getVersionTag();
if(is_array($arrCalendarResults))
{
	$arrCalendarConfig['eventSources'][] = EasyGCalendarHelper::getCalendarDataUrl(array(), 'com', $intRefID);
	$strCalendarFilterHtml = EasyGCalendarHelper::getCalendarFilter($arrCalendarResults, $strEasygCalendarIdentifier);
}
?>

<div class="calendar-page <?php echo $paramModuleClass_sfx; ?>">
	<?php echo $paramCalendarTextBefore; ?>
	<div id='<?php echo $strEasygCalendarIdentifier; ?>'></div>
	<?php echo $paramCalendarTextAfter; ?>
</div>
<script type="text/javascript">
	EasyGCalendarManagement.EventSources['<?php echo $strEasygCalendarIdentifier ?>'] = <?php echo json_encode($arrCalendarConfig['eventSources']); ?>;
	
	jQuery(document).ready(function() {
		var options = {
			dayClick: function(date, jsEvent, view) {
				jQuery('#<?php echo $strEasygCalendarIdentifier; ?>').fullCalendar( 'changeView' , 'agendaDay'); 
				jQuery('#<?php echo $strEasygCalendarIdentifier; ?>').fullCalendar( 'gotoDate' , date );
			},
			eventClick: function( event, jsEvent, view ) {
				jsEvent.stopPropagation();
				
				<?php if($paramCalendarShowEventInPopup) { ?>
					EasyGCalendarManagement.openModal('event-details-view-<?php echo $strUniqueID; ?>', event.details_url, event.title, '<?php echo strtoupper($paramFrontendFramework); ?>');
				<?php } else { ?>
					window.location = event.details_url.replace(/&amp;/g, '&');
				<?php } ?>
			},
			eventRender: function(event, element) {
				<?php if($paramCalendarShowTooltip) { ?>
					var eventDesc = event.description;
					
					<?php if($paramCalendarTooltipDescriptionLen > 0) { ?>
						if(eventDesc != null && eventDesc.length > 10) eventDesc = eventDesc.substring(0,<?php echo $paramCalendarTooltipDescriptionLen; ?>);
					<?php } ?>
					
					element.qtip({
						content: {
							title: moment(event.start).format('<?php echo EasyGCalendarFormatHelper::convertToFullcalendarFormat($paramCalendarTooltipTimeFormat); ?>') + ' - ' + moment(event.end).format('<?php echo EasyGCalendarFormatHelper::convertToFullcalendarFormat($paramCalendarTooltipTimeFormat); ?>') + ' ' + event.title,
							text: eventDesc
						},
						style: {
							classes: '<?php echo $paramCalendarQtipTheme; ?>'
						}
					});
				<?php } ?>
			}
			<?php if($paramCalendarShowFilters) { ?>
			,eventAfterAllRender: function( view ) {
					if(!jQuery('#calendar-filter-<?php echo $strUniqueID; ?>').length) {
						jQuery('#<?php echo $strEasygCalendarIdentifier; ?> .fc-left').append('<div id="calendar-filter-<?php echo $strUniqueID; ?>" class="calendar-filter-select calendar-rounded">' +
						'<!-- Calendar filter --><?php echo $strCalendarFilterHtml ?>' +
						'</div>');
					}
			}
			<?php } ?>
		};
		
		jQuery.extend( true, options, <?php echo json_encode($arrCalendarConfig); ?> );
		jQuery('#<?php echo $strEasygCalendarIdentifier; ?>').fullCalendar(options);
		
	});
</script>

<!-- Bootstrap Modal -->
<?php if($paramCalendarShowEventInPopup) {
	echo EasyGCalendarHtmlHelper::getModalContent($strUniqueID, $paramFrontendFramework, $modalWidth, $modalHeight, $modalBodyHeight);
} ?>
