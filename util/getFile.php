<?php

/*--------------------------------------------------------*\
	Get File
\*--------------------------------------------------------*/

function get__file($filename, $path__resolution = false) {

	if ($path__resolution === true) {
		$path = $_SERVER['DOCUMENT_ROOT'] . $filename;
	}

	else if ($path__resolution === 'uploads') {
		$split = explode($_SERVER['HTTP_HOST'], $filename);
		$split__cdn = explode('qventus-katiebushdesigni.netdna-ssl.com', $filename);
		$length = count($split);
		$pathname = ($length > 1) ? $split[1] : $split__cdn[1];
		$path = $_SERVER['DOCUMENT_ROOT'] . $pathname;
	}

	else if (strpos($filename, 'svg') > -1 && !$path__resolution) {
		$path = $_SERVER['DOCUMENT_ROOT'] . '/build/images/icons/' . $filename;
	}

	else if (strpos($filename, 'php') > -1 && !$path__resolution) {
		$path = $_SERVER['DOCUMENT_ROOT'] . '/content/themes/' . $filename;
	}

	else {
		$path = $_SERVER['DOCUMENT_ROOT'] . $filename;
	}

	if (is_file($path)) {
		ob_start();
		include $path;
		$contents = ob_get_contents();
		ob_end_clean();
		return $contents;
	}

	return 'file does not exist at PATH: ' . $path;
}
