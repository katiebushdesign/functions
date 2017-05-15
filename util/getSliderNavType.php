<?php

function getSliderNavType($arrows, $dots, $bar) {
	if ($arrows) {
		return 'arrows';
	}

	elseif ($dots) {
		return 'dots';
	}

	elseif ($bar) {
		return 'bar';
	}
}