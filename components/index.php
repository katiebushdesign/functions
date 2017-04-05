<?php

/*--------------------------------------------------------*\
	Components
\*--------------------------------------------------------*/

$components = [
	'social',
	'carousel',
	'header',
	'logo',
	'isotope',
];

foreach ($components as $component) {
	include_once $component . '/index.php';
}
