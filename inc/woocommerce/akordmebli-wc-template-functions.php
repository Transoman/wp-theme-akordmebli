<?php

if ( ! function_exists( 'akordmebli_add_call_button' ) ) {
	/**
	 * Add a call button to a single product
	 */
	function akordmebli_add_call_button() {
		echo $btn = '<a href="#call-to-buy" class="single_add_to_cart_button btn fancybox call-to-buy">Замовити</a>';
	}
}

if ( ! function_exists( 'akordmebli_custom_woocommerce_thumbnail' ) ) {
	/**
	 * Custom default image
	 */
	function akordmebli_custom_woocommerce_thumbnail() {
		add_filter('woocommerce_placeholder_img_src', 'akordmebli_custom_woocommerce_placeholder_img_src');
		function akordmebli_custom_woocommerce_placeholder_img_src( $src ) {
			$src = get_template_directory_uri() . '/assets/img/no-image.png';
			return $src;
		}
	}
}

if ( ! function_exists( 'akordmebli_woocommerce_currency_symbol' ) ) {
	/**
	 * Add UAH symbol
	 */
	function akordmebli_woocommerce_currency( $currencies ) {
		$currencies['UAH'] = __( 'Українська гривня', 'woocommerce' );
		return $currencies;
	}

	function akordmebli_woocommerce_currency_symbol( $currency_symbol, $currency ) {
		switch( $currency ) {
			case 'UAH': $currency_symbol = 'грн'; break;
		}
		return $currency_symbol;
	}
}

if ( ! function_exists( 'akordmebli_loop_shop_per_page' ) ) {
	/**
	 * Output of products on page
	 */
	function akordmebli_loop_shop_per_page( $cols ) {
		// $cols contains the current number of products per page based on the value stored on Options -> Reading
		// Return the number of products you wanna show per page.
		$cols = 12;
		return $cols;
	}
}