$(document).ready(function(){
	
	$.ajax({
		url : "https://www.smkn1bojonggede.sch.id/administrator/api/getBlog",
		type : "GET",
		dataType : "JSON",
		headers : {
			"Content-Type" : "application/x-www-form-urlencoded",
			"Accept" : "application/json"
		},
		data : {
		    "api_key" : "jUvqalsa4G7b7NJL2trb"
		},
		success : function(result) {
			var event_modal = '';
			$.each(result.data, function(index, value) {
				var date = value.created_at
				var tgl = date.substr(0, 2)
				var bln = date.substr(3, 2)
				var thn = date.substr(6, 4)
				
				var hari = day[new Date(thn+'-'+bln+'-'+tgl).getDay()]
				var bulan = month[bln]
				var tanggal = hari+', '+tgl+' '+bulan+' '+thn
				
				event_modal += '<div class="col-lg-4 mb-4">';
				event_modal += '<a href="/page/berita/?read='+value.code+'">';
				event_modal += '<div class="card">';
				event_modal += '<div class="card-head" style="background-image:url('+value.image+')"></div>';
				event_modal += '<div class="card-body">';
				event_modal += '<h6 class="font-weight-bold">'+value.title+'</h6>';
				event_modal += '<p class="card-text">'+value.sort_description+'</p>';
				event_modal += '<p class="card-text"><small class="text-muted">'+tanggal+'</small></p>';
				event_modal += '</div>';
				event_modal += '</div>';
				event_modal += '</a>';
				event_modal += '</div>';
			})
			$("#newsDetail").html('')
			$("#newsDetail").append(event_modal)
			$("#loader").hide()
		}
	})
})