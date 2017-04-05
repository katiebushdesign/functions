<?php

/*--------------------------------------------------------*\
	Isotope Menu
\*--------------------------------------------------------*/

function isotopeMenu($filters, $navigationClasses, $menuClasses) {

	# Class Definitions
	$html = '';
	$html .= '<nav class="' . join(' ', $navigationClasses) . '">';
	$html .= '<ul class="' . join(' ', $menuClasses) . '">';

	# Menu Items
	$html .= '<li class="menu__item filter__item" data-filter="*" id="filter--all">All</li>';

	# WP_Term Object
	if (gettype($filters[0]) === 'object') {
		foreach ($filters as $filter) {
			$filter__type = 'filter--' . camelCase(strtolower($filter->slug));
			$html .= '<li class="menu__item filter__item" data-filter=".' . $filter__type . '" id="' . $filter__type . '">' . $filter->name . '</li>';
		}	
	}

	# Otherwise assume standard array
	# TODO: Re-do double/single quotes
	else {
		foreach ($filters as $filter) {
			$filter__name = $filter;
			$filter__data = 'filter--' . $filter;
			$classes = ['menu__item', 'filter__item'];
			$html .= "<li class=\"" . join(' ', $classes) . "\" data-filter=\".$filter__data\" id=\"$filter__data\">$filter__name</li>";
		}
	}

	$html .= '</ul>';
	$html .= '</nav>';

	return $html;
}
