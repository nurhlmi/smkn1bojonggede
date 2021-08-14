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
function modChrome_mx_xhtml($module, $params, $attribs)
{ ?>
<div class="module <?php echo $params->get('moduleclass_sfx'); ?>">	
<div class="mod-wrapper clearfix">		
<?php if ($module->showtitle != 0) : ?>
<div class="title">
<div class="fl t1"></div>
<div class="fl t2">
	<h3><?php echo $module->title; ?></h3>
</div>
<div class="fl t3"></div>
<div class="fr t4"></div>
</div>
<?php endif; ?>
<div style="clear:both;"></div>
<div class="mod-content clearfix">	
<?php echo $module->content; ?>
</div>
</div>
</div>
<div style="clear:both;"></div>
<?php
}


function modChrome_mx_blocks($module, &$params, &$attribs)
{
if (!empty ($module->content)) : ?>
<div class="blocks">
<?php if ($module->showtitle != 0) : ?>
	<h3><?php echo $module->title; ?></h3>
<?php endif; ?>
<?php echo $module->content; ?>
<div style="clear:both;"></div>
</div>

<?php endif;
}

function modChrome_color($module, &$params, &$attribs)
{
if (!empty ($module->content)) : ?>
<div class="colors">
<?php if ($module->showtitle != 0) : ?>
<div class="title">
<div class="fl t1"></div>
<div class="fl t2">
	<h3><?php echo $module->title; ?></h3>
</div>
<div class="fl t3"></div>
<div class="fr t4"></div>
</div>
<?php endif; ?>
<?php echo $module->content; ?>
<div style="clear:both;"></div>
</div>

<?php endif;
}


function modChrome_grey($module, &$params, &$attribs)
{
if (!empty ($module->content)) : ?>
<div class="greys">
<?php if ($module->showtitle != 0) : ?>
<div class="title">
<div class="fl t1"></div>
<div class="fl t2">
	<h3><?php echo $module->title; ?></h3>
</div>
<div class="fl t3"></div>
<div class="fr t4"></div>
</div>
<?php endif; ?>
<?php echo $module->content; ?>
<div style="clear:both;"></div>
</div>

<?php endif;
}

function modChrome_light($module, &$params, &$attribs)
{
if (!empty ($module->content)) : ?>
<div class="white">
<?php if ($module->showtitle != 0) : ?>
<div class="title">
<div class="fl t1"></div>
<div class="fl t2">
	<h3><?php echo $module->title; ?></h3>
</div>
<div class="fl t3"></div>
<div class="fr t4"></div>
</div>
<?php endif; ?>
<?php echo $module->content; ?>
<div style="clear:both;"></div>
</div>

<?php endif;
}

function modChrome_red($module, &$params, &$attribs)
{

if (!empty ($module->content)) : ?>

<div class="reds">
<?php if ($module->showtitle != 0) : ?>
<div class="title">
<div class="fl t1"></div>
<div class="fl t2">
	<h3><?php echo $module->title; ?></h3>
</div>
<div class="fl t3"></div>
<div class="fr t4"></div>
</div>
<?php endif; ?>
<?php echo $module->content; ?>
<div style="clear:both;"></div>
</div>

<?php endif;
}

function modChrome_green($module, &$params, &$attribs)
{

if (!empty ($module->content)) : ?>

<div class="greens">
<?php if ($module->showtitle != 0) : ?>
<div class="title">
<div class="fl t1"></div>
<div class="fl t2">
	<h3><?php echo $module->title; ?></h3>
</div>
<div class="fl t3"></div>
<div class="fr t4"></div>
</div>
<?php endif; ?>
<?php echo $module->content; ?>
<div style="clear:both;"></div>
</div>

<?php endif;
}

function modChrome_blue($module, &$params, &$attribs)
{
if (!empty ($module->content)) : ?>

<div class="blues">
<?php if ($module->showtitle != 0) : ?>
<div class="title">
<div class="fl t1"></div>
<div class="fl t2">
	<h3><?php echo $module->title; ?></h3>
</div>
<div class="fl t3"></div>
<div class="fr t4"></div>
</div>
<?php endif; ?>
<?php echo $module->content; ?>
<div style="clear:both;"></div>
</div>

<?php endif;
}
function modChrome_orange($module, &$params, &$attribs)
{
if (!empty ($module->content)) : ?>
<div class="oranges">
<?php if ($module->showtitle != 0) : ?>
<div class="title">
<div class="fl t1"></div>
<div class="fl t2">
	<h3><?php echo $module->title; ?></h3>
</div>
<div class="fl t3"></div>
<div class="fr t4"></div>
</div>
<?php endif; ?>
<?php echo $module->content; ?>
<div style="clear:both;"></div>
</div>

<?php endif;
}

function modChrome_dark($module, &$params, &$attribs)
{
if (!empty ($module->content)) : ?>
<div class="dark">
<?php if ($module->showtitle != 0) : ?>
<div class="title">
<div class="fl t1"></div>
<div class="fl t2">
	<h3><?php echo $module->title; ?></h3>
</div>
<div class="fl t3"></div>
<div class="fr t4"></div>
</div>
<?php endif; ?>
<?php echo $module->content; ?>
<div style="clear:both;"></div>
</div>

<?php endif;
}

function modChrome_beige($module, &$params, &$attribs)
{

if (!empty ($module->content)) : ?>

<div class="beige">
<?php if ($module->showtitle != 0) : ?>
<div class="title">
<div class="fl t1"></div>
<div class="fl t2">
	<h3><?php echo $module->title; ?></h3>
</div>
<div class="fl t3"></div>
<div class="fr t4"></div>
</div>
<?php endif; ?>
<?php echo $module->content; ?>
<div style="clear:both;"></div>
</div>

<?php endif;
}
function modChrome_mx_block($module, $params, $attribs)
{ ?>
<div class="module <?php echo $params->get('moduleclass_sfx'); ?>">	
<div class="mod-wrapper-flat clearfix">		
<?php if ($module->showtitle != 0) { ?>
<h3 class="header">			
<?php 
echo '<span>'.$module->title.'</span>';
?>
</h3>
<?php } ?>
<?php echo $module->content; ?>
</div>
</div>
<div style="clear:both;"></div>
<?php
}

function modChrome_mx_menu($module, $params, $attribs)
{ ?>
<div class="module <?php echo $params->get('moduleclass_sfx'); ?>">	
<div class="mod-wrapper-menu clearfix">
<?php echo $module->content; ?>
</div>
</div>
<?php
}