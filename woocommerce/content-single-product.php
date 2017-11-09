<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="row">
		<div class="col-md-6">
	<?php
		/**
		 * woocommerce_before_single_product_summary hook.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>
		</div>

		<div class="col-md-5 col-md-offset-1">

			<div class="summary entry-summary">

				<?php
					/**
					 * woocommerce_single_product_summary hook.
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_rating - 10
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_meta - 40
					 * @hooked woocommerce_template_single_sharing - 50
					 * @hooked WC_Structured_Data::generate_product_data() - 60
					 */
					do_action( 'woocommerce_single_product_summary' );
				?>
			</div>

	</div><!-- end summary -->
</div><!-- end row -->

	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>

<!-- begin order-metering -->
<div class="order-metering" id="call-to-buy" style="display: none">
	<h4>Замовити товар</h4>
	<div class="note"></div>
	<form action="/wp-content/themes/akordmebli/mail-in-order.php" class="order-metering-form in-order" method="post">
		<div class="form-field">
			<label for="in-order-name" class="form-label">Ваше ім'я</label>
			<input type="text" class="order-metering-form__input form-control" name="in-order-name" id="in-order-name" required autocomplete="off">
		</div>

		<div class="form-field">
			<label for="in-order-phone" class="form-label">Ваш номер телефону</label>
			<input type="tel" class="order-metering-form__input form-control" pattern="\+38\s\([0-9]{3}\)\s[0-9]{2}\s[0-9]{2}\s[0-9]{3}" name="in-order-phone" id="in-order-phone" required autocomplete="off">
		</div>

		<div class="form-field">
			<label for="in-order-message" class="form-label">Ваше повідомлення</label>
			<textarea name="in-order-message" id="in-order-message" class="order-metering-form__textarea form-control"></textarea>
		</div>

		<input type="hidden" name="product" value="<?php the_title(); ?>">

		<div class="g-recaptcha" id="recaptcha-in-order"></div>

		<button type="submit" class="btn">Замовити</button>
		<div class="order-metering-phone">
			<h4>Телефони</h4>
			<a href="tel:+380971878022">+38 (097) 187 80 22</a> <a href="tel:+380660400560">+38 (066) 040 05 60</a>
		</div>
	</form>
</div>
<!-- end order-metering -->