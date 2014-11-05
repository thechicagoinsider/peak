<?php
/**
* @package   yoo_peak
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// no direct access
defined('_JEXEC') or die;

if (in_array($app->scope, array('com_content', 'com_finder', 'com_search', 'com_tags'))) {

	function pagination_list_render($list) {

		$current = 1;
		$range   = 1;
		$step    = 3;

		foreach ($list['pages'] as $i => $page) {
			if (!$page['active']) $current = $i;
		}

		if ($current >= $step) {
			$range = ($current % $step == 0) ? ceil($current / $step) + 1 : ceil($current / $step);
		}

		$html = array('<ul class="uk-pagination">');


		if ($list['previous']['active']==1) $html[] = $list['previous']['data'];


		foreach ($list['pages'] as $i => $page) {

			$item = ($i != $current) ? $page['data'] : str_replace('<li class="uk-disabled">', '<li class="uk-active">', $page['data']);

			if (in_array($i, range($range * $step - ($step + 1), $range * $step))) {

				if (($i % $step == 0 || $i == $range * $step - ($step + 1)) && $i != $current && $i != $range * $step - $step) {
					$item = $page['data'] = preg_replace('#(<a.*?>).*?(</a>)#', '$1...$2', $page['data']);
				}
			}

			$html[] = $item;
		}

		if ($list['next']['active']==1) $html[] = $list['next']['data'];

		$html[] = '</ul>';

		return implode("\n", $html);
	}

	function pagination_item_active($item) {

		$cls = '';
		$title = '';

	    if ($item->text == JText::_('JNEXT')) { $item->text = '<i class="uk-icon-arrow-right"></i>'; $cls = "next tm-pagination-next"; $title = JText::_('JNEXT'); }
	    if ($item->text == JText::_('JPREV')) { $item->text = '<i class="uk-icon-arrow-left"></i>'; $cls = "previous tm-pagination-previous"; $title = JText::_('JPREV'); }
		if ($item->text == JText::_('JLIB_HTML_START')) { $cls = "first"; }
	    if ($item->text == JText::_('JLIB_HTML_END')) { $cls = "last"; }

	    return '<li><a class="'.$cls.'" href="'.$item->link.'" title="'.$title.'">'.$item->text.'</a></li>';

	}

	function pagination_item_inactive(&$item) {
		return '<li class="uk-disabled"><span>'.$item->text.'</span></li>';
	}

}