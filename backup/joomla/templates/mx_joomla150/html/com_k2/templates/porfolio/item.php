<?php
/**
 * @version		$Id: item.php 1492 2012-02-22 17:40:09Z joomlaworks@gmail.com $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

?>
<?php if(JRequest::getInt('print')==1): ?>

<a class="itemPrintThisPage" rel="nofollow" href="#" onclick="window.print();return false;">
<span><?php echo JText::_('K2_PRINT_THIS_PAGE'); ?></span>
</a>
<?php endif; ?>
<span id="startOfPageId<?php echo JRequest::getInt('id'); ?>"></span>
<div id="k2Container" class="itemView<?php echo ($this->item->featured) ? ' itemIsFeatured' : ''; ?><?php if($this->item->params->get('pageclass_sfx')) echo ' '.$this->item->params->get('pageclass_sfx'); ?> ot-porfolio">
		
	<div class="itemBody">
		<?php if($this->item->params->get('itemImage') && !empty($this->item->image)): ?>
			<div class="itemImageBlock">
				<span class="itemImage">
					<a class="modal" rel="{handler: 'image'}" href="<?php echo $this->item->imageXLarge; ?>" title="<?php echo JText::_('K2_CLICK_TO_PREVIEW_IMAGE'); ?>">
						<img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px; height:auto;" />
					</a>
				</span>
				<?php if($this->item->params->get('itemImageMainCaption') && !empty($this->item->image_caption)): ?>
					<span class="itemImageCaption"><?php echo $this->item->image_caption; ?></span>
				<?php endif; ?>
				<?php if($this->item->params->get('itemImageMainCredits') && !empty($this->item->image_credits)): ?>
					<span class="itemImageCredits"><?php echo $this->item->image_credits; ?></span>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php echo $this->item->event->BeforeDisplay; ?>
		<?php echo $this->item->event->K2BeforeDisplay; ?>
		<?php if(isset($this->item->editLink)): ?>
			<span class="itemEditLink">
				<a class="modal" rel="{handler:'iframe',size:{x:990,y:550}}" href="<?php echo $this->item->editLink; ?>">
					<?php echo JText::_('K2_EDIT_ITEM'); ?>
				</a>
			</span>
		<?php endif; ?>		
		<div class="itemHeader">
			<?php if(
				$this->item->params->get('itemFontResizer') ||
				$this->item->params->get('itemAuthor') ||
				$this->item->params->get('itemPrintButton') ||
				$this->item->params->get('itemEmailButton') ||
				$this->item->params->get('itemSocialButton') ||
				$this->item->params->get('itemVideoAnchor') ||
				$this->item->params->get('itemImageGalleryAnchor') ||
				$this->item->params->get('itemTitle')
			): ?>
				<?php if($this->item->params->get('itemTitle')): ?>
					<h2 class="itemTitle">
							<?php echo $this->item->title; ?>
							<?php if($this->item->params->get('itemFeaturedNotice') && $this->item->featured): ?>
							<span><sup><?php echo JText::_('K2_FEATURED'); ?></sup></span>
							<?php endif; ?>
					</h2>
				<?php endif; ?>
				<?php if($this->item->params->get('itemAuthor') || $this->item->params->get('itemDateCreated') || $this->item->params->get('itemFontResizer') || ($this->item->params->get('itemPrintButton') && !JRequest::getInt('print')) || ($this->item->params->get('itemEmailButton') && !JRequest::getInt('print')) || ($this->item->params->get('itemCommentsAnchor') && $this->item->params->get('itemComments') && ( ($this->item->params->get('comments') == '2' && !$this->user->guest) || ($this->item->params->get('comments') == '1')) ) || ($this->item->params->get('itemSocialButton') && !is_null($this->item->params->get('socialButtonCode', NULL))) || ($this->item->params->get('itemVideoAnchor') && !empty($this->item->video)) || ($this->item->params->get('itemImageGalleryAnchor') && !empty($this->item->gallery))): ?>
				<div class="itemToolbar">
					<ul>
						<?php if($this->item->params->get('itemAuthor')): ?>
							<li>
									<span class="itemAuthor">
									<?php echo K2HelperUtilities::writtenBy($this->item->author->profile->gender); ?>&nbsp;
									<?php if(empty($this->item->created_by_alias)): ?>
									<a rel="author" href="<?php echo $this->item->author->link; ?>"><?php echo $this->item->author->name; ?></a>
									<?php else: ?>
									<?php echo $this->item->author->name; ?>
									<?php endif; ?>
									</span>
							</li>
						<?php endif; ?>
						<?php if($this->item->params->get('itemDateCreated')): ?>
							<li>
								<span>
									<?php echo JHTML::_('date', $this->item->created , JText::_('K2_DATE_FORMAT_LC2')); ?>
								</span>
							</li>
						<?php endif; ?>
						<?php if($this->item->params->get('itemFontResizer')): ?>
							<li>
									<span class="itemTextResizerTitle"><?php echo JText::_('K2_FONT_SIZE'); ?></span>
									<a href="#" id="fontDecrease">
									<span><?php echo JText::_('K2_DECREASE_FONT_SIZE'); ?></span>
									<img src="components/com_k2/images/system/blank.gif" alt="<?php echo JText::_('K2_DECREASE_FONT_SIZE'); ?>" />
									</a>
									<a href="#" id="fontIncrease">
									<span><?php echo JText::_('K2_INCREASE_FONT_SIZE'); ?></span>
									<img src="components/com_k2/images/system/blank.gif" alt="<?php echo JText::_('K2_INCREASE_FONT_SIZE'); ?>" />
									</a>
							</li>
						<?php endif; ?>
						<?php if($this->item->params->get('itemPrintButton') && !JRequest::getInt('print')): ?>
							<li>
									<a class="itemPrintLink" rel="nofollow" href="<?php echo $this->item->printLink; ?>" onclick="window.open(this.href,'printWindow','width=900,height=600,location=no,menubar=no,resizable=yes,scrollbars=yes'); return false;">
									<span><?php echo JText::_('K2_PRINT'); ?></span>
									</a>
							</li>
						<?php endif; ?>
						<?php if($this->item->params->get('itemEmailButton') && !JRequest::getInt('print')): ?>
							<li>
									<a class="itemEmailLink" rel="nofollow" href="<?php echo $this->item->emailLink; ?>" onclick="window.open(this.href,'emailWindow','width=400,height=350,location=no,menubar=no,resizable=no,scrollbars=no'); return false;">
									<span><?php echo JText::_('K2_EMAIL'); ?></span>
									</a>
							</li>
						<?php endif; ?>
						
						<?php if($this->item->params->get('itemCommentsAnchor') && $this->item->params->get('itemComments') && ( ($this->item->params->get('comments') == '2' && !$this->user->guest) || ($this->item->params->get('comments') == '1')) ): ?>
							<li>
									<?php if(!empty($this->item->event->K2CommentsCounter)):?>
										<?php echo $this->item->event->K2CommentsCounter; ?>
									<?php else:?>
									<a class="itemCommentsLink k2Anchor" href="<?php echo $this->item->link; ?>#itemCommentsAnchor">
									<?php echo $this->item->numOfComments; ?>
									</a>
									<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if($this->item->params->get('itemSocialButton') && !is_null($this->item->params->get('socialButtonCode', NULL))): ?>
							<li>
									<?php echo $this->item->params->get('socialButtonCode'); ?>
							</li>
						<?php endif; ?>
						<?php if($this->item->params->get('itemVideoAnchor') && !empty($this->item->video)): ?>
							<li>
									<a class="itemVideoLink k2Anchor" href="<?php echo $this->item->link; ?>#itemVideoAnchor"><?php echo JText::_('K2_MEDIA'); ?></a>
							</li>
						<?php endif; ?>
						<?php if($this->item->params->get('itemImageGalleryAnchor') && !empty($this->item->gallery)): ?>
							<li>
									<a class="itemImageGalleryLink k2Anchor" href="<?php echo $this->item->link; ?>#itemImageGalleryAnchor"><?php echo JText::_('K2_IMAGE_GALLERY'); ?></a>
							</li>
						<?php endif; ?>
					</ul>
				</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<?php echo $this->item->event->AfterDisplayTitle; ?>
		<?php echo $this->item->event->K2AfterDisplayTitle; ?>
		<?php echo $this->item->event->BeforeDisplayContent; ?>
		<?php echo $this->item->event->K2BeforeDisplayContent; ?>
		<?php if(!empty($this->item->fulltext)): ?>
			<?php if($this->item->params->get('itemIntroText')): ?>
				<div class="itemIntroText">
						<?php echo $this->item->introtext; ?>
				</div>
			<?php endif; ?>
			<?php if($this->item->params->get('itemFullText')): ?>
				<div class="itemFullText">
						<?php echo $this->item->fulltext; ?>
				</div>
			<?php endif; ?>
			<?php else: ?>
				<div class="itemFullText">
						<?php echo $this->item->introtext; ?>
				</div>
			<?php endif; ?>
			<?php if($this->item->params->get('itemExtraFields') && count($this->item->extra_fields)): ?>
				<div class="itemExtraFields">
					<h3><?php echo JText::_('K2_ADDITIONAL_INFO'); ?></h3>
					<ul>
						<?php foreach ($this->item->extra_fields as $key=>$extraField): ?>
							<?php if($extraField->value): ?>
								<li class="<?php echo ($key%2) ? "odd" : "even"; ?> type<?php echo ucfirst($extraField->type); ?> group<?php echo $extraField->group; ?>">
									<span class="itemExtraFieldsLabel"><?php echo $extraField->name; ?>:</span>
									<span class="itemExtraFieldsValue"><?php echo $extraField->value; ?></span>
								</li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
			<?php if($this->item->params->get('itemRating') || ($this->item->params->get('itemDateModified') && intval($this->item->modified)!=0)): ?>
				<div class="itemBottom">
					<?php if($this->item->params->get('itemDateModified') && intval($this->item->modified)!=0):?>
						<?php if($this->item->created != $this->item->modified): ?>
							<span class="itemDateModified">
								<?php echo JText::_('K2_LAST_MODIFIED_ON'); ?>
								<?php echo JHTML::_('date', $this->item->modified, JText::_('K2_DATE_FORMAT_LC2')); ?>
							</span>
						<?php endif; ?>
					<?php endif; ?>
					<?php if($this->item->params->get('itemRating')): ?>
						<div class="itemRatingBlock">
							<span><?php echo JText::_('K2_RATE_THIS_ITEM'); ?></span>
							<div class="itemRatingForm">
								<ul class="itemRatingList">
									<li class="itemCurrentRating" id="itemCurrentRating<?php echo $this->item->id; ?>" style="width:<?php echo $this->item->votingPercentage; ?>%;"></li>
									<li>
										<a href="#" rel="<?php echo $this->item->id; ?>" title="<?php echo JText::_('K2_1_STAR_OUT_OF_5'); ?>" class="one-star">1</a>
									</li>
									<li>
										<a href="#" rel="<?php echo $this->item->id; ?>" title="<?php echo JText::_('K2_2_STARS_OUT_OF_5'); ?>" class="two-stars">2</a>
									</li>
									<li>
										<a href="#" rel="<?php echo $this->item->id; ?>" title="<?php echo JText::_('K2_3_STARS_OUT_OF_5'); ?>" class="three-stars">3</a>
									</li>
									<li>
										<a href="#" rel="<?php echo $this->item->id; ?>" title="<?php echo JText::_('K2_4_STARS_OUT_OF_5'); ?>" class="four-stars">4</a>
									</li>
									<li>
										<a href="#" rel="<?php echo $this->item->id; ?>" title="<?php echo JText::_('K2_5_STARS_OUT_OF_5'); ?>" class="five-stars">5</a>
									</li>
								</ul>
								<div id="itemRatingLog<?php echo $this->item->id; ?>" class="itemRatingLog"><?php echo $this->item->numOfvotes; ?></div>
							</div>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<?php echo $this->item->event->AfterDisplayContent; ?>
			<?php echo $this->item->event->K2AfterDisplayContent; ?>
	
		<?php if(
			$this->item->params->get('itemHits') ||
			$this->item->params->get('itemCategory') ||
			$this->item->params->get('itemTags') ||
			$this->item->params->get('itemTwitterButton',1) || 
			$this->item->params->get('itemFacebookButton',1) || 
			$this->item->params->get('itemGooglePlusOneButton',1) ||
			$this->item->params->get('itemAttachments')
		): ?>
			<div class="itemLinks">
				<div class="itemLinksLeft">
						<div class="itemHitsTwitter">
								<?php if($this->item->params->get('itemHits')): ?>
								<span class="itemHits">
								<?php echo JText::_('K2_READ'); ?>
								<b><?php echo $this->item->hits; ?></b>
								<?php echo JText::_('K2_TIMES'); ?>
								</span>
								<?php endif; ?>
						</div>
						<?php if($this->item->params->get('itemCategory')): ?>
						<div class="itemCategory">
								<span><?php echo JText::_('K2_PUBLISHED_IN'); ?></span>
								<a href="<?php echo $this->item->category->link; ?>"><?php echo $this->item->category->name; ?></a>
						</div>
						<?php endif; ?>
						<?php if($this->item->params->get('itemAttachments') && count($this->item->attachments)): ?>
						<div class="itemAttachmentsBlock">
								<span><?php echo JText::_('K2_DOWNLOAD_ATTACHMENTS'); ?></span>
								<ul class="itemAttachments">
										<?php foreach ($this->item->attachments as $attachment): ?>
										<li>
												<a title="<?php echo K2HelperUtilities::cleanHtml($attachment->titleAttribute); ?>" href="<?php echo $attachment->link; ?>"><?php echo $attachment->title; ?></a>
												<?php if($this->item->params->get('itemAttachmentsCounter')): ?>
												<span>(<?php echo $attachment->hits; ?>
												<?php echo ($attachment->hits==1) ? JText::_('K2_DOWNLOAD') : JText::_('K2_DOWNLOADS'); ?>)</span>
												<?php endif; ?>
										</li>
										<?php endforeach; ?>
								</ul>
						</div>
						<?php endif; ?>
				</div>
				<div class="itemLinksRight">
					<?php if($this->item->params->get('itemTags') && count($this->item->tags)): ?>
						<div class="itemTagsBlock">
							<span><?php echo JText::_('K2_TAGGED_UNDER'); ?></span>
							<ul class="itemTags">
									<?php foreach ($this->item->tags as $tag): ?>
										<li>
											<a href="<?php echo $tag->link; ?>"><?php echo $tag->name; ?></a>
										</li>
									<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>
					<?php if($this->item->params->get('itemTwitterButton',1) || $this->item->params->get('itemFacebookButton',1) || $this->item->params->get('itemGooglePlusOneButton',1)): ?>
						<div class="itemSocialSharing">
							<?php if($this->item->params->get('itemTwitterButton',1)): ?>
								<div class="itemTwitterButton">
									<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal"<?php if($this->item->params->get('twitterUsername')): ?> data-via="<?php echo $this->item->params->get('twitterUsername'); ?>"<?php endif; ?>><?php echo JText::_('K2_TWEET'); ?></a>
									<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
								</div>
							<?php endif; ?>
							<?php if($this->item->params->get('itemFacebookButton',1)): ?>
								<div class="itemFacebookButton">
									<div id="fb-root"></div>
									<script type="text/javascript">
										(function(d, s, id) {
											var js, fjs = d.getElementsByTagName(s)[0];
											if (d.getElementById(id)) {return;}
											js = d.createElement(s); js.id = id;
											js.src = "//connect.facebook.net/en_US/all.js#appId=177111755694317&xfbml=1";
											fjs.parentNode.insertBefore(js, fjs);
										}(document, 'script', 'facebook-jssdk'));
									</script>
									<div class="fb-like" data-send="false" data-width="260" data-show-faces="true"></div>
								</div>
							<?php endif; ?>
							<?php if($this->item->params->get('itemGooglePlusOneButton',1)): ?>
								<div class="itemGooglePlusOneButton">
									<g:plusone annotation="inline" width="120"></g:plusone>
									<script type="text/javascript">
										(function() {
											window.___gcfg = {lang: 'en'}; // Define button default language here
											var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
											po.src = 'https://apis.google.com/js/plusone.js';
											var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
										})();
									</script>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if($this->item->params->get('itemAuthorBlock') && empty($this->item->created_by_alias)):?>
			<div class="itemAuthorBlock">
				<?php if($this->item->params->get('itemAuthorImage') && !empty($this->item->author->avatar)):?>
					<img class="itemAuthorAvatar" src="<?php echo $this->item->author->avatar; ?>" alt="<?php echo K2HelperUtilities::cleanHtml($this->item->author->name); ?>" />
				<?php endif; ?>
				<div class="itemAuthorDetails">
					<div>
						<h3 class="itemAuthorName">
							<a rel="author" href="<?php echo $this->item->author->link; ?>"><?php echo $this->item->author->name; ?></a>
						</h3>
						<?php if($this->item->params->get('itemAuthorDescription') && !empty($this->item->author->profile->description)):?>
							<?php echo $this->item->author->profile->description; ?>
						<?php endif; ?>
						<?php if($this->item->params->get('itemAuthorURL') && !empty($this->item->author->profile->url)):?>
							<span class="itemAuthorUrl"><?php echo JText::_('K2_WEBSITE'); ?>
								<a rel="me" href="<?php echo $this->item->author->profile->url; ?>" target="_blank" rel="nofollow">
									<?php echo str_replace('http://','',$this->item->author->profile->url); ?>
								</a>
							</span>
						<?php endif; ?>
						<?php if($this->item->params->get('itemAuthorEmail')):?>
							<span class="itemAuthorEmail"><?php echo JText::_('K2_EMAIL'); ?>
								<?php echo JHTML::_('Email.cloak', $this->item->author->email); ?>
							</span>
						<?php endif; ?>
					</div>
					<?php echo $this->item->event->K2UserDisplay; ?>
				</div>
			</div>
		<?php endif; ?>
		
		<?php if(($this->item->params->get('itemRelated') && isset($this->relatedItems)) || ($this->item->params->get('itemAuthorLatest') && empty($this->item->created_by_alias) && isset($this->authorLatestItems))): ?>
			<div class="itemAuthorContent">
				<?php if($this->item->params->get('itemAuthorLatest') && empty($this->item->created_by_alias) && isset($this->authorLatestItems)): ?>
					<div>
						<h3>
							<span>
								<?php echo JText::_('K2_LATEST_FROM'); ?>
								<?php echo @$this->item->author->name; ?>
							</span>
						</h3>
						<ul>
							<?php foreach($this->authorLatestItems as $key=>$item): ?>
								<li class="<?php echo ($key%2) ? "odd" : "even"; ?>">
									<a href="<?php echo $item->link ?>"><?php echo $item->title; ?></a>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>
				<?php if($this->item->params->get('itemRelated') && isset($this->relatedItems)): ?>
					<div>
						<h3><span><?php echo JText::_("K2_RELATED_ITEMS_BY_TAG"); ?></span></h3>
						<ul>
							<?php foreach($this->relatedItems as $key=>$item): ?>
								<li class="<?php echo ($key%2) ? "odd" : "even"; ?>">
									<?php if($this->item->params->get('itemRelatedTitle', 1)): ?>
										<a class="itemRelTitle" href="<?php echo $item->link ?>"><?php echo $item->title; ?></a>
									<?php endif; ?>
									<?php if($this->item->params->get('itemRelatedCategory')): ?>
										<div class="itemRelCat"><?php echo JText::_("K2_IN"); ?>
											<a href="<?php echo $item->category->link ?>"><?php echo $item->category->name; ?></a>
										</div>
									<?php endif; ?>
									<?php if($this->item->params->get('itemRelatedAuthor')): ?>
										<div class="itemRelAuthor"><?php echo JText::_("K2_BY"); ?>
											<a rel="author" href="<?php echo $item->author->link; ?>"><?php echo $item->author->name; ?></a>
										</div>
									<?php endif; ?>
									<?php if($this->item->params->get('itemRelatedImageSize')): ?>
										<img style="width:<?php echo $item->imageWidth; ?>px;height:auto;" class="itemRelImg" src="<?php echo $item->image; ?>" alt="<?php K2HelperUtilities::cleanHtml($item->title); ?>" />
									<?php endif; ?>
									<?php if($this->item->params->get('itemRelatedIntrotext')): ?>
										<div class="itemRelIntrotext"><?php echo $item->introtext; ?></div>
									<?php endif; ?>
									<?php if($this->item->params->get('itemRelatedFulltext')): ?>
										<div class="itemRelFulltext"><?php echo $item->fulltext; ?></div>
									<?php endif; ?>
									<?php if($this->item->params->get('itemRelatedMedia')): ?>
										<?php if($item->videoType=='embedded'): ?>
											<div class="itemRelMediaEmbedded"><?php echo $item->video; ?></div>
										<?php else: ?>
											<div class="itemRelMedia"><?php echo $item->video; ?></div>
										<?php endif; ?>
									<?php endif; ?>
									<?php if($this->item->params->get('itemRelatedImageGallery')): ?>
										<div class="itemRelImageGallery"><?php echo $item->gallery; ?></div>
									<?php endif; ?>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		
		<?php if($this->item->params->get('itemVideo') && !empty($this->item->video)): ?>
		<a name="itemVideoAnchor" id="itemVideoAnchor"></a>
		<div class="itemVideoBlock">
			<h3><?php echo JText::_('K2_MEDIA'); ?></h3>
			<?php if($this->item->videoType=='embedded'): ?>
				<div class="itemVideoEmbedded">
					<?php echo $this->item->video; ?>
				</div>
			<?php else: ?>
				<span class="itemVideo"><?php echo $this->item->video; ?></span>
			<?php endif; ?>
			<?php if($this->item->params->get('itemVideoCaption') && !empty($this->item->video_caption)): ?>
				<span class="itemVideoCaption"><?php echo $this->item->video_caption; ?></span>
			<?php endif; ?>
			<?php if($this->item->params->get('itemVideoCredits') && !empty($this->item->video_credits)): ?>
				<span class="itemVideoCredits"><?php echo $this->item->video_credits; ?></span>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		<?php if($this->item->params->get('itemImageGallery') && !empty($this->item->gallery)): ?>
			<a name="itemImageGalleryAnchor" id="itemImageGalleryAnchor"></a>
			<div class="itemImageGallery">
				<h3><?php echo JText::_('K2_IMAGE_GALLERY'); ?></h3>
				<?php echo $this->item->gallery; ?>
			</div>
		<?php endif; ?>
		<?php if($this->item->params->get('itemNavigation') && !JRequest::getCmd('print') && (isset($this->item->nextLink) || isset($this->item->previousLink))): ?>
			<div class="itemNavigation">
				<span class="itemNavigationTitle"><?php echo JText::_('K2_MORE_IN_THIS_CATEGORY'); ?></span>
				<?php if(isset($this->item->previousLink)): ?>
					<a class="itemPrevious" href="<?php echo $this->item->previousLink; ?>">
						&laquo;
						<?php echo $this->item->previousTitle; ?>
					</a>
				<?php endif; ?>
				<?php if(isset($this->item->nextLink)): ?>
					<a class="itemNext" href="<?php echo $this->item->nextLink; ?>">
						<?php echo $this->item->nextTitle; ?>
						&raquo;
					</a>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php echo $this->item->event->AfterDisplay; ?>
		<?php echo $this->item->event->K2AfterDisplay; ?>
	
	</div>
	<?php if($this->item->params->get('itemComments') && ( ($this->item->params->get('comments') == '2' && !$this->user->guest) || ($this->item->params->get('comments') == '1'))):?>
		<?php echo $this->item->event->K2CommentsBlock; ?>
	<?php endif;?>
	<?php if($this->item->params->get('itemComments') && !JRequest::getInt('print') && ($this->item->params->get('comments') == '1' || ($this->item->params->get('comments') == '2')) && empty($this->item->event->K2CommentsBlock)):?>
		<a name="itemCommentsAnchor" id="itemCommentsAnchor"></a>
		<div class="itemComments">
			<?php if($this->item->params->get('commentsFormPosition')=='above' && $this->item->params->get('itemComments') && !JRequest::getInt('print') && ($this->item->params->get('comments') == '1' || ($this->item->params->get('comments') == '2' && K2HelperPermissions::canAddComment($this->item->catid)))): ?>
				<div class="itemCommentsForm">
					<?php echo $this->loadTemplate('comments_form'); ?>
				</div>
			<?php endif; ?>
			<?php if($this->item->numOfComments>0 && $this->item->params->get('itemComments') && !JRequest::getInt('print') && ($this->item->params->get('comments') == '1' || ($this->item->params->get('comments') == '2'))): ?>
				<div class="gkDate">
					<div>
						<?php echo $this->item->numOfComments; ?>
						<?php echo ($this->item->numOfComments>1) ? JText::_('K2_COMMENTS') : JText::_('K2_COMMENT'); ?>
					</div>
				</div>
				<ul class="itemCommentsList">
					<?php foreach ($this->item->comments as $key=>$comment): ?>
						<li class="<?php echo ($key%2) ? "odd" : "even"; echo (!$this->item->created_by_alias && $comment->userID==$this->item->created_by) ? " authorResponse" : ""; echo($comment->published) ? '':' unpublishedComment'; ?>">
							<?php if($comment->userImage):?>
								<img src="<?php echo $comment->userImage; ?>" alt="<?php echo JFilterOutput::cleanText($comment->userName); ?>" width="<?php echo $this->item->params->get('commenterImgWidth'); ?>" />
							<?php endif; ?>
							<div>
								<p><?php echo $comment->commentText; ?></p>
								<?php if($this->inlineCommentsModeration || ($comment->published && ($this->params->get('commentsReporting')=='1' || ($this->params->get('commentsReporting')=='2' && !$this->user->guest)))): ?>
									<span class="commentToolbar">
										<?php if($this->inlineCommentsModeration): ?>
											<?php if(!$comment->published): ?>
												<a class="commentApproveLink" href="<?php echo JRoute::_('index.php?option=com_k2&view=comments&task=publish&commentID='.$comment->id.'&format=raw')?>"><?php echo JText::_('K2_APPROVE')?></a>
											<?php endif;?>
											<a class="commentRemoveLink" href="<?php echo JRoute::_('index.php?option=com_k2&view=comments&task=remove&commentID='.$comment->id.'&format=raw')?>"><?php echo JText::_('K2_REMOVE')?></a>
										<?php endif;?>
										<?php if($comment->published && ($this->params->get('commentsReporting')=='1' || ($this->params->get('commentsReporting')=='2' && !$this->user->guest))): ?>
											<a class="modal" rel="{handler:'iframe',size:{x:640,y:480}}" href="<?php echo JRoute::_('index.php?option=com_k2&view=comments&task=report&commentID='.$comment->id)?>"><?php echo JText::_('K2_REPORT')?></a>
										<?php endif; ?>
									</span>
								<?php endif; ?>
								<span class="commentAuthorName"><!--<?php echo JText::_('K2_POSTED_BY'); ?>-->
									<?php if(!empty($comment->userLink)): ?>
										<a href="<?php echo JFilterOutput::cleanText($comment->userLink); ?>" title="<?php echo JFilterOutput::cleanText($comment->userName); ?>" target="_blank" rel="nofollow">
											<?php echo $comment->userName; ?>
										</a>
									<?php else: ?>
										<?php echo $comment->userName; ?>
									<?php endif; ?>
								</span>
								<span class="commentDate">
									<?php echo JHTML::_('date', $comment->commentDate, JText::_('DATE_FORMAT_LC2')); ?>
								</span>
								<span class="commentLink">
									<a href="<?php echo $this->item->link; ?>#comment<?php echo $comment->id; ?>" name="comment<?php echo $comment->id; ?>" id="comment<?php echo $comment->id; ?>">
										<?php echo JText::_('K2_COMMENT_LINK'); ?>
									</a>
								</span>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
				<div class="itemCommentsPagination">
					<?php echo $this->pagination->getPagesLinks(); ?>
				</div>
			<?php endif; ?>
			
			<?php if($this->item->params->get('commentsFormPosition')=='below' && $this->item->params->get('itemComments') && !JRequest::getInt('print') && ($this->item->params->get('comments') == '1' || ($this->item->params->get('comments') == '2' && K2HelperPermissions::canAddComment($this->item->catid)))): ?>
				<div class="gkDate">
					<div><?php echo JText::_('K2_LEAVE_A_COMMENT') ?></div>
				</div>
				<div class="itemCommentsForm">
					<?php echo $this->loadTemplate('comments_form'); ?>
				</div>
			<?php endif; ?>
			<?php $user = &JFactory::getUser();
			if ($this->item->params->get('comments') == '2' && $user->guest):?>
				<div><?php echo JText::_('K2_LOGIN_TO_POST_COMMENTS');?></div>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	<?php if(!JRequest::getCmd('print')): ?>
		<div class="itemBackToTop">
			<a class="k2Anchor" href="<?php echo $this->item->link; ?>#startOfPageId<?php echo JRequest::getInt('id'); ?>">
				<?php echo JText::_('K2_BACK_TO_TOP'); ?>
			</a>
		</div>
	<?php endif; ?>
</div>
<!-- End K2 Item Layout -->