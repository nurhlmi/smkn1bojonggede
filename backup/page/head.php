<?php
	$path = $_SERVER['PHP_SELF'];
	
	if($path == "/index.php") {
		$title = "SMK Negeri 1 Bojonggede";
	}
	
	// Berita
	else if($path == "/page/berita/detail.php") {
		$title = "Berita";
	}
	
	// Tentang
	else if($path == "/page/tentang/profil-sekolah.php") {
		$title = "Profil Sekolah";
	}
	else if($path == "/page/tentang/guru-tata-usaha.php") {
		$title = "Guru & TU";
	}
	
	// Galeri
	else if($path == "/page/galeri/foto.php") {
		$title = "Foto";
	}
	else if($path == "/page/galeri/video.php") {
		$title = "Video";
	}
	
	// Kesiswaan
	else if($path == "/page/kesiswaan/ekstrakulikuler.php") {
		$title = "Ekstrakulikuler";
	}
	else if($path == "/page/kesiswaan/data-siswa.php") {
		$title = "Data Siswa";
	}
	else if($path == "/page/kesiswaan/prestasi.php") {
		$title = "Prestasi";
	}
	
	// Kompetensi Keahlian
	else if($path == "/page/kompetensi-keahlian/akuntansi.php") {
		$title = "Akuntansi";
	}
	else if($path == "/page/kompetensi-keahlian/jasa-boga.php") {
		$title = "Jasa Boga";
	}
	else if($path == "/page/kompetensi-keahlian/akomodasi-perhotelan.php") {
		$title = "Akomodasi Perhotelan";
	}
	else if($path == "/page/kompetensi-keahlian/multimedia.php") {
		$title = "Multimedia";
	}
	else if($path == "/page/kompetensi-keahlian/usaha-perjalanan-wisata.php") {
		$title = "Usaha Perjalanan Wisata";
	}
	
	// Sarana & Prasarana
	else if($path == "/page/sarana-prasarana.php") {
		$title = "Sarana & Prasarana";
	}
	
	// Kurikulum
	else if($path == "/page/kurikulum/struktur.php") {
		$title = "Struktur";
	}
	else if($path == "/page/kurikulum/pembelajaran.php") {
		$title = "Pembelajaran";
	}
	else if($path == "/page/kurikulum/penilaian.php") {
		$title = "Penilaian";
	}
	
	// Hubin
	else if($path == "/page/hubin/bkk.php") {
		$title = "BKK";
	}
	else if($path == "/page/hubin/lsp.php") {
		$title = "LSP";
	}
	else if($path == "/page/hubin/teaching-factory.php") {
		$title = "Teaching Factory";
	}
	
	// Alumni
	else if($path == "/page/alumni.php") {
		$title = "Alumni";
	}
	
	// Kontak Kami
	else if($path == "/page/kontak.php") {
		$title = "Kontak Kami";
	}
?>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
	
	<title><?php echo $title; ?></title>
	
	<link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/vendor/fontawesome/css/all.min.css" />
	<link rel="stylesheet" href="/vendor/owlcarousel/assets/owl.carousel.min.css" />
	<link rel="stylesheet" href="/vendor/owlcarousel/assets/owl.theme.default.min.css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" />
	<link rel="stylesheet" href="/vendor/theme/style.css" />
	<link rel="shortcut icon" href="/img/icon/icon-96.png" />
</head>