<?php

/*--------------------------------------------------------*\
	Dropdown Menu (Isotope)
\*--------------------------------------------------------*/

function getDropdown($taxonomies = [], $classes = []) {

	$html = '';
	$html .= '<nav class="' . join(' ', $classes['navigation']) . '">';
	$length = count($taxonomies);

	// FILTER BY TYPE // FILTER BY TOPIC AS DEFAULT
	foreach ($taxonomies as $taxonomy__slug => $taxonomy) {
		$taxonomy__name = ucfirst($taxonomy__slug);
		$html .= '<div class="' . join(' ', $classes['menu']) . '" data-filter-group="' . $taxonomy__name . '" data-active="">';
		$html .= '<span class="menu--dropdown__active">Filter by ' . $taxonomy__name . '</span>';
		$html .= '<span class="menu--dropdown__arrow"></span>';
		$html .= '<ul class="menu--dropdown__list">';
		$html .= '<li class="menu--dropdown__item filter__item" data-filter="" id="all">All</li>';
		foreach ($taxonomy as $term) {

			# Vars
			$id = 'filter--' . camelCase(strtolower($term->slug));
			$name = $term->name;

			# Output
			$html .= '<li class="menu--dropdown__item filter__item" data-filter=".' . $id . '" id="' . $id . '">' . $name . '</li>';
		}
		$html .= '</ul>';
		$html .= '</div>';
	}

	$html .= '</nav>';

	return $html;
}