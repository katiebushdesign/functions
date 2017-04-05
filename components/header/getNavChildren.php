<?php

/*--------------------------------------------------------*\
	Get Navigation Children
\*--------------------------------------------------------*/

function getNavChildren($id, $nav__items) {
	$children = [];
	foreach ($nav__items as $nav__item) {
		if ($nav__item->menu_item_parent == $id) {
			$children[] = $nav__item;
		}
	}

	return $children;
}
