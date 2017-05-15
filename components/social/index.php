<?php

/*--------------------------------------------------------*\
	Get Social Media

	# Add Class Names
	# Needs to work with Team, too
\*--------------------------------------------------------*/

function get__socialMedia($items = ['twitter', 'facebook', 'linkedin'], $wrapper = false, $share = false, $option = true) {

	# Vars
	include 'vars.php';
	$socialMedia = getSocialMediaValues( $option );

	# Classes
	$wrapper = (gettype($wrapper) === 'array') ? join(' ', $wrapper) : $wrapper;
	$container__class = $share ? ['social__media', 'social__media--share'] : ['social__media'];

	# Output
	$html = '';
	$html .= $wrapper ? '<div class="' . $wrapper . '" id="' . $wrapper . '">' : '';
	$html .= $share ? '<p class="socialShare__title">Share</p>' : '';
	$html .= '<ul class="' . join(' ', $container__class) . '">';

	foreach ($items as $item) {
		$html .= '<li class="social__item">';
		$html .= '<div class="icon__container">' . $socialMedia[$item]['icon'] . '</div>';
		$html .= ($share && !empty($socialMedia[$item]['share']))
			? '<a href="' . $socialMedia[$item]['share'] . '" class="cover" target="_blank"></a>'
			: '<a href="' . $socialMedia[$item]['link'] . '" class="cover" target="_blank"></a>';
		$html .= '</li>';
	}

	$html .= '</ul>';
	$html .= $wrapper ? '</div>' : '';
	return $html;
}
