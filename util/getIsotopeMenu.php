<?php  

/*--------------------------------------------------------*\
	Generate Isotope Menu
\*--------------------------------------------------------*/

function get__menu($terms, $isotope = true) {

	# Vars 
	$html = '';
	$count = count($terms);

	if ($count > 0) {
		if ($isotope) {
			$html .= '<ul class="menu--utility">';
			$html .= '<li class="menu__item filter__item iso--filter" data-filter="*">All</li>';
			foreach ($terms as $term) {
				$filter__type = 'filter--' . camelCase(strtolower($term->slug));
				$html .= '<li class="menu__item filter__item iso--filter" data-filter=".' . $filter__type . '" id="' . $filter__type . '">' . $term->name . '</li>';
			}
			$html .= '</ul>';
		}

		# Need to refine this later
		else {
			$html .= '<ul class="menu--utility">';
			foreach ($terms as $term) {
				$html .= '<li class="menu__item filter__item">';
				$html .= '<a href="#">';
				$html .= 'Link';
				$html .= '</a>';
				$html .= '</li>';
			}
			$html .= '</ul>';
		}

		return $html;
	}

	else {
		return false;
	}
}