<?php

/**
 * Reset all styles woocommerce
 */
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );
remove_action( 'woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 20 );

/**
 * @see akordmebli_add_call_button()
 */
add_action( 'woocommerce_single_product_summary', 'akordmebli_add_call_button', 30 );

/**
 * @see akordmebli_custom_woocommerce_thumbnail()
 */
add_action( 'init', 'akordmebli_custom_woocommerce_thumbnail' );

/**
 * @see akordmebli_woocommerce_currency_symbol()
 */
add_filter('woocommerce_currency_symbol', 'akordmebli_woocommerce_currency_symbol', 10, 2);