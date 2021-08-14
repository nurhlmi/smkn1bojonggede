$(document).ready(function(){
	
	$.ajax({
		url : "https://www.smkn1bojonggede.sch.id/administrator/api/getBlogRandom",
		type : "GET",
		dataType : "JSON",
		headers : {
			"Content-Type" : "application/x-www-form-urlencoded",
			"Accept" : "application/json"
		},
		data : {
		    "api_key" : "jUvqalsa4G7b7NJL2trb",
		    "except" : $('#code').val()
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
				
				event_modal += '<div class="col-12 pb-3">';
				event_modal += '<a href="/page/berita/?read='+value.code+'" class="news-more">';
				event_modal += '<div class="row">';
				event_modal += '<div class="col-5 pr-0">';
				event_modal += '<div class="news-more-img" style="background-image:url('+value.image+')"></div>';
				event_modal += '</div>';
				event_modal += '<div class="col-7 pl-0">';
				event_modal += '<div class="font-weight-bold pl-2">';
				event_modal += '<span>'+value.title+'</span>';
				event_modal += '<br><small class="date">'+tanggal+'</small>';
				event_modal += '</div>';
				event_modal += '</div>';
				event_modal += '</div>';
				event_modal += '</a>';
				event_modal += '</div>';
			})
			$("#dataBeritaLainnya").html('')
			$("#dataBeritaLainnya").append(event_modal)
		}
	})
})