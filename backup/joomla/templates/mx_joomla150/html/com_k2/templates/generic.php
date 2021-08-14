<?php
/**
 * @version		$Id: generic.php 1492 2012-02-22 17:40:09Z joomlaworks@gmail.com $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

?>

<!-- Start K2 Generic Layout -->
<div id="k2Container" class="genericView<?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?>">
	<?php if($this->params->get('show_page_title')): ?>
	<div class="componentheading<?php echo $this->params->get('pageclass_sfx')?>">
		<?php echo $this->escape($this->params->get('page_title')); ?>
	</div>
	<?php endif; ?>

	<?php if(count($this->items)): ?>

		<?php if($this->pagination->getPagesLinks()): ?>
		<div class="pagination">
			<?php echo str_replace('</ul>', '<li class="counter">'.$this->pagination->getPagesCounter().'</li></ul>', $this->pagination->getPagesLinks()); ?>
		</div>
		<?php endif; ?>
		<div class="catItemList">
			<?php $i = 0; ?>
			<?php foreach($this->items as $item):
			$i++; ?>
			<div class="catItemView <?php echo ($i%2) ? "odd" : "even"; ?>">
			
			<?php if($item->params->get('genericItemDateCreated')): ?>
			<div class="gkDate">
				<div>
				  	<?php echo JHTML::_('date', $item->created , JText::_('d')); ?>
				  	<?php echo JHTML::_('date', $item->created , JText::_('M')); ?>
				  </div>
			</div>
			<?php endif; ?>
			
			<div class="k2ItemBlock">
				<div class="catItemHeader"> 
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
						<span class="catItemCategory">
						
							<?php if($item->params->get('catItemAuthor')): 
							$author = &JFactory::getUser($item->created_by);
							$item->author = $author;
							$item->author->link = JRoute::_(K2HelperRoute::getUserRoute($item->created_by));
							$item->author->profile = K2ModelItem::getUserProfile($item->created_by);?>
							<span class="catItemAuthor">
								<?php echo K2HelperUtilities::writtenBy($item->author->profile->gender); ?>
								<a rel="author" href="<?php echo $item->author->link; ?>"><?php echo $item->author->name; ?></a>
							</span>
							<?php endif; ?>
							<?php if($item->params->get('itemDateCreated')): ?>
							<span class="itemDateCreated">
								<?php echo JHTML::_('date', $item->created , JText::_('K2_DATE_FORMAT_LC2')); ?>
								<?php //echo JHTML::_('date', $item->created , JText::_('M')); ?>
								<?php //echo JHTML::_('date', $item->created , JText::_('d')); ?>
							</span>
							<?php endif; ?>
							<?php if($item->params->get('catItemCategory')): ?>
							<span><?php echo JText::_('K2_PUBLISHED_IN'); ?></span>
							<a href="<?php echo $item->category->link; ?>"><?php echo $item->category->name; ?></a>
							<?php endif; ?>
						</span>
					</div>
				<?php endif; ?>
			  </div>
			  
			  <div class="catItemBody">
				  <?php if($item->params->get('genericItemImage') && !empty($item->imageGeneric)): ?>
				  <div class="catItemImageBlock">
					  <span class="catItemImage">
						<a href="<?php echo $item->link; ?>" title="<?php if(!empty($item->image_caption)) echo K2HelperUtilities::cleanHtml($item->image_caption); else echo K2HelperUtilities::cleanHtml($item->title); ?>">
							<img src="<?php echo $item->imageGeneric; ?>" alt="<?php if(!empty($item->image_caption)) echo K2HelperUtilities::cleanHtml($item->image_caption); else echo K2HelperUtilities::cleanHtml($item->title); ?>" style="width:<?php echo $item->params->get('itemImageGeneric'); ?>px; height:auto;" />
						</a>
					  </span>
				  </div>
				  <?php endif; ?>

				  <?php if($item->params->get('genericItemIntroText')): ?>
				  <div class="catItemIntroText">
					<?php echo $item->introtext; ?>
				  </div>
				  <?php endif; ?>
			  </div>

				<?php if($item->params->get('genericItemExtraFields') && count($item->extra_fields)): ?>
				<div class="catItemExtraFields">
					<h4><?php echo JText::_('K2_ADDITIONAL_INFO'); ?></h4>
					
					<ul>
						<?php foreach ($item->extra_fields as $key=>$extraField): ?>
							<?php if($extraField->value): ?>
							<li class="<?php echo ($key%2) ? "odd" : "even"; ?> type<?php echo ucfirst($extraField->type); ?> group<?php echo $extraField->group; ?>">
								<span class="genericItemExtraFieldsLabel"><?php echo $extraField->name; ?></span>
								<span class="genericItemExtraFieldsValue"><?php echo $extraField->value; ?></span>		
							</li>
							<?php endif; ?>
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
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
	
	<?php if($this->params->get('genericFeedIcon',1)): ?>
	<div class="k2FeedIcon">
		<a href="<?php echo $this->feed; ?>" title="<?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?>">
			<span><?php //echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?></span>
		</a>
	</div>
	<?php endif; ?>
</div>
<!-- End K2 Generic Layout -->