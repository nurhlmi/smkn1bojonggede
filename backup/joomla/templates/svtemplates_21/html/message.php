<?php
defined('_JEXEC') or die;

function renderMessage($msgList)
{
	$buffer  = null;
	$buffer .= "\n<div id=\"system-message-container\">";

	if (is_array($msgList) && count($msgList) > 0)
	{
		$buffer .= "\n<dl id=\"system-message\">";
		foreach ($msgList as $type => $msgs)
		{
			if (count($msgs))
			{
				$buffer .= "\n<dt class=\"" . strtolower($type) . "\">" . JText::_($type) . "</dt>";
				$buffer .= "\n<dd class=\"" . strtolower($type) . " message\">";
				$buffer .= "\n\t<ul>";
				foreach ($msgs as $msg)
				{
					$buffer .= "\n\t\t<li>" . $msg . "</li>";
				}
				$buffer .= "\n\t</ul>";
				$buffer .= "\n</dd>";
			}
			$buffer .= "\n</dl>";
		}
	}
    $buffer .= "\n</div>";
	return $buffer;
}
