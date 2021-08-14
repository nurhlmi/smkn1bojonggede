<!Doctype HTML>
<html lang="id">
	<?php require "head.php"; ?>
	
	<body id="page-top">
		<?php require "navigation.php"; ?>
		
		<div id="responsiveNav"></div>
		
		<section id="sapras" class="pt-5">
			<div class="container">
				<h1 class="font-weight-bold text-center text-uppercase pb-5">Sarpras</h1>
				
				<!--<div id="loader" class="row">
				    <div class="col-lg-4 offset-lg-4">
					    <img src="/img/loader.gif" class="img-fluid" />
				    </div>
				</div>-->
				
				<div id="dataSapras" class="row">
					<div class="col-lg-4 col-md-6 mb-4">
						<div class="card pointer text-white" data-toggle="modal" data-target="#galeri1">
							<div class="card-head img-overlay" style="background-image:url('/img/sekolah.jpg')"></div>
							<div class="card-img-overlay">
								<h6 class="card-title font-weight-bold">Perpustakaan</h6>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 mb-4">
						<div class="card pointer text-white" data-toggle="modal" data-target="#galeri2">
							<div class="card-head img-overlay" style="background-image:url('/img/sekolah.jpg')"></div>
							<div class="card-img-overlay">
								<h6 class="card-title font-weight-bold">Mushola</h6>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 mb-4">
						<div class="card pointer text-white" data-toggle="modal" data-target="#galeri3">
							<div class="card-head img-overlay" style="background-image:url('/img/sekolah.jpg')"></div>
							<div class="card-img-overlay">
								<h6 class="card-title font-weight-bold">Ruang Kelas</h6>
							</div>
						</div>
					</div>
				</div>
				
				<div id="dataModal">
					<div class="modal fade" id="galeri1" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content">
								<img src="/img/sekolah.jpg" class="img-fluid" />
							</div>
						</div>
					</div>
					<div class="modal fade" id="galeri2" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content">
								<img src="/img/sekolah.jpg" class="img-fluid" />
							</div>
						</div>
					</div>
					<div class="modal fade" id="galeri3" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content">
								<img src="/img/sekolah.jpg" class="img-fluid" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<?php require "footer.php"; ?>
		<!--<script type="text/javascript" src="/vendor/api/sarana-prasarana.js"></script>-->
	</body>
</html>