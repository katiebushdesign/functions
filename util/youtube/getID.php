<?php

/*--------------------------------------------------------*\
	Get Youtube Video ID from Source
\*--------------------------------------------------------*/

function getYoutubeStillFrame($source) {
	$source = explode('?', $source);
	$image = $source[0] . '/hqdefault.jpg';
	$image = str_replace('www.youtube', 'img.youtube', $image);
	$image = str_replace('embed', 'vi', $image);
	return $image;
}

function getVimeoStillFrame($source) {
	$source = explode('?', $source);
	$source = explode('/', $source[0]);
	$hash = unserialize(file_get_contents('http://vimeo.com/api/v2/video/' . $source[4] . '.php'));
	return $hash[0]['thumbnail_large'];
}
