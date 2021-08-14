$(document).ready(function(){
	
	$.ajax({
		url : "https://www.smkn1bojonggede.sch.id/administrator/api/getKurikulum",
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
			$.each(result.data, function(index, value){
				$("#image").attr("src",value.image)
				$("#description").html(value.description)
			})
			$('#loader').hide()
		}
	})
})