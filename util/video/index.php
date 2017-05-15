<?php

include_once 'extractSourceFromHTML.php';
include_once 'getIFrameSource.php';
include_once 'getVideoStillFrame.php';

function getVideo($url, $isContent = false) {

	if ($isContent) {
		$video = extractSourceFromHTML($url);
		if (!empty($video)) {
			array_push($GLOBALS['VIDEOS'], [
				'id' => $video['id'],
				'source' => $video['source'],
			]);
		}
	}

	else {
		$id = 'modal--' . count($GLOBALS['VIDEOS']);
		$embed = '<iframe data-src="' . $url  . '" width="1280" height="720" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
		$source = getIFrameSource($embed);

		if (!empty($source)) {
			array_push($GLOBALS['VIDEOS'], [
				'id' => $id,
				'source' => $source,
			]);

			return $id;
		}
	}
}
