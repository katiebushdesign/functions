<?php global $post;

# Link Shortener
require_once dirname(__FILE__) . '/Google.class.php';
$googl = new Googl('AIzaSyCgnokP_PRwEZQBT4bnPrdZWBK59YZNqgE');

# Twitter
$twitter = get_field( 'twitter', 'option' );
$twitter__handle = get_field( 'twitter__handle', 'option' );
$twitter__icon = get__file( '/twitter.svg' );
$twitter__share = urlencode($googl->shorten('//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']));

# Facebook
$facebook = get_field( 'facebook', 'option' );
$facebook__icon = get__file( '/facebook.svg' );

# Linkedin
$linkedin = get_field( 'linkedin', 'option' );
$linkedin__icon = get__file( '/linkedin.svg' );

# Google
$google = get_field( 'google', 'option' );
$google__icon = get__file( '/google.svg' );

# Youtube
$youtube = get_field( 'youtube', 'option' );
$youtube__icon = get__file( '/youtube.svg' );

# Instagram
$instagram = get_field( 'instagram', 'option' );
$instagram__icon = get__file( '/instagram.svg' );

# Email
$email = get_field( 'email__address', 'option' );
$email__icon = get__file( '/email.svg' );

# Page Vars	
$url = urlencode('//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
$title = !empty($post->post_title) ? rawurlencode($post->post_title) : '';
$excerpt = rawurlencode(get_the_excerpt());

# Main Vars Array
$socialMedia = [
	'twitter' => [
		'link' => $twitter,
		'icon' => $twitter__icon,
		'share' => 'https://twitter.com/intent/tweet?source=' . $twitter__share . '&text=' . $title . ':%20' . $twitter__share . '&via=' . get_field( 'twitter__handle', 'option' ) . '"',
	],

	'facebook' => [
		'link' => $facebook,
		'icon' => $facebook__icon,
		'share' => 'http://www.facebook.com/sharer/sharer.php?s=100&amp;p[url]=' . $url . '&amp;p[title]=' . $title,
	],

	'linkedin' => [
		'link' => $linkedin,
		'icon' => $linkedin__icon,
		'share' => 'http://www.linkedin.com/shareArticle?mini=true&url=' . $url . 'F&title=' . $title . '&summary=' . $excerpt . '&source=' . get_site_url(),
	],

	'google' => [
		'link' => $google,
		'icon' => $google__icon,
		'share' => 'https://plus.google.com/share?url=' . $url,
	],

	'youtube' => [
		'link' => $youtube,
		'icon' => $youtube__icon,
		'share' => false,
	],

	'instagram' => [
		'link' => $instagram,
		'icon' => $instagram__icon,
		'share' => false,
	],

	'email' => [
		'link' => $email,
		'icon' => $email__icon,
		'share' => false,
	],
];
