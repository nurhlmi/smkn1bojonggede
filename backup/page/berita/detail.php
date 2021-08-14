<!Doctype HTML>
<html lang="id">
	<?php require "../../page/head.php"; ?>
	
	<body id="page-top">
		<?php require "../../page/navigation.php"; ?>
		
		<div id="responsiveNav"></div>
		
		<section id="news" class="pt-5">
			<div class="container">
				<h1 class="text-center text-uppercase mb-4">Berita</h1>
				<div id="loader" class="row">
				    <div class="col-lg-4 offset-lg-4">
				        <img src="/img/loader.gif" class="img-fluid" />
				    </div>
				</div>
				<div id="newsDetail" class="row"></div>
			</div>
		</section>
		
		<?php require "../../page/footer.php"; ?>
		<script type="text/javascript" src="/vendor/api/tanggal.js"></script>
		<script type="text/javascript" src="/vendor/api/berita-detail.js"></script>
	</body>
</html>