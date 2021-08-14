<?php
/*------------------------------------------------------------------------
# jf_sybix! - JOOMFREAK.COM JOOMLA 3 TEMPLATE 
# August 2017
# ------------------------------------------------------------------------
# COPYRIGHT: (C) 2014 JOOMFREAK.COM / KREATIF GMBH
# LICENSE: Creative Commons Attribution
# AUTHOR: JOOMFREAK.COM
# WEBSITE: http://www.joomfreak.com - http://www.kreatif-multimedia.com
# EMAIL: info@joomfreak.com
-------------------------------------------------------------------------*/

defined('_JEXEC') or die;


$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$lang            = JFactory::getLanguage();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');
$menu      = $app->getMenu();
$active    = $menu->getItem($itemid);
$font 	   = $this->params->get('googleFont');
$latitude           = (float)$this->params->get( 'latitude', '' );
$longitude          = (float)$this->params->get( 'longitude', '' );
$markerdescription  = $this->params->get('markerdescription', '');

$doc->addScript($this->baseurl . '/templates/' . $this->template . '/scripts/js/bootstrap.min.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/scripts/js/isotope.pkgd.min.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/scripts/js/imagesloaded.min.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/scripts/js/owl.carousel.min.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/scripts/js/image-light-box.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/scripts/js/template.js');

// Add Stylesheets
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/bootstrap.min.css');
$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Montserrat:400,700');
$doc->addStyleSheet('https://fonts.googleapis.com/css?family=Poppins%7CArvo%7CLato%7COpen+Sans%3A300%2C400%2C600%2C700%2C800%26subset%3Dlatin%2Clatin-ext');
if($font == 'OpenSans')
	$doc->addStyleSheet('https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic');
if($font == 'Lato')
	$doc->addStyleSheet('https://fonts.googleapis.com/css?family=Lato:300,300italic,400,400italic,700,700italic,900,900italic');
if($font == 'PTSans')
	$doc->addStyleSheet('https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic');
if($font == 'SourceSansPro')
	$doc->addStyleSheet('https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,600,600italic,700,700italic');
if($font == 'Nobile')
	$doc->addStyleSheet('https://fonts.googleapis.com/css?family=Nobile:400,400italic,700,700italic');
if($font == 'Ubuntu')
	$doc->addStyleSheet('https://fonts.googleapis.com/css?family=Ubuntu:300,300italic,400,400italic,500,500italic,700,700italic');
if($font == 'IstokWeb')
	$doc->addStyleSheet('https://fonts.googleapis.com/css?family=Istok+Web:400,400italic,700,700italic');
if($font == 'Exo2')
	$doc->addStyleSheet('https://fonts.googleapis.com/css?family=Exo+2:400,400italic,500,500italic,600,600italic,700,700italic,800,800italic');

$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/font-awesome.min.css');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/owl.carousel.css');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/nivo-lightbox.css');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/template.css');

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Adjusting content width
if ($this->countModules('left') && $this->countModules('right')) {
	$span = "col-md-5";
} elseif ($this->countModules('left') && !$this->countModules('right')) {
	$span = "col-md-8";
} elseif (!$this->countModules('left') && $this->countModules('right')) {
	$span = "col-md-8";
} else {
	$span = "col-md-12";
}

if($view == 'productdetails') {
	$span = "col-md-12";
}

// Logo file or site title param
if ($this->params->get('logoOption') == 1 && $this->params->get('logoFile')) {
	$logo = '<img src="' . JUri::root() . $this->params->get('logoFile') . '" alt="' . $sitename . '" />';
} elseif ($this->params->get('logoOption') == 2 && $this->params->get('logoText')) {
	$logo = '<span class="site-title" title="' . $sitename . '">' . htmlspecialchars($this->params->get('logoText')) . '</span>';
} else {
	$logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />
	
	<?php // Font ?>
	<?php if($font == 'OpenSans') : ?>
	<style type="text/css">
		body {
			font-family: 'Open Sans', sans-serif;
		}
	</style>
	<?php endif; ?>
		
	<?php if($font == 'Lato') : ?>
	<style type="text/css">
		body {
			font-family: 'Lato', sans-serif;
		}
	</style>
	<?php endif; ?>
		
	<?php if($font == 'PTSans') : ?>
	<style type="text/css">
		body {
			font-family: 'PT Sans', sans-serif;
		}
	</style>
	<?php endif; ?>
		
	<?php if($font == 'SourceSansPro') : ?>
	<style type="text/css">
		body {
			font-family: 'Source Sans Pro', sans-serif;
		}
	</style>
	<?php endif; ?>
		
	<?php if($font == 'Nobile') : ?>
	<style type="text/css">
		body {
			font-family: 'Nobile', sans-serif;
		}
	</style>
	<?php endif; ?>
		
	<?php if($font == 'Ubuntu') : ?>
	<style type="text/css">
		body {
			font-family: 'Ubuntu', sans-serif;
		}
	</style>
	<?php endif; ?>
		
	<?php if($font == 'IstokWeb') : ?>
	<style type="text/css">
		body {
			font-family: 'Istok Web', sans-serif;
		}
	</style>
	<?php endif; ?>
		
	<?php if($font == 'Exo2') : ?>
	<style type="text/css">
		body {
			font-family: 'Exo 2', sans-serif;
		}
	</style>
	<?php endif; ?>
	
	<?php // Template color ?>
	<?php if ($this->params->get('templateColor')) : ?>
	<style type="text/css">		
		.property_info_header, .aboutproperty h3.module-title:before, .section .moduletable > h3:before, .location-detail #contact-part, .house-info-box, .drop_down_menu_btn:hover, .drop_down_menu_btn:focus, .drop_down_menu_btn:active, .drop_down_menu_outter ul, .drop_down_menu_outter ul:before, .breadcrumbs .banner-text, .menu .navbar-nav .nav-child, #amenities-content, .bolg_post_list > li:before, blockquote, div.itemCommentsForm form input#submitCommentButton, .accordion .catItemTitle a:before, .moduletable.contact, .btn-primary, div.div-icon-light-blue, div.div-icon-light-blue-small, .featureicon, .schedule_visit_btn:hover, .schedule_visit_btn:focus {
			background: <?php echo $this->params->get('templateColor'); ?>;
		}
		
		#simpleCcontactForm input[type=submit] {
			color: <?php echo $this->params->get('templateColor'); ?>;
		}
		
		.carousel-indicators .active {
			background-color: <?php echo $this->params->get('templateColor'); ?>;
			border-color: <?php echo $this->params->get('templateColor'); ?>;
		}
		
		.menu .nav.navbar-nav > li > a {
			color: <?php echo $this->params->get('menuColor'); ?>;
		}
		
		.menu .navbar-default .navbar-nav > .active > a, .menu .navbar-default .navbar-nav > .active > a:focus, .menu .navbar-default .navbar-nav > .active > a:hover, .menu .nav > li > a:hover {
			color: <?php echo $this->params->get('menuHoverColor'); ?>;
		}
	</style>
	<?php endif; ?>
	
	<?php if ($this->params->get('map')) : ?>
	<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/scripts/js/jquery.gmap.min.js"></script>
	<script src="http://maps.google.com/maps/api/js?key=AIzaSyBtzJDQVxlPUb0JAfn4I4dw8iqmhg0HUTY" type="text/javascript"></script>

	<script>
	jQuery(document).ready(function(){
		// Map Markers
		var mapMarkers = [{     
			latitude: <?php echo $latitude ?>,
			longitude: <?php echo $longitude ?>,
			popup: true,
			icon: { 
				image: "<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/map_marker.png",
				iconsize: [44,48],
				iconanchor: [12,46],
				infowindowanchor: [12, 0] 
			} 
		}];

		// Map Initial Location
		var initLatitude = <?php echo $latitude ?>;
		var initLongitude = <?php echo $longitude ?>;

		// Map Extended Settings
		var map = jQuery("#map").gMap({
			controls: {
				panControl: true,
				zoomControl: true,
				mapTypeControl: true,
				scaleControl: true,
				streetViewControl: true,
				overviewMapControl: true
			},
			scrollwheel: false,
			markers: mapMarkers,
			latitude: initLatitude,
			longitude: initLongitude,
			zoom: 12
		});
	});
	</script>
	<?php endif; ?>
	
	<!--[if lt IE 9]>
		<script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script>
	<![endif]-->
	
</head>

<body class="site 
	<?php if ($menu->getActive() == $menu->getDefault($lang->getTag())) echo 'home'; ?> 
	<?php if ($menu->getActive() == $menu->getDefault($lang->getTag()) && (($this->params->get('homepageLayout') == '1' && $menu->getParams( $active->id )->get( 'pageclass_sfx' ) != 'one-page-site') || ($this->params->get('homepageLayout') == '2' && $menu->getParams( $active->id )->get( 'pageclass_sfx' ) == 'home-variation'))) echo 'home-variation'; ?>
	<?php if((($menu->getActive() == $menu->getDefault($lang->getTag()) && $this->params->get('homepageLayout') == '2' && $menu->getParams( $active->id )->get( 'pageclass_sfx' ) != 'home-variation') || ($this->params->get('homepageLayout') == '1' && $menu->getParams( $active->id )->get( 'pageclass_sfx' ) == 'one-page-site'))) echo 'one-page-site'; ?>
	<?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '');
	echo ($this->direction == 'rtl' ? ' rtl' : '');
	?>">
	
	<?php if (($this->params->get('homepageLayout') == '1' && $menu->getParams( $active->id )->get( 'pageclass_sfx' ) != 'one-page-site') || ($this->params->get('homepageLayout') == '2' && ($menu->getParams( $active->id )->get( 'pageclass_sfx' ) == 'home-variation' || $menu->getActive() != $menu->getDefault($lang->getTag())))) { ?>
	<header>	
		<?php if ($this->countModules('slideshow')) : ?>
			<div class="slideshow">
				<jdoc:include type="modules" name="slideshow" style="none" />
			</div>
		<?php endif; ?>
		
		<?php if($menu->getActive() != $menu->getDefault($lang->getTag())) : ?>
		<div class="welcome_header">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<?php if($this->params->get('welcome')) : ?>
							<span class="welcome_line"><?php echo $this->params->get('welcomeText'); ?></span>
						<?php endif; ?>
					</div>
					<div class="col-sm-6 text-right">
						<?php if ($this->params->get('social') && ($this->params->get('twitterLink') != '' || $this->params->get('facebookLink') != '' || $this->params->get('pinterestLink') != '' || $this->params->get('googleLink') != '' || $this->params->get('youtubeLink') != '')) : ?>
						<ul class="welcome_header_menu">
								<?php if ($this->params->get('twitterIcon') && $this->params->get('twitterLink') != '') : ?>
								<li>
									<a class="social-icon twitter" title="Twitter" href="<?php echo $this->params->get('twitterLink'); ?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-twitter"><!--icon--></i></a>
								</li>
								<?php endif; ?>	
								<?php if ($this->params->get('facebookIcon') && $this->params->get('facebookLink') != '') : ?>
								<li>
									<a class="social-icon facebook" title="facebook" href="<?php echo $this->params->get('facebookLink'); ?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-facebook"><!--icon--></i></a>
								</li>
								<?php endif; ?>
								<?php if ($this->params->get('googleIcon') && $this->params->get('googleLink') != '') : ?>
								<li>
									<a class="social-icon google-plus" title="Google Plus" href="<?php echo $this->params->get('googleLink'); ?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-google-plus"><!--icon--></i></a>
								</li>
								<?php endif; ?>								
								<?php if ($this->params->get('pinterestIcon') && $this->params->get('pinterestLink') != '') : ?>
								<li>
									<a class="social-icon pinterest" title="pinterest" href="<?php echo $this->params->get('pinterestLink'); ?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-pinterest"><!--icon--></i></a>
								</li>
								<?php endif; ?>
								<?php if ($this->params->get('youtubeIcon') && $this->params->get('youtubeLink') != '') : ?>
								<li>
									<a class="social-icon youtube" title="Youtube" href="<?php echo $this->params->get('youtubeLink'); ?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-youtube-play"><!--icon--></i></a>
								</li>
								<?php endif; ?>	
						</ul>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
			
		<div class="header">			
			
			<div class="container">	
				<div class="menu">
					<nav class="navbar navbar-default">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="<?php echo $this->baseurl; ?>/">
								<?php echo $logo; ?>
							</a>
						</div>
							
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<jdoc:include type="modules" name="mainnav" style="none" />
						</div>
					</nav>
				</div>
				<?php if($this->params->get('callto') || $this->countModules('right-header')) : ?>
				<div class="contact_info">
					<jdoc:include type="modules" name="right-header" style="none" />
					<div class="contact_detail">
					  	<div class="phone_icon">
					  		<i class="fa fa-phone"></i>
					  	</div>
					  	<div class="phone_number">
					  		<h5><?php echo $this->params->get('callusnowlabel'); ?></h5>
					  		<h2><?php echo $this->params->get('phoneNumber'); ?></h2>
					  	</div>
					</div>
				</div>
				<?php endif; ?>
				<?php if ($menu->getActive() == $menu->getDefault($lang->getTag()) && $this->countModules('property-info-header')) : ?>
				<div class="property_info_header">
					<jdoc:include type="modules" name="property-info-header" style="none" />
				</div>
				<?php endif; ?>
			</div>
		</div>
	</header>
	<?php } ?>
	
	<?php if(($menu->getActive() == $menu->getDefault($lang->getTag()) && $this->params->get('homepageLayout') == '2' && $menu->getParams( $active->id )->get( 'pageclass_sfx' ) != 'home-variation') || ($this->params->get('homepageLayout') == '1' && $menu->getParams( $active->id )->get( 'pageclass_sfx' ) == 'one-page-site')){ ?>
	<header>
		<div class="header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6 header_left">
						<a href="<?php echo $this->baseurl; ?>/">
							<?php echo $logo; ?>
						</a>
					</div>
					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6 header_right">
						<?php if($this->params->get('welcome')) : ?>
							<span class="welcome_line"><?php echo $this->params->get('welcomeText'); ?></span>
						<?php endif; ?>
						<a class="drop_down_menu_btn pull-right" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
						<div class="drop_down_menu_outter">
							<jdoc:include type="modules" name="nav-one-page" style="none" />		
						</div>	
						<?php if($this->countModules('right-header')) : ?>
						<jdoc:include type="modules" name="right-header" style="none" />
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</header>
	<?php } ?>
	
	<?php if ($this->countModules('breadcrumbs')) : ?>
	<div class="breadcrumbs">
		<div class="container">
			<div class="banner-text">
				<jdoc:include type="modules" name="breadcrumbs" />
			</div>
		</div>
	</div>
	<?php endif; ?>
	
	<main id="content" role="main">
		<div class="container">
			<div class="row">
				<div class="<?php echo $span; ?>">
					<jdoc:include type="message" />
					<jdoc:include type="component" />
				</div>
				<?php if ($this->countModules('right')) : ?>
				<div class="col-md-4">
					<div class="sidebar">
						<jdoc:include type="modules" name="right" style="xhtml" />
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</main>
	
	<?php if ($this->countModules('content-bottom')) : ?>
	<div id="content-bottom-modules" class="content-modules">
		<jdoc:include type="modules" name="content-bottom" style="xhtml" />
		<?php if(($this->params->get('homepageLayout') == '2' && $menu->getParams( $active->id )->get( 'pageclass_sfx' ) != 'home-variation') || ($this->params->get('homepageLayout') == '1' && $menu->getParams( $active->id )->get( 'pageclass_sfx' ) == 'one-page-site')){ ?>
			<jdoc:include type="modules" name="contact-onepage" style="xhtml" />
		<?php } ?>
	</div>
	<?php endif; ?>
	
	<?php if(($this->params->get('homepageLayout') == '2' && $menu->getParams( $active->id )->get( 'pageclass_sfx' ) != 'home-variation') || ($this->params->get('homepageLayout') == '1' && $menu->getParams( $active->id )->get( 'pageclass_sfx' ) == 'one-page-site')){ ?>
	<?php if ($this->countModules('banner-image')) : ?>
	<div class="banner-left">
		<div class="banner-image">
			<jdoc:include type="modules" name="banner-image" />
		</div>
		<?php if ($this->countModules('property-info-header')) : ?>
		<div class="house-info-box">
			<jdoc:include type="modules" name="property-info-header" style="none" />
		</div>
		<?php endif; ?>
	</div>
	<?php endif; ?>
	<?php } ?>
	
	<?php if ($menu->getActive() == $menu->getDefault($lang->getTag()) && (($this->params->get('homepageLayout') == '1' && $menu->getParams( $active->id )->get( 'pageclass_sfx' ) != 'one-page-site') || ($this->params->get('homepageLayout') == '2' && $menu->getParams( $active->id )->get( 'pageclass_sfx' ) == 'home-variation'))) { ?>
	<footer>
		<div class="location-detail">
			<div class="container">
				<?php if ($this->countModules('location-detail') || $this->countModules('contact-part')) : ?>
				<div class="location-contact">
					<div class="row">
						<div id="view-on-map" class="col-md-8 col-sm-7 col-xs-12 locations">
							<jdoc:include type="modules" name="location-detail" style="xhtml" />
						</div>
						<div id="contact-part" class="col-md-4 col-sm-5 col-xs-12">
							<div class="contact-agent">
								<jdoc:include type="modules" name="contact-part" style="xhtml" />
							</div>
						</div>
					</div>
					<?php endif; ?>				
				</div>
			</div>
		</div>
		<div class="copyright-area">
			<div class="container">
				<p>
					<a href="http://www.joomfreak.com" target="_blank" class="jflink">joomfreak</a>
					Copyright &copy; <?php echo date('Y'); ?> . Powered by <a href="http://www.kreatif.it/it/ " target="_blank" title="Kreatif">Kreatif</a>
				</p>
			</div>
		</div>
	</footer>
	<?php } ?>
	
	<?php if ($menu->getActive() != $menu->getDefault($lang->getTag()) && (($this->params->get('homepageLayout') == '1' && $menu->getParams( $active->id )->get( 'pageclass_sfx' ) != 'one-page-site') || ($this->params->get('homepageLayout') == '2' && ($menu->getParams( $active->id )->get( 'pageclass_sfx' ) != 'home-variation')))) : ?>
	<div class="copyright-area">
		<div class="container">
			<p>
				<a href="http://www.joomfreak.com" target="_blank" class="jflink">joomfreak</a>
				Copyright &copy; <?php echo date('Y'); ?> . Powered by <a href="http://www.kreatif.it/it/ " target="_blank" title="Kreatif">Kreatif</a>
			</p>
		</div> 
	</div>
	<?php endif; ?>
	
	<jdoc:include type="modules" name="debug" style="none" />
</body>
</html>