<?php
/**
 * @version		$Id: user.php 1492 2012-02-22 17:40:09Z joomlaworks@gmail.com $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
// Get user stuff (do not change)
$user = JFactory::getUser();

?>

<!-- Start K2 User Layout -->
<div id="k2Container" class="userView<?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?>">
	<?php if($this->params->get('show_page_title') && $this->params->get('page_title')!=$this->user->name): ?>
		<div class="componentheading<?php echo $this->params->get('pageclass_sfx')?>">
			<?php echo $this->escape($this->params->get('page_title')); ?>
		</div>
	<?php endif; ?>
	
	<?php if ($this->params->get('userImage') || $this->params->get('userName') || $this->params->get('userDescription') || $this->params->get('userURL') || $this->params->get('userEmail')): ?>
		<div class="itemAuthorBlock">
			<?php if(isset($this->addLink) && JRequest::getInt('id')==$user->id): ?>
				<span class="catItemAddLink"> <a class="modal" rel="{handler:'iframe',size:{x:990,y:550}}" href="<?php echo $this->addLink; ?>"> <?php echo JText::_('K2_POST_A_NEW_ITEM'); ?> </a> </span>
			<?php endif; ?>
			
			<?php if ($this->params->get('userImage') && !empty($this->user->avatar)): ?>
				<img src="<?php echo $this->user->avatar; ?>" class="itemAuthorAvatar" alt="<?php echo $this->user->name; ?>" style="width:<?php echo $this->params->get('userImageWidth'); ?>px; height:auto;" />
			<?php endif; ?>
			
			<div class="itemAuthorDetails">
				<div>
					<?php if ($this->params->get('userName')): ?>
						<h3 class="itemAuthorName"><?php echo $this->user->name; ?></h3>
					<?php endif; ?>
					
					<?php if ($this->params->get('userEmail')): ?>
						<span class="itemAuthorEmail"> <?php echo JText::_('K2_EMAIL'); ?>: <?php echo JHTML::_('Email.cloak', $this->user->email); ?> </span>
					<?php endif; ?>
					
					<?php if ($this->params->get('userDescription') && isset($this->user->profile->description)): ?>
						<?php echo $this->user->profile->description; ?>
					<?php endif; ?>
					
					<?php if ($this->params->get('userURL') && isset($this->user->profile->url)): ?>
						<span class="itemAuthorURL"> <?php echo JText::_('K2_WEBSITE_URL'); ?>: <a href="<?php echo $this->user->profile->url; ?>" target="_blank" rel="me"><?php echo $this->user->profile->url; ?></a> </span>
					<?php endif; ?>
				</div>
			</div>
			<?php echo $this->user->event->K2UserDisplay; ?> 
		</div>
	<?php endif; ?>
	
	<?php if(count($this->items)): ?>
		<div class="catItemList">
			<?php $i = 0; ?>
			<?php foreach ($this->items as $item): ?>
				<?php $i++; ?>
				<div class="itemContainer <?php echo ($i%2) ? "odd" : "even"; ?>">
					<div class="catItemView<?php if(!$item->published || ($item->publish_up != $this->nullDate && $item->publish_up > $this->now) || ($item->publish_down != $this->nullDate && $item->publish_down < $this->now)) echo ' catItemViewUnpublished'; ?><?php echo ($item->featured) ? ' catItemIsFeatured' : ''; ?> clearfix">
					
						<div class="catItemContent">
							<?php echo $item->event->BeforeDisplay; ?>
							<?php echo $item->event->K2BeforeDisplay; ?>
								
							<div class="catItemHeader">
								<?php if($item->params->get('userItemTitle')): ?>
									<h3 class="catItemTitle">
										<?php if ($item->params->get('userItemTitleLinked') && $item->published): ?>
											<a href="<?php echo $item->link; ?>"> <?php echo $item->title; ?> </a>
										<?php else: ?>
											<?php echo $item->title; ?>
										<?php endif; ?>
										<?php if(!$item->published || ($item->publish_up != $this->nullDate && $item->publish_up > $this->now) || ($item->publish_down != $this->nullDate && $item->publish_down < $this->now)): ?>
											<span> <sup> <?php echo JText::_('K2_UNPUBLISHED'); ?> </sup> </span>
										<?php endif; ?>
									</h3>
								<?php endif; ?>
									
								<div class="catItemAdditionalInfo">								
									<?php if($item->params->get('userItemCategory')): ?>
										<span class="catItemCategory"> <span><?php echo JText::_('K2_PUBLISHED_IN'); ?></span> <a href="<?php echo $item->category->link; ?>"><?php echo $item->category->name; ?></a> </span>
									<?php endif; ?>
									<!-- Date created -->
									<?php if($item->params->get('itemDateCreated')): ?>
										<span class="itemDateCreated">
											<?php echo JHTML::_('date', $item->created , JText::_('K2_DATE_FORMAT_LC2')); ?>
										</span>
									<?php endif; ?>
								
									<?php if($item->params->get('userItemCommentsAnchor') && ( ($item->params->get('comments') == '2' && !$this->user->guest) || ($item->params->get('comments') == '1')) ): ?>
										<?php if(!empty($item->event->K2CommentsCounter)): ?>
											<?php echo $item->event->K2CommentsCounter; ?>
										<?php else: ?>
											<a href="<?php echo $item->link; ?>#itemCommentsAnchor" class="itemCommentsLink k2Anchor">
												<?php echo $item->numOfComments; ?>
											</a>
										<?php endif; ?>
									<?php endif; ?>
								</div>
							</div>
								
							<?php echo $item->event->AfterDisplayTitle; ?>
							<?php echo $item->event->K2AfterDisplayTitle; ?>
							
							<div class="k2ItemBlock">
								<?php if(isset($item->editLink)): ?>
									<span class="catItemEditLink"> <a class="modal" rel="{handler:'iframe',size:{x:990,y:550}}" href="<?php echo $item->editLink; ?>"> <?php echo JText::_('K2_EDIT_ITEM'); ?> </a> </span>
								<?php endif; ?>
									
								<?php if($item->params->get('userItemImage') && !empty($item->imageGeneric)): ?>
									<div class="catItemImageBlock">
										<span class="catItemImage">
											<a href="<?php echo $item->link; ?>" title="<?php if(!empty($item->image_caption)) echo K2HelperUtilities::cleanHtml($item->image_caption); else echo K2HelperUtilities::cleanHtml($item->title); ?>">
												<img src="<?php echo $item->imageGeneric; ?>" alt="<?php if(!empty($item->image_caption)) echo K2HelperUtilities::cleanHtml($item->image_caption); else echo K2HelperUtilities::cleanHtml($item->title); ?>" style="width:<?php echo $item->params->get('itemImageGeneric'); ?>px; height:auto;" />
											</a>
										</span>
									</div>
								<?php endif; ?>
									
								<div class="catItemBody">
									<?php echo $item->event->BeforeDisplayContent; ?> 
									<?php echo $item->event->K2BeforeDisplayContent; ?>
				
									<?php if($item->params->get('userItemIntroText')): ?>
										<div class="catItemIntroText"> <?php echo $item->introtext; ?> </div>
									<?php endif; ?>
				
									<?php echo $item->event->AfterDisplayContent; ?> 
									<?php echo $item->event->K2AfterDisplayContent; ?>
				
									<?php if($item->params->get('userItemCategory') || $item->params->get('userItemTags')): ?>
										<div class="catItemLinks">
											<?php if($item->params->get('userItemTags') && count($item->tags)): ?>
												<div class="catItemTagsBlock">
													<span><?php echo JText::_('K2_TAGGED_UNDER'); ?></span>
													<?php foreach ($item->tags as $tag): ?>
														<a class="catItemTag" href="<?php echo $tag->link; ?>"><?php echo $tag->name; ?></a>
													<?php endforeach; ?>
												</div>
											<?php endif; ?>
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
				
						<?php echo $item->event->AfterDisplay; ?>
						<?php echo $item->event->K2AfterDisplay; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

  <?php if(count($this->pagination->getPagesLinks())): ?>
  	<div class="pagination"> 
  		<?php echo str_replace('</ul>', '<li class="counter">'.$this->pagination->getPagesCounter().'</li></ul>', $this->pagination->getPagesLinks()); ?>
  	</div>
  <?php endif; ?>
  <?php endif; ?>
  
  <?php if($this->params->get('userFeedIcon',1)): ?>
  <div class="k2FeedIcon"> <a href="<?php echo $this->feed; ?>" title="<?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?>"> <span><?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?></span> </a>
  </div>
  <?php endif; ?>
</div>
<!-- End K2 User Layout --> 