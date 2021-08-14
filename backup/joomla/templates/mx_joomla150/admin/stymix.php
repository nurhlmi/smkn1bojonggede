<?php

defined('JPATH_BASE') or die;
jimport('joomla.form.formfield');

class JFormFieldSTYMix extends JFormField{

	public function getTemplateName(){
		$templateName 	= end(explode( DIRECTORY_SEPARATOR, str_replace( array( '\admin', '/admin' ), '', dirname(__FILE__) )) );
		//$templateName 	= $templateName [ count( $templateName ) - 1 ];
		return $templateName;
	}

	protected function getInput(){
		$doc = JFactory::getDocument();

		$templateName = $this->getTemplateName();
		$doc->addStyleSheet(JURI::root().'templates/'.$templateName.'/admin/css/style.css');
		$doc->addScript(JURI::root().'templates/'.$templateName.'/admin/js/admin.js');
		$doc->addScript(JURI::root().'templates/'.$templateName.'/admin/js/js.js');
	}
}
