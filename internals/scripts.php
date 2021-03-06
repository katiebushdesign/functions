<?php

/*--------------------------------------------------------*\
	Remove jQuery // jQuery UI
\*--------------------------------------------------------*/

function remove__jquery(&$scripts) {
	if ( !is_admin() ) {
		$scripts->remove( 'jquery' );
		$scripts->remove( 'jquery-ui-core' );
	}
}

add_action('wp_default_scripts', 'remove__jquery', 999);

/*--------------------------------------------------------*\
	Add jQuery for Ninja Forms Page
\*--------------------------------------------------------*/

// function conditionallyAdd__jquery() {
// 	wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', false, '3.1.1', true);

// 	if ( is_page( 'request-a-demo' ) ) {
// 		wp_enqueue_script( 'jquery' );
// 	}
// }
// add_action( 'wp_enqueue_scripts', 'conditionallyAdd__jquery' );

/*--------------------------------------------------------*\
	Remove WP Scripts
\*--------------------------------------------------------*/

function remove__scripts() {
	if ( !is_admin() ) {
		wp_deregister_script( 'wp-embed' );

		// Remove the REST API endpoint.
		remove_action( 'rest_api_init', 'wp_oembed_register_route' );
		 
		// Turn off oEmbed auto discovery.
		add_filter( 'embed_oembed_discover', '__return_false' );
		 
		// Don't filter oEmbed results.
		remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
		 
		// Remove oEmbed discovery links.
		remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
		 
		// Remove oEmbed-specific JavaScript from the front-end and back-end.
		remove_action( 'wp_head', 'wp_oembed_add_host_js' );
		 
		// Remove all embeds rewrite rules.
		add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
	}
}

add_action('init', 'remove__scripts');
