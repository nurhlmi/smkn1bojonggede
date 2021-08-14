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
		
		<title>Berita - SMKN 1 Bojonggede</title>		
		
		<link rel="stylesheet" href="/smkn1bojonggede/vendor/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/smkn1bojonggede/vendor/fontawesome/css/all.min.css" />
		<link rel="stylesheet" href="/smkn1bojonggede/vendor/owlcarousel/assets/owl.carousel.min.css" />
		<link rel="stylesheet" href="/smkn1bojonggede/vendor/owlcarousel/assets/owl.theme.default.min.css" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" />
		<link rel="stylesheet" href="/smkn1bojonggede/vendor/theme/style.css" />
		<link rel="shortcut icon" href="/smkn1bojonggede/img/icon/icon-96.png" />
	</head>
	
	<body id="page-top">
		<nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
			<div class="container d-flex justify-content-center">
				<div class="p-0">
					<a class="navbar-brand" href="/smkn1bojonggede/">
						<img src="/smkn1bojonggede/img/logo/smkn1.png" class="d-inline-block align-top" alt="" width="200">
					</a>
				</div>
				<div class="ml-auto d-none d-lg-block position-relative border-right pl-5 pr-4">
					<i class="fas fa-fw fa-envelope fa-2x position-absolute" style="left:0;top:5px"></i>
					<span class="font-weight-bold">Email</span><br>
					<a href="mailto:contact@smkn1bojonggede.sch.id" target="_blank" class="text-dark">
						<small>contact@smkn1bojonggede.sch.id</small>
					</a>
				</div>
				<div class="d-none d-lg-block position-relative pl-5 ml-4">
					<i class="fas fa-fw fa-phone fa-2x position-absolute" style="left:0;top:5px"></i>
					<span class="font-weight-bold">Telepon</span><br>
					<a href="tel:+62251-8551-934" class="text-dark">
						<small>(0251) 8551 934</small>
					</a>
				</div>
			</div>
		</nav>
		<nav class="navbar navbar-expand-xl navbar-light bg-light border-bottom py-3" id="navigation">
			<div class="container">
				<div class="font-weight-bold d-xl-none">Menu</div>
				<button class="navbar-toggler" style="border:none;outline:none;" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
					<i id="nav-icon" class="fas fa-bars"></i>
				</button>
				<div class="collapse navbar-collapse" id="navbarToggler">
					<ul class="navbar-nav mt-2 mt-lg-0 font-weight-bold">
						<li class="nav-item mr-3">
							<a class="nav-link" href="/smkn1bojonggede/">Beranda</a>
						</li>
						<li class="nav-item mr-3 dropdown dmenu">
							<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Tentang</a>
							<div class="dropdown-menu sm-menu">
								<a class="dropdown-item" href="/smkn1bojonggede/page/tentang/sejarah">Sejarah</a>
								<a class="dropdown-item" href="/smkn1bojonggede/page/tentang/visi-misi">Visi & Misi</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="/smkn1bojonggede/page/tentang/guru-staff">Guru & Staff</a>
							</div>
						</li>
						<li class="nav-item mr-3 dropdown dmenu">
							<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Kesiswaan</a>
							<div class="dropdown-menu sm-menu">
								<a class="dropdown-item" href="/smkn1bojonggede/page/kesiswaan/informasi-ppdb">Informasi PPDB</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="/smkn1bojonggede/page/kesiswaan/ekstrakulikuler">Ekstrakulikuler</a>
								<a class="dropdown-item" href="/smkn1bojonggede/page/kesiswaan/kegiatan">Kegiatan</a>
								<a class="dropdown-item" href="/smkn1bojonggede/page/kesiswaan/prestasi-sekolah">Prestasi Sekolah</a>
								<a class="dropdown-item" href="/smkn1bojonggede/page/kesiswaan/prestasi-siswa">Prestasi Siswa</a>
							</div>
						</li>
						<li class="nav-item mr-3 dropdown dmenu">
							<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Kompetensi Keahlian</a>
							<div class="dropdown-menu sm-menu">
								<a class="dropdown-item" href="/smkn1bojonggede/page/kompetensi-keahlian/akuntansi">Akuntansi</a>
								<a class="dropdown-item" href="/smkn1bojonggede/page/kompetensi-keahlian/jasa-boga">Jasa Boga</a>
								<a class="dropdown-item" href="/smkn1bojonggede/page/kompetensi-keahlian/perhotelan">Perhotelan</a>
								<a class="dropdown-item" href="/smkn1bojonggede/page/kompetensi-keahlian/multimedia">Multimedia</a>
								<a class="dropdown-item" href="/smkn1bojonggede/page/kompetensi-keahlian/usaha-perjalanan-wisata">Usaha Perjalanan Wisata</a>
							</div>
						</li>
						<li class="nav-item mr-3 dropdown dmenu">
							<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Sarana & Prasarana</a>
							<div class="dropdown-menu sm-menu">
								<a class="dropdown-item" href="/smkn1bojonggede/page/sarana-prasarana/laboratorium">Laboratorium</a>
								<a class="dropdown-item" href="/smkn1bojonggede/page/sarana-prasarana/ruang-belajar">Ruang Pembelajaran</a>
								<a class="dropdown-item" href="/smkn1bojonggede/page/sarana-prasarana/lingkungan">Lingkungan Sekolah</a>
							</div>
						</li>
						<li class="nav-item mr-3">
							<a class="nav-link" href="/smkn1bojonggede/page/kurikulum">Kurikulum</a>
						</li>
						<li class="nav-item mr-3">
							<a class="nav-link" href="/smkn1bojonggede/page/hubin">Hubin</a>
						</li>
						<li class="nav-item mr-3">
							<a class="nav-link" href="/smkn1bojonggede/page/alumni">Alumni</a>
						</li>
						<li class="nav-item d-xl-none">
							<a class="nav-link" href="/smkn1bojonggede/page/contact">Hubungi Kami</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		
		<div id="responsiveNav"></div>
		
		<section id="news" class="pt-5">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<h2 id="title" class="font-weight-bold m-0"></h2>
						<small class="date">SMKN 1 Bojonggede | <font id="date"></font></small>
						
						<div class="mt-2">
							<a href="" class="fb mr-2" title="Bagikan ke Facebook">
								<i class="fab fa-facebook-square fa-2x"></i>
							</a>
							<a href="" class="tw mr-2" title="Bagikan ke Twitter">
								<i class="fab fa-twitter-square fa-2x"></i>
							</a>
							<!--<a href="" class="wa" title="Bagikan ke WhatsApp">
								<i class="fab fa-whatsapp-square fa-2x"></i>
							</a>-->
						</div>
						
						<div id="image"></div>
						<small class="font-italic"></small>
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
		
		<footer class="page-footer overlay" id="footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-sm-12 pr-5 pb-5">
						<a href="/smkn1bojonggede/">
							<img src="/smkn1bojonggede/img/logo/smkn1-white.png" width="200" />
						</a>
						<p class="pt-3">
							Merupakan sekolah menengah kejuruan negeri yang memiliki 5 kompetensi keahlian, yaitu: 
							Akuntansi, Perhotelan, Jasa Boga, Multimedia dan Usaha Perjalanan Wisata.
						</p>
						<p>
							<i class="fa fa-fw fa-phone"></i>
							<a href="tel:+62251-8551-934">(0251) 8551 934</a>
						</p>
						<p>
							<i class="fa fa-fw fa-envelope"></i>
							<a href="mailto:contact@smkn1bojonggede.sch.id" target="_blank">contact@smkn1bojonggede.sch.id</a>
						</p>
						<p>
							<i class="fa fa-fw fa-home"></i>
							Jl. Raya Perum Pura Bojonggede, Kp.Cipeucang, Desa Cimanggis, Bojonggede, Bogor
						</p>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 pb-5">
						<h6 class="font-weight-bold pb-2">Kompetensi Keahlian</h6>
						<p>
							<i class="fa fa-fw fa-angle-right"></i>
							<a href="#">Akuntansi</a>
						</p>
						<p>
							<i class="fa fa-fw fa-angle-right"></i>
							<a href="#">Jasa Boga</a>
						</p>
						<p>
							<i class="fa fa-fw fa-angle-right"></i>
							<a href="#">Perhotelan</a>
						</p>
						<p>
							<i class="fa fa-fw fa-angle-right"></i>
							<a href="#">Multimedia</a>
						</p>
						<p>
							<i class="fa fa-fw fa-angle-right"></i>
							<a href="#">Usaha Perjalanan Wisata</a>
						</p>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-6 pb-5">
						<h6 class="font-weight-bold pb-2">Tautan Terkait</h6>
						<p>
							<i class="fa fa-fw fa-angle-right"></i>
							<a href="#">Informasi PPDB</a>
						</p>
						<p>
							<i class="fa fa-fw fa-angle-right"></i>
							<a href="#">Kurikulum</a>
						</p>
						<p>
							<i class="fa fa-fw fa-angle-right"></i>
							<a href="#">Hubin</a>
						</p>
						<p>
							<i class="fa fa-fw fa-angle-right"></i>
							<a href="#">Kegiatan</a>
						</p>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-6 pb-5">
						<h6 class="font-weight-bold pb-2">Sosial Media</h6>
						<p>
							<i class="fab fa-fw fa-facebook-square"></i>
							<a href="#" target="_blank">Facebook</a>
						</p>
						<p>
							<i class="fab fa-fw fa-instagram"></i>
							<a href="#" target="_blank">Instagram</a>
						</p>
						<p>
							<i class="fab fa-fw fa-twitter"></i>
							<a href="#" target="_blank">Twitter</a>
						</p>
					</div>
				</div>
			</div>
		</footer>
		<div class="footer-copyright text-center">
			<small>
				2019 &copy; <a href="https://smkn1bojonggede.sch.id"> smkn1bojonggede.sch.id</a>
			</small>
		</div>
		
		<script type="text/javascript" src="/smkn1bojonggede/vendor/jquery/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="/smkn1bojonggede/vendor/owlcarousel/owl.carousel.min.js"></script>
		<script type="text/javascript" src="/smkn1bojonggede/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/smkn1bojonggede/vendor/theme/main.js"></script>
		<script type="text/javascript" src="/smkn1bojonggede/vendor/theme/apiBeritaDetail.js"></script>
		<script type="text/javascript" src="/smkn1bojonggede/vendor/theme/apiBeritaLainnya.js"></script>
	</body>
</html>