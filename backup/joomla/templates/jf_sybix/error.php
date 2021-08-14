<?php
/*------------------------------------------------------------------------
# JF_AMAZA! - JOOMFREAK.COM JOOMLA 3 TEMPLATE 
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
$font 	   = $params->get('googleFont');

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Logo file or site title param
if ($params->get('logoOption') == 1 && $params->get('logoFile')) {
	$logo = '<img src="' . JUri::root() . $params->get('logoFile') . '" alt="' . $sitename . '" />';
} elseif ($params->get('logoOption') == 2 && $params->get('logoText')) {
	$logo = '<span class="site-title" title="' . $sitename . '">' . htmlspecialchars($params->get('logoText')) . '</span>';
} else {
	$logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?php echo $this->title; ?> <?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/bootstrap.css" type="text/css" />
	<?php if($font == 'OpenSans') : ?>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic" type="text/css" />
	<?php endif; ?>
	<?php if($font == 'Lato') : ?>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,300italic,400,400italic,700,700italic,900,900italic" type="text/css" />
	<?php endif; ?>
	<?php if($font == 'PTSans') : ?>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic" type="text/css" />
	<?php endif; ?>
	<?php if($font == 'SourceSansPro') : ?>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,600,600italic,700,700italic" type="text/css" />
	<?php endif; ?>
	<?php if($font == 'Nobile') : ?>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nobile:400,400italic,700,700italic" type="text/css" />
	<?php endif; ?>
	<?php if($font == 'Ubuntu') : ?>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu:300,300italic,400,400italic,500,500italic,700,700italic" type="text/css" />
	<?php endif; ?>
	<?php if($font == 'IstokWeb') : ?>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Istok+Web:400,400italic,700,700italic" type="text/css" />
	<?php endif; ?>
	<?php if($font == 'Exo2') : ?>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Exo+2:400,400italic,500,500italic,600,600italic,700,700italic,800,800italic" type="text/css" />
	<?php endif; ?>

	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/font-awesome.min.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/k2.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/template.css" type="text/css" />
	
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
		
	<?php // Background color ?>
	<?php if ($params->get('backgroundColor') == 'light') : ?>
	<style type="text/css">
		body, #content {
			background-color: #f6f6f6;
		}
	</style>
	<?php endif; ?>
	<?php if ($params->get('backgroundColor') == 'dark') : ?>
	<style type="text/css">
		body, #content {
			background-color: #121212;
		}				
	</style>
	<?php endif; ?>
	
	<?php // Template color ?>
	<?php if ($params->get('templateColor')) : ?>
	<style type="text/css">
		div.itemCommentsForm form input#submitCommentButton {
			background: <?php echo $params->get('templateColor'); ?>;
		}
		
		.owl-controls .owl-prev i:hover, .owl-controls .owl-next i:hover, div.itemRelated .owl-controls .owl-prev i, div.itemRelated .owl-controls .owl-next i {
			background-color: <?php echo $params->get('templateColor'); ?>;
			border-color: <?php echo $params->get('templateColor'); ?>;
		}
		
		.slideshow .slidedescription a:hover, .slidedescription  a:hover {
			background-color: <?php echo $params->get('templateColor'); ?>;
			border-color: <?php echo $params->get('templateColor'); ?>;
		}
		
		.btn-primary, #back-top:hover, span.addtocart-button span.addtocart-button, span.addtocart-button input.addtocart-button, span.addtocart-button input.notify-button, .banner-box .text .more:hover, .continue_link, .showcart {
			background: <?php echo $params->get('templateColor'); ?>;
		}
		
		.block-shipping .content h3, .moduleItemInfo a:hover, div.k2ItemsBlock .moduleItemReadMore a:hover,
		.vm-product-descr-container-1 > h2 a, .vm-product-descr-container-0 > h2 a,
		.sidebar ul.menu li:hover a, .sidebar ul.menu li.active a {
			color: <?php echo $params->get('templateColor'); ?>;
		}
		
		.tab-products .nav-tabs > li > a:hover, .tab-products .nav-tabs > li.active > a, .new-arrivals .nav-tabs > li > a:hover, .new-arrivals .nav-tabs > li.active > a {
			border-color: <?php echo $params->get('templateColor'); ?>;
			color: <?php echo $params->get('templateColor'); ?>;
		}
		
		.top-cart .show_cart a {
			background: <?php echo $params->get('templateColor'); ?>;
		}
		
		.newsletter-form input[type=submit]:hover {
			background: <?php echo $params->get('templateColor'); ?>;
		}
	</style>
	<?php endif; ?>
	
	<script src="<?php echo JUri::root(true); ?>/media/jui/js/jquery.min.js"></script>
	<script src="<?php echo JUri::root(true); ?>/media/jui/js/bootstrap.min.js"></script>
	<script src="<?php echo $this->baseurl . '/templates/' . $this->template . '/scripts/js/isotope.pkgd.min.js'; ?>"></script>
	<script src="<?php echo $this->baseurl . '/templates/' . $this->template . '/scripts/js/imagesloaded.min.js'; ?>"></script>
	<script src="<?php echo $this->baseurl . '/templates/' . $this->template . '/scripts/js/owl.carousel.min.js'; ?>"></script>
	<script src="<?php echo $this->baseurl . '/templates/' . $this->template . '/scripts/js/nivo-lightbox.min.js'; ?>"></script>
	<script src="<?php echo $this->baseurl . '/templates/' . $this->template . '/scripts/js/template.js'; ?>"></script>

	<!--[if lt IE 9]>
		<script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script>
	<![endif]-->
</head>

<body class="site <?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '');
?>">

	<div class="wrapper">
		<div class="top-wrapper">
			<div class="top-bar">
				<div class="container">
					<div class="row">
						<div class="col-xs-6">
							
						</div>
						<div class="col-xs-6 text-right">
							<a class="top-menu-toggle visible-xs"><i class="fa fa-user"></i></a>
							<div class="top-menu">
								<?php echo $doc->getBuffer('modules', 'top-bar', array('style' => 'none')); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Header -->
			<header class="header">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-xs-12 sp-logo">
							<div class="logo">
								<h1>
									<a href="<?php echo $this->baseurl; ?>/">
										<?php echo $logo; ?>
									</a>
								</h1>
							</div>
						</div>
						<div class="col-lg-7 col-xs-12 menu-block">
							<div class="mbmenu-toggle visible-xs"><span>Menu</span><i class="fa fa-bars" aria-hidden="true"></i></div>
							<div id="header-menu">
								<?php echo $doc->getBuffer('modules', 'main-menu', array('style' => 'none')); ?>
							</div>
						</div>
						<div class="col-lg-2 col-xs-12 sp-cart">
							<div class="top-search">
								<span class="search-button"><i class="fa fa-search"></i></span>
								<?php echo $doc->getBuffer('modules', 'top-search', array('style' => 'none')); ?>
							</div>

							<div class="top-account">
								<?php echo $doc->getBuffer('modules', 'top-account', array('style' => 'none')); ?>
							</div>

							<div class="top-cart dropdown">
								<span class="cart-button" data-toggle="dropdown" id="dropdownMenu1"><i class="fa  fa-shopping-cart"></i><span class="cart-total">0</span></span>
								<?php echo $doc->getBuffer('modules', 'top-cart', array('style' => 'none')); ?>
							</div>
						</div>
					</div>
				</div>
			</header>
		</div>
		
		<!-- Content -->
		<div id="content">				
			<div class="container">
				<div class="row">					
					<div class="col-sm-12">
						<h2 class="mbottom50 center"><?php echo JText::_('JERROR_LAYOUT_PAGE_NOT_FOUND'); ?></h2>
						<img class="mauto mbottom30" alt="" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/images/404.png">

						<p class="center"><?php echo JText::_('JERROR_LAYOUT_SEARCH_PAGE'); ?></p>
						<div class="mbottom50 center"><?php echo $doc->getBuffer('module', 'search'); ?></div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="wtfooter">
			<div class="container">
				<div class="row footer-menu">

					<?php echo $doc->getBuffer('modules', 'footer', array('style' => 'jfxhtml')); ?>

					<div class="col-lg-3 col-sm-6">
					<?php echo $doc->getBuffer('modules', 'footer-social', array('style' => 'xhtml')); ?>
					
					<?php if ($params->get('social') && ($params->get('twitterLink') != '' || $params->get('facebookLink') != '' || $params->get('pinterestLink') != '' || $params->get('googleLink') != '' || $params->get('vimeoLink') != '' || $params->get('linkedInLink') != '')) : ?>
					<ul class="social-icons">
								<?php if ($params->get('twitterIcon') && $params->get('twitterLink') != '') : ?>
								<li>
									<a class="social-icon twitter" title="Twitter" href="<?php echo $params->get('twitterLink'); ?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-twitter"><!--icon--></i></a>
								</li>
								<?php endif; ?>	
								<?php if ($params->get('facebookIcon') && $params->get('facebookLink') != '') : ?>
								<li>
									<a class="social-icon facebook" title="facebook" href="<?php echo $params->get('facebookLink'); ?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-facebook"><!--icon--></i></a>
								</li>
								<?php endif; ?>
								<?php if ($params->get('googleIcon') && $params->get('googleLink') != '') : ?>
								<li>
									<a class="social-icon google-plus" title="Google Plus" href="<?php echo $params->get('googleLink'); ?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-google-plus"><!--icon--></i></a>
								</li>
								<?php endif; ?>
								<?php if ($params->get('linkedInIcon') && $params->get('linkedInLink') != '') : ?>
								<li>
									<a class="social-icon linkedin" title="Linkedin" href="<?php echo $params->get('linkedInLink'); ?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-linkedin"><!--icon--></i></a>
								</li>
								<?php endif; ?>
								<?php if ($params->get('vimeoIcon') && $params->get('vimeoLink') != '') : ?>
								<li>
									<a class="social-icon vimeo" title="Vimeo" href="<?php echo $params->get('vimeoLink'); ?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-vimeo"><!--icon--></i></a>
								</li>
								<?php endif; ?>	
								<?php if ($params->get('pinterestIcon') && $params->get('pinterestLink') != '') : ?>
								<li>
									<a class="social-icon pinterest" title="pinterest" href="<?php echo $params->get('pinterestLink'); ?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-pinterest"><!--icon--></i></a>
								</li>
								<?php endif; ?>	
					</ul>
					<?php endif; ?>	
					</div>
				</div>
			</div>
		</div>
		
		<!-- Footer -->
		<footer class="footer" role="contentinfo">				
			<div class="container">
				<div class="jf">
					<a href="http://www.joomfreak.com" target="_blank" class="jflink">joomfreak</a>
				</div>
				<div class="row">
					<div class="col-md-8 col-xs-12">						
						<?php if ($params->get('copyright')) : ?>
							<p class="copyright"><?php echo $params->get('copyright'); ?> Powered by <a href="http://www.kreatif.it/it/" target="_blank" title="Kreatif">Kreatif</a></p>
						<?php endif; ?>														
					</div>
					<div class="col-md-4 col-xs-12 text-right">
						<?php echo $doc->getBuffer('modules', 'payment', array('style' => 'none')); ?>
					</div>
				</div>
			</div>
		</footer>
	</div>
	<div id="back-top">
		<a href="#top"><i class="fa fa-chevron-up"></i></a>
	</div>
	
	<?php echo $doc->getBuffer('modules', 'debug', array('style' => 'none')); ?>
</body>
</html>
