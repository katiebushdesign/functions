<?php

# Require Underscore
require __DIR__ . '/../../vendor/autoload.php';
use Underscore\Types\Arrays;

/*--------------------------------------------------------*\
	Get Menu Items (Renamed)
\*--------------------------------------------------------*/

function getMenuItems($defaults = [
	'id' => 'navigation',
	'containerClass' => 'header__menu',
	'itemClass' => 'header__item',
]) {

	# Options
	$id = $defaults['items'];
	$containerClass = $defaults['containerClass'];
	$itemClass = $defaults['itemClass'];

	# Vars
	$html = '';
	$items = wp_get_nav_menu_items($id);
	$containerClass = (gettype($containerClass) == 'array') ? trim(join(' ', $containerClass)) : $containerClass;

	if (!empty($items)) {

		# Output
		$html .= '<ul class="' . $containerClass . '">';
		foreach ($items as $index => $item) {
			if ($item->menu_item_parent == 0) {

				# Get item children
				$children = getNavChildren($item->ID, $items);

				# Add active class to parent if child page is currently active
				$active__child = childIsActive($children, $id);
				$active = ($id == $item->object_id || !empty($active__child)) ? $itemClass . '--active' : '';

				# Add target
				$target = !empty($item->target) ? 'target="' . $item->target . '"' : '';

				# Construct Item
				$itemClasses = !empty($item->classes) ? trim(join(' ', Arrays::flatten([$itemClass, $item->classes, $active]))) : '';
				$html .= '<li class="' . $itemClasses . '">';
				$html .= '<a href="' . $item->url . '" ' . $target . '>' . $item->title . '</a>';

				# Children
				if (!empty($children)) {
					$html .= '<ul class="submenu">';
					foreach ($children as $item) {
						$target = !empty($item->target) ? 'target="' . $item->target . '"' : '';
						$html .= '<li class="submenu__item">';
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
