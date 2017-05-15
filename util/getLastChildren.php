<?php

function getLastChildren($index, $count, $remainders) {
	$remainder__class = '';
	$column__remainders = $count - $remainders;
	for ($i = $column__remainders; $i < $count; $i++) {
		if ($i === $index) {
			$remainder__class = 'column--end';
			break;
		}
	}
	return $remainder__class;
}
