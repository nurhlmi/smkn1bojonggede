<?php
/*---------------------------------------------------------------
# Package - Sboost Framework  
# ---------------------------------------------------------------
# Author - mixwebtemplates http://www.mixwebtemplates.com
# Copyright (C) 2008 - 2015 mixwebtemplates.com. All Rights Reserved. 
# Websites: http://www.mixwebtemplates.com
-----------------------------------------------------------------*/
//no direct accees
defined ('_JEXEC') or die ('resticted aceess');
if ($this->getParam('logo_type')=='image') { ?>
<?php if($this->getParam('showMediaLogo')=='imgload') : ?>
<a id="logo-text" style="width:<?php echo $this->getParam('logo_width') ?>px;height:<?php echo $this->getParam('logo_height') ?>px" href="<?php echo $this->baseUrl?>" title="<?php echo $this->getSitename() ?>"><img src="<?php echo $this->baseUrl ?>/<?php echo $this->getParam('mediaLogo') ?>" style="border:0;" alt="" /></a>
<?php else: ?>
<a id="logo" style="width:<?php echo $this->getParam('logo_width') ?>px;height:<?php echo $this->getParam('logo_height') ?>px" href="<?php echo $this->baseUrl?>" title="<?php echo $this->getSitename() ?>"></a>
<?php endif; ?>
<?php } else { ?>
<div id="logo-text" style="width:<?php echo $this->getParam('logo_width') ?>px;height:<?php echo $this->getParam('logo_height') ?>px">
<h1><a title="<?php echo $this->getSitename() ?>" href="<?php echo $this->baseUrl ?>"><span><?php echo $this->getParam('logo_text') ?></span></a></h1>
<p class="site-slogan"><?php echo $this->getParam('logo_slogan') ?></p>
</div>
<?php }