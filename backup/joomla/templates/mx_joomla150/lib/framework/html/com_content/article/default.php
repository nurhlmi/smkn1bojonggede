<?php
/**
 * @version		$Id: default.php 20817 2011-02-21 21:48:16Z dextercowley $
 * @package		Joomla.Site
 * @subpackage	com_content
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// Create shortcuts to some parameters.
$params  = $this->item->params;
$images  = json_decode($this->item->images);
$urls    = json_decode($this->item->urls);
$canEdit = $this->item->params->get('access-edit');
$user    = JFactory::getUser();
JHtml::_('behavior.caption');
?>

<div class="item-page<?php echo $this->pageclass_sfx?>">
	<?php if ($this->params->get('show_page_heading', 1)) : ?>
	<div class="page-header">
		<h1> <?php echo $this->escape($this->params->get('page_heading')); ?> </h1>
	</div>
	<?php endif;

	if (!empty($this->item->pagination) AND $this->item->pagination && !$this->item->paginationposition && $this->item->paginationrelative)
	{
		echo $this->item->pagination;
	}
	?>

	<?php if ($params->get('show_title')) : ?>
		<div class="page-header">
			<h2>
				<?php if ($params->get('link_titles') && !empty($this->item->readmore_link)) : ?>
				<a href="<?php echo $this->item->readmore_link; ?>"> <?php echo $this->escape($this->item->title); ?></a>
				<?php else : ?>
				<?php echo $this->escape($this->item->title); ?>
				<?php endif; ?>
			</h2>
			
			<!--Start Tools-->
			<?php 
				if ($params->get('show_create_date') 
				|| ($params->get('show_publish_date'))
				|| ($params->get('show_author') && !empty($this->item->author ))
				|| ($params->get('show_category')) 
				|| ($params->get('show_parent_category'))	
				|| ($params->get('show_print_icon')) 
				|| ($params->get('show_email_icon'))
				|| ($params->get('show_hits'))): 
				?>
				<div class="article-tools clearfix">
					<dl class="article-info">
						<?php if ($params->get('show_parent_category')) : ?>
							<dd>
								<div class="parent-category-name">
									<?php	$title = $this->escape($this->item->parent_title);
								$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->parent_slug)).'">'.$title.'</a>';?>
									<?php if ($params->get('link_parent_category') and $this->item->parent_slug) : ?>
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
										<?php 	$title = $this->escape($this->item->category_title);
									$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug)).'">'.$title.'</a>';?>
										<?php if ($params->get('link_category') and $this->item->catslug) : ?>
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
									<?php $author =  $this->item->author; ?>
									<?php $author = ($this->item->created_by_alias ? $this->item->created_by_alias : $author);?>

										<?php if (!empty($this->item->contactid ) &&  $params->get('link_author') == true):?>
											<?php 	echo JText::sprintf('COM_CONTENT_WRITTEN_BY' , 
											 JHTML::_('link',JRoute::_('index.php?option=com_contact&view=contact&id='.$this->item->contactid),$author)); ?>

										<?php else :?>
											<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
										<?php endif; ?>
								</div>
							</dd>
						<?php endif; ?>
						
						<?php if ($params->get('show_create_date')) : ?>
							<dd>
								<div class="create">
									<i class="icon-calendar"></i> <?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHTML::_('date',$this->item->created, JText::_('DATE_FORMAT_LC3'))); ?>
								</div>
							</dd>
						<?php endif; ?>
						<?php if ($params->get('show_modify_date')) : ?>
							<dd>
								<div class="modified">
									<i class="icon-calendar"></i> <?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC3'))); ?>
								</div>
							</dd>
						<?php endif; ?>		
						<?php if ($params->get('show_publish_date')) : ?>
							<dd>
								<div class="published">
									<i class="icon-calendar"></i> <?php echo JText::sprintf('COM_CONTENT_PUBLISHED_DATE', JHTML::_('date',$this->item->publish_up, JText::_('DATE_FORMAT_LC3'))); ?>
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
					</dl>
					
					<?php if ($canEdit ||  $params->get('show_print_icon') || $params->get('show_email_icon')) : ?>
					<div class="btn-group pull-right"> <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> <i class="icon-cog"></i> <span class="caret"></span> </a>
						<?php // Note the actions class is deprecated. Use dropdown-menu instead. ?>
						<ul class="dropdown-menu actions">
							<?php if (!$this->print) : ?>
							<?php if ($params->get('show_print_icon')) : ?>
							<li class="print-icon"> <?php echo JHtml::_('icon.print_popup',  $this->item, $params); ?> </li>
							<?php endif; ?>
							<?php if ($params->get('show_email_icon')) : ?>
							<li class="email-icon"> <?php echo JHtml::_('icon.email',  $this->item, $params); ?> </li>
							<?php endif; ?>
							<?php if ($canEdit) : ?>
							<li class="edit-icon"> <?php echo JHtml::_('icon.edit', $this->item, $params); ?> </li>
							<?php endif; ?>
							<?php else : ?>
							<li> <?php echo JHtml::_('icon.print_screen',  $this->item, $params); ?> </li>
							<?php endif; ?>
						</ul>
					</div>
					<?php endif; ?>	
				
				</div>
				<?php endif; ?>
				<!--End Tools-->
		</div>
	<?php endif; ?>

	<?php  if (!$params->get('show_intro')) : echo $this->item->event->afterDisplayTitle; endif; ?>
	<?php echo $this->item->event->beforeDisplayContent; ?>

	<?php if (isset ($this->item->toc)) : ?>
		<?php echo $this->item->toc; ?>
	<?php endif; ?>

	<?php if (isset($urls) AND ((!empty($urls->urls_position) AND ($urls->urls_position=='0')) OR  ($params->get('urls_position')=='0' AND empty($urls->urls_position) ))
			OR (empty($urls->urls_position) AND (!$params->get('urls_position')))): ?>
	<?php echo $this->loadTemplate('links'); ?>
	<?php endif; ?>

	<?php if ($params->get('access-view')):?>
	<?php  if (isset($images->image_fulltext) and !empty($images->image_fulltext)) : ?>
	<?php $imgfloat = (empty($images->float_fulltext)) ? $params->get('float_fulltext') : $images->float_fulltext; ?>
	<div class="img-fulltext-<?php echo htmlspecialchars($imgfloat); ?>">
	<img
		<?php if ($images->image_fulltext_caption):
			echo 'class="caption"'.' title="' .htmlspecialchars($images->image_fulltext_caption) .'"';
		endif; ?>
		src="<?php echo htmlspecialchars($images->image_fulltext); ?>" alt="<?php echo htmlspecialchars($images->image_fulltext_alt); ?>"/>
	</div>
	<?php endif; ?>
	<?php
	if (!empty($this->item->pagination) AND $this->item->pagination AND !$this->item->paginationposition AND !$this->item->paginationrelative):
		echo $this->item->pagination;
	 endif;
	?>
	<?php echo $this->item->text; ?>
	<?php
	if (!empty($this->item->pagination) AND $this->item->pagination AND $this->item->paginationposition AND!$this->item->paginationrelative):
		 echo $this->item->pagination;?>
	<?php endif; ?>

	<?php if (isset($urls) AND ((!empty($urls->urls_position)  AND ($urls->urls_position=='1')) OR ( $params->get('urls_position')=='1') )): ?>
	<?php echo $this->loadTemplate('links'); ?>
	<?php endif; ?>
	<?php //optional teaser intro text for guests ?>
	<?php elseif ($params->get('show_noauth') == true and  $user->get('guest') ) : ?>
	<?php echo $this->item->introtext; ?>
	<?php //Optional link to let them register to see the whole article. ?>
	<?php if ($params->get('show_readmore') && $this->item->fulltext != null) :
		$link1 = JRoute::_('index.php?option=com_users&view=login');
		$link = new JURI($link1);?>
		<p class="readmore">
		<a href="<?php echo $link; ?>">
		<?php $attribs = json_decode($this->item->attribs);  ?>
		<?php
		if ($attribs->alternative_readmore == null) :
			echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
		elseif ($readmore = $this->item->alternative_readmore) :
			echo $readmore;
			if ($params->get('show_readmore_title', 0) != 0) :
			    echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
			endif;
		elseif ($params->get('show_readmore_title', 0) == 0) :
			echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');
		else :
			echo JText::_('COM_CONTENT_READ_MORE');
			echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
		endif; ?></a>
		</p>
	<?php endif; ?>
	<?php endif; ?>
	<?php
	if (!empty($this->item->pagination) AND $this->item->pagination AND $this->item->paginationposition AND $this->item->paginationrelative):
		 echo $this->item->pagination;?>
	<?php endif; ?>
	<?php echo $this->item->event->afterDisplayContent; ?>
</div>