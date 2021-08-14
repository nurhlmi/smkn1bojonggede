/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @since       3.2
 */

(function($) {
	
	$(document).ready(function() {
		
		var sections = $('#content-bottom-modules');
		if(sections.length) {
			var section;
			var section_wrap;
			
			sections.children().each(function(){
				var t = $(this);
		
				// get section info from module class
				var new_section_name = t.attr('class').match(/section-([a-z-]+)/);
				if (new_section_name) {
					// start new section
					if (typeof section != 'undefined') {
						section.appendTo(sections);
					}
					section = $('<div id="' + new_section_name[1] + '" class="section ' + new_section_name[1] + '"></div>');
					if($('body').hasClass('one-page-site')) {
						section_wrap = $('<div class="container-fluid"></div>').appendTo(section);
					} else {
						section_wrap = $('<div class="container"></div>').appendTo(section);
					}
				}
				
				section_wrap.append(t);
			});	
			
			section.appendTo(sections);
			
			var banners = $('.banner-image');
			var height = $(window).height();
					
			$('.banner-image').children().height(height + "px");
			var top = (height - $(".house-info-box").height()) / 2;
			$('.house-info-box').css("top", top + "px");

			$(window).resize(function() {
				var height = $(window).height();
				$('.banner-image').children().height(height + "px");
				top = (height - $(".house-info-box").height()) / 2;
				$(".house-info-box").css("top", top + "px");
			});
			
			banners.children().each(function(){	
				var imageUrl = $(this).find("img").attr('src');
				$(this).css('background-image', 'url(' + imageUrl + ')');
				$(this).find("img").remove();
			});
			
			var w = $(window);
			var scroll_active_section;
			var scrollSection = function(){
				var trigger_y = w.scrollTop() + w.height() / 4;
				var min_offset;
				var new_active_section;
			
				$(".section").each(function(){	
					var t = $(this);
					var o = t.offset();
					if (typeof min_offset != 'undefined' && o.top > trigger_y) return;
					if (typeof min_offset == 'undefined' || trigger_y - o.top < min_offset) {
						min_offset = trigger_y - o.top;
						new_active_section = t;
					}
				});
				
				if (typeof scroll_active_section == 'undefined' || scroll_active_section.get(0) != new_active_section.get(0)) {
					scroll_active_section = new_active_section;     
				}
				
				$(".banner-image .custom").removeClass("banner_active");
				$(".banner-image .banner-" + scroll_active_section.attr('class').split(' ')[1]).addClass("banner_active");
			};
			scrollSection();
			w.scroll(scrollSection);
			w.resize(scrollSection);
		}
		
		$(".drop_down_menu_btn").click(function() {
			$(".drop_down_menu_outter").slideToggle();
		});
		
		$(document).on('click', '.menu a[href*=#], .menu a[href=#]', function(event) {
			event.preventDefault();
			var target = this.getAttribute('href');
			$('html, body').animate({
				scrollTop : $(target).offset().top + 1
			}, 2000);
		});
		
		if($('.page-header h2').length) {
			$('.page-header h2').insertBefore('.banner-text .breadcrumb');
		}
		if($('div.itemListCategory h2').length) {
			$('div.itemListCategory h2').insertBefore('.banner-text .breadcrumb');
		}
	});
	
	$(window).load(function () {

		if($('.itemListGallery .itemList').length){	
			var $container = $('.itemListGallery .itemList');
			$container.isotope({
				// options
				itemSelector: '.itemContainer'
			});
				
			$container.imagesLoaded().progress( function() {
				$container.isotope('layout');
			});
				
			var selectors = $('.itemListGallery .subCategory a');
			selectors.on('click', function(e){
				e.preventDefault();
				selectors.removeClass('active');
				$(this).addClass('active');
				var selector = $(this).attr('data-filter');
				$container.isotope({ filter: selector });
				return false;
			});
		}			
	});

})(jQuery);