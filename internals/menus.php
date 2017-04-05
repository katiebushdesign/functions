<?php

/*--------------------------------------------------------*\
	Register Navigation Menu
\*--------------------------------------------------------*/

function vlx__registerMenus() {
	register_nav_menus([
		'nav' => 'Navigation', 
		'nav--utility' => 'Utility Navigation',
	]);
}

add_action( 'init', 'vlx__registerMenus' );