<!Doctype HTML>
<html lang="id">
	<?php require "../../page/head.php"; ?>
	
	<body id="page-top">
		<?php require "../../page/navigation.php"; ?>
		
		<div id="responsiveNav"></div>
		
		<section id="teacher" class="pt-5">
			<div class="container">
				<h1 class="font-weight-bold text-center text-uppercase pb-4">Guru & TU</h1>
				<div id="loader" class="row">
				    <div class="col-lg-4 offset-lg-4">
				        <img src="/img/loader.gif" class="img-fluid" />
				    </div>
				</div>
				<div class="row" id="dataTeacher"></div>
			</div>
			<div id="dataModal"></div>
		</section>
		
		<?php require "../../page/footer.php"; ?>
		<script type="text/javascript" src="/vendor/api/guru-tata-usaha.js"></script>
	</body>
</html>