<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Pages
 *
 * @see  akordmebli_display_comments()
 */
add_action( 'akordmebli_page_after', 'akordmebli_display_comments', 10 );

/**
 * Removing ... from header
 */
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

/**
 * @see akordmebli_remove_wp_version_string()
 */
add_filter( 'script_loader_src', 'akordmebli_remove_wp_version_string' );
add_filter( 'style_loader_src', 'akordmebli_remove_wp_version_string' );

/**
 * Remove metateg generator from header
 */
add_filter( 'the_generator', '__return_empty_string' );

/**
 * @see akordmebli_fancybox_support()
 */
add_filter( 'the_content', 'akordmebli_fancybox_support', 999 );

/**
 * Disable Image Compression in WordPress
 */
add_filter('jpeg_quality', 'akordmebli_disable_image_quality' );

/**
 * @see akordmebli_slider()
 * @see akordmebli_features()
 * @see akordmebli_featured_products()
 * @see akordmebli_product_categories()
 * @see akordmebli_specials()
 * @see akordmebli_whywe()
 */
add_action( 'homepage', 'akordmebli_slider', 10 );
add_action( 'homepage', 'akordmebli_features', 20 );
add_action( 'homepage', 'akordmebli_featured_products', 30 );
add_action( 'homepage', 'akordmebli_product_categories', 40 );
add_action( 'homepage', 'akordmebli_specials', 50 );
add_action( 'homepage', 'akordmebli_whywe', 60 );