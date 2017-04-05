<?php

/*--------------------------------------------------------*\
	Include all util functions
\*--------------------------------------------------------*/

$functions = [

	# Vars
	'vars',

	# General
	'pre', 
	'getFile',
	'loadTemplate',
	'splitToSentence',
	'timeElapsed',
	'camelCase',
	'buildWrapper',
	'postFields',

	# Youtube
	'youtube/getID',
	'youtube/getSource',

	# WP
	'getContent',
	'getFeaturedImageURL',
	'getSlug',
	'getPostMeta',

	# ACF
	'getFieldID',
	'fetchFieldKey',
];

foreach ($functions as $function) {
	include_once $function . '.php';
}
