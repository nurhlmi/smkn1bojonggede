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
		
		<title class="title">MPLS 2019/2020</title>
		
		<link rel="stylesheet" href="/smkn1bojonggede/vendor/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/smkn1bojonggede/vendor/fontawesome/css/all.min.css" />
		<link rel="stylesheet" href="/smkn1bojonggede/vendor/owlcarousel/assets/owl.carousel.min.css" />
		<link rel="stylesheet" href="/smkn1bojonggede/vendor/owlcarousel/assets/owl.theme.default.min.css" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" />
		<link rel="stylesheet" href="/smkn1bojonggede/vendor/theme/style.css" />
		<link rel="shortcut icon" href="/smkn1bojonggede/img/icon/icon-96.png" />
	</head>
	
	<body id="page-top">
		<?php require "../../page/navigation.php"; ?>
		
		<div id="responsiveNav"></div>
		
		<section id="news" class="pt-5">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<h2 class="title font-weight-bold m-0">MPLS 2019/2020</h2>
						<small class="date">SMKN 1 Bojonggede | <font id="date">Senin, 15 Juli 2019</font></small>
						
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
						
						<div id="image">
							<img src="/smkn1bojonggede/img/news/sambutan-kepala-sekolah.jpg" width="100%" class="img-fluid pt-3 pb-1">
						</div>
						<small id="image_description" class="font-italic">
							Sambutan Kepala Sekolah SMKN 1 Bojonggede, Bapak Dadan Supriatno S.ST pada acara pembukaan MPLS 2019/2020.
						</small>
						
						<div id="description" class="mt-5">
							<p>TRIBUNNEWSBOGOR.COM, TAJUR HALANG - H-1 penutupan PPDB 2019, Sekolah Menengah Kejuruan Negeri (SMKN) 1 Bojonggede telah menyerap 478 pendaftar.
							<p>Ketua PPDB 2019 SMKN 1 Bojonggede, Dewi mengatakan bahwa jumlah tersebut akan terus bertambah hingga PPDB 2019 resmi ditutup pada Sabtu 26 Juni 2019.
							<p>Diketahui, SMK N 1 Bojonggede membuka pendaftaran dengan 5 kompetensi keahlian di antaranya Perhotelan, Tata Boga, Usaha Perjalanan Wisata, Akuntansi dan Multimedia.
							<p>"Sampai hari ini jumlah pendaftar yang masuk ke kita itu sudah mencapai 478. Untuk 5 kompetensi keahlian. 5 kompetensi itu adalah perhotelan, tata boga, usaha perjalanan wisata ini ada 3 jurusan di bidang pariwisata, ada akuntansi, kemudian yang kelima itu Multimedia," ujarnya kepada TribunnewsBogor.com, Jumat (22/6/2019).
							<p>Sementara, proses PPDB 2019 di SMK N 1 Bojonggede berjalan dengan tertib dan lancar.
							<p>Hal itu tak terlepas dari gencarnya sosialisasi dan edukasi yang dilakukan pihak sekolah dalam memberikan informasi seputar PPDB sekaligus jurusan kompetensi keahlian yang terdapat di sekolah SMK N 1 Bojonggede.
							<p>"Sebelum PPDB 2019 ini dimulai, kita sudah membuat spanduk, banner, pamflet informasi bahwa PPDB 2019 akan dimulai pada sekian. Tapi sebelum PPDB itu kita lakukan sosialisasi. Sosialisasi yang kami lakukan itu 2 hari. Sosialisasi ini kita pisahkan, untuk pariwisata 3 jurusan itu satu hari terus satu hari kemudian untuk akuntansi dan multimedia,"
							<p>"Sebelum sosialisasi, kita terlebih dahulu melakukan pendataan di pos keamanan, siapa yang berkeinginan untuk mendaftar ke Bojonggede, mereka menulis data sementara. Data sementara itu kami gunakan untuk mengundang mereka by Sms dan WA untuk hadir saat sosialisasi itu dilaksanakan," sambungnya.
							<p>Tak hanya itu, guna menghindari penumpukan pendaftar diarea sekolah, SMK N 1 Bojonggede membatasi jumlah pendaftar untuk per harinya.
							<p>"Agar tidak ada penumpukan kami memang membatasi untuk pendaftaran per harinya. Pintu masuk pun dibagi-bagi berdasarkan kompetensi yang disediakan. Satu hari itu kami batasi 150 orang pendaftar. Itu kami lakukan supaya terukur," pungkasnya.
						</div>
						<input id="code" type="hidden" value="<?php echo $code; ?>" />
					</div>
					<div class="col-lg-4 mt-5 pt-5">
						<h6 class="font-weight-bold text-uppercase">Berita Lainnya</h6>
						<div class="dropdown-divider pb-2"></div>
						<div class="row" id="dataBeritaLainnya">
							<div class="col-12 pb-3">
								<a href="" class="news-more">
									<div class="row">
										<div class="col-5 pr-0">
											<div class="news-more-img" style="background-image:url('/smkn1bojonggede/img/news/ppdb-2019.jpg')"></div>
										</div>
										<div class="col-7 pl-0">
											<div class="font-weight-bold pl-2">
												<span>PPDB SMKN 1 Bojonggede 2019/2020</span>
												<br><small class="date">Jumat, 21 Juni 2019</small>
											</div>
										</div>
									</div>
								</a>
							</div>
							<div class="col-12 pb-3">
								<a href="" class="news-more">
									<div class="row">
										<div class="col-5 pr-0">
											<div class="news-more-img" style="background-image:url('/smkn1bojonggede/img/news/job-fair-and-edu-fair-2019.jpeg')"></div>
										</div>
										<div class="col-7 pl-0">
											<div class="font-weight-bold pl-2">
												<span>Job Fair And Edu Fair 2019</span>
												<br><small class="date">Jumat, 21 Juni 2019</small>
											</div>
										</div>
									</div>
								</a>
							</div>
							<div class="col-12 pb-3">
								<a href="" class="news-more">
									<div class="row">
										<div class="col-5 pr-0">
											<div class="news-more-img" style="background-image:url('/smkn1bojonggede/img/news/toeic5.jpg')"></div>
										</div>
										<div class="col-7 pl-0">
											<div class="font-weight-bold pl-2">
												<span>Pelaksanaan Seleksi VIERA (TOEIC) 2019</span>
												<br><small class="date">Jumat, 21 Juni 2019</small>
											</div>
										</div>
									</div>
								</a>
							</div>
							<div class="col-12 pb-3">
								<a href="" class="news-more">
									<div class="row">
										<div class="col-5 pr-0">
											<div class="news-more-img" style="background-image:url('/smkn1bojonggede/img/news/siswa-pkl-menerima-honesty-award-2.jpg')"></div>
										</div>
										<div class="col-7 pl-0">
											<div class="font-weight-bold pl-2">
												<span>Award Amnesti Siswa PKL</span>
												<br><small class="date">Senin, 15 Juli 2019</small>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
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