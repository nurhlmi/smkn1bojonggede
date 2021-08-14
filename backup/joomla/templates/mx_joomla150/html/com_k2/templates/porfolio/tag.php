<?php
/**
 * @version		$Id: tag.php 1492 2012-02-22 17:40:09Z joomlaworks@gmail.com $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

?>

<!-- Start K2 Generic Layout -->
<div id="k2Container" class="genericView<?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?> ot-porfolio">
	<?php if($this->params->get('show_page_title')): ?>
		<div class="componentheading<?php echo $this->params->get('pageclass_sfx')?>">
			<?php echo $this->escape($this->params->get('page_title')); ?>
		</div>
	<?php endif; ?>

	<?php if(count($this->items)): ?>
		<div class="catItemList clearfix">
			<?php foreach($this->items as $item): ?>
				<div class="itemContainer">
					<div class="catItemView clearfix">						
						<div class="catItemContent k2ItemBlock">
							<?php if($item->params->get('genericItemImage') && !empty($item->imageGeneric)): ?>
								<div class="catItemImageBlock clearfix">
									<span class="catItemImage">
										<a href="<?php echo $item->link; ?>" title="<?php if(!empty($item->image_caption)) echo $item->image_caption; else echo $item->title; ?>">
											<img src="<?php echo $item->imageGeneric; ?>" alt="<?php if(!empty($item->image_caption)) echo $item->image_caption; else echo $item->title; ?>" style="width:<?php echo $item->params->get('itemImageGeneric'); ?>px; height:auto;" />
										</a>
									</span>
								</div>
							<?php endif; ?>
							<div class="catItemBody">
								<div class="catItemBody-i">
									<div class="catItemHeader clearfix">
										<?php if($item->params->get('genericItemTitle')): ?>
											<h2 class="catItemTitle">
												<?php if ($item->params->get('genericItemTitleLinked')): ?>
													<a href="<?php echo $item->link; ?>">
														<?php echo $item->title; ?>
													</a>
												<?php else: ?>
													<?php echo $item->title; ?>
												<?php endif; ?>
											</h2>
										<?php endif; ?>	
										<?php if($item->params->get('genericItemCategory')): ?>
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
										<?php endif; ?>
									</div>
									<?php if($item->params->get('genericItemIntroText')): ?>
										<div class="catItemIntroText">
											<?php echo $item->introtext; ?>
										</div>
									<?php endif; ?>
									<?php if($item->params->get('genericItemExtraFields') && count($item->extra_fields)): ?>
										<div class="catItemExtraFields">
											<h4><?php echo JText::_('K2_ADDITIONAL_INFO'); ?></h4>
											<ul>
												<?php foreach ($item->extra_fields as $key=>$extraField): ?>
													<li class="<?php echo ($key%2) ? "odd" : "even"; ?> type<?php echo ucfirst($extraField->type); ?> group<?php echo $extraField->group; ?>">
														<span class="catItemExtraFieldsLabel"><?php echo $extraField->name; ?></span>
														<span class="catItemExtraFieldsValue"><?php echo ($extraField->type=='date')?JHTML::_('date', $extraField->value, JText::_('K2_DATE_FORMAT_LC')):$extraField->value; ?></span>
													</li>
												<?php endforeach; ?>
											</ul>
										</div>
									<?php endif; ?>
									<?php if ($item->params->get('genericItemReadMore')): ?>
										<div class="catItemReadMore">
											<a class="button read-more" href="<?php echo $item->link; ?>">
												<?php echo JText::_('K2_READ_MORE'); ?>
											</a>
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<?php if($this->pagination->getPagesLinks()): ?>
			<div class="pagination">
				<?php echo str_replace('</ul>', '<li class="counter">'.$this->pagination->getPagesCounter().'</li></ul>', $this->pagination->getPagesLinks()); ?>
			</div>
		<?php endif; ?>
	<?php endif; ?>	
	
	<?php if($this->params->get('tagFeedIcon',1)): ?>
		<div class="k2FeedIcon">
			<a href="<?php echo $this->feed; ?>" title="<?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?>">
				<span><?php //echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?></span>
			</a>
		</div>
	<?php endif; ?>
</div>
<!-- End K2 Generic Layout -->