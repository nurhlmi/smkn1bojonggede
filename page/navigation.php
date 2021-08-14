<?php
	$path = $_SERVER['PHP_SELF'];
	
	// Beranda
	if($path == "/smkn1bojonggede/index.php") {
		$beranda = '<li class="nav-item active mr-3"><a class="nav-link" href="#">Beranda</a></li>';
	} else {
		$beranda = '<li class="nav-item mr-3"><a class="nav-link" href="/smkn1bojonggede/">Beranda</a></li>';
	}
	
	// Tentang
	if($path == "/smkn1bojonggede/page/tentang/profil-sekolah.php") {
		$profil = '<a class="dropdown-item active" href="#">Profil Sekolah</a>';
	} else {
		$profil = '<a class="dropdown-item" href="/smkn1bojonggede/page/tentang/profil-sekolah">Profil Sekolah</a>';
	}
	
	if($path == "/smkn1bojonggede/page/tentang/guru-tata-usaha.php") {
		$guru = '<a class="dropdown-item active" href="#">Guru & TU</a>';
	} else {
		$guru = '<a class="dropdown-item" href="/smkn1bojonggede/page/tentang/guru-tata-usaha">Guru & TU</a>';
	}
	
	// Galeri
	if($path == "/smkn1bojonggede/page/galeri/foto.php") {
		$foto = '<a class="dropdown-item active" href="#">Foto</a>';
	} else {
		$foto = '<a class="dropdown-item" href="/smkn1bojonggede/page/galeri/foto">Foto</a>';
	}
	
	if($path == "/smkn1bojonggede/page/galeri/video.php") {
		$video = '<a class="dropdown-item active" href="#">Video</a>';
	} else {
		$video = '<a class="dropdown-item" href="/smkn1bojonggede/page/galeri/video">Video</a>';
	}
	
	// Kesiswaan
	if($path == "/smkn1bojonggede/page/kesiswaan/ekstrakulikuler.php") {
		$ekskul = '<a class="dropdown-item active" href="#">Ekstrakulikuler</a>';
	} else {
		$ekskul = '<a class="dropdown-item" href="/smkn1bojonggede/page/kesiswaan/ekstrakulikuler">Ekstrakulikuler</a>';
	}
	
	if($path == "/smkn1bojonggede/page/kesiswaan/data-siswa.php") {
		$datasiswa = '<a class="dropdown-item active" href="#">Data Siswa</a>';
	} else {
		$datasiswa = '<a class="dropdown-item" href="/smkn1bojonggede/page/kesiswaan/data-siswa">Data Siswa</a>';
	}
	
	if($path == "/smkn1bojonggede/page/kesiswaan/prestasi.php") {
		$prestasi = '<a class="dropdown-item active" href="#">Prestasi</a>';
	} else {
		$prestasi = '<a class="dropdown-item" href="/smkn1bojonggede/page/kesiswaan/prestasi">Prestasi</a>';
	}
	
	// Kompetensi Keahlian
	if($path == "/smkn1bojonggede/page/kompetensi-keahlian/akuntansi.php") {
		$ak = '<a class="dropdown-item active" href="#">Akuntansi</a>';
	} else {
		$ak = '<a class="dropdown-item" href="/smkn1bojonggede/page/kompetensi-keahlian/akuntansi">Akuntansi</a>';
	}
	
	if($path == "/smkn1bojonggede/page/kompetensi-keahlian/jasa-boga.php") {
		$jb = '<a class="dropdown-item active" href="#">Jasa Boga</a>';
	} else {
		$jb = '<a class="dropdown-item" href="/smkn1bojonggede/page/kompetensi-keahlian/jasa-boga">Jasa Boga</a>';
	}
	
	if($path == "/smkn1bojonggede/page/kompetensi-keahlian/multimedia.php") {
		$mm = '<a class="dropdown-item active" href="#">Multimedia</a>';
	} else {
		$mm = '<a class="dropdown-item" href="/smkn1bojonggede/page/kompetensi-keahlian/multimedia">Multimedia</a>';
	}
	
	if($path == "/smkn1bojonggede/page/kompetensi-keahlian/akomodasi-perhotelan.php") {
		$aph = '<a class="dropdown-item active" href="#">Akomodasi Perhotelan</a>';
	} else {
		$aph = '<a class="dropdown-item" href="/smkn1bojonggede/page/kompetensi-keahlian/akomodasi-perhotelan">Akomodasi Perhotelan</a>';
	}
	
	if($path == "/smkn1bojonggede/page/kompetensi-keahlian/usaha-perjalanan-wisata.php") {
		$upw = '<a class="dropdown-item active" href="#">Usaha Perjalanan Wisata</a>';
	} else {
		$upw = '<a class="dropdown-item" href="/smkn1bojonggede/page/kompetensi-keahlian/usaha-perjalanan-wisata">Usaha Perjalanan Wisata</a>';
	}
	
	// Sarana & Prasarana
	if($path == "/smkn1bojonggede/page/sarana-prasarana.php") {
		$sapras = '<li class="nav-item active mr-3"><a class="nav-link" href="#">Sarana & Prasarana</a></li>';
	} else {
		$sapras = '<li class="nav-item mr-3"><a class="nav-link" href="/smkn1bojonggede/page/sarana-prasarana">Sarana & Prasarana</a></li>';
	}
	
	// Kurikulum
	if($path == "/smkn1bojonggede/page/kurikulum/struktur.php") {
		$struktur = '<a class="dropdown-item active" href="#">Struktur</a>';
	} else {
		$struktur = '<a class="dropdown-item" href="/smkn1bojonggede/page/kurikulum/struktur">Struktur</a>';
	}
	
	if($path == "/smkn1bojonggede/page/kurikulum/pembelajaran.php") {
		$pembelajaran = '<a class="dropdown-item active" href="#">Pembelajaran</a>';
	} else {
		$pembelajaran = '<a class="dropdown-item" href="/smkn1bojonggede/page/kurikulum/pembelajaran">Pembelajaran</a>';
	}
	
	if($path == "/smkn1bojonggede/page/kurikulum/penilaian.php") {
		$penilaian = '<a class="dropdown-item active" href="#">Penilaian</a>';
	} else {
		$penilaian = '<a class="dropdown-item" href="/smkn1bojonggede/page/kurikulum/penilaian">Penilaian</a>';
	}
	
	// Hubin
	if($path == "/smkn1bojonggede/page/hubin/bkk.php") {
		$bkk = '<a class="dropdown-item active" href="#">BKK</a>';
	} else {
		$bkk = '<a class="dropdown-item" href="/smkn1bojonggede/page/hubin/bkk">BKK</a>';
	}
	
	if($path == "/smkn1bojonggede/page/hubin/lsp.php") {
		$lsp = '<a class="dropdown-item active" href="#">LSP</a>';
	} else {
		$lsp = '<a class="dropdown-item" href="/smkn1bojonggede/page/hubin/lsp">LSP</a>';
	}
	
	if($path == "/smkn1bojonggede/page/hubin/teaching-factory.php") {
		$tf = '<a class="dropdown-item active" href="#">Teaching Factory</a>';
	} else {
		$tf = '<a class="dropdown-item" href="/smkn1bojonggede/page/hubin/teaching-factory">Teaching Factory</a>';
	}
	
	// Alumni
	if($path == "/smkn1bojonggede/page/alumni.php") {
		$alumni = '<li class="nav-item mr-3 active"><a class="nav-link" href="#">Alumni</a></li>';
	} else {
		$alumni = '<li class="nav-item mr-3"><a class="nav-link" href="/smkn1bojonggede/page/alumni">Alumni</a></li>';
	}
	
	// Kontak Kami
	if($path == "/smkn1bojonggede/page/kontak.php") {
		$kontak = '<li class="nav-item d-lg-none active"><a class="nav-link" href="#">Kontak Kami</a></li>';
	} else {
		$kontak = '<li class="nav-item d-lg-none"><a class="nav-link" href="/smkn1bojonggede/page/kontak">Kontak Kami</a></li>';
	}
?>
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
				<?php echo $beranda; ?>
				<li class="nav-item mr-3 dropdown dmenu">
					<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Tentang</a>
					<div class="dropdown-menu sm-menu">
						<?php echo $profil; ?>
						<?php echo $guru; ?>
					</div>
				</li>
				<li class="nav-item mr-3 dropdown dmenu">
					<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Galeri</a>
					<div class="dropdown-menu sm-menu">
						<?php echo $foto; ?>
						<?php echo $video; ?>
					</div>
				</li>
				<li class="nav-item mr-3 dropdown dmenu">
					<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Kesiswaan</a>
					<div class="dropdown-menu sm-menu">
						<?php echo $ekskul; ?>
						<?php echo $datasiswa; ?>
						<?php echo $prestasi; ?>
					</div>
				</li>
				<li class="nav-item mr-3 dropdown dmenu">
					<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Kompetensi Keahlian</a>
					<div class="dropdown-menu sm-menu">
						<?php echo $ak; ?>
						<?php echo $jb; ?>
						<?php echo $mm; ?>
						<?php echo $aph; ?>
						<?php echo $upw; ?>
					</div>
				</li>
				<?php echo $sapras; ?>
				<li class="nav-item mr-3 dropdown dmenu">
					<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Kurikulum</a>
					<div class="dropdown-menu sm-menu">
						<?php echo $pembelajaran; ?>
						<?php echo $penilaian; ?>
						<?php echo $struktur; ?>
					</div>
				</li>
				<li class="nav-item mr-3 dropdown dmenu">
					<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Hubin</a>
					<div class="dropdown-menu sm-menu">
						<?php echo $bkk; ?>
						<?php echo $lsp; ?>
						<?php echo $tf; ?>
					</div>
				</li>
				<?php echo $kontak; ?>
			</ul>
		</div>
	</div>
</nav>