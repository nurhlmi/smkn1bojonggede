<?php
/**
 * @version    2.8.x
 * @package    K2
 * @author     JoomlaWorks http://www.joomlaworks.net
 * @copyright  Copyright (c) 2006 - 2017 JoomlaWorks Ltd. All rights reserved.
 * @license    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;
?>

<div id="k2ModuleBox<?php echo $module->id; ?>" class="k2ItemsBlock<?php if($params->get('moduleclass_sfx')) echo ' '.$params->get('moduleclass_sfx'); ?>">

	<?php if($params->get('itemPreText')): ?>
	<p class="modulePretext"><?php echo $params->get('itemPreText'); ?></p>
	<?php endif; ?>

	<?php if(count($items)): ?>
  <ul>
    <?php foreach ($items as $key=>$item):	?>
    <li class="<?php echo ($key%2) ? "odd" : "even"; if(count($items)==$key+1) echo ' lastItem'; ?>">

      <?php echo $item->event->BeforeDisplay; ?>

      <?php echo $item->event->K2BeforeDisplay; ?>
	  
	  <?php if($params->get('itemImage') && isset($item->image)): ?>
	      <img src="<?php echo $item->image; ?>" alt="<?php echo K2HelperUtilities::cleanHtml($item->title); ?>" />
	    <?php endif; ?>
		
		<div class="image_description text-center" data-toggle="modal" data-target="#image_lightbox">
			<div class="icon"></div>
			<?php if($params->get('itemTitle')): ?>
				<p><?php echo $item->title; ?></p>
			<?php endif; ?>
		</div>
						
      <?php echo $item->event->AfterDisplayTitle; ?>

      <?php echo $item->event->K2AfterDisplayTitle; ?>

      <?php echo $item->event->BeforeDisplayContent; ?>

      <?php echo $item->event->K2BeforeDisplayContent; ?>

      <?php echo $item->event->AfterDisplayContent; ?>

      <?php echo $item->event->K2AfterDisplayContent; ?>

      <?php echo $item->event->AfterDisplay; ?>

      <?php echo $item->event->K2AfterDisplay; ?>

    </li>
    <?php endforeach; ?>
  </ul>
  <?php endif; ?>

	<?php if($params->get('itemCustomLink')): ?>
	<a class="moduleCustomLink" href="<?php echo $itemCustomLinkURL; ?>" title="<?php echo K2HelperUtilities::cleanHtml($itemCustomLinkTitle); ?>"><?php echo $itemCustomLinkTitle; ?></a>
	<?php endif; ?>

	<?php if($params->get('feed')): ?>
	<div class="k2FeedIcon">
		<a href="<?php echo JRoute::_('index.php?option=com_k2&view=itemlist&format=feed&moduleID='.$module->id); ?>" title="<?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?>">
			<i class="icon-feed"></i>
			<span><?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?></span>
		</a>
		<div class="clr"></div>
	</div>
	<?php endif; ?>

</div>

<div class="modal fade" id="image_lightbox" tabindex="-1" role="dialog" >
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="image_lightbox_label">Modal title</h4>
			</div>
			<div class="modal-body">
				<img src="imgs/hall.jpg" alt="propertyimg" class="img-responsive">
				<button type="button" class="previous_image_btn"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
				<button type="button" class="next_image_btn"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
			</div>
		</div>
	</div>
</div>		
