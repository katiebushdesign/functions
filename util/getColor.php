<?php

function getColor($color) {
	$colors = [
		'green' => '#96ca4f',
		'orange' => '#f58021',
		'red' => '#9f0d40',
		'blue' => '#3ca5d5',
		'blue' => '#007db6',
		'white' => '#ffffff',
		'grey--light' => '#f8f8f8',
		'grey' => '#797d82',
		'grey--medium' => '#a8afb7',
		'grey--dark' => '#33333',
		'grey--border' => '#d7d8d6',
		'black' => '#000014',
	];

	return array_search($color, $colors);
}