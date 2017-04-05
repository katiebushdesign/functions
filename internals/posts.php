<?php

/*--------------------------------------------------------*\
	Register Custom Post Types
\*--------------------------------------------------------*/

add_action('init', 'vlx__registerPosts');

function vlx__registerPosts() {
	$post__types = [
		'resources' => [],
		'news' => [],
		'press' => [],
		'blog' => [
			'supports' => ['title', 'editor', 'thumbnail', 'author', 'revisions'],
			'taxonomies' => ['post_tag'],
		],
		'team' => [],
		'events' => [],
		'partners' => [],
		'careers' => [],
	];

	foreach ($post__types as $key => $options) {
		$labels = [
			'name' => _x(ucfirst($key), 'post type general name'),
			'singular_name' => _x(ucfirst($key), 'post type singular name'),
			'add_new' => _x('Add New', ucfirst($key)),
			'add_new_item' => 'Add New' . ucfirst($key),
			'edit_item' => 'Edit ' . ucfirst($key),
			'new_item' => 'New ' . ucfirst($key),
			'view_item' => 'View ' . ucfirst($key),
			'search_items' => 'Search ' . ucfirst($key),
			'not_found' => 'Nothing found',
			'not_found_in_trash' => 'Nothing found in Trash',
			'parent_item_colon' => ''
		];
		 
		$defaults = [
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'has_archive' => false,
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => ['title', 'editor', 'thumbnail', 'revisions'],
			'show_in_nav_menus' => true,
		];

		$args = array_merge($defaults, $options);
		register_post_type($key, $args);
	}
}
