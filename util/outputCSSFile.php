<?php

function outputCSSFile($module__name) {

	$html = '';

	# Temporary Fix for Find a Partner
	$module__name = ($module__name === 'findAPartner') ? 'partners' : $module__name;

	# Check if the CSS file has been included for $module__name.
	if (array_search($module__name, $GLOBALS['STYLE']) !== false) {
		return false;
	}

	else {

		# Set CSS File Output to true in GLOBALS in order to stop multiple instances of the same CSS file from being rendered with each block.
		array_push($GLOBALS['STYLE'], $module__name);

		if (strpos($_SERVER['HTTP_HOST'], 'com') > -1 || strpos($_SERVER['HTTP_HOST'], 'io') > -1) {
			$html .= '<link rel="preload" type="text/css" href="/build/styles/modules/' . $module__name . '.css" as="style" onload="this.rel=\'stylesheet\'">';
			$html .= '<noscript><link rel="stylesheet" href="/build/styles/modules/' . $module__name . '.css"></noscript>';
			$html .= '<script type="text/javascript">';
			$html .= 'if (!window.supportsPreload) { loadCSS(\'/build/styles/modules/' . $module__name . '.css\') };';
			$html .= '</script>';
		}

		else {
			$html .= '<link rel="stylesheet" type="text/css" href="/build/styles/modules/' . $module__name . '.css">';
		}

		return $html;
	}
}
