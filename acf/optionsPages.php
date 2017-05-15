<?php

/*--------------------------------------------------------*\
	Add Options Page for Global Site Options
\*--------------------------------------------------------*/

if (function_exists('acf_add_options_page')) {

	# Global Options Parent
	$parent = acf_add_options_page([
		'page_title' 	=> 'Global Settings',
		'menu_title'	=> 'Global Settings',
		'menu_slug' 	=> 'global-theme-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	]);

	# Header Options Subpage
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Options',
		'menu_title' 	=> 'Header Options',
		'parent_slug' 	=> $parent['menu_slug'],
		'redirect' 		=> false
	));
}
