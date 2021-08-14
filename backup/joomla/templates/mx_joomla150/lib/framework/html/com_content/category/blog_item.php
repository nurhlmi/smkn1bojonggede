<?php
/**
 * @version		$Id: blog_item.php 20488 2011-01-30 18:56:00Z dextercowley $
 * @package		Joomla.Site
 * @subpackage	com_content
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Create a shortcut for params.
$params 	= &$this->item->params;
$images 	= json_decode($this->item->images);
$canEdit 	= $this->item->params->get('access-edit');
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
$info 		= $this->item->params->get('info_block_position', 0);
JHtml::_('behavior.tooltip');
JHtml::_('behavior.framework');

$parentslug = '';
$catslug = '';

?>

<div class="item_innerDiv clearfix">
<?php if ($params->get('show_title') || $this->item->state == 0) : ?>
	<div class="page-header">
		<?php if ($params->get('show_title')) : ?>
			<h2>
				<?php if ($params->get('link_titles') && $params->get('access-view')) : ?>
					<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid)); ?>">
					<?php echo $this->escape($this->item->title); ?></a>
				<?php else : ?>
					<?php echo $this->escape($this->item->title); ?>
				<?php endif; ?>
			</h2>
		<?php endif; ?>

		<?php if ($this->item->state == 0): ?>
			<span class="label label-warning"><?php echo JText::_('JUNPUBLISHED'); ?></span>
		<?php endif; ?>
		
		<!--Start Article Tools-->
		<?php 
		if ($params->get('show_create_date') 
		|| ($params->get('show_publish_date'))
		|| ($params->get('show_modify_date'))
		|| ($params->get('show_author') && !empty($this->item->author ))
		|| ($params->get('show_category')) 
		|| ($params->get('show_parent_category'))	
		|| ($params->get('show_print_icon')) 
		|| ($params->get('show_email_icon'))
		|| ($params->get('show_hits')) 
		|| $canEdit): 
		?>
		<div class="article-tools clearfix">
			<div class="article-info muted">
				<dl class="article-info">
				<?php $parentslug = (JVERSION<3) ? $this->item->parent_id : $this->item->parent_slug; ?>
				<?php if ($params->get('show_parent_category') && !empty($parentslug)) : ?>
					<dd>
						<div class="parent-category-name">
							<?php	$title = $this->escape($this->item->parent_title);
							$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($parentslug)).'">'.$title.'</a>';?>
							<?php if ($params->get('link_parent_category') and !empty($parentslug)) : ?>
								<?php echo JText::sprintf('COM_CONTENT_PARENT', $url); ?>
							<?php else : ?>
								<?php echo JText::sprintf('COM_CONTENT_PARENT', $title); ?>
							<?php endif; ?>
						</div>
					</dd>
				<?php endif; ?>
				<?php if ($params->get('show_category')) : ?>
					<dd>
						<div class="category-name">
							<?php $catslug = (JVERSION<3) ? $this->item->catid : $this->item->catslug;?>
							<?php $title = $this->escape($this->item->category_title);
								$url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($catslug)) . '">' . $title . '</a>';?>
							<?php if ($params->get('link_category') and $catslug) : ?>
								<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $url); ?>
							<?php else : ?>
								<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $title); ?>
							<?php endif; ?>
						</div>
					</dd>
				<?php endif; ?>
				
				<?php if ($params->get('show_author') && !empty($this->item->author )) : ?>
					<dd>
						<div class="createdby">
						<?php $author = $this->item->author; ?>
						<?php $author = ($this->item->created_by_alias ? $this->item->created_by_alias : $author); ?>
						<?php if (!empty($this->item->contactid ) && $params->get('link_author') == true) : ?>
						<?php
						echo JText::sprintf(
								'COM_CONTENT_WRITTEN_BY',
								JHtml::_('link', JRoute::_('index.php?option=com_contact&view=contact&id='.$this->item->contactid), $author)
						); ?>
						<?php else :?>
						<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
						<?php endif; ?>
						</div>
					</dd>	
				<?php endif; ?>			

				<?php if ($params->get('show_publish_date')) : ?>
					<dd>
						<div class="published">
							<i class="icon-calendar"></i> <?php echo JText::sprintf('COM_CONTENT_PUBLISHED_DATE_ON', JHtml::_('date', $this->item->publish_up, JText::_('DATE_FORMAT_LC3'))); ?>
						</div>
					</dd>
				<?php endif; ?>

				<?php if ($info == 0): ?>
					<?php if ($params->get('show_modify_date')) : ?>
						<dd>
							<div class="modified">
								<i class="icon-calendar"></i> <?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC3'))); ?>
							</div>
						</dd>
					<?php endif; ?>
					<?php if ($params->get('show_create_date')) : ?>
						<dd>
							<div class="create">
								<i class="icon-calendar"></i> <?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC3'))); ?>
							</div>
						</dd>
					<?php endif; ?>

					<?php if ($params->get('show_hits')) : ?>
						<dd>
							<div class="hits">
								  <i class="icon-eye-open"></i> <?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $this->item->hits); ?>
							</div>
						</dd>
					<?php endif; ?>
				<?php endif; ?>
				</dl>
			</div>	

			<?php if ($params->get('show_print_icon') || $params->get('show_email_icon') || $canEdit) : ?>
			<div class="btn-group pull-right"> <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> <i class="icon-cog"></i> <span class="caret"></span> </a>
				<ul class="dropdown-menu">
					<?php if ($params->get('show_print_icon')) : ?>
					<li class="print-icon"> <?php echo JHtml::_('icon.print_popup', $this->item, $params); ?> </li>
					<?php endif; ?>
					<?php if ($params->get('show_email_icon')) : ?>
					<li class="email-icon"> <?php echo JHtml::_('icon.email', $this->item, $params); ?> </li>
					<?php endif; ?>
					<?php if ($canEdit) : ?>
					<li class="edit-icon"> <?php echo JHtml::_('icon.edit', $this->item, $params); ?> </li>
					<?php endif; ?>
				</ul>
			</div>
			<?php endif; ?>
			<div class="clr"></div>
		</div>
		<div class="clr"></div>
		<?php endif; ?>
		<!--End Article Tools -->		
	</div>
<?php endif; ?>

<?php echo $this->item->event->beforeDisplayContent; ?>

<?php if (!$params->get('show_intro')) : ?>
	<?php echo $this->item->event->afterDisplayTitle; ?>
<?php endif; ?>

<?php // to do not that elegant would be nice to group the params ?>

<?php  if (isset($images->image_intro) and !empty($images->image_intro)) : ?>
	<?php $imgfloat = (empty($images->float_intro)) ? $params->get('float_intro') : $images->float_intro; ?>
	<div class="img-intro-<?php echo htmlspecialchars($imgfloat); ?>">
	<img
		<?php if ($images->image_intro_caption):
			echo 'class="caption"'.' title="' .htmlspecialchars($images->image_intro_caption) .'"';
		endif; ?>
		src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"/>
	</div>
<?php endif; ?>
<?php echo $this->item->introtext; ?>

<?php if ($params->get('show_readmore') && $this->item->readmore) :
	if ($params->get('access-view')) :
		$link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
	else :
		$menu = JFactory::getApplication()->getMenu();
		$active = $menu->getActive();
		$itemId = $active->id;
		$link1 = JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId);
		$returnURL = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug));
		$link = new JURI($link1);
		$link->setVar('return', base64_encode($returnURL));
	endif;
?>
	<a class="btn readmore" href="<?php echo $link; ?>">
		<?php if (!$params->get('access-view')) :
			echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
		elseif ($readmore = $this->item->alternative_readmore) :
			echo $readmore;
			if ($params->get('show_readmore_title', 0) != 0) :
				echo JHTML::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
			endif;
		elseif ($params->get('show_readmore_title', 0) == 0) :
			echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');	
		else :
			echo JText::_('COM_CONTENT_READ_MORE');
			echo JHTML::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
		endif; ?></a>
<?php endif; ?>
<?php echo $this->item->event->afterDisplayContent; ?>
<div class="item-separator"></div>
</div>