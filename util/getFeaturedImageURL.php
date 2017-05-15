<?php

/*--------------------------------------------------------*\
	Get Featured Image URL

	TODO: Arguments are getting lengthy. Change args to array
\*--------------------------------------------------------*/

function getPostThumbnailURL($size = 'full', $style = true, $id = false, $hidden = false) {
	global $post;
	$id = $id !== false ? $id : $post->ID;
	$thumbnail__id = get_post_thumbnail_id( $id );
	$src = wp_get_attachment_image_src($thumbnail__id, $size);

	if ($style) {
		return 'style="background-image: url(' . $src[0] . ')"';
	}

	if ($hidden) {
		return 'data-src="' . $src[0] . '"';
	}

	return $src[0];
}
