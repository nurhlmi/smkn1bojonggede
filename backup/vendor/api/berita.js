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
			"api_key" : "jUvqalsa4G7b7NJL2trb",
			"code" : $('#code').val()
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
				
				$('.title').html(value.title)
				$('#date').html(tanggal)
				$('#image').html('<img src="'+value.image+'" width="100%" class="img-fluid pt-3 pb-1">')
				$('#image_description').html(value.image_description)
				$('#description').html(value.description)
			})
		}
	})
})