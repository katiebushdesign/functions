<?php

/*--------------------------------------------------------*\
	Get Header Items
\*--------------------------------------------------------*/

function getHeaderItems($containerClass = 'header__menu', $itemClass = 'header__item') {

	# Vars
	$html = '';
	global $post;
	$id = $post->ID;
	$nav__items = wp_get_nav_menu_items('navigation');
	$itemClass = (gettype($itemClass) == 'array') ? join(' ', $itemClass) : $itemClass;

	# Output
	$html .= '<ul class="' . $containerClass . '">';
	foreach ($nav__items as $index => $item) {
		if ($item->menu_item_parent == 0) {
			$children = getNavChildren($item->ID, $nav__items);
			$active = ($id == $item->object_id) ? 'header__item--active' : '';
			$target = !empty($item->target) ? 'target="' . $item->target . '"' : '';
			$html .= '<li class="' . $itemClass . ' ' . $active . '">';
			$html .= '<a href="' . $item->url . '" ' . $target . '>' . $item->title . '</a>';
			if (!empty($children)) {
				$html .= '<ul class="header__submenu">';
				foreach ($children as $item) {
					$target = !empty($item->target) ? 'target="' . $item->target . '"' : '';
					$html .= '<li class="header__item--submenu">';
					$html .= '<a href="' . $item->url . '" ' . $target . '>' . $item->title . '</a>';
					$html .= '</li>';
				}
				$html .= '</ul>';
			}
			$html .= '</li>';
		}
	}
	$html .= '</ul>';
	return $html;
}
