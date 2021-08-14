$(document).ready(function(){
	
	$.ajax({
		url : "https://www.smkn1bojonggede.sch.id/administrator/api/getGallery",
		type : "GET",
		dataType : "JSON",
		headers : {
			"Content-Type" : "application/x-www-form-urlencoded",
			"Accept" : "application/json",
		},
		data : {
		    "api_key" : "jUvqalsa4G7b7NJL2trb",
		    "category" : "video"
		},
		success : function(result) {
			var i = 1;
			var event_modal = '';
			$.each(result.data, function(index, value){
				var youtubeid = value.file.substr(30,11);
				
				event_modal += '<div class="col-md-4 col-sm-6 mb-4" data-toggle="modal" data-target="#video'+i+'">';
				event_modal += '<img src="https://img.youtube.com/vi/'+youtubeid+'/sddefault.jpg" class="rounded pointer" style="width:100%" />';
				event_modal += '</div>';
				i++;
			})
			$("#dataVideo").html('')
			$("#dataVideo").append(event_modal)
			
			var z = 1;
			var modal = '';
			$.each(result.data, function(index, values){
				modal += '<div class="modal fade bd-example-modal-lg" id="video'+z+'" tabindex="-1" role="dialog" aria-hidden="true">';
				modal += '<div class="modal-dialog modal-dialog-centered modal-lg" role="document">';
				modal += '<div class="modal-content">';
				modal += '<iframe class="youtube-video" width="100%" height="450" src="'+values.file+'?enablejsapi=1&version=3&playerapiid=ytplayer" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope" allowfullscreen></iframe>';
				modal += '</div>';
				modal += '</div>';
				modal += '</div>';
				z++;
			})
			$("#dataModal").html('')
			$("#dataModal").append(modal)
			$("#loader").hide()
		}
	})
})