<?php
/**
 * @version		$Id: category.php 1527 2012-03-12 12:45:31Z lefteris.kavadas $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

?>

<!-- Start K2 Category Layout -->
<div id="k2Container" class="itemListView<?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?> ot-porfolio">
    <?php if($this->params->get('show_page_title')): ?>
    <div class="componentheading<?php echo $this->params->get('pageclass_sfx')?>">
        <?php echo $this->escape($this->params->get('page_title')); ?>
    </div>
    <?php endif; ?>
    
    <?php if(isset($this->category) || ( $this->params->get('subCategories') && isset($this->subCategories) && count($this->subCategories) )): ?>
    <div class="itemListCategoriesBlock">
        <?php if(isset($this->category) && ( $this->params->get('catImage') || $this->params->get('catTitle') || ($this->params->get('catDescription')  && $this->category->description != '' ) || $this->category->event->K2CategoryDisplay )): ?>
        <div class="itemListCategory">
            <?php if(isset($this->addLink)): ?>
            <span class="catItemAddLink">
	            <a class="modal" rel="{handler:'iframe',size:{x:990,y:650}}" href="<?php echo $this->addLink; ?>">
	            	<?php echo JText::_('K2_ADD_A_NEW_ITEM_IN_THIS_CATEGORY'); ?>
	            </a>
            </span>
            <?php endif; ?>
            
            <?php if($this->params->get('catImage') && $this->category->image): ?>
            <img alt="<?php echo K2HelperUtilities::cleanHtml($this->category->name); ?>" src="<?php echo $this->category->image; ?>" style="width:<?php echo $this->params->get('catImageWidth'); ?>px; height:auto;" />
            <?php endif; ?>
            
            <?php if($this->params->get('catTitle')): ?>
            <h2>
            	<?php echo $this->category->name; ?>
                <?php if($this->params->get('catTitleItemCounter')) echo ' ('.$this->pagination->total.')'; ?>
            </h2>
            <?php endif; ?>
            
            <?php if($this->params->get('catDescription') && $this->category->description != '' ): ?>
            <p><?php echo $this->category->description; ?></p>
            <?php endif; ?>

            <?php echo $this->category->event->K2CategoryDisplay; ?>
        </div>
        <?php endif; ?>
        
        <?php if($this->params->get('subCategories') && isset($this->subCategories) && count($this->subCategories)): ?>
        <div class="itemListSubCategories">
            <h2><?php echo JText::_('K2_CHILDREN_CATEGORIES'); ?></h2>
            <?php foreach($this->subCategories as $key=>$subCategory): ?>
	            <?php
					if( (($key+1)%($this->params->get('subCatColumns'))==0) || count($this->subCategories)<$this->params->get('subCatColumns') )
						$lastContainer= ' subCategoryContainerLast';
					else
						$lastContainer='';
				?>
	            <div class="subCategoryContainer<?php echo $lastContainer; ?>"<?php echo (count($this->subCategories)==1) ? '' : ' style="width:'.(number_format(100/$this->params->get('subCatColumns'), 1)-0.1).'%;"'; ?>>
	                <div class="subCategory">                    	
                    	<?php if($this->params->get('subCatImage') && $subCategory->image): ?>
                    	<a class="subCategoryImage" href="<?php echo $subCategory->link; ?>">
                    		<img alt="<?php echo K2HelperUtilities::cleanHtml($subCategory->name); ?>" src="<?php echo $subCategory->image; ?>" />
                    	</a>
                    	<?php endif; ?>
	                    
	                    <?php if($this->params->get('subCatTitle')): ?>
                        <h3>
                            <a href="<?php echo $subCategory->link; ?>">
                            	<?php echo $subCategory->name; ?>
                            	<span>
                            		<?php if($this->params->get('subCatTitleItemCounter')) echo ' ('.$subCategory->numOfItems.')'; ?>
                            	</span>
                            </a>
                        </h3>
	                    <?php endif; ?>
	                        
                        <?php if($this->params->get('subCatDescription')): ?>
                        	<?php echo $subCategory->description; ?>
                        <?php endif; ?>

                        <a class="button" href="<?php echo $subCategory->link; ?>">
                        	<?php echo JText::_('K2_VIEW_ITEMS'); ?>
                        </a>
	                </div>
	            </div>
	            <?php if(($key+1)%($this->params->get('subCatColumns'))==0): ?>
	            <div class="clr"></div>
	            <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    
    <?php if((isset($this->leading) || isset($this->primary) || isset($this->secondary) || isset($this->links)) && (count($this->leading) || count($this->primary) || count($this->secondary) || count($this->links))): ?>
    <div class="itemList">
        <?php if(isset($this->leading) && count($this->leading)): ?>
        <div id="itemListLeading">
            <?php foreach($this->leading as $key=>$item): ?>
	            <?php
					// Define a CSS class for the last container on each row
					if( (($key+1)%($this->params->get('num_leading_columns'))==0) || count($this->leading)<$this->params->get('num_leading_columns') )
						$lastContainer= ' itemContainerLast';
					else
						$lastContainer='';
					if ($key == 0)
						$firstContainer = ' itemContainerFirst';
					else
						$firstContainer = '';
				?>
	            <div class="itemContainer<?php echo $firstContainer; ?><?php echo $lastContainer; ?> <?php echo (($key+1)%2) ? "odd" : "even"; ?>"<?php echo (count($this->leading)==1) ? '' : ' style="width:'.(number_format(100/$this->params->get('num_leading_columns'), 1)-0.1).'%;"'; ?>>
	                <?php
						// Load category_item.php by default
						$this->item=$item;
						echo $this->loadTemplate('item');
					?>
	            </div>
	            <?php if(($key+1)%($this->params->get('num_leading_columns'))==0): ?>
	            <div class="clr"></div>
	            <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        
        <?php if(isset($this->primary) && count($this->primary)): ?>
        <div id="itemListPrimary">
            <?php foreach($this->primary as $key=>$item): ?>
	            <?php
				// Define a CSS class for the last container on each row
				if( (($key+1)%($this->params->get('num_primary_columns'))==0) || count($this->primary)<$this->params->get('num_primary_columns') )
					$lastContainer= ' itemContainerLast';
				else
					$lastContainer='';
				if ($key == 0)
					$firstContainer = ' itemContainerFirst';
				else
					$firstContainer = '';
				?>
	            <div class="itemContainer<?php echo $firstContainer; ?><?php echo $lastContainer; ?> <?php echo (($key+1)%2) ? "odd" : "even"; ?>"<?php echo (count($this->primary)==1) ? '' : ' style="width:'.(number_format(100/$this->params->get('num_primary_columns'), 1) - 0.1).'%;"'; ?>>
	                <?php
						// Load category_item.php by default
						$this->item=$item;
						echo $this->loadTemplate('item');
					?>
	            </div>
	            <?php if(($key+1)%($this->params->get('num_primary_columns'))==0): ?>
	            <div class="clr"></div>
	            <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        
        <?php if(isset($this->secondary) && count($this->secondary)): ?>
        <div id="itemListSecondary">
            <?php foreach($this->secondary as $key=>$item): ?>
	            <?php
					// Define a CSS class for the last container on each row
					if( (($key+1)%($this->params->get('num_secondary_columns'))==0) || count($this->secondary)<$this->params->get('num_secondary_columns') )
						$lastContainer= ' itemContainerLast';
					else
						$lastContainer='';
					if ($key == 0)
						$firstContainer = ' itemContainerFirst';
					else
						$firstContainer = '';
				?>
	            <div class="itemContainer<?php echo $firstContainer; ?><?php echo $lastContainer; ?> <?php echo (($key+1)%2) ? "odd" : "even"; ?>"<?php echo (count($this->secondary)==1) ? '' : ' style="width:'.(number_format(100/$this->params->get('num_secondary_columns'), 1)-0.1).'%;"'; ?>>
	                <?php
	
						// Load category_item.php by default
	
						$this->item=$item;
	
						echo $this->loadTemplate('item');
	
					?>
	            </div>
	            <?php if(($key+1)%($this->params->get('num_secondary_columns'))==0): ?>
	            <div class="clr"></div>
	            <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        
        <?php if(isset($this->links) && count($this->links)): ?>
        <div id="itemListLinks">
            <h4><?php echo JText::_('K2_MORE'); ?></h4>
            
            <?php if(count($this->links)) : ?>
	            <ul>
	            <?php foreach($this->links as $key=>$item): ?>
	                <?php
						// Load category_item_links.php by default
						$this->item=$item;
						echo $this->loadTemplate('item_links');
					?>
	            <?php endforeach; ?>
	            </ul>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    
    <?php if(count($this->pagination->getPagesLinks())): ?>
		<?php if($this->params->get('catPagination')): ?>
			<div class="pagination">
				<?php echo str_replace('</ul>', '<li class="counter">'.$this->pagination->getPagesCounter().'</li></ul>', $this->pagination->getPagesLinks()); ?>
			</div>
		<?php endif; ?>
    <?php endif; ?>
    
    <?php if($this->params->get('catFeedIcon')): ?>
    <div class="k2FeedIcon">
        <a href="<?php echo $this->feed; ?>" title="<?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?>">
        	<span><?php //echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?></span>
        </a>
    </div>
    <?php endif; ?>
</div>
<!-- End K2 Category Layout -->