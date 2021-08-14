<!Doctype HTML>
<html lang="id">
	<?php require "../../page/head.php"; ?>
	
	<body id="page-top">
		<?php require "../../page/navigation.php"; ?>
		
		<div id="responsiveNav"></div>
		
		<section id="teacher" class="pt-5">
			<div class="container">
				<h1 class="font-weight-bold text-uppercase text-center pb-4">Guru & Staff</h1>
				<div class="row" id="dataTeacher">
					<div class="col-xl-3 col-lg-4 col-md-6 mb-4">
						<div class="card" data-toggle="modal" data-target="#exampleModalCenter" title="Klik untuk melihat deskripsi">
							<div class="card-head" style="background-image:url(/smkn1bojonggede/img/slider/1.jpg)"></div>
							<div class="card-body">
								<h6 class="font-weight-bold">Dadan Supriatno S.Pd</h6>
								<p class="card-text">Kepala Sekolah</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div id="dataModal">
				<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title font-weight-bold">Deskripsi</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<p>Lahir di Cianjur, Jawa Barat, 4 Juni 1964.</p>
								<p>Pendidikan&nbsp;dari SD-SMP diselesaikan di Cianjur. Kemudian SLTA di Bandung, sekolah di STM, tahun 1983, lalu melanjutkan kuliah ke IKIP Bandung (sekarang UPI), dan ke Politeknik TDC Bandung.</p>
								<p>Pertama bekerja sebagai PNS ditempatkan di Provinsi Banten, tahun 1995. Kemudian pindah ke Kota Bogor tahun 1999, mengabdikan diri di Dinas Pendidikan Kabupaten Bogor. Tahun 2012 ikut seleksi Kasek dan lulus 2 tahun kemudian, tepatnya tanggal 14 September 2014, lalu diberi amanah menjadi <u><strong>Kepala Sekolah&nbsp;SMKN 1 Bojonggede</strong></u>.</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<?php require "../../page/footer.php"; ?>
		<script type="text/javascript" src="/vendor/api/guru-staff.js"></script>
	</body>
</html>