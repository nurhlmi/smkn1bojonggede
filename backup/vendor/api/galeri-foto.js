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
		    "category" : "image"
		},
		success : function(result) {
			var i = 1;
			var event_modal = '';
			$.each(result.data, function(index, value){
				event_modal += '<div class="col-lg-3 col-sm-6 mb-4">';
				event_modal += '<div class="card pointer" data-toggle="modal" data-target="#foto'+i+'">';
				event_modal += '<div class="card-head foto" style="background-image:url('+value.file+')"></div>';
				event_modal += '</div>';
				event_modal += '</div>';
				i++;
			})
			$("#dataFoto").html('')
			$("#dataFoto").append(event_modal)
			
			var z = 1;
			var modal = '';
			$.each(result.data, function(index, values){
				modal += '<div class="modal fade" id="foto'+z+'" tabindex="-1" role="dialog" aria-hidden="true">';
				modal += '<div class="modal-dialog modal-dialog-centered modal-lg" role="document">';
				modal += '<div class="modal-content">';
				modal += '<img src="'+values.file+'" class="img-fluid" />';
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