<?php

/*--------------------------------------------------------*\
	Get Logo
\*--------------------------------------------------------*/

function getLogo($color = '', $field = false) {
	$html = '';
	$logo = $field ?: get_field( 'logo__color', 'option' );
	$color__class = ($color === 'white') ? 'logo--white' : '';
	$logo__class = join(' ', ['logo', $color__class]);

	$html .= '<div class="logo__container">';
	$html .= '<div class="' . $logo__class . '">' . get__file($logo['url'], 'uploads') . '</div>';
	$html .= '<a href="' . esc_url(home_url('/')) . '" class="cover--hidden">' . get_bloginfo( 'name' ) . '</a>';
	$html .= '</div>';

	return $html;
}
