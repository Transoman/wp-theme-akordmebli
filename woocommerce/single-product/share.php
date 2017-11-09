<?php
/**
 * Single Product Share
 *
 * Sharing plugins can hook into here or you can add your own code directly.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/share.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<ul class="social-product">
	<li class="social-product__item">
		<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="social-product__link">
			<i class="icon-facebook"></i>
		</a>
	</li>
	<li class="social-product__item">
		<a href="https://vk.com/share.php?url=<?php the_permalink(); ?>" target="_blank" class="social-product__link">
			<i class="icon-vk"></i>
		</a>
	</li>
	<li class="social-product__item">
		<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="social-product__link">
			<i class="icon-instagram"></i>
		</a>
	</li>
	<li class="social-product__item">
		<a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>" target="_blank" class="social-product__link">
			<i class="icon-twitter"></i>
		</a>
	</li>
	<li class="social-product__item">
		<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank" class="social-product__link">
			<i class="icon-google-plus"></i>
		</a>
	</li>
</ul>

<?php do_action( 'woocommerce_share' ); // Sharing plugins can hook into here

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
