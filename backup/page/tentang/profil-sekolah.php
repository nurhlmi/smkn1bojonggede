<!Doctype HTML>
<html lang="id">
	<?php require "../../page/head.php"; ?>
	
	<body id="page-top">
		<?php require "../../page/navigation.php"; ?>
		
		<div id="responsiveNav"></div>
		
		<section id="sejarah" class="pt-5">
			<div class="container">
				<h1 class="font-weight-bold text-center text-uppercase pb-4">Profil Sekolah</h1>
				<div id="loader" class="row">
				    <div class="col-lg-4 offset-lg-4">
				        <img src="/img/loader.gif" class="img-fluid" />
				    </div>
				</div>
				<div class="col-lg-4 float-left px-5 pb-5 pt-2">
					<img id="image" src="" class="img-fluid">
				</div>
				<div id="description" class="text-justify"></div>
			</div>
		</section>
		
		<section id="visi-misi">
			<div class="container">
				<div id="dataVisiMisi"></div>
			</div>
		</section>
		
		<?php require "../../page/footer.php"; ?>
		<script type="text/javascript" src="/vendor/api/sejarah.js"></script>
		<script type="text/javascript" src="/vendor/api/visi-misi.js"></script>
	</body>
</html>