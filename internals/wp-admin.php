<?php

function customCSS__tinyMCE() {
	add_editor_style();
}

add_action( 'admin_init', 'customCSS__tinyMCE' );