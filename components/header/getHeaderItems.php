<?php

/*--------------------------------------------------------*\
	Get Header Items (DEPRECATED)
\*--------------------------------------------------------*/

function getHeaderItems($items = 'navigation', $containerClass = 'header__menu', $itemClass = 'header__item') {

	# Vars
	$html = '';
	global $post;
	$id = !empty($post) ? $post->ID : '';
	$nav__items = wp_get_nav_menu_items($items);
	$itemClass = (gettype($itemClass) == 'array') ? join(' ', $itemClass) : $itemClass;

	if (!empty($nav__items)) {

		$submenuSubClassArray = explode('__', $containerClass);
		array_splice($submenuSubClassArray, 1, 0, ['__sub']);
		$submenuClass = implode('', $submenuSubClassArray);

		# Output
		$html .= '<ul class="' . $containerClass . '">';
		foreach ($nav__items as $index => $item) {
			$classes = !empty($item->classes) ? join(' ', $item->classes) : '';
			if ($item->menu_item_parent == 0) {
				$children = getNavChildren($item->ID, $nav__items);
				$active__child = childIsActive($children, $id);
				$active = ($id == $item->object_id || !empty($active__child)) ? $itemClass . '--active' : '';
				$target = !empty($item->target) ? 'target="' . $item->target . '"' : '';
				$html .= '<li class="' . $itemClass . ' ' . $classes . ' ' . $active . '">';
				$html .= '<a href="' . $item->url . '" ' . $target . '>' . $item->title . '</a>';
				if (!empty($children)) {
					$html .= '<ul class="' . $submenuClass . '">';
					foreach ($children as $item) {
						$target = !empty($item->target) ? 'target="' . $item->target . '"' : '';
						$html .= '<li class="' . $itemClass . '--submenu">';
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

	else {
		return false;
	}
}
