<!Doctype HTML>
<html lang="id">
	<?php require "page/head.php"; ?>
	
	<body id="page-top">
		<?php require "page/navigation.php"; ?>
		
		<div id="responsiveNav"></div>
		
		<section id="slider" class="mb-0">
			<div class="banner">
				<div class="owl-carousel owl-theme" id="owl-slide">
					<?php for($i=1;$i<3;$i++) { ?>
					<div class="item">
						<div class="slider overlay" style="background-image: url('img/slider/<?php echo $i; ?>.jpg')">
							<div class="container">
								<div class="row">
									<div class="col-md-8">
										<div class="text-white">
											<h1 class="font-weight-bold pb-4">MPLS 2019/2020</h1>
											<p>
												Masa Pengenalan Lingkungan Sekolah (MPLS), juga dikenal sebagai Masa Orientasi Siswa (MOS) atau 
												Masa Orientasi Peserta Didik Baru (MOPD), merupakan sebuah kegiatan yang umum dilaksanakan di 
												SMKN 1 Bojonggede setiap awal tahun ajaran guna menyambut kedatangan para peserta didik baru.
											</p>
											<div class="pt-4">
												<a href="page/berita/?read=10" target="_blank">
													<button class="button button-primary">Selengkapnya</button>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</section>

		<section id="pas" class="pt-5">
			<div class="container text-center">
				<h2 class="font-weight-bold">Penilaian Akhir Semester</h2>
				<span class="text-muted">Uji coba Penilaian Akhir Semester (PAS). Klik untuk mengikuti ujian.</span>
				<div class="row py-5">
					<div class="col-md-4 offset-md-2 col-6">
						<a href="https://docs.google.com/forms/d/e/1FAIpQLSdM3ctl1L8RBuVW6jlsebiO380-FRLSGKD597qmAad_dm41lg/viewform" target="_blank">
							<div class="card">
								<div class="card-body">
									<i class="fa fa-user fa-3x"></i>
									<h4 class="font-weight-bold pt-4">Kelas X</h4>
									<p class="text-muted">Mata pelajaran: SIMDIG</p>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-4 col-6">
						<a href="https://docs.google.com/forms/d/1GrtH9H4Hjp65iFN_mAGBGON9TPUkOWzx2ygQ0KoF2m0/viewform?edit_requested=true&fbzx=-7512864680592026825" target="_blank">
							<div class="card">
								<div class="card-body">
									<i class="fa fa-user-friends fa-3x"></i>
									<h4 class="font-weight-bold pt-4">Kelas XI & Kelas XII</h4>
									<p class="text-muted">Mata pelajaran: B.Indonesia</p>
								</div>
							</div>
						</a>
					</div>
				</div>
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
							<a href="tentang/page/profil">
								<button class="button button-primary">Selengkapnya</button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<!--<section id="school">
			<div class="banner school-background overlay" style="background-image:url(img/perpisahaan.jpg)">
				<div class="container text-white">
					<div class="row">
						<div class="col-md-6 offset-md-1 col-12 py-5">
							<h1 class="pb-4">Survey Tempat Perpisahaan</h1>
							<p>Silahkan isi formulir ini dengan benar. Hasil vote terbanyak nantinya akan terpilih sebagai tempat perpisahaan.</p>
							<a href="https://drive.google.com/open?id=1XRVeYyo8HISdb3mc8o8AXV4tKA7YNHdXMuMaBuU-Bjg" target="_blank">
								<button class="button button-primary mt-4">Vote Sekarang</button>
							</a>
						</div>
						<div class="d-flex justify-content-center col-md-4 col-12 py-5">
							<div class="align-self-center">
								<i class="fas fa-graduation-cap fa-7x"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>-->
		
		<section id="school">
			<div class="banner school-background overlay">
				<div class="container text-center text-white">
					<div class="row">
						<div class="col-lg-3 col-6 py-5">
							<i class="fa fa-book-reader fa-3x"></i>
							<h1 class="pt-2 mb-0">100</h1>
							<span>Mata Pelajaran</span>
						</div>
						<div class="col-lg-3 col-6 py-5">
							<i class="fa fa-chalkboard-teacher fa-3x"></i>
							<h1 class="pt-2 mb-0">100</h1>
							<span>Guru Aktif</span>
						</div>
						<div class="col-lg-3 col-6 py-5">
							<i class="fa fa-users fa-3x"></i>
							<h1 class="pt-2 mb-0">1,000</h1>
							<span>Siswa & Siswi</span>
						</div>
						<div class="col-lg-3 col-6 py-5">
							<i class="fas fa-trophy fa-3x"></i>
							<h1 class="pt-2 mb-0">500</h1>
							<span>Piala Juara</span>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section id="news">
			<h1 class="font-weight-bold text-center text-uppercase pb-4 px-4">Berita Terbaru</h1>
			<div class="owl-carousel owl-theme" id="owl-news">
				<div class="item pb-3">
					<a href="page/berita/?read=1">
						<div class="card">
							<div class="card-head" style="background-image:url('img/news/sambutan-kepala-sekolah.jpg')"></div>
							<div class="card-body">
								<h6 class="font-weight-bold">MPLS 2019/2020</h6>
								<p class="card-text">Sambutan Kepala SMKN 1 Bojonggede Bapak Dadan Supriatno S.ST pada acara pembukaan MPLS 2019/2020.</p>
								<p class="card-text"><small class="text-muted">Senin, 15 Juli 2019</small></p>
							</div>
						</div>
					</a>
				</div>
				<div class="item pb-3">
					<a href="page/berita/?read=1">
						<div class="card">
							<div class="card-head" style="background-image:url('img/news/ppdb-2019.jpg')"></div>
							<div class="card-body">
								<h6 class="font-weight-bold">PPDB SMKN 1 Bojonggede 2019/2020</h6>
								<p class="card-text">H-1 penutupan PPDB 2019, SMK Negeri 1 Bojonggede telah menyerap 478 pendaftar.</p>
								<p class="card-text"><small class="text-muted">Jumat, 21 Juni 2019</small></p>
							</div>
						</div>
					</a>
				</div>
				<div class="item pb-3">
					<a href="page/berita/?read=1">
						<div class="card">
							<div class="card-head" style="background-image:url('img/news/job-fair-and-edu-fair-2019.jpeg')"></div>
							<div class="card-body">
								<h6 class="font-weight-bold">Job Fair dan Edu Fair 2019</h6>
								<p class="card-text">Sukses! Acara Job Fair dan Edu Fair SMK Negeri 1 Bojonggede berlangsung lancar dan meriah.</p>
								<p class="card-text"><small class="text-muted">Rabu, 6 Maret 2019</small></p>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="pt-4 text-center">
				<a href="page/berita/detail">
					<button class="button button-primary">Selengkapnya</button>
				</a>
			</div>
		</section>
		
		<?php require "page/footer.php"; ?>
		<!--<script type="text/javascript" src="/vendor/api/slider.js"></script>
		<script type="text/javascript" src="/vendor/api/tanggal.js"></script>
		<script type="text/javascript" src="/vendor/api/berita-beranda.js"></script>-->
	</body>
</html>