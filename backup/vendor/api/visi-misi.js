$(document).ready(function(){
	
	$.ajax({
		url : "https://www.smkn1bojonggede.sch.id/administrator/api/getVisiMisi",
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
				$('#dataVisiMisi').html(value.description)
			})
		}
	})
})