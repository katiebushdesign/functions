<?php

/*--------------------------------------------------------*\
	Extract Source from Youtube iFrame
\*--------------------------------------------------------*/

require __DIR__ . '/../../vendor/autoload.php';
use PHPHtmlParser\Dom;

function extractSourceFromHTML($content) {
	$dom = new Dom;
	$dom->load($content);
	$button = $dom->find('button');
	$data = $button->getAttribute('data-modal');
	$source = $button->getAttribute('data-src');

	if (!empty($data) && !empty($source)) {
		return ['id' => $data, 'source' => $source];
	}

	else {
		return false;
	}
}