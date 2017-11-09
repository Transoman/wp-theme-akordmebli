<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue scripts and styles.
 */
function akordmebli_styles() {
	wp_enqueue_style( 'akordmebli-style', get_stylesheet_uri() );
	wp_enqueue_style( 'akordmebli-main', get_template_directory_uri().'/assets/css/style.min.css');
}
add_action( 'wp_enqueue_scripts', 'akordmebli_styles' );

function akordmebli_scripts() {
	wp_enqueue_script( 'akordmebli-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'akordmebli-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'akordmebli-scripts', get_template_directory_uri() . '/assets/js/scripts.min.js', '', '', true );
	wp_enqueue_script( 'akordmebli-common', get_template_directory_uri() . '/assets/js/common.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'akordmebli_scripts' );