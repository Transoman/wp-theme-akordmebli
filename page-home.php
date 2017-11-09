<?php
/**
 * Template name: Home page
 */
get_header(); ?>

	<!-- begin #primary -->
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			/**
			 * Function hooked in to homepage action
			 *
			 * @hooked akordmebli_slider()
			 * @hooked akordmebli_features()
			 * @hooked akordmebli_featured_products()
			 * @hooked akordmebli_product_categories()
			 * @hooked akordmebli_specials()
			 * @hooked akordmebli_whywe()
			 */
			do_action( 'homepage' ); ?>

			<!-- begin feedback -->
			<section class="section feedback">
				<div class="container">

					<div class="row">
						<div class="col-md-12">
							<h2 class="section-header">Зворотній зв'язок</h2>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<form action="/wp-content/themes/akordmebli/mail-feedback.php" class="feedback-form" method="post">
								<div class="feedback-form__msg"></div>
								<div class="form-field">
									<label for="name" class="form-label"><?php esc_html_e( 'Your name', 'akordmebli' ); ?></label>
									<input type="text" class="feedback-form__input form-control" name="name" id="name" required autocomplete="off">
								</div>

								<div class="form-field">
									<label for="email" class="form-label">Ваш e-mail</label>
									<input type="email" class="feedback-form__input form-control" name="email" id="email" required autocomplete="off">
								</div>

								<div class="form-field">
									<label for="message" class="form-label">Ваше повідомлення</label>
									<textarea name="message" id="message" class="feedback-form__textarea form-control" required></textarea>
								</div>

								<div class="g-recaptcha" id="recaptcha-feedback"></div>

								<button type="submit" class="btn feedback-form__btn">Відправити</button>
							</form>
						</div>
					</div>

				</div>
			</section>
			<!-- end feedback -->
		</main><!-- #main -->
	</div><!-- end #primary -->

<?php get_footer(); ?>