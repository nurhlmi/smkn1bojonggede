<?php
defined('_JEXEC') or die;
?>

<!-- Add slideshow-->
  <?php if ( 1 == $contentslider ) : ?>
<script src="<?php echo $templateUrl; ?>/js/jquery.sliderPro.min.js"></script>
<link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/slider-pro.min.css" media="all" type="text/css" />

 
<script type="text/javascript">
	jQuery( document ).ready(function( jQuery ) {
		jQuery( '#example5' ).sliderPro({
			width: <?php echo $this->params->get('sliderwidth');?>,
			height: <?php echo $this->params->get('sliderheight');?>,          
			orientation: '<?php echo $this->params->get('spsliderorientation');?>',
            imageScaleMode: '<?php echo $this->params->get('spsliderimagesize');?>',
            autoplayDelay: '<?php echo $this->params->get('autoplayDelay');?>',
            centerImage: true,
			loop: false,
			arrows: true,
            autoplay: <?php echo $this->params->get('sliderautoplay');?>,
			buttons: <?php echo $this->params->get('sliderbuttonhs');?>,
			thumbnailsPosition: '<?php echo $this->params->get('thumbnailscontainerposition');?>',
			thumbnailPointer: true,
			thumbnailWidth: 320,   
			breakpoints: {
				800: {
					thumbnailsPosition: 'bottom',
					thumbnailWidth: 300,
					thumbnailHeight: 100
				},
				500: {
					thumbnailsPosition: 'bottom',
					thumbnailWidth: 120,
					thumbnailHeight: 50
				}
			}
		});
	});
</script>
 <?php endif; ?>  <!--End contentsliderslider--> 
<!-- End slideshow-->

<div id="example5" class="slider-pro">
		<div class="sp-slides">          
			<div class="sp-slide">
            <div class="sp-caption-button" style="margin-top: -50px; margin-left:60%;"><a href="<?php echo $this->params->get('linkdataretinafrontsliderimage1'); ?>" class="btn btn-primary art-button"><?php echo $this->params->get('textdataretinafrontsliderimage1'); ?></a></div>
				<img class="sp-image" src="../templates/jt_154/images/blank.gif"
					data-src="<?php echo $this->baseurl; ?>/<?php echo $frontsliderimage1;?>"
					data-retina="<?php echo $this->baseurl; ?>/<?php echo $dataretinafrontsliderimage1;?>"
                    alt="<?php echo $this->params->get('sloganthumbnailimage1'); ?>"/>
				<div class="sp-caption"><?php echo $this->params->get('descriptiontabbox1'); ?></div>
                
            </div>

	        <div class="sp-slide">
            <div class="sp-caption-button" style="margin-top: -50px; margin-left:60%;"><a href="<?php echo $this->params->get('linkdataretinafrontsliderimage2'); ?>" class="btn btn-primary art-button"><?php echo $this->params->get('textdataretinafrontsliderimage2'); ?></a></div>
	        	<img class="sp-image" src="../templates/jt_154/images/blank.gif"
	        		data-src="<?php echo $this->baseurl; ?>/<?php echo $frontsliderimage2;?>"
					data-retina="<?php echo $this->baseurl; ?>/<?php echo $dataretinafrontsliderimage2;?>"
                    alt="<?php echo $this->params->get('sloganthumbnailimage2'); ?>"/>
				<div class="sp-caption"><?php echo $this->params->get('descriptiontabbox2'); ?></div>
			</div>

			 <div class="sp-slide">
            <div class="sp-caption-button" style="margin-top: -50px; margin-left:60%;"><a href="<?php echo $this->params->get('linkdataretinafrontsliderimage3'); ?>" class="btn btn-primary art-button"><?php echo $this->params->get('textdataretinafrontsliderimage3'); ?></a></div>
	        	<img class="sp-image" src="../templates/jt_154/images/blank.gif"
	        		data-src="<?php echo $this->baseurl; ?>/<?php echo $frontsliderimage3;?>"
					data-retina="<?php echo $this->baseurl; ?>/<?php echo $dataretinafrontsliderimage3;?>"
                    alt="<?php echo $this->params->get('sloganthumbnailimage3'); ?>"/>
				<div class="sp-caption"><?php echo $this->params->get('descriptiontabbox3'); ?></div>
			</div>

		<div class="sp-thumbnails">
			<div class="sp-thumbnail">
				<div class="sp-thumbnail-image-container" style="height:120px;">
					<img class="sp-thumbnail-image" src="<?php echo $this->baseurl; ?>/<?php echo $dataretinafrontsliderimage1;?>"/>
				</div>
				<div class="sp-thumbnail-text">
					<div class="sp-thumbnail-title"><?php echo $this->params->get('titlethumbnailimage1'); ?></div>
					<div class="sp-thumbnail-description"><?php echo $this->params->get('sloganthumbnailimage1'); ?></div>
				</div>
			</div>

			<div class="sp-thumbnail">
				<div class="sp-thumbnail-image-container" style="height:120px;">
					<img class="sp-thumbnail-image" src="<?php echo $this->baseurl; ?>/<?php echo $dataretinafrontsliderimage2;?>"/>
				</div>
				<div class="sp-thumbnail-text">
					<div class="sp-thumbnail-title"><?php echo $this->params->get('titlethumbnailimage2'); ?></div>
					<div class="sp-thumbnail-description"><?php echo $this->params->get('sloganthumbnailimage2'); ?></div>
				</div>
			</div>

			<div class="sp-thumbnail">
				<div class="sp-thumbnail-image-container" style="height:120px;">
					<img class="sp-thumbnail-image" src="<?php echo $this->baseurl; ?>/<?php echo $dataretinafrontsliderimage3;?>"/>
				</div>
				<div class="sp-thumbnail-text">
					<div class="sp-thumbnail-title"><?php echo $this->params->get('titlethumbnailimage3'); ?></div>
					<div class="sp-thumbnail-description"><?php echo $this->params->get('sloganthumbnailimage3'); ?></div>
				</div>
			</div>

					</div>
		</div>
    </div>
