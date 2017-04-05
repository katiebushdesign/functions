<?php

/*--------------------------------------------------------*\
	Get Post Meta

	TODO: Add ordering argument
\*--------------------------------------------------------*/

class getPostMeta {

	function __construct($posts) {
		$this->posts = $posts;
	}

	function dates($date__format, $order = 'desc') {
		$dates = [];
		foreach ($this->posts as $post) {
			$post__date = strtotime($post->post_date);
			$post__year = date($date__format, $post__date);
			if (in_array($post__year, $dates) === false) {
				array_push($dates, $post__year);
			}
		}

		return $dates;
	}
}