<?php
	if(isset($_GET['read'])) {
		$code = $_GET['read'];
	} else {
		$code = "";
	}
?>
<!Doctype HTML>
<html lang="id">
    <head>
    	<meta charset="UTF-8" />
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    	
    	<title class="title"></title>
    	
    	<link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css" />
    	<link rel="stylesheet" href="/vendor/fontawesome/css/all.min.css" />
    	<link rel="stylesheet" href="/vendor/owlcarousel/assets/owl.carousel.min.css" />
    	<link rel="stylesheet" href="/vendor/owlcarousel/assets/owl.theme.default.min.css" />
    	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" />
    	<link rel="stylesheet" href="/vendor/theme/style.css" />
    	<link rel="shortcut icon" href="/img/icon/icon-96.png" />
    </head>
	
	<body id="page-top">
		<?php require "../../page/navigation.php"; ?>
		
		<div id="responsiveNav"></div>
		
		<section id="news" class="pt-5">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<h2 class="title font-weight-bold m-0"></h2>
						<small class="date">SMKN 1 Bojonggede | <font id="date"></font></small>
						
						<div class="mt-2">
							<!--<a href="" class="fb mr-2" title="Bagikan ke Facebook">
								<i class="fab fa-facebook-square fa-2x"></i>
							</a>
							<a href="" class="tw mr-2" title="Bagikan ke Twitter">
								<i class="fab fa-twitter-square fa-2x"></i>
							</a>
							<a href="" class="wa" title="Bagikan ke WhatsApp">
								<i class="fab fa-whatsapp-square fa-2x"></i>
							</a>-->
						</div>
						
						
						<div id="image"></div>
						<small id="image_description" class="font-italic"></small>
						<div id="description" class="mt-5"></div>
						<input id="code" type="hidden" value="<?php echo $code; ?>" />
					</div>
					<div class="col-lg-4 mt-5 pt-5">
						<h6 class="font-weight-bold text-uppercase">Berita Lainnya</h6>
						<div class="dropdown-divider pb-2"></div>
						<div class="row" id="dataBeritaLainnya"></div>
					</div>
				</div>
			</div>
		</section>
		
		<?php require "../../page/footer.php"; ?>
		<script type="text/javascript" src="/vendor/api/tanggal.js"></script>
		<script type="text/javascript" src="/vendor/api/berita.js"></script>
		<script type="text/javascript" src="/vendor/api/berita-lainnya.js"></script>
	</body>
</html>