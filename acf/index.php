<?php

/*--------------------------------------------------------*\
	ACF
\*--------------------------------------------------------*/

$acfSettings = [
	'optionsPages',
	'colorPicker',
];

foreach ($acfSettings as $setting) {
	include_once $setting . '.php';
}
