<?php
/*---------------------------------------------------------------
# Package - Joomla Template based on Sboost Framework   
# ---------------------------------------------------------------
# Author - mixwebtemplates http://www.mixwebtemplates.com
# Copyright (C) 2008 - 2017 mixwebtemplates.com. All Rights Reserved.
# Websites: http://www.mixwebtemplates.com
-----------------------------------------------------------------*/
//no direct accees
defined ('_JEXEC') or die ('resticted aceess');
require_once(dirname(__FILE__).'/lib/sboost.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language;?>" >
<head>
<?php
$sboost->loadHead();
$sboost->addCSS('template.css,joomla.css,menu.css,override.css,modules.css,social.css');
if ($sboost->isRTL()) $sboost->addCSS('template_rtl.css');
$slides          = $this->params->get('slides');
?>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/js/custom.js"></script>
<?php if($this->params->get('show_awesome')=='1') : ?>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/css/font-awesome.css" rel="stylesheet" type="text/css" />
<?php endif; ?>
<?php if($this->params->get('social_api_type', '1') == '1') : ?>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/css/social.css" rel="stylesheet" type="text/css" />
<?php endif; ?>
<?php if($this->params->get('float')=='1') : ?>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/css/sticky.css" rel="stylesheet" type="text/css" />
<?php endif; ?>
</head>
<?php $sboost->addFeatures('ie6warn'); ?>
<body class="bg <?php echo $sboost->direction ?> clearfix">
<div id="wrapper">
<div id="topbgr" class="clearfix">
<div class="mx-base">
<div class="clearfix">
<?php 
$sboost->addModules('top-menu'); // module top-menu
?>
<?php $sboost->addFeatures('social'); //social ?></div>
<?php 
$sboost->addModules('login'); // login
?>
</div>
</div>
<header id="header">
<div id="trueHeader">
<div class="mx-base">	
<?php 
$sboost->addFeatures('logo');//Logo
?>
<div class="main_menu">
<?php 
$sboost->addModules("mainmenu"); //position mainmenu
?>
</div>
<div class="clearfix"></div>
</div>
</div>
</header>

<?php if ($this->countModules( 'top1 or top2 or top3 or top4 or top5 or top6' )) : ?>
<div id="tophead">
<div class="mx-base clearfix">
<?php
$sboost->addModules('top1, top2, top3, top4, top5, top6', 'mx_block', 'mx-userpos'); //positions top1-top6 
?>
</div>
</div>
<?php endif; ?>
<?php if ($this->countModules('top')) : ?>
<div id="topcol">
<div class="mx-base clearfix">
<?php
$sboost->addModules('top', 'mx_xhtml'); //top 
?>
</div>
</div>
<?php endif; ?>
<div class="mx-base clearfix">
<?php
$sboost->addModules('header'); //header 
?>
</div>
<div id="mx-basebody">	
<div class="mx-base main-bg clearfix">
<?php 
$sboost->addModules('search'); // search
$sboost->addModules("breadcrumbs"); //breadcrumbs
?>
<div class="clearfix">
<?php $sboost->loadLayout(); //mainbody ?>
</div>
</div>
</div>
<?php if ($this->countModules( 'team' )) : ?>
<div id="teamset">
<div class="mx-base clearfix">
<?php
$sboost->addModules('team'); //team 
?>
</div>
</div>
<?php endif; ?> 
<?php if ($this->countModules( 'map' )) : ?>
<div id="mapset">
<?php
$sboost->addModules('map'); //team 
?>
</div>
<?php endif; ?> 
<?php if ($this->countModules( 'info' )) : ?>
<div id="infoset">
<div class="mx-base clearfix">
<?php
$sboost->addModules('info'); //info 
?>
</div>
</div>
<?php endif; ?> 
<?php
$sboost->addModules('bottom', 'mx_xhtml'); //bottom 
?>
<?php if ($this->countModules( 'bottom1 or bottom2 or bottom3 or bottom4 or bottom5 or bottom6' )) : ?>
<div id="bottsite" class="clearfix">
<?php
$sboost->addModules('bottom1, bottom2, bottom3, bottom4, bottom5, bottom6', 'mx_block', 'mx-bottom', '', false, true); //positions bottom1-bottom6 
?>
</div>
<?php endif; ?>
</div>

<div id="bottomspot">
<!--Start Footer-->
<?php
$sboost->addModules('bottom', 'mx_xhtml'); //bottom 
?>
<div id="mx-footer" class="mx-base">
<div id="mx-bft" class="clearfix">
<div class="cp">
<?php $sboost->addFeatures('copyright,designed')  ?>					
</div>
<?php 
$sboost->addFeatures('colors');//Template colors
$sboost->addFeatures('gotop');		
$sboost->addModules("footer-nav"); 
?>
</div>
</div>
<!--End Footer-->
</div>

<?php 
$sboost->addFeatures('analytics,jquery,ieonly'); /*--- analytics, jquery features ---*/
?>
<?php if($this->params->get('float')=='1') : ?>	
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/js/sticky.js"></script>
<?php endif; ?>
<jdoc:include type="modules" name="debug" />
</body>
</html>