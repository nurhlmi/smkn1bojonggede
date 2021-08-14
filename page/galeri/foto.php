<!Doctype HTML>
<html lang="id">
	<?php require "../head.php"; ?>
	
	<body id="page-top">
		<?php require "../navigation.php"; ?>
		
		<div id="responsiveNav"></div>
		
		<section id="foto" class="pt-5">
			<div class="container">
				<h1 class="font-weight-bold text-center text-uppercase pb-4">Foto</h1>
				
				<!--<div id="loader" class="row">
				    <div class="col-lg-4 offset-lg-4">
					    <img src="/smkn1bojonggede/img/loader.gif" class="img-fluid" />
				    </div>
				</div>-->
				
				<div id="dataFoto" class="row">
					<div class="col-lg-3 col-sm-6 mb-4">
						<div class="card pointer" data-toggle="modal" data-target="#foto1">
							<div class="card-head foto" style="background-image:url('/smkn1bojonggede/img/foto/1.jpg')"></div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 mb-4">
						<div class="card pointer" data-toggle="modal" data-target="#foto2">
							<div class="card-head foto" style="background-image:url('/smkn1bojonggede/img/foto/2.jpg')"></div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 mb-4">
						<div class="card pointer" data-toggle="modal" data-target="#foto3">
							<div class="card-head foto" style="background-image:url('/smkn1bojonggede/img/foto/3.jpg')"></div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 mb-4">
						<div class="card pointer" data-toggle="modal" data-target="#foto4">
							<div class="card-head foto" style="background-image:url('/smkn1bojonggede/img/foto/4.jpg')"></div>
						</div>
					</div>
				</div>
				
				<div id="dataModal">
					<div class="modal fade" id="foto1" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content">
								<img src="/smkn1bojonggede/img/foto/1.jpg" class="img-fluid" />
							</div>
						</div>
					</div>
					<div class="modal fade" id="foto2" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content">
								<img src="/smkn1bojonggede/img/foto/2.jpg" class="img-fluid" />
							</div>
						</div>
					</div>
					<div class="modal fade" id="foto3" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content">
								<img src="/smkn1bojonggede/img/foto/3.jpg" class="img-fluid" />
							</div>
						</div>
					</div>
					<div class="modal fade" id="foto4" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content">
								<img src="/smkn1bojonggede/img/foto/4.jpg" class="img-fluid" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<?php require "../footer.php"; ?>
		<!--<script type="text/javascript" src="/vendor/api/galeri-foto.js"></script>-->
	</body>
</html>