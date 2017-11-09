<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package akordmebli
 */
?>
	</div><!-- end content -->
</div><!-- end wrapper -->

<footer class="footer">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<div class="footer__logo">
					<a href="/" class="logo">AkordMebli</a>
				</div>
			</div>
		</div>

		<div class="row">

			<?php dynamic_sidebar( 'sidebar-footer' ); ?>

			<div class="col-sm-3 col-sm-offset-3 col-md-2 col-md-offset-5">
				<ul class="social">
					<li class="social__item">
						<a href="<?php esc_url( 'https://www.facebook.com/akordmebli' ); ?>" class="social__link" target="_blank"><svg class="social__icon social__icon--fb"><use xlink:href="#icon-fb"></use></svg>Facebook</a>
					</li>
					<li class="social__item">
						<a href="<?php esc_url( 'https://vk.com/akordmeb' ); ?>" class="social__link" target="_blank"><svg class="social__icon social__icon--vk"><use xlink:href="#icon-vk"></use></svg>VK</a>
					</li>
					<li class="social__item">
						<a href="<?php esc_url( 'https://www.instagram.com/akord_mebli' ); ?>" class="social__link" target="_blank"><svg class="social__icon social__icon--inst"><use xlink:href="#icon-inst"></use></svg>Instagram</a>
					</li>
				</ul>
			</div>

		</div>

		<div class="row">
			<div class="col-md-12">
				<p class="copyright">© 2007 - <?php echo date('Y'); ?> Akord Mebli</p>
			</div>
		</div>

	</div>
</footer>

<!-- begin order-metering -->
<div class="order-metering" id="order" style="display: none">
	<h4>Замовити замір</h4>
	<div id="note"></div>
	<form action="/wp-content/themes/akordmebli/mail.php" class="order-metering-form" method="post">
		<div class="form-field">
			<label for="order-name" class="form-label">Ваше ім'я</label>
			<input type="text" class="order-metering-form__input form-control" name="order-name" id="order-name" required autocomplete="off">
		</div>

		<div class="form-field">
			<label for="phone" class="form-label">Ваш номер телефону</label>
			<input type="tel" class="order-metering-form__input form-control" pattern="\+38\s\([0-9]{3}\)\s[0-9]{2}\s[0-9]{2}\s[0-9]{3}" name="phone" id="phone" required autocomplete="off">
		</div>

		<div class="form-field">
			<label for="order-message" class="form-label">Ваше повідомлення</label>
			<textarea name="order-message" id="order-message" class="order-metering-form__textarea form-control"></textarea>
		</div>

		<div class="g-recaptcha" id="recaptcha-order"></div>

		<button type="submit" class="btn">Замовити</button>
	</form>
</div>
<!-- end order-metering -->

<!-- begin search-wrapp -->
<div class="search-wrapp">
	<button class="search-wrapp__close" title="Зачинити">Зачинити</button>
	<!-- begin container -->
	<div class="container">
		<!-- begin row -->
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<form action="/" class="search-form" method="get">
					<div class="form-field">
						<input type="text" name="s" class="search-form__input form-control" placeholder="Пошук товарів...">
						<button type="reset" class="search-form__reset" title="Очистити">Очистити</button>
					</div>
					<input type="hidden" name="post_type" value="product">
					<button type="submit" class="btn search-form__btn">Шукати</button>
				</form>
			</div>
		</div>
		<!-- end row -->
	</div>
	<!-- end container -->
</div>
<!-- end search-wrapp -->

<div class="top-btn"><svg class="top__icon"><use xlink:href="#down-arrow"></use></svg></div>

<?php wp_footer(); ?>
<script>

	// Recaptcha
	var widget1, widget2, widget3;
	var recaptchaOrder = document.getElementById('recaptcha-order');
	var recaptchaFeedback = document.getElementById('recaptcha-feedback');
	var recaptchaInOrder = document.getElementById('recaptcha-in-order');

	var onloadCallback = function() {

		if(recaptchaOrder)
			widget1 = grecaptcha.render(recaptchaOrder, {
				'sitekey': '6LfTHzYUAAAAANSfSyG2vBWWmPqMat9lOWV7bSx9'
			});

		if(recaptchaFeedback)
			widget2 = grecaptcha.render(recaptchaFeedback, {
				'sitekey': '6LfTHzYUAAAAANSfSyG2vBWWmPqMat9lOWV7bSx9'
			});

		if(recaptchaInOrder)
			widget3 = grecaptcha.render(recaptchaInOrder, {
				'sitekey': '6LfTHzYUAAAAANSfSyG2vBWWmPqMat9lOWV7bSx9'
			});
	};

</script>

</body>
</html>
