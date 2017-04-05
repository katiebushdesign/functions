<?php

function buildWrapper() {
	global $post;
	$html = '';
	$pageSlug = !is_single($post) ? getSlug()['page__slug'] : 'single--' . camelCase($post->post_type);
	$wrapper__class = ['wrapper', 'wrapper--' . $pageSlug];
	$html .= '<body>';
	$html .= '<div class="' . join(' ', $wrapper__class) . '">';
	echo $html;
}