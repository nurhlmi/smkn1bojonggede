$(document).ready(function(){
	
	$.ajax({
		url : "https://www.smkn1bojonggede.sch.id/administrator/api/getTeacher",
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
		    var i = 1;
			var event_modal = '';
			$.each(result.data, function(index, value){
				event_modal += '<div class="col-xl-3 col-lg-4 col-md-6 mb-4">';
				event_modal += '<div class="card" data-toggle="modal" data-target="#modal'+i+'" title="Klik untuk melihat deskripsi">';
				event_modal += '<div class="card-head" style="background-image:url('+value.image+')"></div>';
				event_modal += '<div class="card-body">';
				event_modal += '<h6 class="font-weight-bold">'+value.name+'</h6>';
				event_modal += '<p class="card-text">'+value.position+'</p>';
				event_modal += '</div>';
				event_modal += '</div>';
				event_modal += '</div>';
				i++;
			})
			$("#dataTeacher").html('')
			$("#dataTeacher").append(event_modal)
			
			var z = 1;
			var modal = '';
			$.each(result.data, function(index, values){
				var descript = values.description;
				if(descript == null) {
					var description = "Tidak ada";
				} else {
					var description = values.description;
				}
				modal += '<div class="modal fade" id="modal'+z+'" tabindex="-1" role="dialog" aria-hidden="true">';
				modal += '<div class="modal-dialog modal-dialog-centered" role="document">';
				modal += '<div class="modal-content">';
				modal += '<div class="modal-header">';
				modal += '<h5 class="modal-title font-weight-bold">Deskripsi</h5>';
				modal += '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
				modal += '<span aria-hidden="true">&times;</span>';
				modal += '</button>';
				modal += '</div>';
				modal += '<div class="modal-body">'+description+'</div>';
				modal += '<div class="modal-footer">';
				modal += '<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>';
				modal += '</div>';
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