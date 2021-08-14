<?php
/**
 * @version		$Id: latest_item.php 1492 2012-02-22 17:40:09Z joomlaworks@gmail.com $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

?>

<!-- Start K2 Item Layout -->
<div class="latestItemView">
	<div class="itemContainer">
		<div class="catItemView clearfix">
			<?php echo $this->item->event->BeforeDisplay; ?>
			<?php echo $this->item->event->K2BeforeDisplay; ?>

			<?php if($this->params->get('latestItemsCols') == 1) : ?>

			<?php endif; ?>
			<div class="catItemHeader">
			  <?php if($this->item->params->get('latestItemTitle')): ?>
			  <h3 class="catItemTitle">
			  	<?php if ($this->item->params->get('latestItemTitleLinked')): ?>
				<a href="<?php echo $this->item->link; ?>"><?php echo $this->item->title; ?></a>
			  	<?php else: ?>
			  		<?php echo $this->item->title; ?>
			  	<?php endif; ?>
			  </h3>
			  <?php endif; ?>
				
			  <div class="catItemAdditionalInfo">
			  	<?php if($this->item->params->get('latestItemCategory')): ?>
			  	<span class="catItemCategory">
			  		<span><?php echo JText::_('K2_PUBLISHED_IN'); ?></span>
			  		<a href="<?php echo $this->item->category->link; ?>"><?php echo $this->item->category->name; ?></a>
			  	</span>
			  	<?php endif; ?>
			  
			  <!-- Date created -->
				<?php if($this->item->params->get('itemDateCreated')): ?>
					<span class="itemDateCreated">
						<?php echo JHTML::_('date', $this->item->created , JText::_('K2_DATE_FORMAT_LC2')); ?>
					</span>
				<?php endif; ?>
			  	
			  	<?php if($this->item->params->get('latestItemCommentsAnchor') && ( ($this->item->params->get('comments') == '2' && !$this->user->guest) || ($this->item->params->get('comments') == '1')) ): ?>
			  		<?php if(!empty($this->item->event->K2CommentsCounter)):?>
			  			<?php echo $this->item->event->K2CommentsCounter; ?>
			  		<?php else: ?>
			  			<a href="<?php echo $this->item->link; ?>#itemCommentsAnchor" class="itemCommentsLink k2Anchor">
			  				<?php echo $this->item->numOfComments; ?>
			  			</a>
			  		<?php endif; ?>
			  	<?php endif; ?>
			  </div>
		  </div>
		
		  <?php echo $this->item->event->AfterDisplayTitle; ?>
		  <?php echo $this->item->event->K2AfterDisplayTitle; ?>
		<div class="k2ItemBlock">
		
		<?php if($this->item->params->get('latestItemImage') && !empty($this->item->image)): ?>
		<div class="catItemImageBlock">
			  <span class="catItemImage">
			   <a href="<?php echo $this->item->link; ?>" title="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>">
		    	<img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px;height:auto;" />
		    </a>
			  </span>
		</div>
		<?php endif; ?>
		<div class="clr"></div>
		  <div class="catItemBody">
			  <?php echo $this->item->event->BeforeDisplayContent; ?>
			  <?php echo $this->item->event->K2BeforeDisplayContent; ?>
	
			  <?php if($this->item->params->get('latestItemIntroText')): ?>
			  <div class="catItemIntroText">
			  	<?php echo $this->item->introtext; ?>
			  </div>
			  <?php endif; ?>

			  <?php echo $this->item->event->AfterDisplayContent; ?>
			  <?php echo $this->item->event->K2AfterDisplayContent; ?>
			  
			  <?php if ($this->item->params->get('latestItemReadMore')): ?>
			  <div class="catItemReadMore">
			  	<a class="button read-more" href="<?php echo $this->item->link; ?>">
			  		<?php echo JText::_('K2_READ_MORE'); ?>
			  	</a>
			  </div>
			  <?php endif; ?>
		  </div>

		  <?php if($this->item->params->get('latestItemTags')): ?>
		  <div class="catItemLinks">
		  	  <?php if($this->item->params->get('latestItemTags') && count($this->item->tags)): ?>
		  	  <div class="catItemTagsBlock">
							<span><?php echo JText::_('K2_TAGGED_UNDER'); ?></span>
							<?php foreach ($this->item->tags as $tag): ?>
								<a class="catItemTag" href="<?php echo $tag->link; ?>"><?php echo $tag->name; ?></a>
							<?php endforeach; ?>
						</div>
		  	  <?php endif; ?>
		  </div>
		  <?php endif; ?>
		
		  <?php if($this->params->get('latestItemVideo') && !empty($this->item->video)): ?>
		  <div class="catItemVideoBlock">
		  	<h3><?php echo JText::_('K2_RELATED_VIDEO'); ?></h3>
			  <span class="catItemVideo<?php if($this->item->videoType=='embedded'): ?> embedded<?php endif; ?>"><?php echo $this->item->video; ?></span>
		  </div>
		  <?php endif; ?>
		  </div>

		  	<?php echo $this->item->event->AfterDisplay; ?>
		  	<?php echo $this->item->event->K2AfterDisplay; ?>
		</div>
	</div>
</div>
<!-- End K2 Item Layout -->