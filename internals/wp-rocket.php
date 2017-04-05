<?php

/*--------------------------------------------------------*\
	Redirect via WP Rocket
\*--------------------------------------------------------*/

add_filter( 'before_rocket_htaccess_rules', 'thm__redirects' );

function thm__redirects($marker) {
	$redirection = 'RewriteEngine On' . PHP_EOL;
	$redirection .= 'RewriteCond %{HTTP_HOST} ^www\.(.*)$ [NC]' . PHP_EOL;
	$redirection .= 'RewriteRule ^(.*)$ https://%1/$1 [R=301,L]' . PHP_EOL;
	$redirection .= 'RewriteCond %{HTTPS} off' . PHP_EOL;
	$redirection .= 'RewriteRule (.*) https://%{SERVER_NAME}/$1 [R,L]' . PHP_EOL;
	$marker = $redirection . $marker;
	return $marker;
}
