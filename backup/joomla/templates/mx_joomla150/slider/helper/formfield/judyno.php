<?php

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');

class JFormFieldJudyno extends JFormField {
	/*
	TO DO
		- pentru mai multe instante
		- update counter si pentru remove si testat asta cu menuitems
	*/
	protected $type = 'Judyno';
	protected static $initialised = false;
	protected static $mediaInitialised = false;
	

	protected function getLabel() { 
		$html = '';
		return $html;
	}

	protected function getInput() {
		
		$fieldID = str_replace(array('[', ']', 'jformparams'), '', $this->name);
	
		if (!self::$initialised) {
			$document = JFactory::getDocument();

$script = '

//;(function($) {
	var minimizeText = "Minimize",
		maximizeText = "Maximize";
		
	// Generate Unique ID
	function uniqueid() {
		return Math.random().toString(36).substr(2, 9);
	}
	
	// Update the item count
	function updateItemsCount(container) {
		var count = 0;
		container.find("div.dynoitem").each(function(){ 
			count++;
		});
		return count;
	}
	
	// Clear Button - clear the filed
	function clearButton(container){
		container.find(".clearBtn").each(function(){
			jQuery(this).on("click",function(e){
				e.preventDefault();
				jQuery(this).closest(".wrapper").find("input[type=text]").attr("value","");
			});
		});	
	}
	
	// Refresh rows
	function confirm($row, dynoManager) {
		var cnt = updateItemsCount(dynoManager);
		
		// prepare image fields
		$row.find(".browseField input[type=text]").each(function(){
			var _t =  jQuery(this),
				thisID = _t.attr("id"),
				uniq = uniqueid(),
				thisIDnum = _t.attr("id").match(/\d+/g);
	
			_t.attr("id", thisID.replace(thisID, "imgfield_"+uniq));
			
			// also replace in href
			var thisBtn = _t.closest(".wrapper").find("a.modalBtn"),
				thisBtnHref = thisBtn.attr("href"),
				thisBtnNum = thisBtnHref.split("=").pop();
			if(thisBtnNum)
				thisBtn.attr("href", thisBtnHref.replace(thisBtnNum, "imgfield_"+uniq));
			else
				thisBtn.attr("href", thisBtnHref+"imgfield_"+uniq);
		});
		
		// enable clear button for new instances
		clearButton(dynoManager);
		
		// update item counter
		$row.find("span.itemcounter").text(cnt);
		
		// enable squeeze button for new instances
		//SqueezeBox.assign($$("#judynoManager tr:last-child a.modal"), {parse: "rel"});
		SqueezeBox.assign($$(".judynoManager tr:last-child a.modal"), {parse: "rel"});
		
		// enable the resize button for new instances
		$row.find(".resize-dynoitem").on("click", toggleIndividualBox);
		
		// update newly menu items fields
		var menuItemField = $row.find(".fld.menuitem select"),
			thisName = menuItemField.attr("name"),
			str;
		if(menuItemField.length > 0) {
			str = thisName.replace("[][]", "[" + (cnt - 1) + "][]");
			menuItemField.attr("name", str);
		}
	}
	
	function updateMenuItems($row) {
		var menuItemFields = $row.find(".fld.menuitem select"),
			boxes = [],
			regex = /\[([0-9]+)\]/;
		if(menuItemFields.length > 0) {
		menuItemFields.each(function(i){
			var thisName = jQuery(this).attr("name"),
				matches = thisName.match(regex);
			if (null != matches) {
				boxes.push(matches[1]);
				str = thisName.replace(regex, "[" + (boxes.length - 1) + "]");
				jQuery(this).attr("name", str);
			}
		});
		}
	}
	
	// Minimize/Maximize Individual Box
	function toggleIndividualBox() {
		var $this = jQuery(this),
			dynoBox = $this.closest("td");
		$this.text(dynoBox.hasClass("minimized") ? minimizeText + " Box" : maximizeText + " Box");
		dynoBox.toggleClass("minimized");
	};
	
	// Minimize/Maximize All Boxes
	function toggleMasterCollapse() {
		
		var $this = jQuery(this),
			dynoManager = jQuery(this).closest(".manager_wrap").find("table.judynoManager");
			dynoBoxes = dynoManager.find("td"),
			dynoBoxesButtons = dynoBoxes.find(".resize-dynoitem");
		
		if($this.hasClass("minimized")) {
			$this.text(minimizeText + " All");
			dynoBoxes.removeClass("minimized");
			dynoBoxesButtons.text(minimizeText + " Box");	
		} else {
			$this.text(maximizeText + " All");
			dynoBoxes.addClass("minimized");
			dynoBoxesButtons.text(maximizeText + " Box");	
		}
		$this.toggleClass("minimized");
	};

//})(jQuery);
';
		// load script
		JFactory::getDocument()->addScriptDeclaration($script);
			
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
			$document->addScript(JURI::root().$this->element['path'].'js/jquery.dynotable.js');
			
			self::$initialised = true;
		}
		
$triggerSc = '
;(function($) {
	// when dom ready
	$(document).ready(function() {
		var dynoManager = $("#judynoManager'.$fieldID.'");
		// init dynotable
		dynoManager.dynoTable({
			removeClass: ".removeDynoItem'.$fieldID.'",
			lastRowRemovable: '.($this->element['lastrowremovable'] == 'yes' ? 'true' : 'false').',
			orderable: '.($this->element['dragging'] != 'no' ? 'true' : 'false').',
			dragHandleClass: ".dragDynoItem'.$fieldID.'",
			addRowTemplateId: "#addTemplate'.$fieldID.'",
            addRowButtonId: "#addRow'.$fieldID.'",
			onRowRemove: function(){
				var dynoManager = $("#judynoManager'.$fieldID.'");
				updateItemsCount($("#judynoManager'.$fieldID.'"));
				updateMenuItems($("#judynoManager'.$fieldID.'"));
			},
			onRowAdd: function(){
				confirm($("#judynoManager'.$fieldID.'").find("tr:last-child"), $("#judynoManager'.$fieldID.'"));
				updateItemsCount($("#judynoManager'.$fieldID.'"));
			},
			onRowReorder: function(){
				updateItemsCount($("#judynoManager'.$fieldID.'"));
			}
		});
		
		// on click, do the work
		$(".resizeDynoItem'.$fieldID.'").on("click", toggleIndividualBox);
		$("#minimizeAll'.$fieldID.'").on("click", toggleMasterCollapse);
		
		updateItemsCount(dynoManager);
		clearButton(dynoManager);
	});
})(jQuery);';

		JFactory::getDocument()->addScriptDeclaration($triggerSc);
		
		$itemName = ($this->element['itemnname'] ? $this->element['itemnname'] : 'Item');
		$showPreview = ($this->element['showpreview'] == 'no' ? false : true);
		$itemMinimized = $this->element['minimized']; 
		
		$output = '
<div class="manager_wrap">

	<div class="manager_head clearfix">
		<span id="minimizeAll'.$fieldID.'" class="minimize_all ju_uikit_button '.($itemMinimized == 'yes'  ? 'minimized' : '').'">'.($itemMinimized == 'yes'  ? 'Maximize All' : 'Minimize All').'</span>
		<div class="manager_label">'.$this->element['label'].'</div>
	</div>
	
	<table class="judynoManager" id="judynoManager'.$fieldID.'">';
		if($this->value && is_array($this->value)) {
		//if($this->value) { 
			// Get the field options.
			$options = $this->getOptions();
			// print_r($this->value);
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
					if(isset($this->value['dynotitle'][$k]))
					$thevalues['dynotitle'] = $this->value['dynotitle'][$k];	
				}
				
				
				// load fields with the stored values
				$output .= '<tr>'.self::getFields($this->name, 'default', $thevalues, $k).'</tr>';
			}
		} else {
			// load empty fields 
			if($this->element['startempty'] != 'yes')
			$output .= '<tr>'.self::getFields($this->name, 'default').'</tr>';
		}
			//load template fields for dynoTable script
			$output .= '<tr id="addTemplate'.$fieldID.'">'.self::getFields($this->name, 'template').'</tr>';
		
		$output .= '
	</table>
	<a id="addRow'.$fieldID.'" class="ju_uikit_button addnew">Add New '.$itemName.'</a>
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
			$unique_id = uniqid('imgfield_');
			$html[] = '	<input class="input-medium" type="text" name="'.$this->name.'['.$imgName.'][]'.'" id="'.$unique_id.'"' .
						' value="'.htmlspecialchars($img, ENT_COMPAT, 'UTF-8').'"' .
						' readonly="readonly" />';
			$html[] = '</div>';

			// The button.
			$html[] = '<a class="modal modalBtn ju_uikit_button" title="'.JText::_('JLIB_FORM_BUTTON_SELECT').'" 
				href="'.($this->element['img']['readonly'] ? '' : ($link ? $link : 'index.php?option=com_media&amp;view=images&amp;tmpl=component&amp;asset=&amp;author=') . '&amp;folder=&amp;fieldid='.$unique_id).'" rel="{handler: \'iframe\', size: {x: 800, y: 500}}">';
			$html[] = JText::_('JLIB_FORM_BUTTON_SELECT').'</a>';
			
			$html[] = '<a title="'.JText::_('JLIB_FORM_BUTTON_CLEAR').'" class="clearBtn ju_uikit_button"  href="#" >'.JText::_('JLIB_FORM_BUTTON_CLEAR').'</a>'; 
			$html[] = '</div>';
	
			return implode("\n", $html);
			
		}
	
	function getFields($name, $type = 'default', $values = null, $k = null){
		
		$fieldID = str_replace(array('[', ']', 'jformparams'), '', $this->name);
		
		$itemName = ($this->element['itemnname'] ? $this->element['itemnname'] : 'Item');
		$dragging = $this->element['dragging'];
		$itemMinimized = $this->element['minimized'];
		
		// Get the field options.
		$options = $this->getOptions();
		
	
		$output = '<td class="'.(($itemMinimized == 'yes' && $type =='default')  ? 'minimized' : '').' '.($type == 'template' ? 'fromtemplate':'').'" >
	<span class="itemcounter ju_uikit_button">'.($k+1).'</span>'
	.($dragging != 'no' ? '<span class="dragDynoItem'.$fieldID.' drag-dynoitem ju_uikit_button" title="click and drag to rearrange">Drag to arrange</span>':'').
	'<span class="removeDynoItem'.$fieldID.' remove-dynoitem ju_uikit_button" title="Remove '.$itemName.'">Remove '.$itemName.'</span>
	<span class="resizeDynoItem'.$fieldID.' resize-dynoitem ju_uikit_button " title="Minimize Box">'.(($itemMinimized == 'yes' && $type =='default') ? 'Maximize Box' : 'Minimize Box').'</span>
	<hr class="underbuttons">
	<div class="dynoitem">';
		
		$dynotitle = isset($values['dynotitle']) ? htmlspecialchars($values['dynotitle'], ENT_COMPAT, 'UTF-8') : '&raquo; Box title (click to edit, only for backend usage)';
		$output .= '
		<div class="fld clearfix dynotitle">
			<input type="text" name="'.$name.'[dynotitle][]" value="'.$dynotitle.'" title="Click to edit" />
		</div>';
				
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
					
					$selected = $values[$option->name]  ? $values[$option->name] : 'mainmenu.1';
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