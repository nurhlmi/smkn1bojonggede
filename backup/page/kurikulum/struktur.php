<!Doctype HTML>
<html lang="id">
	<?php require "../head.php"; ?>
	
	<body id="page-top">
		<?php require "../navigation.php"; ?>
		
		<div id="responsiveNav"></div>
		
		<section id="profile" class="pt-5">
			<div class="container">
				<h1 class="font-weight-bold text-center text-uppercase pb-4">Struktur</h1>
				<div id="loader" class="row">
				    <div class="col-lg-4 offset-lg-4">
				        <img src="/img/loader.gif" class="img-fluid" />
				    </div>
				</div>
				<div class="row">
					<div class="col-12">
						<img id="image" src="" class="img-fluid" />
						<small id="description" class="font-italic"></small>
					</div>
				</div>
			</div>
		</section>
		
		<?php require "../footer.php"; ?>
		<script type="text/javascript" src="/vendor/api/kurikulum.js"></script>
	</body>
</html>