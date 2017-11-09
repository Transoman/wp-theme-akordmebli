<?php

require get_template_directory() . '/inc/akordmebli-functions.php';

/**
 * Theme settings
 */
require get_template_directory() . '/inc/theme-settings.php';

/**
 * Widget areas
 */
require get_template_directory() . '/inc/widget-areas.php';

/**
 * Enqueue scripts and styles
 */
require get_template_directory() . '/inc/enqueue-script-style.php';

/**
 * Theme function and hooks
 */
require get_template_directory() . '/inc/akordmebli-template-functions.php';
require get_template_directory() . '/inc/akordmebli-template-hooks.php';

if ( class_exists( 'WooCommerce' ) ) {
	/**
	 * Woocommerce function and hooks
	 */
	require get_template_directory() . '/inc/woocommerce/akordmebli-wc-template-functions.php';
	require get_template_directory() . '/inc/woocommerce/akordmebli-wc-template-hooks.php';
}


/**
 * Slider
 */
add_action('init', 'akordmebli_slider_taxonomy');

function akordmebli_slider_taxonomy() {
	register_post_type( 'slider', array(
		'public' => true,
		'supports' => array(
			'title', 'thumbnail', 'editor'
			),
		'labels' => array(
			'name' => 'Слайдер',
			'all_items' => 'Всі слайди',
			'add_new_item' => 'Додавання слайда'
		),
		'menu_icon' => 'dashicons-images-alt2'
	) );
}

/**
 * Special proposals
 */
add_action('init', 'akordmebli_special_taxonomy');

function akordmebli_special_taxonomy() {
	register_post_type( 'special', array(
		'public' => true,
		'supports' => array(
			'title', 'thumbnail', 'editor'
			),
		'labels' => array(
			'name' => 'Пропозиції',
			'all_items' => 'Всі спеціальні пропозиції',
			'add_new_item' => 'Додавання пропозиції'
		),
		'menu_icon' => 'dashicons-megaphone'
	) );
}

/**
 * Advantages list
 */
add_action('init', 'akordmebli_advantages_taxonomy');

function akordmebli_advantages_taxonomy() {
	register_post_type( 'advantages', array(
		'public' => true,
		'supports' => array(
			'title', 'thumbnail', 'editor'
			),
		'labels' => array(
			'name' => 'Переваги',
			'all_items' => 'Всі переваги',
			'add_new_item' => 'Додавання переваги'
		),
		'menu_icon' => 'dashicons-awards'
	) );
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Walker Menu
 */
require get_template_directory() . '/inc/top-menu.php';


/**
 * TGM Class
 */
require get_template_directory() . '/inc/init-tgm.php';

/**
 * Theme options
 */
require get_template_directory() . '/inc/theme-options.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * ACF
 */
require get_template_directory() . '/inc/acf.php';