<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'akordmebli_display_comments' ) ) {
	function akordmebli_display_comments() {
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	}
}

if ( ! function_exists( 'akordmebli_remove_wp_version_string' ) ) {
	/**
	 * Remove generator version number from js and css
	 */
	function akordmebli_remove_wp_version_string( $src ) {
		global $wp_version;

		parse_str( parse_url( $src, PHP_URL_QUERY ), $query );

		if ( !empty( $query['ver'] ) && $query['ver'] === $wp_version ) {
			$src = remove_query_arg( 'ver', $src );
		}
		return $src;
	}
}

if ( ! function_exists( 'akordmebli_fancybox_support' ) ) {
	/**
	 * Fancybox to img
	 */
	function akordmebli_fancybox_support( $content ) {
		global $post;
		$pattern ="/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
		$replacement = '<a$1href=$2$3.$4$5 data-fancybox="images" title="'.$post->post_title.'"$6>';
		$content = preg_replace($pattern, $replacement, $content);
		return $content;
	}
}

if ( ! function_exists( 'akordmebli_disable_image_quality' ) ) {
	function akordmebli_disable_image_quality( $arg ) {
		return 100;
	}
}

if ( ! function_exists( 'akordmebli_slider' ) ) {
	/**
	 * Вивід слайдера
	 */
	function akordmebli_slider() {
		$slider = new WP_Query( array(
			'post_type' => 'slider',
			'post_per_page' => -1,
			'order' => 'ASC'
		));

		if( $slider->have_posts() ): ?>

			<!-- begin slider -->
			<div class="slider header-slider owl-carousel">
				<?php while( $slider->have_posts() ): $slider->the_post(); ?>
					<div class="slider__item" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<!-- begin slider__content -->
									<div class="slider__content">
										<?php the_content();

											if ( get_field( 'text_on_btn', get_the_ID() ) ):
												if( get_field( 'popup', get_the_ID() ) ) {
													$popup = ' fancybox';
												}
												else {
													$popup = '';
												}
												echo '<a href="' . get_field( 'slider_link', get_the_ID() ) . '" class="btn slider__btn' . $popup . '">' . get_field( 'text_on_btn', get_the_ID() ) . '</a>';
											endif;
										?>
									</div>
									<!-- end slider__content -->
								</div>
							</div>
						</div>
					</div>
				<?php endwhile;
				wp_reset_query(); ?>
			</div>
		<?php else: ?>
			<!-- begin hero -->
			<div class="hero" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/slide.jpg');">
				<div class="container">
					<div class="row">
						<div class="col-md-12">

							<div class="hero__content">
								<h1 class="hero__head">Виготовлення кухонь та шаф-купе <br>на замовлення</h1>
							</div>

						</div>
					</div>
				</div>
			</div>
			<!-- end hero -->
		<?php endif; ?>
		<!-- end slider -->
	<?php }
}

if ( ! function_exists( 'akordmebli_features' ) ) {
	/**
	 * Вивід переваг
	 */
	function akordmebli_features() {
		?>
		<!-- begin features -->
		<section class="features section-bg">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col-md-4">
						<div class="features__item">
							<span class="features__number counter">10</span>
							<span class="features__text">років<br>досвіду</span>
						</div>
					</div>
					<div class="col-sm-4 col-md-4">
						<div class="features__item">
							<span class="features__number counter">1000</span>
							<span class="features__text">задоволених<br>клієнтів</span>
						</div>
					</div>
					<div class="col-sm-4 col-md-4">
						<div class="features__item">
							<span class="features__number counter">5</span>
							<span class="features__text">років<br>гарантія</span>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- end features -->
		<?php
	}
}

if ( ! function_exists( 'akordmebli_featured_products' ) ) {
	/**
	 * Вивід рекомендовані товари
	 */
	function akordmebli_featured_products() {
		$products = new WP_Query( array(
			'post_type' => 'product',
			'tax_query' => array(
				array(
					'taxonomy' => 'product_visibility',
					'field' => 'name' ,
					'terms' => 'featured'
				)),
			'orderby' => 'id',
			'order' => 'ASC',
			'post_per_page' => 6
		) );

		if ( $products->have_posts() ): ?>
			<!-- begin recommend-product -->
			<section class="section recommend-product">
				<div class="container">

					<div class="row">
						<div class="col-md-12">
							<h2 class="section-header">Рекомендовані товари</h2>
						</div>
					</div>

					<!-- begin row -->
					<div class="row recommend-product__list">

					<?php while($products->have_posts()): $products->the_post(); ?>

						<div class="col-sm-4 col-md-4">
							<div class="recommend-product__item">
								<a href="<?php the_permalink(); ?>" class="recommend-product__link">
									<div class="recommend-product__img-wrapp">
										<?php do_action( 'woocommerce_before_shop_loop_item_title' );?>
									</div>
									<div class="recommend-product__content">
										<h3 class="recommend-product__title"><?php the_title(); ?></h3>
										<p class="recommend-product__descr"><?php echo get_the_excerpt(); ?></p>
										<div class="recommend-product__price-wrapp">
											<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
										</div>
									</div>
								</a>
							</div>
						</div>

					<?php endwhile;
					wp_reset_query(); ?>

					</div>
					<!-- end row -->

				</div>
			</section>
			<!-- end recommend-product -->
	<?php endif;
	}
}

if ( ! function_exists( 'akordmebli_product_categories' ) ) {
	/**
	 * Вивід категорій на головній сторінці
	 */
	function akordmebli_product_categories() {

		if ( akordmebli_is_woocommerce_activated() ) {

			$args = array(
				'number'     => 4,
				'orderby'    => 'id',
				'order'      => 'ASC',
				'hide_empty' => false,
				'parent' => 0
			);
			$product_categories = get_terms( 'product_cat', $args );

			if ( $product_categories && !is_wp_error($product_categories) ): ?>

				<!-- begin catalog -->
				<section class="section catalog section-bg">
					<div class="container">

						<div class="row">
							<div class="col-md-12">
								<h2 class="section-header">Наш каталог</h2>
							</div>
						</div>

						<div class="row">

						<?php foreach ( $product_categories as $product_category ): ?>

							<div class="col-sm-3 col-md-3">
								<div class="catalog__item">
									<a href="<?php echo get_term_link( $product_category ); ?>" class="catalog__link">
										<span class="catalog__icon-wrapp">
											<?php
											$term_id = 'product_cat_'.$product_category->term_id;
											echo get_field('icon_category_shop', $term_id); ?>
										</span>
										<h3 class="catalog__title"><?php echo $product_category->name; ?></h3>
									</a>
								</div>
							</div>

						<?php endforeach;
						wp_reset_query(); ?>

						</div>
					</div>
				</section>
				<!-- end catalog -->

			<?php endif;
		}

	}
}

if ( ! function_exists( 'akordmebli_specials' ) ) {
	/**
	 * Вивід спеціальних пропозицій
	 */
	function akordmebli_specials() {

		$specials = new WP_Query( array(
			'post_type' => 'special',
			'post_per_page' => -1,
			'order' => 'ASC'
		) );

		if ( $specials->have_posts() ): ?>

			<!-- begin special -->
			<section class="section special">
				<div class="container">

					<div class="row">
						<div class="col-md-12">
							<h2 class="section-header">Спеціальні пропозиції</h2>
						</div>
					</div>

					<div class="row">

					<?php while( $specials->have_posts() ): $specials->the_post(); ?>

						<div class="col-md-6">
							<div class="special__item-wrapp">
								<a href="<?php echo get_field( 'action_link', get_the_ID() ); ?>">
									<div class="special__item">
										<?php echo get_the_post_thumbnail(); ?>
									</div>
								</a>
							</div>
						</div>

					<?php endwhile;
					wp_reset_query(); ?>

					</div>

				</div>
			</section>
			<!-- end special -->

		<?php endif;
	}
}

if ( ! function_exists( 'akordmebli_whywe' ) ) {
	/**
	 * Вивід секції Чому ми
	 */
	function akordmebli_whywe() {

		$advantages = new WP_Query( array(
			'post_type' => 'advantages',
			'post_per_page' => 3,
			'order' => 'ASC'
		) );

		if ( $advantages->have_posts() ): ?>

			<!-- begin why-we -->
			<section class="section why-we section-bg">
				<div class="container">

					<div class="row">
						<div class="col-md-12">
							<h2 class="section-header">Чому саме ми?</h2>
						</div>
					</div>

					<div class="row">

					<?php while( $advantages->have_posts() ): $advantages->the_post(); ?>

						<div class="col-sm-12 col-md-4">
							<div class="why-we__item">
								<div class="why-we__icon-wrapp">
									<?php echo get_field( 'icon_advantage', get_the_ID() ); ?>
								</div>
								<span class="why-we__header"><?php the_title(); ?></span>
								<?php the_content(); ?>
							</div>
						</div>

					<?php endwhile;
					wp_reset_query(); ?>

					</div>

				</div>
			</section>
			<!-- end why-we -->

		<?php endif;
	}
}