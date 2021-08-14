<?php
defined('_JEXEC') or die;
function pagination_list_render($list)
{
$html = '<ul>';
$html .= '<li>' . $list['start']['data'] . '</li>';
$html .= '<li>' . $list['previous']['data'] . '</li>';
foreach ($list['pages'] as $page)
{
$html .= '<li class="mobile">' . $page['data'] . '</li>';
}
$html .= '<li>' . $list['next']['data'] . '</li>';
$html .= '<li>' . $list['end']['data'] . '</li>';
$html .= '</ul>';
return $html;
}