<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function akordmebli_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'akordmebli' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'akordmebli' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer sidebar', 'akordmebli' ),
		'id'            => 'sidebar-footer',
		'description'   => esc_html__( 'Footer area', 'akordmebli' ),
		'before_widget' => '<div id="%1$s" class="col-sm-6 col-md-5 %2$s">',
		'after_widget'  => '</div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Blog sidebar', 'akordmebli' ),
		'id'            => 'sidebar-blog',
		'description'   => esc_html__( 'Add widgets here.', 'akordmebli' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'akordmebli_widgets_init' );