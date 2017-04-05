<?php

/*--------------------------------------------------------*\
	Get Logo
\*--------------------------------------------------------*/

function getLogo($color = 'logo__color') {
	$html = '';
	$logo = get_field( $color, 'option' );

	$html .= '<div class="logo__container">';
	$html .= '<div class="logo">' . get__file($logo['url'], 'uploads') . '</div>';
	$html .= '<a href="/" class="cover"></a>';
	$html .= '</div>';

	return $html;
}
