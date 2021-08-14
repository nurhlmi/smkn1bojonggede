<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	berhasil
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script type="text/javascript">
	$.ajax({
		url : "http://localhost:8000/api/getVisiMisi",
		type : "GET",
		dataType : "JSON",
		headers : {
			"Content-Type" : "application/x-www-form-urlencoded",
			"Accept" : "application/json",
			"api_key" : "jUvqalsa4G7b7NJL2trb",
		},
		
		success : function(result) {
			console.log("berhasil get data Visi & misi")
		}
	})

	$.ajax({
		url : "http://localhost:8000/api/getSejarah",
		type : "GET",
		dataType : "JSON",
		headers : {
			"Content-Type" : "application/x-www-form-urlencoded",
			"Accept" : "application/json",
			"api_key" : "jUvqalsa4G7b7NJL2trb",
		},
		
		success : function(result) {
			console.log("berhasil get data sejarah")
		}
	})

	$.ajax({
		url : "http://localhost:8000/api/getTeacher",
		type : "GET",
		dataType : "JSON",
		headers : {
			"Content-Type" : "application/x-www-form-urlencoded",
			"Accept" : "application/json",
			"api_key" : "jUvqalsa4G7b7NJL2trb",
		},
		
		success : function(result) {
			console.log("berhasil get data guru dan staf")
		}
	})

	$.ajax({
		url : "http://localhost:8000/api/getBlogRandom",
		type : "GET",
		dataType : "JSON",
		headers : {
			"Content-Type" : "application/x-www-form-urlencoded",
			"Accept" : "application/json",
			"api_key" : "jUvqalsa4G7b7NJL2trb",
		},
		
		success : function(result) {
			console.log("berhasil get data Blog Random")
		}
	})

	$.ajax({
		url : "http://localhost:8000/api/getBlog",
		type : "GET",
		dataType : "JSON",
		headers : {
			"Content-Type" : "application/x-www-form-urlencoded",
			"Accept" : "application/json",
			"api_key" : "jUvqalsa4G7b7NJL2trb",
		},
		
		success : function(result) {
			console.log("berhasil get data Blog")
		}
	})

	$.ajax({
		url : "http://localhost:8000/api/getBlog",
		type : "GET",
		dataType : "JSON",
		data : {
			"code" : 5,
		}, 
		headers : {
			"Content-Type" : "application/x-www-form-urlencoded",
			"Accept" : "application/json",
			"api_key" : "jUvqalsa4G7b7NJL2trb",
		},
		
		success : function(result) {
			console.log(result)
		}
	})

	$.ajax({
		url : "http://localhost:8000/api/carousel",
		type : "GET",
		dataType : "JSON",
		headers : {
			"Content-Type" : "application/x-www-form-urlencoded",
			"Accept" : "application/json",
			"api_key" : "jUvqalsa4G7b7NJL2trb",
		},
		
		success : function(result) {
			console.log("berhasil get data carousel")
		}
	})
</script>
</html>