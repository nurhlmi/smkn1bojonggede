
var EasyGCalendarManagement = new EasyGCalendarManagement();

function EasyGCalendarManagement() {
	var self = this;
	this.EventSources = [];

	/**
	// Open Bootstrap Modal
	**/
	this.openModal = function (modalID, modalUrl, modalTitle, frontendFramework)
	{
		var modalSelector = '#' + modalID;
		var onModalDisplayEvent = 'show';
		var onModalHideEvent = 'hide';

		if(frontendFramework.toUpperCase() == 'BS3') {
			onModalDisplayEvent = 'shown.bs.modal';
			onModalHideEvent = 'hidden.bs.modal';
		}
		
		//Attach Bootstrap Modal Events
		jQuery(modalSelector).on(onModalDisplayEvent, function() {
			var url = modalUrl + '&isModal=1&tmpl=default';
			jQuery(modalSelector + ' .modal-title').text( modalTitle );
			jQuery(modalSelector + ' iframe').attr('src', url );
		});
		
		jQuery(modalSelector).on(onModalHideEvent, function() {
			jQuery(modalSelector + ' iframe').removeAttr('src');
		});
		
		var modal = jQuery(modalSelector).modal('show');
		//Modal center only for via Bootstrap 2.x (.row-fluid )
		if(frontendFramework.toUpperCase() == 'BS2' && jQuery(window).width() >= 768) {
			if (jQuery(window).width() < modal.width()) {
				modal.css({ width : jQuery(window).width() - 100 + 'px' });
			} else {
				modal.css({ 'margin-left' : '-' + modal.width() / 2 + 'px' });
			}
		}
	}
	
	/**
	// Print the selected element
	**/
	this.printElement = function (element)
	{
		var tmpWindow = window.open('Print');
		tmpWindow.document.write ('<html><head>' + 
															'<link rel="stylesheet" href="' + window.globalTemplate + '" type="text/css" />' +
															'<link rel="stylesheet" href="/components/com_easygcalendar/views/event/tmpl/event.css" type="text/css" />' +
															'</head><body></body></html>');
		tmpWindow.document.body.innerHTML += document.getElementById(element).innerHTML;
		tmpWindow.document.close(); // necessary for IE >= 10
		tmpWindow.focus(); // necessary for IE >= 10*/
		tmpWindow.onload = function () { 
			tmpWindow.document.title='print';
			tmpWindow.print();
			tmpWindow.close();
		}
		return true;
	}
	
	/**
	// Print the selected element
	**/
	this.getICalDownload = function (element)
	{
		var url = jQuery(element).attr("data-ical");
		console.log(url);
		window.location = url;
		return true;
	}
	
	/**
	// Applay the selected calendar filter
	**/
	this.applyCalendarFilter = function (element)
	{
		var selectedValue = jQuery(element).val();
		var fullcalendarID = jQuery(element).data('calendar-component-id');
		var eventSources = self.EventSources[fullcalendarID];
	
		self.removeEventSources(fullcalendarID);
		if(selectedValue !== '0') {
			jQuery.each(eventSources, function( index, source ) {
				var url = source +'&ids[]=' + selectedValue;
				self.addEventSource(fullcalendarID, url);
			});
		} else {
			jQuery.each(eventSources, function( index, source ) {
				self.addEventSource(fullcalendarID, source);
			});
		}
		
	}
	
	/**
	// removeEventSources
	**/
	this.removeEventSources = function (fullcalendarID)
	{
		jQuery('#'+ fullcalendarID).fullCalendar('removeEventSources');
	}
	
	/**
	// removeEventSources
	**/
	this.removeEventSource = function (fullcalendarID, eventSource)
	{
		jQuery('#'+ fullcalendarID).fullCalendar('removeEventSource', eventSource).fullCalendar('refetchEvents');
	}
	
	/**
	// addEventSource
	**/
	this.addEventSource = function (fullcalendarID, eventSource)
	{
		jQuery('#'+ fullcalendarID).fullCalendar('addEventSource', eventSource);
	}

}


