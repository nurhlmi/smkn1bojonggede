<?php
	$path = $_SERVER['PHP_SELF'];
	
	if($path == "/smkn1bojonggede/index.php") {
		$title = "SMK Negeri 1 Bojonggede";
	}
	
	// Berita
	else if($path == "/smkn1bojonggede/page/berita/detail.php") {
		$title = "Berita";
	}
	
	// Tentang
	else if($path == "/smkn1bojonggede/page/tentang/profil-sekolah.php") {
		$title = "Profil Sekolah";
	}
	else if($path == "/smkn1bojonggede/page/tentang/guru-tata-usaha.php") {
		$title = "Guru & TU";
	}
	
	// Galeri
	else if($path == "/smkn1bojonggede/page/galeri/foto.php") {
		$title = "Foto";
	}
	else if($path == "/smkn1bojonggede/page/galeri/video.php") {
		$title = "Video";
	}
	
	// Kesiswaan
	else if($path == "/smkn1bojonggede/page/kesiswaan/ekstrakulikuler.php") {
		$title = "Ekstrakulikuler";
	}
	else if($path == "/smkn1bojonggede/page/kesiswaan/data-siswa.php") {
		$title = "Data Siswa";
	}
	else if($path == "/smkn1bojonggede/page/kesiswaan/prestasi.php") {
		$title = "Prestasi";
	}
	
	// Kompetensi Keahlian
	else if($path == "/smkn1bojonggede/page/kompetensi-keahlian/akuntansi.php") {
		$title = "Akuntansi";
	}
	else if($path == "/smkn1bojonggede/page/kompetensi-keahlian/jasa-boga.php") {
		$title = "Jasa Boga";
	}
	else if($path == "/smkn1bojonggede/page/kompetensi-keahlian/akomodasi-perhotelan.php") {
		$title = "Akomodasi Perhotelan";
	}
	else if($path == "/smkn1bojonggede/page/kompetensi-keahlian/multimedia.php") {
		$title = "Multimedia";
	}
	else if($path == "/smkn1bojonggede/page/kompetensi-keahlian/usaha-perjalanan-wisata.php") {
		$title = "Usaha Perjalanan Wisata";
	}
	
	// Sarana & Prasarana
	else if($path == "/smkn1bojonggede/page/sarana-prasarana.php") {
		$title = "Sarana & Prasarana";
	}
	
	// Kurikulum
	else if($path == "/smkn1bojonggede/page/kurikulum/struktur.php") {
		$title = "Struktur";
	}
	else if($path == "/smkn1bojonggede/page/kurikulum/pembelajaran.php") {
		$title = "Pembelajaran";
	}
	else if($path == "/smkn1bojonggede/page/kurikulum/penilaian.php") {
		$title = "Penilaian";
	}
	
	// Hubin
	else if($path == "/smkn1bojonggede/page/hubin/bkk.php") {
		$title = "BKK";
	}
	else if($path == "/smkn1bojonggede/page/hubin/lsp.php") {
		$title = "LSP";
	}
	else if($path == "/smkn1bojonggede/page/hubin/teaching-factory.php") {
		$title = "Teaching Factory";
	}
	
	// Alumni
	else if($path == "/smkn1bojonggede/page/alumni.php") {
		$title = "Alumni";
	}
	
	// Kontak Kami
	else if($path == "/smkn1bojonggede/page/kontak.php") {
		$title = "Kontak Kami";
	}
?>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
	
	<title><?php echo $title; ?></title>
	
	<link rel="stylesheet" href="/smkn1bojonggede/vendor/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/smkn1bojonggede/vendor/fontawesome/css/all.min.css" />
	<link rel="stylesheet" href="/smkn1bojonggede/vendor/owlcarousel/assets/owl.carousel.min.css" />
	<link rel="stylesheet" href="/smkn1bojonggede/vendor/owlcarousel/assets/owl.theme.default.min.css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" />
	<link rel="stylesheet" href="/smkn1bojonggede/vendor/theme/style.css" />
	<link rel="shortcut icon" href="/smkn1bojonggede/img/icon/icon-96.png" />
</head>