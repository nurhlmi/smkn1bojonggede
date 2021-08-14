$(document).ready(function(){
	
	$("#slider").hide()
	$("#school").hide()
	$("#profile").hide()
	$("#news").hide()
	
	$.ajax({
		url : "https://www.smkn1bojonggede.sch.id/administrator/api/carousel",
		type : "GET",
		dataType : "JSON",
		headers : {
			"Content-Type" : "application/x-www-form-urlencoded",
			"Accept" : "application/json",
		},
		data : {
		    "api_key" : "jUvqalsa4G7b7NJL2trb",
		},
		success : function(result) {
			var event_modal = '';
			$.each(result.data, function(index, value){
				event_modal += '<div class="item">';
				event_modal += '<div class="slider overlay" style="background-image: url('+value.image+')">';
				event_modal += '<div class="container">';
				event_modal += '<div class="row">';
				event_modal += '<div class="col-md-8">';
				event_modal += '<div class="text-white">';
				event_modal += '<h1 class="font-weight-bold pb-4">'+value.title+'</h1>';
				event_modal += '<p>'+value.description+'</p>';
				event_modal += '<div class="pt-4">';
				event_modal += '<a href="'+value.redirect_url+'"><button class="button button-primary">Selengkapnya</button></a>';
				event_modal += '</div>';
				event_modal += '</div>';
				event_modal += '</div>';
				event_modal += '</div>';
				event_modal += '</div>';
				event_modal += '</div>';
				event_modal += '</div>';
			})
			$("#owl-slide").html('')
			$("#owl-slide").append(event_modal)
			$("#loader1").hide()
			
			var owlSlide = $('#owl-slide')
			owlSlide.owlCarousel({
				items:1,
				loop:true,
				autoplay:true,
				autoplayTimeout:4000,
				autoplayHoverPause:false
			})
		}
	})
})