<?php

/*--------------------------------------------------------*\
	ACF
\*--------------------------------------------------------*/

$acfSettings = [
	'optionsPages',
	'colorPicker',
	'acfSearch',
];

foreach ($acfSettings as $setting) {
	include_once $setting . '.php';
}
