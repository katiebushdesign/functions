<?php

/*--------------------------------------------------------*\
	Post Fields Util
\*--------------------------------------------------------*/

function getLink( $id ) {
	global $post;
	$id = $id ?: $post->ID;
	$link = get_field( 'external__link', $id )
		? get_field( 'external__link', $id )
		: get_permalink( $id );
	return $link;
}
