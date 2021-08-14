<!Doctype HTML>
<html lang="id">
	<?php require "page/head.php"; ?>
	
	<body id="page-top">
		<?php require "page/navigation.php"; ?>
		
		<div id="responsiveNav"></div>
		
		<div id="loader" class="container">
			<div class="row py-5">
			    <div class="col-lg-4 offset-lg-4">
			        <img src="/img/loader.gif" class="img-fluid" />
			    </div>
			</div>
		</div>
		
		<section id="slider">
			<div class="banner">
				<div class="owl-carousel owl-theme" id="owl-slide"></div>
			</div>
		</section>
		
		<section id="profile">
			<div class="container">
				<div class="row">
					<div class="col-md-4 text-center">
						<img src="img/logo/smkn.png" class="img-fluid mb-5" />
					</div>
					<div class="col-md-8">
						<h1 class="font-weight-bold text-uppercase pb-4">SMK Negeri 1 Bojonggede</h1>
						<p>
							Merupakan Sekolah Menengah Kejuruan Negeri yang memiliki 5 kompetensi keahlian, yaitu: 
							Akuntansi, Perhotelan, Jasa Boga, Multimedia dan Usaha Perjalanan Wisata.
						</p>
						<div class="pt-4">
							<a href="page/tentang/profil">
								<button class="button button-primary">Selengkapnya</button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section id="school">
			<div class="banner school-background overlay">
				<div class="container text-center text-white">
					<div class="row">
						<div class="col-lg-3 col-6 py-5">
							<i class="fa fa-chalkboard-teacher fa-3x"></i>
							<h1 class="pt-2 mb-0">52</h1>
							<span>Guru Aktif</span>
						</div>
						<div class="col-lg-3 col-6 py-5">
							<i class="fa fa-users fa-3x"></i>
							<h1 class="pt-2 mb-0">1,004</h1>
							<span>Peserta Didik</span>
						</div>
						<div class="col-lg-3 col-6 py-5">
							<i class="fa fa-book-reader fa-3x"></i>
							<h1 class="pt-2 mb-0">100</h1>
							<span>Mata Pelajaran</span>
						</div>
						<div class="col-lg-3 col-6 py-5">
							<i class="fas fa-trophy fa-3x"></i>
							<h1 class="pt-2 mb-0">100</h1>
							<span>Piala Juara</span>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section id="news">
			<h1 class="font-weight-bold text-center text-uppercase pb-4 px-4">Berita Terbaru</h1>
			<div id="loader2" class="row">
			    <div class="col-lg-4 offset-lg-4">
			        <img src="/img/loader.gif" class="img-fluid" />
			    </div>
			</div>
			<div class="owl-carousel owl-theme" id="owl-news"></div>
			<div class="pt-4 text-center">
				<a href="/page/berita/detail">
					<button class="button button-primary">Selengkapnya</button>
				</a>
			</div>
		</section>
		
		<?php require "page/footer.php"; ?>
		<script type="text/javascript" src="/vendor/api/slider.js"></script>
		<script type="text/javascript" src="/vendor/api/tanggal.js"></script>
		<script type="text/javascript" src="/vendor/api/berita-beranda.js"></script>
		<script type="text/javascript">
			$(document).ajaxComplete(function() {
	
				$("#slider").show()
				$("#school").show()
				$("#profile").show()
				$("#news").show()
				$("#loader").hide()
			})
		</script>
	</body>
</html>