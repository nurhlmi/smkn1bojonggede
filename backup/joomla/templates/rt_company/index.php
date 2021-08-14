<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'template.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<jdoc:include type="head" />
</head>

<body>
<div class="header">
<div class="header-inner">
<div class="logo">
<img src="<?php echo $this->baseurl ?>/<?php echo "$logo"; ?>" alt="<?php echo $sitename; ?>" />
</div>
<?php if($this->countModules('menu')) : ?>
<div class="navigation">
<button class="btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<div class="navbar nav-collapse collapse">
<jdoc:include type="modules" name="menu" style="none" />
</div>
</div>
<?php endif; ?>
</div>
</div>
<?php if(empty($showbanner)) { ?>
<div class="header-spacer"></div>
<?php } ?>
<?php if($this->countModules('banner')) : ?>
<div class="banner">
<jdoc:include type="modules" name="banner" style="none" />
</div>
<?php endif; ?>
<div class="spacer"></div>
<div class="main">
<div class="container">
<?php if($this->countModules('left')) : ?>
<div class="left<?php echo $sidebar; ?> sidebar">
<jdoc:include type="modules" name="left" style="tagmodule" />
</div>
<?php endif; ?>
<div class="main<?php echo $sidebar; ?>">
<?php if($this->countModules('user1') or $this->countModules('user2') or $this->countModules('user3')) : ?>
<div class="user">
<div class="cols-<?php echo $countblock1; ?>">
<?php if($this->countModules('user1')) : ?>
<div class="column-1">
<jdoc:include type="modules" name="user1" style="tagmodule" />
</div>
<?php endif; ?>
<?php if($this->countModules('user2')) : ?>
<div class="column-2">
<jdoc:include type="modules" name="user2" style="tagmodule" />
</div>
<?php endif; ?>
<?php if($this->countModules('user3')) : ?>
<div class="column-3">
<jdoc:include type="modules" name="user3" style="tagmodule" />
</div>
<?php endif; ?>
</div>
</div>
<?php endif; ?>
<?php if($this->countModules('user4') or $this->countModules('user5') or $this->countModules('user6')) : ?>
<div class="user">
<div class="cols-<?php echo $countblock2; ?>">
<?php if($this->countModules('user4')) : ?>
<div class="column-1">
<jdoc:include type="modules" name="user4" style="tagmodule" />
</div>
<?php endif; ?>
<?php if($this->countModules('user5')) : ?>
<div class="column-2">
<jdoc:include type="modules" name="user5" style="tagmodule" />
</div>
<?php endif; ?>
<?php if($this->countModules('user6')) : ?>
<div class="column-3">
<jdoc:include type="modules" name="user6" style="tagmodule" />
</div>
<?php endif; ?>
</div>
</div>
<?php endif; ?>
<div class="mainbody">
<jdoc:include type="message" />
<jdoc:include type="component" />
</div>
<?php if($this->countModules('user7') or $this->countModules('user8') or $this->countModules('user9')) : ?>
<div class="user">
<div class="cols-<?php echo $countblock3; ?>">
<?php if($this->countModules('user7')) : ?>
<div class="column-1">
<jdoc:include type="modules" name="user7" style="tagmodule" />
</div>
<?php endif; ?>
<?php if($this->countModules('user8')) : ?>
<div class="column-2">
<jdoc:include type="modules" name="user8" style="tagmodule" />
</div>
<?php endif; ?>
<?php if($this->countModules('user9')) : ?>
<div class="column-3">
<jdoc:include type="modules" name="user9" style="tagmodule" />
</div>
<?php endif; ?>
</div>
</div>
<?php endif; ?>
</div>
<?php if($this->countModules('right')) : ?>
<div class="right<?php echo $sidebar; ?> sidebar">
<jdoc:include type="modules" name="right" style="tagmodule" />
</div>
<?php endif; ?>
</div>
</div>
<?php if($this->countModules('bottom1') or $this->countModules('bottom2') or $this->countModules('bottom3') or $this->countModules('bottom4') or $this->countModules('bottom5')) : ?>
<div class="bottom">
<div class="container cols-<?php echo $countblock4; ?>">
<?php if($this->countModules('bottom1')) : ?>
<div class="column-1">
<jdoc:include type="modules" name="bottom1" style="tagmodule" />
</div>
<?php endif; ?>
<?php if($this->countModules('bottom2')) : ?>
<div class="column-2">
<jdoc:include type="modules" name="bottom2" style="tagmodule" />
</div>
<?php endif; ?>
<?php if($this->countModules('bottom3')) : ?>
<div class="column-3">
<jdoc:include type="modules" name="bottom3" style="tagmodule" />
</div>
<?php endif; ?>
<?php if($this->countModules('bottom4')) : ?>
<div class="column-4">
<jdoc:include type="modules" name="bottom4" style="tagmodule" />
</div>
<?php endif; ?>
<?php if($this->countModules('bottom5')) : ?>
<div class="column-5">
<jdoc:include type="modules" name="bottom5" style="tagmodule" />
</div>
<?php endif; ?>
</div>
</div>
<?php endif; ?>
<?php if($this->countModules('footer1') or $this->countModules('footer2') or $this->countModules('footer3') or $this->countModules('footer4') or $this->countModules('footer5')) : ?>
<div class="footer">
<div class="container cols-<?php echo $countblock5; ?>">
<?php if($this->countModules('footer1')) : ?>
<div class="column-1">
<jdoc:include type="modules" name="footer1" style="tagmodule" />
</div>
<?php endif; ?>
<?php if($this->countModules('footer2')) : ?>
<div class="column-2">
<jdoc:include type="modules" name="footer2" style="tagmodule" />
</div>
<?php endif; ?>
<?php if($this->countModules('footer3')) : ?>
<div class="column-3">
<jdoc:include type="modules" name="footer3" style="tagmodule" />
</div>
<?php endif; ?>
<?php if($this->countModules('footer4')) : ?>
<div class="column-4">
<jdoc:include type="modules" name="footer4" style="tagmodule" />
</div>
<?php endif; ?>
<?php if($this->countModules('footer5')) : ?>
<div class="column-5">
<jdoc:include type="modules" name="footer5" style="tagmodule" />
</div>
<?php endif; ?>
</div>
</div>
<?php endif; ?>
<div class="copyright">
<div class="container">
<div class="copy">Copyright &copy; <?php echo date("Y"); ?> <?php echo "$sitename"; ?>. All Right Reserved. Design By <a href="http://www.rushthemes.com" target="_blank">Rush Themes</a>.</div>
</div>
</div>
<?php if($this->countModules('debug')) : ?>
<jdoc:include type="modules" name="debug" style="none" />
<?php endif; ?>
</body>
</html>