<!Doctype HTML>
<html lang="id">
	<?php require "../head.php"; ?>
	
	<body id="page-top">
		<?php require "../navigation.php"; ?>
		
		<div id="responsiveNav"></div>
		
		<section id="video" class="pt-5">
			<div class="container">
				<h1 class="font-weight-bold text-center text-uppercase pb-4">Video</h1>
				
				<!--<div id="loader" class="row">
				    <div class="col-lg-4 offset-lg-4">
					    <img src="/smkn1bojonggede/img/loader.gif" class="img-fluid" />
				    </div>
				</div>-->
				
				<div id="dataVideo" class="row">
					<div class="col-md-4 col-sm-6 mb-4" data-toggle="modal" data-target="#video1">
						<img src="https://img.youtube.com/vi/x3bfa3DZ8JM/maxresdefault.jpg" class="rounded pointer" style="width:100%" />
					</div>
				</div>
				
				<div id="dataModal">
					<div class="modal fade" id="video1" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content">
								<iframe class="youtube-video" width="100%" height="450" 
								src="https://www.youtube.com/embed/x3bfa3DZ8JM?enablejsapi=1&version=3&playerapiid=ytplayer" 
								frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope" allowfullscreen>
								</iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<?php require "../footer.php"; ?>
		<!--<script type="text/javascript" src="/vendor/api/galeri-video.js"></script>-->
		<script type="text/javascript">
			$(document).ready(function(){
				$('.btn-secondary').click(function () {
					$('.youtube-video')[0].contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*');
				});
				$('.modal').click(function () {
					$('.youtube-video')[0].contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*');
				});
			});
		</script>
	</body>
</html>