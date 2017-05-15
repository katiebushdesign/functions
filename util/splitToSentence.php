<?php

/*--------------------------------------------------------*\
	Split Content By Sentences
\*--------------------------------------------------------*/

function splitToSentence($content, $count) {
	$sentence = explode('. ', $content);
	$snippet = '';
	$sentence__count = 0;
	foreach ($sentence as $s) {
		if ($sentence__count < $count) {
			$substr = substr($s, -2);
			$snippet .= $s;

			if (strpos($substr, '!') === false && strpos($substr, '?') === false && strpos($substr, '.') === false) {
				$snippet .= '. ';
			}

			$sentence__count++;
		} else {
			break;
		}
	}
	return $snippet;
}
