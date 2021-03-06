<?php
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
JHtml::_('behavior.caption');

require_once dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . 'functions.php';

Artx::load("Artx_Content");

$component = new ArtxContent($this, $this->params);
echo $component->beginPageContainer('archive');
?>
<form id="adminForm" action="<?php echo JRoute::_('index.php')?>" method="post">
    <?php ob_start(); ?>
    <fieldset class="filters">
    <legend class="hidelabeltxt"><?php echo JText::_('JGLOBAL_FILTER_LABEL'); ?></legend>
    <div class="filter-search">
        <?php if ($this->params->get('filter_field') != 'hide') : ?>
        <label class="filter-search-lbl" for="filter-search"><?php echo JText::_('COM_CONTENT_'.$this->params->get('filter_field').'_FILTER_LABEL').'&#160;'; ?></label>
        <input type="text" name="filter-search" id="filter-search" value="<?php echo $this->escape($this->filter); ?>" class="inputbox" onchange="document.getElementById('adminForm').submit();" />
        <?php endif; ?>

        <?php echo $this->form->monthField; ?>
        <?php echo $this->form->yearField; ?>
        <?php echo $this->form->limitField; ?>
        <button type="submit" class="button"><?php echo JText::_('JGLOBAL_FILTER_BUTTON'); ?></button>
    </div>
    <input type="hidden" name="view" value="archive" />
    <input type="hidden" name="option" value="com_content" />
    <input type="hidden" name="limitstart" value="0" />
    </fieldset>
<?php
echo artxPost(array('header-text' => $component->pageHeading, 'content' => ob_get_clean()));
echo $this->loadTemplate('items');
?>
</form>
<?php
echo $component->endPageContainer();

