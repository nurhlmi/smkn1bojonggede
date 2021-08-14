<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');

class JFormFieldJudyno extends JFormField {
	/*
	TO DO
		- minimize box
	*/
	protected $type = 'Judyno';
	protected static $initialised = false;
	protected static $mediaInitialised = false;
	

	protected function getLabel() { 
		return '<strong style="color:#000; display:block; margin-bottom:5px; line-height:1.7; font-size: 16px; font-weight: bold;">'.$this->element['label'].'</strong>';
	}

	protected function getInput() {
	
		if (!self::$initialised) {	
			$document = JFactory::getDocument();

$scripts = '

;(function($) {
	
	function updateItemsCount() {
		var count = 0;
		$("div.dynoitem").each(function(){ 
			count++;
		});
		return count;
	}
	
	function clearButton(){
		$("#judyno_manager .clearBtn").each(function(){
			$(this).on("click",function(e){
				e.preventDefault();
				$(this).closest(".wrapper").find("input[type=text]").attr("value","");
			});
		});	
	}

	function confirm($row) {
		var cnt = updateItemsCount()-1;
		
		var findImgFields = $row.find(".browseField input[type=text]");
		findImgFields.each(function(){
			var _t =  $(this),
				thisID = _t.attr("id"),
				thisIDnum = _t.attr("id").match(/\d+/g);
			_t.attr("id", thisID.replace(thisIDnum, cnt));
			
			// also replace in href
			var thisBtn = _t.closest(".wrapper").find("a.modalBtn"),
				thisBtnHref = thisBtn.attr("href"),
				thisBtnNum = thisBtnHref.split("=").pop().match(/\d+/g);
			if(thisBtnNum)
				thisBtn.attr("href", thisBtnHref.replace(thisBtnNum, cnt));
			else
				thisBtn.attr("href", thisBtnHref+cnt);
			
		});
		
		clearButton();
		
		SqueezeBox.assign($$("#judyno_manager tr:last-child a.modal"), {parse: "rel"});
	}

	$(document).ready(function() {
		
		$("#judyno_manager").dynoTable({
			removeClass: ".remove-dynoitem",
			lastRowRemovable: '.($this->element['lastrowremovable'] == 'yes' ? 'true' : 'false').',
			orderable: '.($this->element['dragging'] != 'no' ? 'true' : 'false').',
			dragHandleClass: ".drag-dynoitem",
			onRowRemove: updateItemsCount(),
			onRowAdd: function(){
				confirm($("#judyno_manager").find("tr:last-child"));
				updateItemsCount();
			},
			onRowReorder: function(){
				updateItemsCount()
			}
		});
		
		
		updateItemsCount();
		clearButton();

	});
	
})(jQuery);
';
			// load script
			$document->addScriptDeclaration($scripts);
			
		if (!version_compare(JVERSION, '3.0', 'ge')) {
			$checkJqueryLoaded = false;
			$header = $document->getHeadData();
			foreach($header['scripts'] as $scriptName => $scriptData)
			{
				if(substr_count($scriptName,'/jquery')){
					$checkJqueryLoaded = true;
				}
			}	
			//Add js
			if(!$checkJqueryLoaded) 
			$document->addScript(JURI::root().$this->element['path'].'js/jquery.min.js');
			$document->addScript(JURI::root().$this->element['path'].'js/jquery.noconflict.js');
		}
		
		
			// load css
			$document->addStyleSheet(JURI::root().$this->element['path'].'css/manager.css');
			// load scripts
			$document->addScript('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js');
			$document->addScript(JURI::root().$this->element['path'].'js/jquery.dynotable.js');
			
			self::$initialised = true;
		}
		
		$itemName = ($this->element['itemnname'] ? $this->element['itemnname'] : 'Item');
		$showPreview = ($this->element['showpreview'] == 'no' ? false : true);
		
		$output = '
<div class="wrap" id="manager_wrap">
	<table id="judyno_manager">';
		if($this->value) { 
			// Get the field options.
			$options = $this->getOptions();
			
			foreach($this->value['vals'] as $k => $v) {
				// get stored values
				$thevalues = array();
				// assign stored values to each field
				foreach ($options as $option)
				{
					if($option->type == 'texturl') {
						$thevalues[$option->name]['link'] = $this->value[$option->name]['link'][$k];
						$thevalues[$option->name]['target'] = $this->value[$option->name]['target'][$k];
					} elseif($option->type == 'spacer') {
						$thevalues[$option->name] = null;
					} else {
						$thevalues[$option->name] = $this->value[$option->name][$k];
					} 
				}
				// load fields with the stored valuyes
				$output .= '<tr>'.self::getFields($this->name, $thevalues, $k).'</tr>';
			}
		} else {
			// load empty fields 
			if($this->element['startempty'] != 'yes')
			$output .= '<tr>'.self::getFields($this->name).'</tr>';
		}
			//load template fields for dynoTable script
			$output .= '<tr id="add-template">'.self::getFields($this->name).'</tr>';
		
		$output .= '
	</table>
	<a id="add-row" class="ju_uikit_button addnew">Add New '.$itemName.'</a>
</div>';

		return $output;
	}
	
	protected function getMedia($imgName, $img = null, $i = null) {
			
			$link = (string) $this->element['img']['link'];
			
			if (!self::$mediaInitialised) {
	
				// Load the modal behavior script.
				JHtml::_('behavior.modal');
	
				// Build the script.
				$script = array();
				$script[] = '	function jInsertFieldValue(value, id) {';
				$script[] = '		var old_id = document.id(id).value;';
				$script[] = '		if (old_id != id) {';
				$script[] = '			var elem = document.id(id)';
				$script[] = '			elem.value = value;';
				$script[] = '			elem.fireEvent("change");';
				$script[] = '		}';
				$script[] = '	}';
	
				// Add the script to the document head.
				JFactory::getDocument()->addScriptDeclaration(implode("\n", $script));
	
				self::$mediaInitialised = true;
			}
	
			// Initialize variables.
			$html = array();
			$attr = '';
	
			// The text field.
			$html[] = '<div class="wrapper">';
			$html[] = '<div class="fltlft chain browseField">';
			$html[] = '	<input class="input-medium" type="text" name="'.$this->name.'['.$imgName.'][]'.'" id="'.$this->id.'_'.$imgName.$i.'"' .
						' value="'.htmlspecialchars($img, ENT_COMPAT, 'UTF-8').'"' .
						' readonly="readonly" />';
			$html[] = '</div>';

			// The button.
			$html[] = '<a class="modal modalBtn ju_uikit_button" title="'.JText::_('JLIB_FORM_BUTTON_SELECT').'" 
				href="'.($this->element['img']['readonly'] ? '' : ($link ? $link : 'index.php?option=com_media&amp;view=images&amp;tmpl=component&amp;asset=&amp;author=') . '&amp;folder=&amp;fieldid='.$this->id.'_'.$imgName.$i).'" rel="{handler: \'iframe\', size: {x: 800, y: 500}}">';
			$html[] = JText::_('JLIB_FORM_BUTTON_SELECT').'</a>';
			
			$html[] = '<a title="'.JText::_('JLIB_FORM_BUTTON_CLEAR').'" class="clearBtn ju_uikit_button"  href="#" >'.JText::_('JLIB_FORM_BUTTON_CLEAR').'</a>'; 
			$html[] = '</div>';
	
			return implode("\n", $html);
			
		}
	
	function getFields($name, $values = null, $k = null){
		
		$itemName = ($this->element['itemnname'] ? $this->element['itemnname'] : 'Item');
		$dragging = $this->element['dragging'];
		
		// Get the field options.
		$options = $this->getOptions();
		
	
		$output = '
<td>'
	.($dragging != 'no' ? '<span class="drag-dynoitem ju_uikit_button" title="click and drag to rearrange">Drag to arrange</span>':'').
	'<span class="remove-dynoitem ju_uikit_button" title="Remove '.$itemName.'">Remove '.$itemName.'</span>
	<hr class="underbuttons">
	<div class="dynoitem">';
	
	// Build the radio field output.
	foreach ($options as $i => $option)
	{
		switch($option->type){
			case"hidden":
				$output .= '<input type="hidden" name="'.$name.'['.$option->name.'][]" value="'.$values[$option->name].'" />';
			break;
			
			case"media":
				$showPreview = ($this->element['showpreview'] == 'no' ? false : true);
				$output .= '
				<div class="fld clearfix mediaField">
					'.(($values[$option->name] && $showPreview) ? '<div class="previewimg"><img src="'.JURI::root().$values[$option->name].'"/></div>' : '').'
					<label '.($option->description ? 'class="hasTip" title="'.$option->label.'::'.$option->description.'"':'').'>'.$option->label.'</label>
					'.self::getMedia($option->name, $values[$option->name], $k).'
				</div>';
			break;
			
			case"text":
				$output .= '
				<div class="fld clearfix">
					<label '.($option->description ? 'class="hasTip" title="'.$option->label.'::'.$option->description.'"':'').'>'.$option->label.'</label>
					<input type="text" name="'.$name.'['.$option->name.'][]" value="'.($values[$option->name] ? htmlspecialchars($values[$option->name], ENT_COMPAT, 'UTF-8') : htmlspecialchars($option->value, ENT_COMPAT, 'UTF-8')).'" class="'.$option->class.'" placeholder="'.$option->placeholder.'" />
				</div>';
			break;	
			
			case"spacer":
				$output .= '
				<div class="fld clearfix">
					<label><strong>'.$option->label.'</strong></label>
				</div>';
			break;	
			
			case"textarea":
				$output .= '
				<div class="fld clearfix">
					<label '.($option->description ? 'class="hasTip" title="'.$option->label.'::'.$option->description.'"':'').'>'.$option->label.'</label>
					<textarea name="'.$name.'['.$option->name.'][]" class="'.$option->class.'" rows="'.($option->rows ? $option->rows : 3).'" placeholder="'.$option->placeholder.'">'.($values[$option->name] ? htmlspecialchars($values[$option->name], ENT_COMPAT, 'UTF-8') : htmlspecialchars($option->value, ENT_COMPAT, 'UTF-8')).'</textarea>
				</div>';
			break;	
			
			case"texturl":
				$target = ($values[$option->name]['target'] ? $values[$option->name]['target'] : $option->target);
				$output .= '
				<div class="fld clearfix">
					<label '.($option->description ? 'class="hasTip" title="'.$option->label.'::'.$option->description.'"':'').'>'.$option->label.'</label>
					<input type="text" name="'.$name.'['.$option->name.'][link][]" value="'.$values[$option->name]['link'].'" class="input-medium" />
					<select name="'.$name.'['.$option->name.'][target][]" class="dropdown_target" >
						<option value="_self" '.($target == '_self' ? 'selected="selected"' : '').'>Same Window</option>
						<option value="_blank" '.($target == '_blank' ? 'selected="selected"' : '').'>New Window</option>
					</select>
				</div>';
			break;
			
			case"select":
				$output .= '
				<div class="fld clearfix">
					<label '.($option->description ? 'class="hasTip" title="'.$option->label.'::'.$option->description.'"':'').'>'.$option->label.'</label>
					<select name="'.$name.'['.$option->name.'][]" class="'.$option->class.'" >';
				$lists = (array) json_decode($option->text);
				foreach($lists as $list) {
					$selected = '';
					if($values[$option->name]) {
						if($values[$option->name] == $list->value) {
							$selected = 'selected="selected"';
						}
					} else {
						if($option->value == $list->value){
							$selected = 'selected="selected"';
						}
					}
					$output .= '<option value="'.$list->value.'" '.$selected.'>'.$list->name.'</option>';
				}
				$output .= '</select>
				</div>';
			break;	
			
			case"menuitem":
				$output .= '
				<div class="fld clearfix menuitem">
					<label '.($option->description ? 'class="hasTip" title="'.$option->label.'::'.$option->description.'"':'').'>'.$option->label.'</label>'."\n";
					
					$selected = $values[$option->name]  ? $values[$option->name] : '';
					jimport('joomla.html.html.menu');

					$options = JHTML::_('menu.menuitems');
					$ilist = JHtml::_('select.genericlist', $options, $name.'['.$option->name.']['.$k.'][]', 
							array(
								'list.attr' => 'class="multiple_select" multiple="multiple" ',
								'list.select' => $selected,
								'list.translate' => false
							)
						);
				$output .= $ilist;
				$output .= '</div>';
			break;
			
			case"sql":
				$output .= '
				<div class="fld clearfix sqlfield">
					<label '.($option->description ? 'class="hasTip" title="'.$option->label.'::'.$option->description.'"':'').'>'.$option->label.'</label>'."\n";
					$selected = $values[$option->name]  ? $values[$option->name] : '';
					
					$sqloptions = array();
					$key = $option->key_field ? (string) $option->key_field : 'value';
					$value = $option->value_field ? (string) $option->value_field : (string) $option->name;
					$translate = false;
					$query = (string) $option->query;
					$db = JFactory::getDBO();
					$db->setQuery($query);
					$items = $db->loadObjectlist();
					if ($db->getErrorNum()) {
						JError::raiseWarning(500, $db->getErrorMsg());
						return $sqloptions;
					}
					$sqloptions[] = JHtml::_('select.option', 0, '-- No Article --');
					if (!empty($items))	{
						foreach ($items as $item)
							$sqloptions[] = JHtml::_('select.option', $item->$key, $item->$value);
					}

					$ilist = JHtml::_('select.genericlist', $sqloptions, $name.'['.$option->name.'][]', 
							array(
								'list.attr' => 'class="'.$option->class.'"',
								'list.select' => $selected,
								'list.translate' => false
							)
						);
				$output .= $ilist;
				$output .= '</div>';
			break;
		}
	}
		
		$output .= '
	</div>
	
</td>';
		return $output;
	}
	
	/**
	 * Method to get the field options for fields
	 *
	 * @return  array  The field option objects.
	 */
	protected function getOptions()
	{
		// Initialize variables.
		$options = array();

		foreach ($this->element->children() as $option)
		{

			// Only add <option /> elements.
			if ($option->getName() != 'option')
			{
				continue;
			}
			//print_r($option->option);
			
			// Create a new option object based on the <option /> element.
			$tmp = JHtml::_(
				'select.option', (string) $option['value'], trim((string) $option), 'value', 'text',
				((string) $option['disabled'] == 'true')
			);

			// Set some option attributes.
			$tmp->class = (string) $option['class'];
			$tmp->type = (string) $option['type'];
			$tmp->label = (string) $option['label'];
			$tmp->options = (string) $option['options'];
			$tmp->name = (string) $option['name'];
			$tmp->target = (string) $option['target'];
			$tmp->description = (string) $option['description'];
			$tmp->placeholder = (string) $option['placeholder'];
			$tmp->query = (string) $option['query'];
			$tmp->key_field = (string) $option['key_field'];
			$tmp->value_field = (string) $option['value_field'];

			if($tmp->type=='textarea')
				$tmp->rows = (string) $option['rows'];

			// Add the option object to the result set.
			$options[] = $tmp;
		}
		
		
		reset($options);

		return $options;
	}

}


?>