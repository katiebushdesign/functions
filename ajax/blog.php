<?php

/*--------------------------------------------------------*\
	Load More
\*--------------------------------------------------------*/

function get__blog() {
	$posts = [];
	$count = 10 + $_POST['count'];
	$loop = new WP_Query([
		'post_type' => 'blog',
		'posts_per_page' => 5,		
		'order' => 'DESC',
		'orderby' => 'date',
		'offset' => $count,
	]);
	while ($loop->have_posts()): $loop->the_post();

		# Vars
		$html = '';
		$id = get_the_ID();
		$title = get_the_title();
		$content = get_the_content();
		$preview = get_field( 'preview' )
			? get_field( 'preview' )
			: getContent([
				'excerpt' => 4, 
				'images' => false, 
				'headings' => false,
				'links' => false,
			]);
		// $preview = strlen($preview) > 100 ? substr($preview, 0, 100) . '...' : $preview;
		$timestamp = get_field( 'date' ) ? strtotime(get_field( 'date' )) : strtotime(get_the_date());
		$date = date('F j, Y', $timestamp);
		$link = get_field( 'external__link' ) ? get_field( 'external__link' ) : get_permalink();
		$image = get_the_post_thumbnail();
		$author = get_the_author();

		$html .= '<article class="blog__item blog__item--loaded--' . $loop->current_post . '">';
		$html .= '<figure class="blog__image">' . $image . '</figure>';
		$html .= '<div class="blog__content content">';
		$html .= '<header class="header--blog">';
		$html .= '<h1 class="blog__title">' . $title . '</h1>';
		$html .= '<p class="blog__meta"><span class="blog__date">' . $date . '</span><span class="blog__author">By: ' . $author . '</span></p>';
		$html .= '</header>';
		$html .= '<div class="blog__preview">' . $preview . ' <span class="blog__more">Read More</span></div>';
		$html .= '</div>';
		$html .= '</article>';

		array_push($posts, $html);

	endwhile;
	echo json_encode($posts);
	exit();
}

add_action( 'wp_ajax_get__blog_action', 'get__blog');
add_action( 'wp_ajax_nopriv_get__blog_action', 'get__blog');
