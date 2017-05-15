<?php

/*--------------------------------------------------------*\
	Get Youtube/Vimeo Video ID from Source
\*--------------------------------------------------------*/

function getVideoStillFrame($source, $host) {
	$source = explode('?', $source);

	if (strpos($source, 'youtube') > -1) {
		$image = $source[0] . '/hqdefault.jpg';
		$image = str_replace('www.youtube', 'img.youtube', $image);
		$image = str_replace('embed', 'vi', $image);
		return $image;
	}

	else if (strpos($source, 'vimeo') > -1) {
		$source = explode('/', $source[0]);
		$hash = unserialize(file_get_contents('http://vimeo.com/api/v2/video/' . $source[4] . '.php'));
		return $hash[0]['thumbnail_large'];
	}

	else {
		return false;
	}
}
