<?php

/*--------------------------------------------------------*\
	Register Custom Taxonomies
\*--------------------------------------------------------*/

add_action('init', 'vlx__registerTaxonomies');

function vlx__registerTaxonomies() {
	$taxonomies = [
		
		// Team Categories		
		'categories--team' => [
			'post__type' => 'team',
			'name' => 'Categories',
		],

		// Partners Categories
		'categories--partners' => [
			'post__type' => 'partners',
			'name' => 'Categories',
		],

		// Resources Type
		'categories--resources__type' => [
			'post__type' => 'resources',
			'name' => 'Type',
		],

		// Resources Topics
		'categories--resources__topic' => [
			'post__type' => 'resources',
			'name' => 'Topic',
		],

		// Careers Location
		'categories--careers__location' => [
			'post__type' => 'careers',
			'name' => 'Categories',
		],
	];

	foreach ($taxonomies as $key => $value) {
		register_taxonomy($key, $value['post__type'], [
			'labels' => array(
				'name' => $value['name'],
				'add_new_item' => 'Add New ' . $value['name'],
				'new_item_name' => 'New ' . $value['name']
			),
			'show_ui' => true,
			'hierarchical' => true,
			'show_tagcloud' => false
		]);
	}
}