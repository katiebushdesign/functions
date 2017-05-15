<?php

/*--------------------------------------------------------*\
	Register Navigation Menu
\*--------------------------------------------------------*/

function vlx__registerMenus() {
	register_nav_menus([
		'nav' => 'Navigation',
		'nav--utility' => 'Utility Navigation',
		'nav--mobile' => 'Mobile Navigation',
		'nav--overlay' => 'Overlay Navigation',
		'nav--footer' => 'Footer Navigation',

		'menu__main--header' => 'Main Menu, Header',
		'menu__utility--header' => 'Utility Menu, Header',
		'menu__overlay' => 'Overlay Menu',
		'menu__main--footer' => 'Main Menu, Footer',
		'menu__utility--footer' => 'Utility Menu, Footer',
	]);
}

add_action( 'init', 'vlx__registerMenus' );
