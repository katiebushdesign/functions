<?php

/*--------------------------------------------------------*\
	Load More
\*--------------------------------------------------------*/

function get__news() {
	$posts = [];
	$args = array( 
		'post_type' => 'news',
		'posts_per_page' => 5,
		'order' => 'DESC', 
		'orderby' => 'date',
		'post_status' => 'publish',
		'offset' => 5,
	);
	$loop = new WP_Query($args);
	while ($loop->have_posts()): $loop->the_post();

		# Vars
		$html = '';
		$id = get_the_ID();
		$title = get_the_title();
		$preview = get_field( 'preview' )
			? get_field( 'preview' )
			: 'Matt Murphy weighs in on Talend’s IPO and the market’s appetite for new issues.';
		$timestamp = get_field( 'date' ) ? strtotime(get_field( 'date' )) : strtotime(get_the_date());
		$date = date('m.d.Y', $timestamp);
		$filters = get_the_terms( $id, 'news--categories' );
		$filter__class = [];
		foreach ($filters as $filter) {
			array_push($filter__class, 'filter--' . $filter->slug);
		}

		# Output
		$html .= '<div class="news__item news__item--loaded--' . $loop->current_post . ' ' . join(' ', $filter__class) . '">';
		$html .= '<div class="news__item--container">';

		# News Meta
		$html .= '<div class="news__meta">';
		$html .= '<p class="news__type">' . $filters[0]->name . '</p>';
		$html .= '<p class="news__date">' . $date . '</p>';
		$html .= '</div>';

		# News Content
		$html .= '<div class="news__content content">';
		$html .= '<h2 class="news__title">' . $title . '</h2>';
		$html .= '<p class="news__preview">' . $preview . '</p>';
		$html .= '</div>';

		$html .= '</div>';
		$html .= '</div>';

		array_push($posts, $html);

	endwhile;
	echo json_encode($posts);
	exit();
}

add_action( 'wp_ajax_get__news_action', 'get__news');
add_action( 'wp_ajax_nopriv_get__news_action', 'get__news');
