<?php

/*--------------------------------------------------------*\
	Internals
\*--------------------------------------------------------*/

$internals = [
	'menus',
	'settings',
	'posts',
	// 'rewrites',
	'scripts',
	'taxonomies',
	'wp-rocket',
	'wp-admin',
];

foreach ($internals as $internal) {
	include_once $internal . '.php';
}
