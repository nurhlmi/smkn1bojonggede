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
if ($this->getParam('ie6warn') && $this->isIE(6)) { ?>
<div id="warnIE6">
<div class="ie6padding clearfix">
<a id="warnIE6-close" href="#" onclick='javascript:this.parentNode.parentNode.style.display="none"; return false;'></a>
<div id="warnIE6-image"></div>
<div id="warnIE6-text">
<div class="ietitle">You are using an outdated browser</div>
<div class="iedesc">You are using Internet Explorer 6. Please upgrade your browser to increase safety and your browsing experience. Choose one of the following links to download a modern browser</div>
<a id="getFirefox" href="http://www.getfirefox.com/" rel="nofollow" target="_blank"></a>
<a id="getIE" href="http://www.microsoft.com/windows/downloads/ie/getitnow.mspx" rel="nofollow" target="_blank"></a>
<a id="getSafari" href="http://www.apple.com/safari/download/" rel="nofollow" target="_blank"></a>
<a id="getChrome" href="http://www.google.com/chrome" rel="nofollow" target="_blank"></a>
<a id="getOpera" href="http://www.opera.com/download/" rel="nofollow" target="_blank"></a>
</div>
</div>
</div>
<?php $this->addCSS('nomoreie6.css'); ?> 
<div class="clr"></div>
<?php }